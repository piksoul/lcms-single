<?php
/**
 * Pro-Sites Header Component
 *
 * Displays optional label, title, and subtitle with alignment.
 * All parts are optional - skip rendering if heading array is empty.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/header.php
 * @since 1.2.0
 * @since 1.2.2 Renamed from heading.php to header.php
 * @since 1.2.3 Added support for configurable title heading size
 * @since 1.1.9 Updated to use header.heading structure with backward compatibility
 * @since 1.5.0 Updated to BEM naming convention (lcms-section-heading)
 * @since 2.0.0 Removed .section-header wrapper (full BEM migration)
 *
 * Expected variables:
 * - $config['header']['heading'] - Heading configuration array (NEW)
 *   - 'label' (string) - Small label above title
 *   - 'title' (string) - Main heading text
 *   - 'subtitle' (string) - Subtitle below title
 *   - 'align' (string) - Alignment: left|center|right (default: left)
 *   - 'title_size' (string) - Heading size: h1|h2|h3|h4|h5|h6 (default: h2)
 *   - 'status' (string) - Status modifier: completed|in-progress|upcoming (optional)
 *   - 'dark' (bool) - Use dark variant for light text on dark backgrounds (optional)
 *
 * Backward compatibility:
 * - $config['heading'] - Old structure (deprecated but supported)
 */

// Extract heading config - support both new and old structure
// New structure: $config['header']['heading']
// Old structure: $config['heading'] (backward compatibility)
$heading = $config['header']['heading'] ?? $config['heading'] ?? [];

// Skip if heading is empty or all values are empty
if (empty($heading) || (empty($heading['label']) && empty($heading['title']) && empty($heading['subtitle']))) {
    return;
}

$label = $heading['label'] ?? '';
$title = $heading['title'] ?? '';
$subtitle = $heading['subtitle'] ?? '';
$align = $heading['align'] ?? 'left';
$title_size = $heading['title_size'] ?? 'h2';
$status = $heading['status'] ?? '';
$dark = $heading['dark'] ?? false;

// Validate heading size
$valid_sizes = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
if (!in_array($title_size, $valid_sizes)) {
    $title_size = 'h2';
}

// Build BEM modifier classes
$modifier_classes = [];
$modifier_classes[] = 'lcms-section-heading--align-' . esc_attr($align);

if ($status && in_array($status, ['completed', 'in-progress', 'upcoming'])) {
    $modifier_classes[] = 'lcms-section-heading--' . esc_attr($status);
}

if ($dark) {
    $modifier_classes[] = 'lcms-section-heading--dark';
}

$heading_classes = 'lcms-section-heading ' . implode(' ', $modifier_classes);
?>

<div class="<?php echo esc_attr($heading_classes); ?>">
    <?php if (!empty($label)): ?>
        <span class="lcms-section-heading__label"><?php echo esc_html($label); ?></span>
    <?php endif; ?>

    <?php if (!empty($title)): ?>
        <<?php echo esc_attr($title_size); ?> class="lcms-section-heading__title"><?php echo esc_html($title); ?></<?php echo esc_attr($title_size); ?>>
    <?php endif; ?>

    <?php if (!empty($subtitle)): ?>
        <p class="lcms-section-heading__subtitle"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>
</div><!-- .lcms-section-heading -->
