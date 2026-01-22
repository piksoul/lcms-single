<?php
/**
 * Text Content Renderer
 *
 * Renders text content with format options (standard, lead, small).
 * Used by layout partials (column, 2-column, grid, etc.)
 *
 * @param array $content Text content configuration
 *
 * @since 1.2.0
 * @since 2.0.0 Migrated to BEM naming (.lcms-content)
 */

$text = $content['text'] ?? '';
$format = $content['format'] ?? 'standard';

// Skip if no text
if (empty($text)) {
    return;
}

// Build BEM modifier classes for content formatting
$content_classes = ['lcms-content'];
if ($format !== 'standard') {
    $content_classes[] = 'lcms-content--' . esc_attr($format);
}
?>

<div class="<?php echo esc_attr(implode(' ', $content_classes)); ?>">
    <?php echo wp_kses_post($text); ?>
</div><!-- .lcms-content -->
