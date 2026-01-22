<?php
/**
 * Buttons Content Renderer
 *
 * Renders button groups (for use in columns, not footer).
 * Used by layout partials (2-column, grid, etc.)
 *
 * Note: This is different from _lib/buttons.php which renders
 * the footer component with semantic <footer> wrapper.
 *
 * @param array $content Buttons content configuration
 *
 * @since 1.2.0
 * @since 1.5.0 Updated to BEM naming convention (lcms-button, lcms-button-group)
 * @since 2.0.5 Removed legacy .section-content wrapper
 */

$buttons = $content['buttons'] ?? [];
$align = $content['align'] ?? 'left';

// Skip if no buttons
if (empty($buttons)) {
    return;
}

// Build button group classes
$group_classes = ['lcms-button-group'];
$group_classes[] = 'lcms-button-group--align-' . esc_attr($align);
?>

<div class="<?php echo esc_attr(implode(' ', $group_classes)); ?>">
    <?php foreach ($buttons as $button): ?>
        <?php
        $text = $button['text'] ?? '';
        $url = $button['url'] ?? '#';
        $style = $button['style'] ?? 'primary';
        $target = $button['target'] ?? '_self';
        $size = $button['size'] ?? '';

        if (empty($text)) {
            continue;
        }

        // Build button classes with BEM
        $button_classes = ['lcms-button'];
        $button_classes[] = 'lcms-button--' . esc_attr($style);

        if ($size && in_array($size, ['small', 'large'])) {
            $button_classes[] = 'lcms-button--' . esc_attr($size);
        }

        $button_class_string = implode(' ', $button_classes);
        ?>

        <a
            href="<?php echo esc_url($url); ?>"
            class="<?php echo esc_attr($button_class_string); ?>"
            target="<?php echo esc_attr($target); ?>"
            <?php if ($target === '_blank'): ?>
                rel="noopener noreferrer"
            <?php endif; ?>
        >
            <?php echo esc_html($text); ?>
        </a>
    <?php endforeach; ?>
</div><!-- .lcms-button-group -->
