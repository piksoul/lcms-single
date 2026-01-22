<?php
/**
 * Stack Content Renderer - BEM Version
 *
 * Renders multiple content items stacked vertically within a single container.
 * Useful for combining multiple content types in one grid item or column.
 *
 * @filepath templates/pages/_partials/pro-sites/_lib/content/stack.php
 * @since 1.2.3
 * @since 2.0.5 Migrated to BEM naming (.lcms-stack)
 *
 * Expected $content structure:
 * [
 *     'items' => [
 *         [
 *             'type' => 'image',
 *             'content' => [...],
 *             'custom_id' => 'my-custom-id',        // Optional: Custom ID for item wrapper
 *             'custom_classes' => 'card featured',  // Optional: Custom classes for item wrapper
 *             'custom_css' => 'padding: 20px;',     // Optional: Inline styles for item wrapper
 *         ],
 *         ['type' => 'text', 'content' => [...]],
 *         ['type' => 'buttons', 'content' => [...]],
 *     ],
 *     'gap'   => '20px',                    // Gap between stacked items (default: 20px)
 *     'align' => 'left',                    // Alignment: left|center|right (default: left)
 * ]
 */

$items = $content['items'] ?? [];
$gap = $content['gap'] ?? '20px';
$align = $content['align'] ?? 'left';

// Skip if no items
if (empty($items)) {
    return;
}

// Build CSS classes with BEM naming
$stack_classes = ['lcms-stack'];
if ($align) {
    $stack_classes[] = 'lcms-stack--align-' . esc_attr($align);
}

// Build style attribute (only dynamic gap value)
$stack_style = sprintf('gap: %s;', esc_attr($gap));
?>

<div class="<?php echo esc_attr(implode(' ', $stack_classes)); ?>" style="<?php echo esc_attr($stack_style); ?>">
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
            $item_classes = ['lcms-stack__item'];
            $item_classes[] = 'lcms-stack__item--' . esc_attr($item_type);
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

            // Output wrapper
            echo '<div' . $item_id . ' class="' . esc_attr(implode(' ', $item_classes)) . '"' . $item_style . '>';
            include $renderer;
            echo '</div>';
        } else {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Stack content renderer: Unknown item type '{$item_type}' in " . __FILE__);
            }
        }
        ?>
    <?php endforeach; ?>
</div>
