<?php
/**
 * Pro-Sites Section Wrapper - Opening Tag
 *
 * Handles all section-level settings:
 * - Visibility control
 * - Dark mode styling (BEM modifier: .lcms-pro-sites--dark)
 * - Custom spacing (top/bottom)
 * - Custom ID (with auto-generated fallback)
 * - Custom classes (section-level)
 * - Container classes (inner container-level)
 * - Inline CSS styles (section-level and container-level)
 * - Data attributes
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/wrapper-open.php
 * @since 1.2.0
 * @since 2.0.0 Migrated to BEM container (.lcms-container)
 * @since 2.0.5 Added container_classes support for inner card styling
 * @since 2.0.6 Added container_css support for inner container inline styles
 * @since 2.0.6 Updated dark_mode to apply BEM modifier (.lcms-pro-sites--dark)
 *
 * Expected variables:
 * - $config['settings'] - Settings array
 * - $section_type - Section type (text, image, video, html, 2-column)
 */

// Extract settings with defaults
$settings = $config['settings'] ?? [];
$visibility = $settings['visibility'] ?? true;
$dark_mode = $settings['dark_mode'] ?? false;
$spacing_top = $settings['spacing_top'] ?? null;
$spacing_bottom = $settings['spacing_bottom'] ?? null;
$custom_id = $settings['custom_id'] ?? '';
$custom_classes = $settings['custom_classes'] ?? '';
$container_classes = $settings['container_classes'] ?? '';
$custom_css = $settings['custom_css'] ?? '';
$container_css = $settings['container_css'] ?? '';
$data_attrs = $settings['data_attrs'] ?? [];

// Visibility check - exit early if hidden
if (!$visibility) {
    echo '<!-- Section hidden via settings.visibility -->';
    return;
}

// Build section ID (custom or auto-generated with lcms- prefix)
$section_id = $custom_id ?: 'lcms-' . uniqid();

// Build CSS classes array
$classes = ['lcms-pro-sites', 'lcms-' . $section_type . '-section'];
if ($dark_mode) {
    $classes[] = 'lcms-pro-sites--dark';
}
if (!empty($custom_classes)) {
    $classes[] = $custom_classes;
}

// Build inline styles array
$styles = [];
if ($spacing_top !== null) {
    $styles[] = 'padding-top: ' . esc_attr($spacing_top);
}
if ($spacing_bottom !== null) {
    $styles[] = 'padding-bottom: ' . esc_attr($spacing_bottom);
}
if (!empty($custom_css)) {
    $styles[] = $custom_css;
}

// Build data attributes string
$data_attr_string = '';
if (!empty($data_attrs)) {
    foreach ($data_attrs as $key => $value) {
        $data_attr_string .= ' data-' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
}

// Build container classes array (inner .lcms-container div)
$container_class_array = ['lcms-container'];
if (!empty($container_classes)) {
    $container_class_array[] = $container_classes;
}
$container_class_string = implode(' ', $container_class_array);

// Build container inline styles array
$container_styles = [];
if (!empty($container_css)) {
    $container_styles[] = $container_css;
}
?>

<section
    id="<?php echo esc_attr($section_id); ?>"
    class="<?php echo esc_attr(implode(' ', $classes)); ?>"
    <?php if (!empty($styles)): ?>
        style="<?php echo esc_attr(implode('; ', $styles)); ?>"
    <?php endif; ?>
    <?php echo $data_attr_string; ?>
>
    <div class="<?php echo esc_attr($container_class_string); ?>"<?php if (!empty($container_styles)): ?> style="<?php echo esc_attr(implode('; ', $container_styles)); ?>"<?php endif; ?>>
