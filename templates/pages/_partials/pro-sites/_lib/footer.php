<?php
/**
 * Pro-Sites Footer Component
 *
 * Displays button group with support for multiple buttons.
 * Each button supports text, URL, style variant, and target.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/footer.php
 * @since 1.2.0
 * @since 1.2.2 Renamed from buttons.php to footer.php
 * @since 1.1.9 Updated to use footer.buttons structure with backward compatibility
 * @since 1.5.0 Updated to BEM naming convention (lcms-button, lcms-button-group)
 * @since 2.0.0 Removed .section-footer wrapper (full BEM migration)
 *
 * Expected variables:
 * - $config['footer']['buttons'] - Array of button configurations (NEW)
 *   Each button:
 *   - 'text' (string) - Button text
 *   - 'url' (string) - Button URL
 *   - 'style' (string) - Button style: primary|secondary|outline|cta (default: primary)
 *   - 'size' (string) - Button size: small|large (optional)
 *   - 'target' (string) - Link target: _self|_blank (default: _self)
 *
 * Backward compatibility:
 * - $config['buttons'] - Old structure (deprecated but supported)
 */

// Extract buttons config - support both new and old structure
// New structure: $config['footer']['buttons']
// Old structure: $config['buttons'] (backward compatibility)
$buttons = $config['footer']['buttons'] ?? $config['buttons'] ?? [];

// Skip if no buttons defined
if (empty($buttons)) {
    return;
}
?>

<div class="lcms-button-group">
    <?php foreach ($buttons as $button): ?>
        <?php
        $text = $button['text'] ?? '';
        $url = $button['url'] ?? '#';
        $style = $button['style'] ?? 'primary';
        $target = $button['target'] ?? '_self';
        $size = $button['size'] ?? '';

        // Skip button if no text
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
