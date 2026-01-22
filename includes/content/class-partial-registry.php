<?php
/**
 * Partial Registry
 *
 * Auto-discovers and manages template partials for clean rendering.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Includes/Content
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * LeanCMS_Partial_Registry class.
 *
 * Handles automatic discovery and rendering of template partials.
 *
 * @since 1.2.0
 */
class LeanCMS_Partial_Registry {

    /**
     * Registry of discovered partials.
     *
     * @var array
     */
    private static $partials = [];

    /**
     * Whether the registry has been initialized.
     *
     * @var bool
     */
    private static $initialized = false;

    /**
     * Track enqueued partial CSS files.
     *
     * @var array
     */
    private static $enqueued_styles = [];

    /**
     * Config key mapping for auto-wrapping.
     *
     * Maps partial names to their expected configuration array key.
     * Supports both short names and namespaced names.
     *
     * @var array
     */
    private static $config_wrappers = [
        // Short names (backward compatible)
        'hero'          => 'hero_config',
        'page-header'   => 'page_header_config',
        'loader'        => 'loader_config',
        'color-palette' => 'color_config',
        'typography'    => 'typography_config',
        'logo'          => 'logo_config',
        'guidelines'    => 'guidelines_config',
        'spacing'       => 'spacing_config',
        'cta'           => 'cta_config',
        'cta-branded'   => 'cta_config',

        // Namespaced names (organized by folder)
        'top-section/hero'                => 'hero_config',
        'top-section/page-header'         => 'page_header_config',
        'top-section/loader'              => 'loader_config',
        'brand-guide/color-palette'       => 'color_config',
        'brand-guide/typography'          => 'typography_config',
        'brand-guide/logo'                => 'logo_config',
        'brand-guide/guidelines'          => 'guidelines_config',
        'brand-guide/spacing'             => 'spacing_config',
        'bottom-section/cta'              => 'cta_config',

        // Pro-Sites partial system (v1.2.0)
        'text'                            => 'section_config',
        'image'                           => 'section_config',
        'video'                           => 'section_config',
        'html'                            => 'section_config',
        'column'                          => 'section_config',
        '2-column'                        => 'section_config',
        'grid'                            => 'section_config',
        'pro-sites/text'                  => 'section_config',
        'pro-sites/image'                 => 'section_config',
        'pro-sites/video'                 => 'section_config',
        'pro-sites/html'                  => 'section_config',
        'pro-sites/column'                => 'section_config',
        'pro-sites/2-column'              => 'section_config',
        'pro-sites/grid'                  => 'section_config',
    ];

    /**
     * Bootstrap the partial registry.
     *
     * Discovers all available partials and registers them.
     *
     * @return void
     */
    public static function boot() {
        if ( self::$initialized ) {
            return;
        }

        self::discover_partials();
        self::$initialized = true;
    }

    /**
     * Discover all available partials.
     *
     * Scans both global (_partials) and client-specific folders.
     *
     * @return void
     */
    private static function discover_partials() {
        $templates_path = LEANCMS_PLUGIN_DIR . 'templates/pages/';

        // Discover global partials
        self::discover_in_folder( $templates_path . '_partials/', 'global' );

        // Discover client-specific partials
        $client_folders = [ 'refr', 'brhu', 'test' ];
        foreach ( $client_folders as $client ) {
            $client_partials_path = $templates_path . $client . '/_partials/';
            if ( is_dir( $client_partials_path ) ) {
                self::discover_in_folder( $client_partials_path, $client );
            }
        }
    }

