<?php
/**
 * LeanCMS content page renderer.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-page-renderer.php
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'LeanCMS_Content_Page_Renderer' ) ) {

    /**
     * Handles registration and rendering of LeanCMS full page templates.
     */
    final class LeanCMS_Content_Page_Renderer {

        /**
         * Singleton instance.
         *
         * @var self|null
         */
        private static $instance = null;

        /**
         * Bootstraps the renderer singleton.
         */
        public static function boot(): self {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register hooks.
         */
        private function __construct() {
            add_filter( 'theme_page_templates', array( $this, 'register_plugin_template' ) );
            add_filter( 'template_include', array( $this, 'maybe_swap_template' ) );
        }

        /**
         * Ensure cloning is disabled.
         */
        private function __clone() {}

        /**
         * Ensure unserializing is disabled.
         */
        public function __wakeup() {
            throw new \RuntimeException( 'Cannot unserialize singleton' );
        }

        /**
         * Add the LeanCMS page template to the editor dropdown.
         *
         * @param array $templates Existing templates.
         *
         * @return array
         */
        public function register_plugin_template( array $templates ): array {
            $templates[ LEANCMS_PAGE_TEMPLATE_SLUG ] = 'LeanCMS Full Page';

            return $templates;
        }

        /**
         * Swap the active template to a plugin page file when appropriate.
         *
         * @param string $template Theme-provided template path.
         *
         * @return string
         */
        public function maybe_swap_template( string $template ): string {
            if ( ! is_page() ) {
                return $template;
            }

            $page_id = get_queried_object_id();
            if ( ! $page_id ) {
                return $template;
            }

            $chosen = get_page_template_slug( $page_id );

            $matches_plugin_template = ( $chosen === LEANCMS_PAGE_TEMPLATE_SLUG )
                || ( is_string( $chosen ) && preg_match( '#'. preg_quote( LEANCMS_PAGE_TEMPLATE_SLUG, '#' ) . '$#', $chosen ) );

            if ( ! $matches_plugin_template ) {
                return $template;
            }

            // Check if page is password protected.
            $post = get_post( $page_id );
            if ( ! empty( $post->post_password ) && post_password_required( $post ) ) {
                // First try to find custom -noaccess template variant.
                $noaccess = $this->resolve_plugin_page_file( (int) $page_id, true );

                if ( ! empty( $noaccess['path'] ) ) {
                    return $noaccess['path'];
                }

                // Fallback to generic password form.
                return $this->render_password_form( $template, $page_id );
            }

            // Check for database-stored dynamic template first.
            $dynamic_template = get_post_meta( $page_id, '_leancms_dynamic_template', true );
            if ( ! empty( $dynamic_template ) ) {
                return $this->render_dynamic_template( $dynamic_template, $page_id );
            }

            // Fall back to file-based template resolution.
            $resolved = $this->resolve_plugin_page_file( (int) $page_id );

            if ( ! empty( $resolved['path'] ) ) {
                return $resolved['path'];
            }

            return $this->render_fallback_notice( $template, array( 'missing' => $resolved['looked_for'] ) );
        }

        /**
         * Determine the plugin page file for a given page.
         *
         * @param int  $page_id        Page identifier.
         * @param bool $check_noaccess Whether to check for -noaccess variant (for password-protected pages).
         *
         * @return array{path:string|null, looked_for:string[], both_exist:bool}
         */
        private function resolve_plugin_page_file( int $page_id, bool $check_noaccess = false ): array {
            $dir   = trailingslashit( LEANCMS_PLUGIN_DIR ) . 'templates/pages/';
            $slug  = get_post_field( 'post_name', $page_id );
            $tries = array();

            if ( $check_noaccess ) {
                // When checking for noaccess templates, ONLY check -noaccess variants.
                // Do not fall back to regular templates (that's the protected content!).
                if ( $slug ) {
                    $tries[] = 'slug-' . $slug . '-noaccess.php';
                }
                $tries[] = 'id-' . $page_id . '-noaccess.php';
            } else {
                // Normal template resolution (not password protected).
                if ( $slug ) {
                    $tries[] = 'slug-' . $slug . '.php';
                }
                $tries[] = 'id-' . $page_id . '.php';
            }

            /**
             * Filter: change or extend the candidate list.
             *
             * @param string[] $tries Candidate filenames (relative to templates/pages/).
             * @param int      $page_id Current page ID.
             * @param string   $slug    Current page slug.
             */
            $tries = apply_filters( 'leancms_candidate_pages', $tries, $page_id, $slug );

            $found = array();
            foreach ( $tries as $rel ) {
                $path = $dir . $rel;
                if ( is_readable( $path ) ) {
                    $found[] = $path;
                }
            }

            $both_exist = count( $found ) > 1;
            $path       = $found ? $found[0] : null;

            return array(
                'path'        => $path,
                'looked_for'  => $tries,
                'both_exist'  => $both_exist,
            );
        }

        /**
         * Render a dynamic template stored in the database.
         *
         * Creates a temporary PHP file to include the dynamic template code.
         * This allows full use of the LeanCMS partial system while keeping
         * the template code stored in the database.
         *
         * @param string $template_code PHP template code from database.
         * @param int    $page_id       Page identifier.
         *
         * @return string Path to temporary template file.
         */
        private function render_dynamic_template( string $template_code, int $page_id ): string {
            // Create a temporary file for this dynamic template.
            $temp_dir  = trailingslashit( sys_get_temp_dir() ) . 'leancms-dynamic-templates/';
            $temp_file = $temp_dir . 'page-' . $page_id . '-' . md5( $template_code ) . '.php';

            // Create temp directory if it doesn't exist.
            if ( ! is_dir( $temp_dir ) ) {
                wp_mkdir_p( $temp_dir );
            }

            // Write the template to temp file if it doesn't exist or has changed.
            if ( ! file_exists( $temp_file ) ) {
                // Clean up old temp files for this page.
                $pattern = $temp_dir . 'page-' . $page_id . '-*.php';
                foreach ( glob( $pattern ) as $old_file ) {
                    @unlink( $old_file );
                }

                // Write new template file.
                // Ensure proper PHP opening tag if not present.
                $code = $template_code;
                if ( substr( ltrim( $code ), 0, 5 ) !== '<?php' ) {
                    $code = '<?php' . "\n" . $code;
                }

                file_put_contents( $temp_file, $code );
            }

            return $temp_file;
        }

        /**
         * Display a helpful notice inside the theme layout when no template exists.
         *
         * @param string $theme_template Original template path.
         * @param array  $ctx            Context data.
         *
         * @return string
         */
        private function render_fallback_notice( string $theme_template, array $ctx ): string {
            add_filter( 'the_content', function ( $html ) use ( $ctx ) {
                $files = isset( $ctx['missing'] ) && is_array( $ctx['missing'] ) ? $ctx['missing'] : array();

                ob_start();
                ?>
                <div style="padding:1rem;border:1px solid #dbeafe;background:#eff6ff;border-radius:8px">
                    <strong><?php esc_html_e( 'leancms:', 'brandhub-client-cms' ); ?></strong>
                    <?php esc_html_e( 'No matching plugin page template found. Create one of:', 'brandhub-client-cms' ); ?>
                    <ul style="margin:.5rem 0 0 1rem;list-style:disc">
                        <?php foreach ( $files as $f ) : ?>
                            <li><code><?php echo esc_html( $f ); ?></code></li>
                        <?php endforeach; ?>
                    </ul>
                    <small><?php esc_html_e( 'Location:', 'brandhub-client-cms' ); ?>
                        <code>/wp-content/plugins/leancms/templates/pages/</code>
                    </small>
                </div>
                <?php
                return ob_get_clean();
            }, 9999 );

            return $theme_template;
        }

        /**
         * Return path to generic password form template when no custom -noaccess template exists.
         *
         * @param string $theme_template Original template path.
         * @param int    $page_id        Page identifier.
         *
         * @return string Path to password form template.
         */
        private function render_password_form( string $theme_template, int $page_id ): string {
            $password_template = trailingslashit( LEANCMS_PLUGIN_DIR ) . 'templates/password-form.php';

            if ( is_readable( $password_template ) ) {
                return $password_template;
            }

            // If password template doesn't exist, log error and show notice.
            if ( current_user_can( 'manage_options' ) ) {
                error_log( 'LeanCMS: Password form template not found at: ' . $password_template );
            }

            // Ultimate fallback: show error notice.
            return $this->render_fallback_notice( $theme_template, array(
                'missing' => array( 'templates/password-form.php' ),
            ) );
        }
    }
}
