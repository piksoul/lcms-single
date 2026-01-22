<?php
/**
 * LeanCMS DB Page Renderer
 *
 * Handles registration and rendering of database-backed page templates.
 * This allows page data and layout to be stored in post meta instead of files.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-db-page-renderer.php
 * @since      2.1.9
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'LeanCMS_DB_Page_Renderer' ) ) {

	/**
	 * Handles registration and rendering of LeanCMS DB page templates.
	 */
	final class LeanCMS_DB_Page_Renderer {

		/**
		 * Template slug for the DB page template.
		 *
		 * @var string
		 */
		const TEMPLATE_SLUG = 'leancms-db-page.php';

		/**
		 * Meta key for storing page data (config array).
		 *
		 * @var string
		 */
		const META_KEY_DATA = '_leancms_page_data';

		/**
		 * Meta key for storing page layout (partial structure).
		 *
		 * @var string
		 */
		const META_KEY_LAYOUT = '_leancms_page_layout';

		/**
		 * Singleton instance.
		 *
		 * @var self|null
		 */
		private static $instance = null;

		/**
		 * Bootstrap the renderer singleton.
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
			add_filter( 'theme_page_templates', array( $this, 'register_db_template' ) );
			add_filter( 'template_include', array( $this, 'maybe_render_db_template' ), 5 );
			add_action( 'wp_enqueue_scripts', array( $this, 'maybe_enqueue_design_system' ) );
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
		 * Add the LeanCMS DB Page template to the editor dropdown.
		 *
		 * @param array $templates Existing templates.
		 *
		 * @return array
		 */
		public function register_db_template( array $templates ): array {
			$templates[ self::TEMPLATE_SLUG ] = 'LeanCMS DB Page';

			return $templates;
		}

		/**
		 * Check if a page uses the DB page template.
		 *
		 * @param int $page_id Page ID.
		 *
		 * @return bool
		 */
		public static function is_db_page( int $page_id ): bool {
			$chosen = get_page_template_slug( $page_id );

			return ( $chosen === self::TEMPLATE_SLUG )
				|| ( is_string( $chosen ) && preg_match( '#' . preg_quote( self::TEMPLATE_SLUG, '#' ) . '$#', $chosen ) );
		}

		/**
		 * Render the DB page template when appropriate.
		 *
		 * @param string $template Theme-provided template path.
		 *
		 * @return string
		 */
		public function maybe_render_db_template( string $template ): string {
			if ( ! is_page() ) {
				return $template;
			}

			$page_id = get_queried_object_id();
			if ( ! $page_id ) {
				return $template;
			}

			if ( ! self::is_db_page( $page_id ) ) {
				return $template;
			}

			// Check if page is password protected.
			$post = get_post( $page_id );
			if ( ! empty( $post->post_password ) && post_password_required( $post ) ) {
				return $this->render_password_form( $template, $page_id );
			}

			// Check if we have layout data.
			$layout = get_post_meta( $page_id, self::META_KEY_LAYOUT, true );

			if ( empty( $layout ) ) {
				return $this->render_empty_notice( $template, $page_id );
			}

			// Render from database.
			return $this->render_from_database( $page_id );
		}

		/**
		 * Render the page from database-stored data and layout.
		 *
		 * @param int $page_id Page ID.
		 *
		 * @return string Path to temporary template file.
		 */
		private function render_from_database( int $page_id ): string {
			$layout_data = get_post_meta( $page_id, self::META_KEY_LAYOUT, true );
			$page_data   = get_post_meta( $page_id, self::META_KEY_DATA, true );

			// Determine layout mode and code.
			$layout_mode      = 'code';
			$layout_code      = '';
			$layout_structure = array();

			if ( is_array( $layout_data ) ) {
				$layout_mode      = $layout_data['mode'] ?? 'code';
				$layout_code      = $layout_data['code'] ?? '';
				$layout_structure = $layout_data['structure'] ?? array();
			} elseif ( is_string( $layout_data ) ) {
				// Legacy: plain string is code mode.
				$layout_code = $layout_data;
			}

			// For visual mode, generate code from structure.
			if ( 'visual' === $layout_mode && ! empty( $layout_structure ) ) {
				$layout_code = $this->generate_code_from_structure( $layout_structure );
			}

			// Build the full template.
			$template_code = $this->build_template_code( $page_id, $page_data, $layout_code );

			// Create temp file for rendering.
			return $this->create_temp_template( $page_id, $template_code );
		}

		/**
		 * Build the complete template code from data and layout.
		 *
		 * @param int    $page_id     Page ID.
		 * @param mixed  $page_data   Page data array.
		 * @param string $layout_code Layout PHP code.
		 *
		 * @return string Complete PHP template code.
		 */
		private function build_template_code( int $page_id, $page_data, string $layout_code ): string {
			$client_code = LeanCMS_Client_Code_Meta_Box::get_client_code( $page_id );

			// Ensure page_data is an array.
			if ( ! is_array( $page_data ) ) {
				$page_data = array();
			}

			// Serialize the page data for inclusion in template.
			$serialized_data = var_export( $page_data, true );

			// Build the template.
			$template = <<<'PHP'
<?php
/**
 * LeanCMS DB Page - Auto-generated template
 *
 * This template is dynamically generated from database-stored data.
 * Do not edit this file directly - changes will be lost.
 *
 * @generated
 */

defined('ABSPATH') || exit;

get_header();

// Load configurations
$global_config = array();
$global_config_file = LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php';
if ( file_exists( $global_config_file ) ) {
    $global_config = include( $global_config_file );
}

PHP;

			// Add client config loading if client code is set.
			if ( ! empty( $client_code ) ) {
				$template .= <<<PHP

// Load client configuration
\$client_config = array();
\$client_config_file = LEANCMS_PLUGIN_DIR . 'templates/pages/{$client_code}/config.php';
if ( file_exists( \$client_config_file ) ) {
    \$client_config = include( \$client_config_file );
}

PHP;
			} else {
				$template .= <<<'PHP'

// No client code set - using global config only
$client_config = array();

PHP;
			}

			// Add page data and config merging.
			$template .= <<<PHP

// Page-specific data from database
\$page_data = {$serialized_data};

// Merge configurations (page data takes precedence over client, client over global)
\$config = array_replace_recursive(
    \$global_config,
    \$client_config,
    \$page_data
);

// Merge CSS variables specifically
\$css_vars = array_merge(
    \$global_config['css_variables'] ?? array(),
    \$client_config['css_variables'] ?? array(),
    \$page_data['css_variables'] ?? array()
);

// Always output CSS variables from merged config
if ( ! empty( \$css_vars ) ) :
?>
<style id="leancms-db-page-css-variables">
:root {
<?php foreach ( \$css_vars as \$key => \$value ) : ?>
    --<?php echo esc_attr( \$key ); ?>: <?php echo esc_attr( \$value ); ?>;
<?php endforeach; ?>
}
</style>
<?php
endif;

PHP;

			// Add resource loading if client code is set (Google Fonts only).
			// Note: We render the loader partial directly instead of using load_client_resources()
			// because that function hooks to wp_head which has already fired at this point.
			// The design system and document system CSS are already enqueued via maybe_enqueue_design_system(),
			// and CSS variables are already output above, so we only need to load Google Fonts here.
			if ( ! empty( $client_code ) ) {
				$template .= <<<PHP

// Load client resources (fonts only - CSS vars already output, stylesheets already enqueued via wp_head)
// Using partial() directly since we're past wp_head
partial( 'loader', array(
	'client_code' => '{$client_code}',
	'flags'       => array(
		'skip_css_vars'    => true,
		'skip_stylesheets' => true,
	),
), 'top-section' );

PHP;
			}

			// Add the user's layout code directly (layout code handles its own structure).
			$template .= "\n?>\n" . $layout_code . "\n<?php\n";

			// Close template.
			$template .= <<<'PHP'

get_footer(); ?>
PHP;

			return $template;
		}

		/**
		 * Create a temporary template file for rendering.
		 *
		 * @param int    $page_id       Page ID.
		 * @param string $template_code Template PHP code.
		 *
		 * @return string Path to temporary file.
		 */
		private function create_temp_template( int $page_id, string $template_code ): string {
			$temp_dir  = trailingslashit( sys_get_temp_dir() ) . 'leancms-db-pages/';
			$temp_file = $temp_dir . 'db-page-' . $page_id . '-' . md5( $template_code ) . '.php';

			// Create temp directory if needed.
			if ( ! is_dir( $temp_dir ) ) {
				wp_mkdir_p( $temp_dir );
			}

			// Write template if it doesn't exist or content changed.
			if ( ! file_exists( $temp_file ) ) {
				// Clean up old temp files for this page.
				$pattern = $temp_dir . 'db-page-' . $page_id . '-*.php';
				foreach ( glob( $pattern ) as $old_file ) {
					@unlink( $old_file );
				}

				// Write new template file.
				file_put_contents( $temp_file, $template_code );
			}

			return $temp_file;
		}

		/**
		 * Render a notice when no layout data exists.
		 *
		 * @param string $template Original template path.
		 * @param int    $page_id  Page ID.
		 *
		 * @return string
		 */
		private function render_empty_notice( string $template, int $page_id ): string {
			add_filter( 'the_content', function ( $html ) use ( $page_id ) {
				ob_start();
				?>
				<div style="padding:1.5rem;border:1px solid #fbbf24;background:#fffbeb;border-radius:8px;margin:20px 0;">
					<strong style="color:#92400e;">LeanCMS DB Page:</strong>
					<p style="margin:0.5rem 0 0;color:#78350f;">
						<?php esc_html_e( 'This page is configured to use the LeanCMS DB Page template, but no layout has been defined yet.', 'brandhub-client-cms' ); ?>
					</p>
					<?php if ( current_user_can( 'edit_page', $page_id ) ) : ?>
					<p style="margin:0.5rem 0 0;color:#78350f;">
						<a href="<?php echo esc_url( get_edit_post_link( $page_id ) ); ?>" style="color:#92400e;text-decoration:underline;">
							<?php esc_html_e( 'Edit this page', 'brandhub-client-cms' ); ?>
						</a>
						<?php esc_html_e( 'to add layout code in the "LeanCMS Layout" field.', 'brandhub-client-cms' ); ?>
					</p>
					<?php endif; ?>
				</div>
				<?php
				return ob_get_clean();
			}, 9999 );

			return $template;
		}

		/**
		 * Render password form for protected pages.
		 *
		 * @param string $template Original template path.
		 * @param int    $page_id  Page ID.
		 *
		 * @return string
		 */
		private function render_password_form( string $template, int $page_id ): string {
			$password_template = trailingslashit( LEANCMS_PLUGIN_DIR ) . 'templates/password-form.php';

			if ( is_readable( $password_template ) ) {
				return $password_template;
			}

			return $template;
		}

		/**
		 * Enqueue design system CSS for DB pages.
		 */
		public function maybe_enqueue_design_system(): void {
			if ( ! is_page() ) {
				return;
			}

			$page_id = get_queried_object_id();
			if ( ! $page_id || ! self::is_db_page( $page_id ) ) {
				return;
			}

			// Enqueue the design system CSS.
			wp_enqueue_style(
				'lcms-design-system',
				LEANCMS_PLUGIN_URL . 'templates/assets/global/lcms-design-system.css',
				array(),
				LEANCMS_VERSION,
				'all'
			);

			// Enqueue legacy document system CSS.
			wp_enqueue_style(
				'lcms-document-system',
				LEANCMS_PLUGIN_URL . 'templates/assets/global/document-system.css',
				array( 'lcms-design-system' ),
				LEANCMS_VERSION,
				'all'
			);
		}

		/**
		 * Generate layout code from visual mode structure.
		 *
		 * Converts the structured array format into PHP code that renders partials.
		 *
		 * @param array $structure Visual mode structure array.
		 *
		 * @return string Generated PHP layout code.
		 */
		private function generate_code_from_structure( array $structure ): string {
			if ( empty( $structure ) ) {
				return '';
			}

			$code = "<main id=\"primary\" class=\"site-main\">\n";

			foreach ( $structure as $block ) {
				$partial    = $block['partial'] ?? '';
				$folder     = $block['folder'] ?? '';
				$config_key = $block['config_key'] ?? '';
				$wrapper    = $block['wrapper'] ?? array();

				if ( empty( $partial ) ) {
					continue;
				}

				// Wrapper open.
				$wrapper_enabled = $wrapper['enabled'] ?? true;
				$wrapper_class   = $wrapper['class'] ?? '';

				if ( $wrapper_enabled && ! empty( $wrapper_class ) ) {
					$code .= "<div class=\"" . esc_attr( $wrapper_class ) . "\">\n";
				}

				// Build partial call.
				$code .= "<?php\n";

				if ( ! empty( $config_key ) ) {
					// Use config key reference.
					$code .= "\$block_config = \$config['" . implode( "']['", explode( '.', $config_key ) ) . "'] ?? array();\n";
				} else {
					// No config - empty array.
					$code .= "\$block_config = array();\n";
				}

				$code .= "partial( '" . esc_attr( $partial ) . "', \$block_config";
				if ( ! empty( $folder ) ) {
					$code .= ", '" . esc_attr( $folder ) . "'";
				}
				$code .= " );\n";
				$code .= "?>\n";

				// Wrapper close.
				if ( $wrapper_enabled && ! empty( $wrapper_class ) ) {
					$code .= "</div>\n";
				}
			}

			$code .= "</main>\n";

			return $code;
		}

		/**
		 * Get page data for a specific page.
		 *
		 * @param int $page_id Page ID.
		 *
		 * @return array Page data array.
		 */
		public static function get_page_data( int $page_id ): array {
			$data = get_post_meta( $page_id, self::META_KEY_DATA, true );

			return is_array( $data ) ? $data : array();
		}

		/**
		 * Get page layout for a specific page.
		 *
		 * @param int $page_id Page ID.
		 *
		 * @return array Layout data array.
		 */
		public static function get_page_layout( int $page_id ): array {
			$layout = get_post_meta( $page_id, self::META_KEY_LAYOUT, true );

			if ( is_array( $layout ) ) {
				return $layout;
			}

			// Legacy: plain string is code mode.
			if ( is_string( $layout ) && ! empty( $layout ) ) {
				return array(
					'mode' => 'code',
					'code' => $layout,
				);
			}

			return array(
				'mode'      => 'code',
				'code'      => '',
				'structure' => array(),
			);
		}

		/**
		 * Save page data.
		 *
		 * @param int   $page_id Page ID.
		 * @param array $data    Page data array.
		 *
		 * @return bool Success status.
		 */
		public static function save_page_data( int $page_id, array $data ): bool {
			return (bool) update_post_meta( $page_id, self::META_KEY_DATA, $data );
		}

		/**
		 * Save page layout.
		 *
		 * @param int   $page_id Page ID.
		 * @param array $layout  Layout data array.
		 *
		 * @return bool Success status.
		 */
		public static function save_page_layout( int $page_id, array $layout ): bool {
			return (bool) update_post_meta( $page_id, self::META_KEY_LAYOUT, $layout );
		}
	}
}
