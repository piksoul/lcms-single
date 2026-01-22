<?php
/**
 * Utility helpers for LeanCMS.
 *
 * @package LeanCMS\Utilities
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Common helper methods used across the plugin.
 */
class LeanCMS_Helpers {

    /**
     * Retrieve a value from the plugin settings array.
     *
     * @param string     $key     Array key to fetch.
     * @param mixed|null $default Default value when missing.
     *
     * @return mixed
     */
    public static function get_setting( string $key, $default = null ) {
        $settings = get_option( 'leancms_settings', array() );

        if ( isset( $settings[ $key ] ) ) {
            return $settings[ $key ];
        }

        return $default;
    }

    /**
     * Persist a setting value in the plugin settings array.
     *
     * @param string $key   Array key to write.
     * @param mixed  $value Value to store.
     */
    public static function update_setting( string $key, $value ): void {
        $settings         = get_option( 'leancms_settings', array() );
        $settings[ $key ] = $value;

        update_option( 'leancms_settings', $settings );
    }

    /**
     * Return the plugin version.
     */
    public static function version(): string {
        return defined( 'LEANCMS_VERSION' ) ? LEANCMS_VERSION : 'dev';
    }

    /**
     * Check if specific URL parameters match the expected criteria.
     *
     * Supports flexible validation modes:
     * - 'exists': param must be present (any value)
     * - 'boolean': param must equal true/1/yes/on
     * - 'equals': param must match specific value
     * - 'in_array': param must be in array of allowed values
     * - 'regex': param must match regex pattern
     *
     * @param array  $params_config Array of parameter configurations.
     *                              Each key is the param name, value is validation config.
     *                              Examples:
     *                              ['show-dev' => 'boolean']
     *                              ['mode' => ['equals' => 'preview']]
     *                              ['view' => ['in_array' => ['grid', 'list']]]
     *                              ['debug' => 'exists']
     * @param string $operator      Logical operator: 'AND' (all must match) or 'OR' (any must match).
     *                              Default: 'AND'.
     *
     * @return bool True if URL params match criteria.
     */
    public static function check_url_params( array $params_config, string $operator = 'AND' ): bool {
        $operator = strtoupper( $operator );
        $results  = array();

        foreach ( $params_config as $param_name => $validation ) {
            // Param not present
            if ( ! isset( $_GET[ $param_name ] ) ) {
                $results[] = false;
                continue;
            }

            $param_value = $_GET[ $param_name ];

            // Simple string validation mode
            if ( is_string( $validation ) ) {
                switch ( $validation ) {
                    case 'exists':
                        $results[] = true;
                        break;

                    case 'boolean':
                        $results[] = in_array(
                            strtolower( $param_value ),
                            array( 'true', '1', 'yes', 'on' ),
                            true
                        );
                        break;

                    default:
                        // Treat as exact match
                        $results[] = ( $param_value === $validation );
                        break;
                }
            } elseif ( is_array( $validation ) ) {
                // Array validation config
                if ( isset( $validation['equals'] ) ) {
                    $results[] = ( $param_value === $validation['equals'] );
                } elseif ( isset( $validation['in_array'] ) ) {
                    $results[] = in_array( $param_value, $validation['in_array'], true );
                } elseif ( isset( $validation['regex'] ) ) {
                    $results[] = (bool) preg_match( $validation['regex'], $param_value );
                } else {
                    $results[] = false;
                }
            } else {
                $results[] = false;
            }
        }

        // Apply logical operator
        if ( $operator === 'OR' ) {
            return in_array( true, $results, true );
        }

        // Default: AND
        return ! in_array( false, $results, true );
    }

    /**
     * Check if a single URL parameter is present with a boolean value.
     *
     * Convenience wrapper for checking a single parameter with boolean validation.
     * Validates that the parameter equals true/1/yes/on.
     *
     * @param string $param_name URL parameter name. Default: 'show-dev'.
     * @return bool True if parameter exists and has boolean true value.
     */
    public static function check_url_param( string $param_name = 'show-dev' ): bool {
        return self::check_url_params( array( $param_name => 'boolean' ) );
    }

