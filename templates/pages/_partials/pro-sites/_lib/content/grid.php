<?php
/**
 * Grid Content Renderer - BEM Version
 *
 * Renders a grid layout with multiple items.
 * Can be used within stack, row, or as standalone content.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/content/grid.php
 * @since 1.2.9
 * @since 2.0.5 Migrated to BEM naming (.lcms-grid-layout)
 *
 * Expected $content structure:
 * [
 *     'items' => [
 *         [
 *             'type' => 'html',
 *             'content' => [...],
 *             'custom_id' => 'my-custom-id',        // Optional: Custom ID for item wrapper
 *             'custom_classes' => 'card featured',  // Optional: Custom classes for item wrapper
 *             'custom_css' => 'padding: 20px;',     // Optional: Inline styles for item wrapper
 *         ],
 *         ['type' => 'text', 'content' => [...]],
 *         ['type' => 'image', 'content' => [...]],
 *     ],
 *     'columns'   => 3,                   // Fixed column count, or 'auto-fit'/'auto-fill'
 *     'min-width' => '250px',             // Minimum column width (for auto-fit/auto-fill)
 *     'gap'       => '30px',              // Space between grid items
 * ]
 */

$items = $content['items'] ?? [];
$columns = $content['columns'] ?? 'auto-fit';
$min_width = $content['min-width'] ?? '250px';
$gap = $content['gap'] ?? '30px';

// Skip if no items
if (empty($items)) {
    return;
}

// Build grid template columns style
if (is_numeric($columns)) {
    // Fixed column count: repeat(3, 1fr)
    $grid_columns = "repeat({$columns}, 1fr)";
} else {
    // Auto-fit or auto-fill: repeat(auto-fit, minmax(250px, 1fr))
    $grid_columns = "repeat({$columns}, minmax({$min_width}, 1fr))";
}
?>

<div class="lcms-grid-layout" style="display: grid; grid-template-columns: <?php echo esc_attr($grid_columns); ?>; gap: <?php echo esc_attr($gap); ?>; width: 100%;">
    <?php foreach ($items as $item): ?>
        <?php
        $item_type = $item['type'] ?? 'text';
        $item_content = $item['content'] ?? [];
        $custom_id = $item['custom_id'] ?? '';
        $custom_classes = $item['custom_classes'] ?? '';
        $custom_css = $item['custom_css'] ?? '';

        // Set $content variable for the content renderer
        $content = $item_content;

        // Get renderer path
        $renderer = __DIR__ . '/' . $item_type . '.php';

        if (file_exists($renderer)) {
            // Build item classes with BEM
            $item_classes = ['lcms-grid-layout__item'];
            $item_classes[] = 'lcms-grid-layout__item--' . esc_attr($item_type);
            if (!empty($custom_classes)) {
                $item_classes[] = $custom_classes;
            }

            // Build item ID
            $item_id = $custom_id ? ' id="' . esc_attr($custom_id) . '"' : '';

            // Build item styles
            $item_style = '';
            if (!empty($custom_css)) {
                $item_style = ' style="' . esc_attr($custom_css) . '"';
            }

            // Output grid item wrapper
            echo '<div' . $item_id . ' class="' . esc_attr(implode(' ', $item_classes)) . '"' . $item_style . '>';
            include $renderer;
            echo '</div>';
        } else {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Grid content renderer: Unknown item type '{$item_type}' in " . __FILE__);
            }
        }
        ?>
    <?php endforeach; ?>
</div>
