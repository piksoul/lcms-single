<?php
/**
 * CSS Loader Component
 *
 * Loads global and client CSS configurations and outputs CSS links.
 * Consolidates the CSS loading pattern used across demo and test pages.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/top-section/loader.php
 * @since      1.2.4
 * @updated    1.3.10 - Added client_code support, Google Fonts loading, skip flags
 *
 * Usage (new recommended pattern):
 * partial('loader', [
 *     'client_code' => '4dli',
 *     'config'      => $config_array, // Optional, will be loaded if not provided
 *     'flags'       => [               // Optional flags to control loading
 *         'skip_css_vars'     => false,
 *         'skip_stylesheets'  => false,
 *         'skip_fonts'        => false,
 *     ],
 * ], 'top-section');
 *
 * Or legacy usage:
 * partial('loader', [
 *     'client_config_path' => __DIR__ . '/../refr/config.php',
 * ], 'top-section');
 */

// Extract config from wrapper if present
if (isset($loader_config) && is_array($loader_config)) {
    extract($loader_config);
}

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');

// Determine client config based on parameters provided
$client_config = [];

if (isset($config) && is_array($config)) {
    // Config was passed directly (from load_client_resources)
    $client_config = $config;
} elseif (isset($client_code) && !empty($client_code)) {
    // Load config from client_code
    $client_config_path = LEANCMS_PLUGIN_DIR . "templates/pages/{$client_code}/config.php";
    if (file_exists($client_config_path)) {
        $client_config = include($client_config_path);
    }
} elseif (isset($client_config_path) && file_exists($client_config_path)) {
    // Legacy: Load from explicit path
    $client_config = include($client_config_path);
} else {
    // Fallback: Try refr as default (legacy behavior)
    $fallback_path = LEANCMS_PLUGIN_DIR . 'templates/pages/refr/config.php';
    if (file_exists($fallback_path)) {
        $client_config = include($fallback_path);
    }
}

// Merge CSS variables
$css_vars = array_merge(
    $global_config['css_variables'] ?? [],
    $client_config['css_variables'] ?? []
);

// Get resource settings from config
$resources = $client_config['resources'] ?? [];
$stylesheets = $resources['stylesheets'] ?? ['base.css', 'document-system.css'];
$google_fonts_enabled = $resources['google_fonts'] ?? false;
$fonts_config = $client_config['fonts'] ?? [];

// Extract flags (if any)
$flags = $flags ?? [];
$skip_css_vars = $flags['skip_css_vars'] ?? false;
$skip_stylesheets = $flags['skip_stylesheets'] ?? false;
$skip_fonts = $flags['skip_fonts'] ?? false;
?>

<!-- Google Fonts Loading -->
<?php if (!$skip_fonts && $google_fonts_enabled): ?>
    <?php
    // Debug logging
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Loader: Loading Google Fonts - URL: ' . ($fonts_config['google_fonts_url'] ?? 'NOT SET'));
        error_log('Loader: Preconnect URLs: ' . count($fonts_config['preconnect'] ?? []));
    }
    ?>
    <?php if (!empty($fonts_config['preconnect'])): ?>
        <?php foreach ($fonts_config['preconnect'] as $preconnect_url): ?>
    <link rel="preconnect" href="<?php echo esc_url($preconnect_url); ?>"<?php echo (strpos($preconnect_url, 'gstatic') !== false) ? ' crossorigin' : ''; ?>>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!empty($fonts_config['google_fonts_url'])): ?>
    <link rel="stylesheet" href="<?php echo esc_url($fonts_config['google_fonts_url']); ?>">
    <?php endif; ?>
<!-- /Google Fonts -->
<?php else: ?>
    <?php
    // Debug: Font loading was skipped
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Loader: Fonts skipped - skip_fonts=' . ($skip_fonts ? 'true' : 'false') . ', google_fonts_enabled=' . ($google_fonts_enabled ? 'true' : 'false'));
    }
    ?>
<?php endif; ?>

<?php if (!$skip_stylesheets): ?>
<?php foreach ($stylesheets as $stylesheet): ?>
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/<?php echo esc_attr($stylesheet); ?>">
<?php endforeach; ?>
<?php endif; ?>

<?php if (!$skip_css_vars): ?>
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo wp_strip_all_tags($value); ?>;
<?php endforeach; ?>
}
</style>
<?php endif; ?>
