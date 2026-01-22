<?php
/**
 * Image Content Renderer
 *
 * Renders image content with optional caption and lazy loading.
 * Used by layout partials (column, 2-column, grid, etc.)
 *
 * @param array $content Image content configuration
 *
 * @since 1.2.0
 * @since 2.0.0 Migrated to BEM naming (.lcms-image)
 */

$src = $content['src'] ?? '';
$alt = $content['alt'] ?? '';
$caption = $content['caption'] ?? '';
$width = $content['width'] ?? '100%';
$height = $content['height'] ?? 'auto';
$lazy = $content['lazy'] ?? true;

// Skip if no source
if (empty($src)) {
    return;
}

$loading_attr = $lazy ? 'lazy' : 'eager';
?>

<figure class="lcms-image">
    <img
        src="<?php echo esc_url($src); ?>"
        alt="<?php echo esc_attr($alt); ?>"
        loading="<?php echo esc_attr($loading_attr); ?>"
        style="width: <?php echo esc_attr($width); ?>; height: <?php echo esc_attr($height); ?>;"
        class="lcms-image__img"
    >

    <?php if (!empty($caption)): ?>
        <figcaption class="lcms-image__caption"><?php echo esc_html($caption); ?></figcaption>
    <?php endif; ?>
</figure><!-- .lcms-image -->
