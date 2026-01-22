<?php
/**
 * HTML Content Renderer
 *
 * Renders raw HTML content (with wp_kses_post sanitization).
 * Used by layout partials (column, 2-column, grid, etc.)
 *
 * @param array $content HTML content configuration
 *
 * @since 1.2.0
 * @since 2.0.0 Migrated to BEM naming (.lcms-content)
 */

$html = $content['html'] ?? '';

// Skip if no HTML
if (empty($html)) {
    return;
}
?>

<div class="lcms-content lcms-content--html">
    <?php echo wp_kses_post($html); ?>
</div><!-- .lcms-content -->