    /**
     * Discover partials in a specific folder.
     *
     * Scans recursively to support subfolder organization.
     *
     * @param string $folder The folder path to scan.
     * @param string $scope  The scope (global or client code).
     * @return void
     */
    private static function discover_in_folder( $folder, $scope ) {
        if ( ! is_dir( $folder ) ) {
            return;
        }

        // Use RecursiveIteratorIterator to scan subfolders
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $folder, RecursiveDirectoryIterator::SKIP_DOTS ),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ( $iterator as $file ) {
            if ( ! $file->isFile() || $file->getExtension() !== 'php' ) {
                continue;
            }

            $file_path = $file->getPathname();
            $basename = $file->getBasename( '.php' );

            // Get relative path from base folder
            $relative_path = str_replace( $folder, '', $file_path );
            $relative_dir = dirname( $relative_path );

            // Skip files in _lib folders (internal components, not for direct use)
            if ( strpos( $relative_path, '/_lib/' ) !== false || strpos( $relative_path, '_lib/' ) === 0 ) {
                continue;
            }

            // Use basename directly as the short name (no suffix stripping)
            $short_name = $basename;

            // Build namespaced name (e.g., 'brand-guide/color-palette')
            $namespaced_name = ( $relative_dir && $relative_dir !== '.' )
                ? trim( $relative_dir, '/' ) . '/' . $short_name
                : $short_name;

            // Register with namespaced name
            if ( ! isset( self::$partials[ $namespaced_name ] ) || $scope !== 'global' ) {
                self::$partials[ $namespaced_name ] = [
                    'path'  => $file_path,
                    'scope' => $scope,
                    'file'  => $basename,
                ];
            }

            // Also register with short name for backward compatibility
            // (namespaced names take priority if there's a conflict)
            if ( ! isset( self::$partials[ $short_name ] ) ) {
                self::$partials[ $short_name ] = [
                    'path'  => $file_path,
                    'scope' => $scope,
                    'file'  => $basename,
                ];
            }
        }
    }

    /**
     * Render a partial by name.
     *
     * Supports both namespaced names and folder parameters:
     * - render('hero', $config) - uses short name
     * - render('hero', $config, 'top-section') - builds 'top-section/hero'
     * - render('top-section/hero', $config) - explicit namespaced (folder ignored)
     *
     * @param string $name   The partial name (e.g., 'hero') or namespaced (e.g., 'top-section/hero').
     * @param array  $config The configuration array for the partial.
     * @param string $folder Optional folder prefix. Ignored if $name contains '/'.
     * @return void
     */
    public static function render( $name, $config = [], $folder = '' ) {
        if ( ! self::$initialized ) {
            self::boot();
        }

        // Resolve full name based on parameters
        $full_name = self::resolve_name( $name, $folder );

        if ( ! isset( self::$partials[ $full_name ] ) ) {
            if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
                trigger_error( "Partial '{$full_name}' not found in registry", E_USER_WARNING );
            }
            return;
        }

        // Auto-enqueue partial CSS if it exists
        self::maybe_enqueue_partial_css( $full_name );

        // Auto-wrap config if needed
        $wrapped_config = self::auto_wrap_config( $full_name, $config );

        // Extract config to variables for the partial template
        extract( $wrapped_config );

        // Include the partial
        include self::$partials[ $full_name ]['path'];
    }

    /**
     * Resolve the full partial name from name and folder parameters.
     *
     * @param string $name   The partial name.
     * @param string $folder The optional folder prefix.
     * @return string The resolved partial name.
     */
    private static function resolve_name( $name, $folder ) {
        // If name already contains '/', it's namespaced - use as-is
        if ( strpos( $name, '/' ) !== false ) {
            return $name;
        }

        // If folder is provided, prepend it
        if ( $folder ) {
            return $folder . '/' . $name;
        }

        // Otherwise use name as-is
        return $name;
    }

    /**
     * Maybe load partial CSS file if it exists.
     *
     * Checks for a .css file next to the .php partial file and outputs a link tag.
     * Also checks for folder-level CSS files (e.g., pro-sites/pro-sites.css).
     * Falls back gracefully if no CSS file exists (uses document-system.css).
     *
     * Since partials are rendered in template body (after wp_head), we output
     * <link> tags directly instead of using wp_enqueue_style.
     *
     * @since 1.1.3
     * @since 1.1.6 Added folder-level CSS file support
     *
     * @param string $name The resolved partial name.
     * @return void
     */
    private static function maybe_enqueue_partial_css( $name ) {
        // Get the PHP file path
        $php_path = self::$partials[ $name ]['path'];

        // Build CSS file path by replacing .php with .css
        $css_path = str_replace( '.php', '.css', $php_path );

        // Check if individual partial CSS exists
        if ( file_exists( $css_path ) ) {
            // Skip if already loaded
            if ( isset( self::$enqueued_styles[ $name ] ) ) {
                return;
            }

            // Convert file path to URL
            $css_url = str_replace( LEANCMS_PLUGIN_DIR, LEANCMS_PLUGIN_URL, $css_path );

            // Output link tag for partial CSS
            echo sprintf(
                '<link rel="stylesheet" href="%s?ver=%s" id="leancms-partial-%s-css">' . "\n",
                esc_url( $css_url ),
                esc_attr( LEANCMS_VERSION ),
                esc_attr( str_replace( '/', '-', $name ) )
            );

            // Mark as loaded
            self::$enqueued_styles[ $name ] = true;
            return;
        }

        // Check for folder-level CSS file (e.g., pro-sites/pro-sites.css)
        // Extract folder name from namespaced partial name
        if ( strpos( $name, '/' ) !== false ) {
            $folder_name = dirname( $name );
            $folder_css_key = $folder_name . '-folder-css';

            // Skip if folder CSS already loaded
            if ( isset( self::$enqueued_styles[ $folder_css_key ] ) ) {
                return;
            }

            // Build folder CSS path (e.g., pro-sites/pro-sites.css)
            $folder_path = dirname( $php_path );
            $folder_css_path = $folder_path . '/' . basename( $folder_name ) . '.css';

            if ( file_exists( $folder_css_path ) ) {
                // Convert file path to URL
                $folder_css_url = str_replace( LEANCMS_PLUGIN_DIR, LEANCMS_PLUGIN_URL, $folder_css_path );

                // Output link tag for folder CSS
                echo sprintf(
                    '<link rel="stylesheet" href="%s?ver=%s" id="leancms-partial-%s-css">' . "\n",
                    esc_url( $folder_css_url ),
                    esc_attr( LEANCMS_VERSION ),
                    esc_attr( str_replace( '/', '-', $folder_name ) )
                );

                // Mark folder CSS as loaded
                self::$enqueued_styles[ $folder_css_key ] = true;
                return;
            }
        }

        // No partial CSS or folder CSS file - will use document-system.css styles
    }

    /**
     * Auto-wrap configuration based on partial name.
     *
     * If config is not already wrapped in expected key, wrap it.
     *
     * @param string $name   The partial name.
     * @param array  $config The configuration array.
     * @return array The wrapped configuration.
     */
    private static function auto_wrap_config( $name, $config ) {
        // Get expected wrapper key
        $wrapper_key = self::$config_wrappers[ $name ] ?? null;

        if ( ! $wrapper_key ) {
            // No wrapper defined, return as-is
            return $config;
        }

        // If already wrapped, return as-is
        if ( isset( $config[ $wrapper_key ] ) ) {
            return $config;
        }

        // Wrap it
        return [ $wrapper_key => $config ];
    }

    /**
     * Get all registered partials.
     *
     * @return array Array of registered partials.
     */
    public static function get_registered() {
        if ( ! self::$initialized ) {
            self::boot();
        }

        return self::$partials;
    }

    /**
     * Check if a partial is registered.
     *
     * @param string $name The partial name.
     * @return bool True if registered, false otherwise.
     */
    public static function has( $name ) {
        if ( ! self::$initialized ) {
            self::boot();
        }

        return isset( self::$partials[ $name ] );
    }

    /**
     * Register a custom wrapper key for a partial.
     *
     * @param string $name        The partial name.
     * @param string $wrapper_key The configuration array key to use.
     * @return void
     */
    public static function register_wrapper( $name, $wrapper_key ) {
        self::$config_wrappers[ $name ] = $wrapper_key;
    }
}
