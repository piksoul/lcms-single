<?php
/**
 * Card Content Renderer
 *
 * Renders a card-style layout with optional media, body, and footer sections.
 * Perfect for product cards, team member cards, feature showcases, etc.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/content/card.php
 * @since 1.2.3
 * @since 1.5.0 Updated to BEM naming convention (lcms-card)
 *
 * Expected $content structure:
 * [
 *     'media'  => [                         // Optional media section (top)
 *         'type'    => 'image',             // image|video
 *         'content' => [...],               // Type-specific content
 *     ],
 *     'body'   => [                         // Optional body section (middle)
 *         'type'    => 'text',              // text|html
 *         'content' => [...],               // Type-specific content
 *     ],
 *     'footer' => [                         // Optional footer section (bottom)
 *         'type'    => 'buttons',           // buttons|text
 *         'content' => [...],               // Type-specific content
 *     ],
 *     'padding'  => '20px',                 // Card padding (default: 20px)
 *     'variant'  => 'elevated',             // Card variant: bordered|elevated|feature|metric|progress|info|summary
 *     // Deprecated (backwards compatible):
 *     'border'   => true,                   // Use 'variant' => 'bordered' instead
 *     'shadow'   => false,                  // Use 'variant' => 'elevated' instead
 * ]
 */

$media = $content['media'] ?? null;
$body = $content['body'] ?? null;
$footer = $content['footer'] ?? null;
$padding = $content['padding'] ?? '20px';
$variant = $content['variant'] ?? '';

// Backwards compatibility
$border = $content['border'] ?? false;
$shadow = $content['shadow'] ?? false;

// Skip if no content sections
if (!$media && !$body && !$footer) {
    return;
}

// Build BEM card classes
$card_classes = ['lcms-card'];

// Add variant modifier
if ($variant && in_array($variant, ['bordered', 'elevated', 'interactive', 'feature', 'metric', 'progress', 'info', 'summary', 'compact', 'spacious', 'horizontal'])) {
    $card_classes[] = 'lcms-card--' . esc_attr($variant);
}

// Backwards compatibility: old border/shadow props
if ($border && !$variant) {
    $card_classes[] = 'lcms-card--bordered';
}
if ($shadow && !$variant) {
    $card_classes[] = 'lcms-card--elevated';
}
?>

<div class="<?php echo esc_attr(implode(' ', $card_classes)); ?>" style="padding: <?php echo esc_attr($padding); ?>;">
    <?php if ($media): ?>
        <div class="lcms-card__media">
            <?php
            $media_type = $media['type'] ?? 'image';
            $content = $media['content'] ?? [];
            $renderer = __DIR__ . '/' . $media_type . '.php';

            if (file_exists($renderer)) {
                include $renderer;
            }
            ?>
        </div>
    <?php endif; ?>

    <?php if ($body || $footer): ?>
        <div class="lcms-card__content">
            <?php if ($body): ?>
                <div class="lcms-card__body">
                    <?php
                    $body_type = $body['type'] ?? 'text';
                    $content = $body['content'] ?? [];
                    $renderer = __DIR__ . '/' . $body_type . '.php';

                    if (file_exists($renderer)) {
                        include $renderer;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if ($footer): ?>
                <div class="lcms-card__footer">
                    <?php
                    $footer_type = $footer['type'] ?? 'buttons';
                    $content = $footer['content'] ?? [];
                    $renderer = __DIR__ . '/' . $footer_type . '.php';

                    if (file_exists($renderer)) {
                        include $renderer;
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div><!-- .lcms-card -->
