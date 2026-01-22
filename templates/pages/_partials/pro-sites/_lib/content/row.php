<?php
/**
 * Row Content Renderer - BEM Version
 *
 * Renders multiple content items arranged horizontally in a row.
 * Useful for combining multiple content types side-by-side.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/content/row.php
 * @since 1.2.3
 * @since 2.0.5 Migrated to BEM naming (.lcms-row)
 *
 * Expected $content structure:
 * [
 *     'items' => [
 *         [
 *             'type' => 'image',
 *             'content' => [...],
 *             'width' => '50%',                     // Optional: Item width
 *             'custom_id' => 'my-custom-id',        // Optional: Custom ID for item wrapper
 *             'custom_classes' => 'card featured',  // Optional: Custom classes for item wrapper
 *             'custom_css' => 'padding: 20px;',     // Optional: Inline styles for item wrapper
 *         ],
 *         ['type' => 'text', 'content' => [...]],
 *         ['type' => 'buttons', 'content' => [...]],
 *     ],
 *     'gap'     => '20px',                  // Gap between items (default: 20px)
 *     'align'   => 'center',                // Vertical alignment: top|center|bottom (default: center)
 *     'justify' => 'start',                 // Horizontal alignment: start|center|end|space-between (default: start)
 * ]
 *
 * Note: Rows automatically stack vertically on mobile (< 768px)
 */

$items = $content['items'] ?? [];
$gap = $content['gap'] ?? '20px';
$align = $content['align'] ?? 'center';
$justify = $content['justify'] ?? 'start';

// Skip if no items
if (empty($items)) {
    return;
}

// Build CSS classes with BEM naming
$row_classes = ['lcms-row'];
if ($align) {
    $row_classes[] = 'lcms-row--align-' . esc_attr($align);
}
if ($justify) {
    $row_classes[] = 'lcms-row--justify-' . esc_attr($justify);
}

// Build style attribute (only dynamic gap value)
$row_style = sprintf('gap: %s;', esc_attr($gap));
?>

<div class="<?php echo esc_attr(implode(' ', $row_classes)); ?>" style="<?php echo esc_attr($row_style); ?>">
    <?php foreach ($items as $item): ?>
        <?php
        $item_type = $item['type'] ?? 'text';
        $item_content = $item['content'] ?? [];
        $item_width = $item['width'] ?? null;
        $custom_id = $item['custom_id'] ?? '';
        $custom_classes = $item['custom_classes'] ?? '';
        $custom_css = $item['custom_css'] ?? '';

        // Set $content variable for the content renderer
        $content = $item_content;

        // Get renderer path
        $renderer = __DIR__ . '/' . $item_type . '.php';

        if (file_exists($renderer)) {
            // Build item classes with BEM
            $item_classes = ['lcms-row__item'];
            $item_classes[] = 'lcms-row__item--' . esc_attr($item_type);
            if (!empty($custom_classes)) {
                $item_classes[] = $custom_classes;
            }

            // Build item styles with optional width
            $item_styles = [];
            if ($item_width) {
                $item_styles[] = 'flex: 0 0 ' . esc_attr($item_width);
            }
            if (!empty($custom_css)) {
                $item_styles[] = $custom_css;
            }

            // Build item ID
            $item_id = $custom_id ? ' id="' . esc_attr($custom_id) . '"' : '';

            // Output wrapper
            echo '<div' . $item_id . ' class="' . esc_attr(implode(' ', $item_classes)) . '"';
            if (!empty($item_styles)) {
                echo ' style="' . esc_attr(implode('; ', $item_styles)) . '"';
            }
            echo '>';
            include $renderer;
            echo '</div>';
        } else {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Row content renderer: Unknown item type '{$item_type}' in " . __FILE__);
            }
        }
        ?>
    <?php endforeach; ?>
</div>
