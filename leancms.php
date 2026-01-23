<?php
/**
 * Plugin Name: LeanCMS Single
 * Plugin URI: https://github.com/piksoul/lcms-single
 * Description: Streamlined CMS for single-client Brand Hub installations.
 * Version: 1.0.25
 * Author: Piksoul
 * Author URI: https://piksoul.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: lcms-single
 * Domain Path: /languages
 * Requires at least: 6.8
 * Requires PHP: 8.0
 * Tested up to: 6.8.3
 */

if ( ! defined( 'WPINC' ) ) {
    exit;
}

/**
 * Currently plugin version.
 */
define( 'LEANCMS_VERSION', '1.0.25' );

/**
 * Plugin directory path.
 */
define( 'LEANCMS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Plugin directory URL.
 */
define( 'LEANCMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Plugin basename.
 */
define( 'LEANCMS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Plugin main file path.
 */
define( 'LEANCMS_PLUGIN_FILE', __FILE__ );

/**
 * The selectable Page Template slug we expose to WP.
 * (We also recommend placing a theme stub at:
 *  /wp-content/themes/YOUR-THEME/page-templates/leancms-full-page.php)
 */
define( 'LEANCMS_PAGE_TEMPLATE_SLUG', 'leancms-full-page.php' );

/**
 * Bootstrap plugin subsystems.
 */
require_once LEANCMS_PLUGIN_DIR . 'includes/class-installer.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-helpers.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/settings/class-settings-page.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-page-renderer.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-db-page-renderer.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-page-data-meta-box.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-partial-registry.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-global-panels-orchestrator.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-bulk-pages.php';

LeanCMS_Settings_Page::boot();
LeanCMS_Content_Page_Renderer::boot();
LeanCMS_DB_Page_Renderer::boot();
LeanCMS_Page_Data_Meta_Box::boot();
LeanCMS_Partial_Registry::boot();
LeanCMS_Global_Panels_Orchestrator::boot();
LeanCMS_Bulk_Pages::boot();

/**
 * Initialize Plugin Update Checker.
 * (kept exactly as you had it)
 */
require LEANCMS_PLUGIN_DIR . 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$leancms_update_checker = PucFactory::buildUpdateChecker(
    'https://github.com/piksoul/lcms-single/',
    __FILE__,
    'lcms-single'
);

// Stable branch
$leancms_update_checker->setBranch( 'master' );

// Optional auth token via wp-config.php: define('LEANCMS_GITHUB_TOKEN', 'xxx');
if ( defined( 'LEANCMS_GITHUB_TOKEN' ) ) {
    $leancms_update_checker->setAuthentication( LEANCMS_GITHUB_TOKEN );
}

/**
 * Activation/Deactivation
 */
register_activation_hook( __FILE__, array( 'LeanCMS_Installer', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'LeanCMS_Installer', 'deactivate' ) );

/**
 * Init
 */
function leancms_plugin_init() {
    // i18n
    load_plugin_textdomain( 'lcms-single', false, dirname( LEANCMS_PLUGIN_BASENAME ) . '/languages' );
}
add_action( 'plugins_loaded', 'leancms_plugin_init' );

/**
 * Enqueue global design system CSS.
 *
 * Loads the unified BEM design system CSS file containing all components.
 * This file includes all 17 BEM components plus foundation systems.
 *
 * @since 2.0.0
 */
function leancms_enqueue_design_system() {
    // Only enqueue on pages using the LeanCMS template
    if ( ! is_page() ) {
        return;
    }

    $page_id = get_queried_object_id();
    if ( ! $page_id ) {
        return;
    }

    $chosen = get_page_template_slug( $page_id );
    $matches_plugin_template = ( $chosen === LEANCMS_PAGE_TEMPLATE_SLUG )
        || ( is_string( $chosen ) && preg_match( '#'. preg_quote( LEANCMS_PAGE_TEMPLATE_SLUG, '#' ) . '$#', $chosen ) );

    if ( ! $matches_plugin_template ) {
        return;
    }

    // Enqueue the design system CSS
    wp_enqueue_style(
        'lcms-design-system',
        LEANCMS_PLUGIN_URL . 'templates/assets/global/lcms-design-system.css',
        array(),
        LEANCMS_VERSION,
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'leancms_enqueue_design_system' );

/**
 * --- PAGE TEMPLATE WIRING ---
 * 1) Advertise our template so it appears in Page → Template dropdown
 * 2) When selected, swap the template to our plugin file:
 *    /templates/pages/id-{ID}.php (primary)
 *    /templates/pages/slug-{post_name}.php (fallback)
 * 3) If missing, show a friendly notice inside theme chrome.
 */

/**
 * Optional: callable the theme stub can check for to confirm plugin is active.
 * Not used in this MVP, but handy to keep.
 */
function leancms_render_full_page_from_plugin() {
    // no-op: we resolve via template_include
}

/**
 * Global helper function for rendering template partials.
 *
 * Provides clean, shorthand syntax for rendering partials in templates.
 * Configuration arrays are automatically wrapped based on the partial name.
 *
 * Supports both namespaced and folder parameter approaches:
 * - partial('hero', $settings) - uses default location
 * - partial('hero', $settings, 'modern') - uses modern/hero
 * - partial('modern/hero', $settings) - explicit namespaced (folder param ignored)
 *
 * @since 1.2.0
 *
 * @param string $name   The partial name (e.g., 'hero', 'color-palette') or namespaced (e.g., 'modern/hero').
 * @param array  $config The configuration array for the partial.
 * @param string $folder Optional folder prefix (ignored if $name contains '/').
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
 * // Render with folder parameter (recommended for style-packs)
 * partial('color-palette', $color_settings, 'brand-guide');
 *
 * // Or use namespaced syntax
 * partial('brand-guide/color-palette', $color_settings);
 */
function partial( string $name, array $config = [], string $folder = '' ): void {
    LeanCMS_Helpers::partial( $name, $config, $folder );
}

/**
 * Global helper function for loading client-specific resources.
 *
 * Loads CSS, fonts, and other resources based on client configuration.
 * This separates resource loading from layout concerns in templates.
 *
 * @since 1.3.10
 *
 * @param string $client_code The client code (e.g., '4dli', 'refr').
 * @param array  $flags       Optional flags to control which resources to load.
 *                            Supported flags:
 *                            - 'skip_css_vars' (bool): Skip CSS variable output
 *                            - 'skip_stylesheets' (bool): Skip stylesheet loading
 *                            - 'skip_fonts' (bool): Skip Google Fonts loading
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
 */
function load_client_resources( string $client_code, array $flags = array() ): void {
    LeanCMS_Helpers::load_client_resources( $client_code, $flags );
}
