<?php
/**
 * Pro-Sites Grid Section (CSS Grid Layout)
 *
 * Displays multi-item grid layout with flexible content types.
 * Each grid item can contain: text, image, video, html, or buttons.
 * Includes header component and footer buttons.
 *
 * Uses CSS Grid for auto-responsive multi-item layouts.
 * For two-column side-by-side layouts, use 2-column.php instead.
 *
 * @filepath templates/pages/_partials/pro-sites/grid.php
 * @since 1.2.3
 * @since 2.0.5 Migrated to BEM naming (.lcms-grid-section)
 *
 * Expected $section_config structure:
 * [
 *     'settings' => [...],
 *     'pre_html' => 'HTML string to render before header',  // Optional
 *     'header'   => ['heading' => [...]],
 *     'content' => [
 *         'items' => [
 *             [
 *                 'type'    => 'text',        // text|image|video|html|buttons
 *                 'content' => [...],         // Type-specific content structure
 *             ],
 *             [...],
 *         ],
 *         'columns'   => 3,                   // Fixed column count, or 'auto-fit'/'auto-fill' for responsive
 *         'min-width' => '250px',             // Minimum column width (used with auto-fit/auto-fill)
 *         'gap'       => '30px',              // Space between grid items
 *     ],
 *     'footer' => ['buttons' => [...]],       // Optional section-level buttons
 *     'post_html' => 'HTML string to render after footer',  // Optional
 * ]
 */

// Set section type for wrapper
$section_type = 'grid';

// Extract content config
$content_config = $section_config['content'] ?? [];
$items = $content_config['items'] ?? [];
$columns = $content_config['columns'] ?? 'auto-fit';
$min_width = $content_config['min-width'] ?? '250px';
$gap = $content_config['gap'] ?? '30px';

// Build grid template columns style
if (is_numeric($columns)) {
    // Fixed column count: repeat(3, 1fr)
    $grid_columns = "repeat({$columns}, 1fr)";
} else {
    // Auto-fit or auto-fill: repeat(auto-fit, minmax(250px, 1fr))
    $grid_columns = "repeat({$columns}, minmax({$min_width}, 1fr))";
}
?>

<?php
// Wrapper opening
$config = $section_config;
include __DIR__ . '/_lib/wrapper-open.php';
?>

    <?php
    // Pre-HTML (custom HTML before header)
    if (!empty($config['pre_html'])) {
        echo $config['pre_html'];
    }
    ?>

    <?php
    // Header (heading component)
    include __DIR__ . '/_lib/header.php';
    ?>

    <?php if (!empty($items)): ?>
        <div class="lcms-grid" style="grid-template-columns: <?php echo esc_attr($grid_columns); ?>; gap: <?php echo esc_attr($gap); ?>;">
            <?php foreach ($items as $item): ?>
                <?php
                $item_type = $item['type'] ?? 'text';
                $content = $item['content'] ?? [];
                ?>

                <div class="lcms-grid-section__item lcms-grid-section__item--<?php echo esc_attr($item_type); ?>">
                    <?php
                    // Render item content using content renderers
                    $content_renderer = __DIR__ . '/_lib/content/' . $item_type . '.php';

                    if (file_exists($content_renderer)) {
                        include $content_renderer;
                    } else {
                        // Log error for unknown content type
                        error_log("Pro-Sites grid-section: Unknown item type '{$item_type}' in " . __FILE__);
                    }
                    ?>
                </div><!-- .lcms-grid-section__item -->
            <?php endforeach; ?>
        </div><!-- .lcms-grid-section__wrapper -->
    <?php endif; ?>

    <?php
    // Footer (section-level buttons component)
    include __DIR__ . '/_lib/footer.php';
    ?>

    <?php
    // Post-HTML (custom HTML after footer)
    if (!empty($config['post_html'])) {
        echo $config['post_html'];
    }
    ?>

<?php
// Wrapper closing
include __DIR__ . '/_lib/wrapper-close.php';
?>