    /**
     * Check if preview mode is enabled.
     *
     * @return bool
     */
    public static function is_preview_mode(): bool {
        return self::check_url_params( array( 'preview' => 'boolean' ) );
    }

    /**
     * Get display mode from URL parameter.
     *
     * @param array  $allowed_modes Allowed display modes.
     * @param string $default       Default mode if not specified.
     * @return string
     */
    public static function get_display_mode( array $allowed_modes, string $default = 'default' ): string {
        if ( ! isset( $_GET['mode'] ) ) {
            return $default;
        }

        $mode = $_GET['mode'];
        return in_array( $mode, $allowed_modes, true ) ? $mode : $default;
    }

    /**
     * Render a template partial by name.
     *
     * This is a convenience wrapper for LeanCMS_Partial_Registry::render().
     * Configuration arrays are automatically wrapped based on the partial name.
     *
     * Supports both namespaced and folder parameter approaches for organizing partials.
     *
     * @since 1.2.0
     *
     * @param string $name   The partial name (e.g., 'hero', 'color-palette') or namespaced (e.g., 'modern/hero').
     * @param array  $config The configuration array for the partial.
     *                       Will be auto-wrapped in the expected key (e.g., 'color_config').
     * @param string $folder Optional folder prefix. Ignored if $name already contains '/'.
     * @return void
     *
     * @example
     * // Define settings
     * $color_settings = [
     *     'label' => 'Visual Identity',
     *     'title' => 'Color Palette',
     *     'colors' => [ ... ],
     * ];
     *
     * // Render with folder parameter
     * LeanCMS_Helpers::partial('color-palette', $color_settings, 'brand-guide');
     *
     * // Or use namespaced syntax
     * LeanCMS_Helpers::partial('brand-guide/color-palette', $color_settings);
     */
    public static function partial( string $name, array $config = [], string $folder = '' ): void {
        LeanCMS_Partial_Registry::render( $name, $config, $folder );
    }

    /**
     * Load client-specific resources (CSS, fonts, etc.) based on client configuration.
     *
     * Reads the client's config.php file and automatically loads resources
     * according to the 'resources' metadata section. This separates resource
     * loading from layout concerns in templates.
     *
     * @since 1.3.10
     *
     * @param string $client_code The client code (e.g., '4dli', 'refr').
     *                            Corresponds to the folder name in templates/pages/.
     * @param array  $flags       Optional flags to control which resources to load.
     *                            Supported flags:
     *                            - 'skip_css_vars' (bool): Skip CSS variable output
     *                            - 'skip_stylesheets' (bool): Skip stylesheet loading
     *                            - 'skip_fonts' (bool): Skip Google Fonts loading
     *                            Default: Load everything.
     * @return void
     *
     * @example
     * // Load all resources (default):
     * load_client_resources('4dli');
     *
     * // Skip Google Fonts:
     * load_client_resources('4dli', ['skip_fonts' => true]);
     *
     * // Skip multiple resources:
     * load_client_resources('4dli', [
     *     'skip_css_vars' => true,
     *     'skip_fonts' => true,
     * ]);
     *
     * // The config.php should include:
     * return array(
     *     'resources' => array(
     *         'auto_load' => true,
     *         'stylesheets' => ['base.css'],
     *         'google_fonts' => true,
     *     ),
     *     // ... rest of config
     * );
     */
    public static function load_client_resources( string $client_code, array $flags = array() ): void {
        // Build path to client config
        $config_path = LEANCMS_PLUGIN_DIR . "templates/pages/{$client_code}/config.php";

        // Check if config exists
        if ( ! file_exists( $config_path ) ) {
            // Silently fail - client may not have config yet
            return;
        }

        // Load client config
        $config = include $config_path;

        // Check if auto_load is enabled
        if ( ! isset( $config['resources']['auto_load'] ) || ! $config['resources']['auto_load'] ) {
            return;
        }

        // Hook into wp_head to output resources at the right time
        add_action( 'wp_head', function() use ( $client_code, $config, $flags ) {
            LeanCMS_Helpers::partial( 'loader', array(
                'client_code' => $client_code,
                'config'      => $config,
                'flags'       => $flags,
            ), 'top-section' );
        }, 10 );
    }
}
