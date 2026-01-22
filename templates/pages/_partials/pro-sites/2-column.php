<?php
/**
 * Pro-Sites 2-Column Section (Flexbox Layout)
 *
 * Displays two-column layout with flexible content types.
 * Each column can contain: text, image, video, html, or buttons.
 * Includes header component and footer buttons.
 *
 * Uses flexbox for precise column width control.
 * For multi-item grid layouts, use grid.php instead.
 *
 * @filepath templates/pages/_partials/pro-sites/2-column.php
 * @since 1.2.0
 * @since 1.2.2 Switched from CSS Grid to Flexbox for better column width control
 * @since 2.0.0 Migrated to BEM naming (.lcms-column-layout)
 *
 * Expected $section_config structure:
 * [
 *     'settings' => [...],
 *     'pre_html' => 'HTML string to render before header',  // Optional
 *     'header'   => ['heading' => [...]],
 *     'content' => [
 *         'columns' => [
 *             [
 *                 'type'    => 'text',        // text|image|video|html|buttons
 *                 'content' => [...],         // Type-specific content structure
 *                 'width'   => '60%',         // Column width: percentage (60%), fr units (2fr), or pixels (400px)
 *             ],
 *             [
 *                 'type'    => 'image',
 *                 'content' => [...],
 *                 'width'   => '40%',         // Defaults to '1fr' (equal flex-grow)
 *             ],
 *         ],
 *         'gap'      => '40px',               // Space between columns
 *         'reverse'  => false,                // Reverse column order on mobile
 *     ],
 *     'footer' => ['buttons' => [...]],       // Optional section-level buttons
 *     'post_html' => 'HTML string to render after footer',  // Optional
 * ]
 */

// Set section type for wrapper
$section_type = '2-column';

// Extract content config
$content_config = $section_config['content'] ?? [];
$columns = $content_config['columns'] ?? [];
$gap = $content_config['gap'] ?? '40px';
$reverse = $content_config['reverse'] ?? false;

// Build columns class with BEM
$columns_class = 'lcms-column-layout';
if ($reverse) {
    $columns_class .= ' lcms-column-layout--reverse-mobile';
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

    <?php if (!empty($columns)): ?>
        <div class="<?php echo esc_attr($columns_class); ?>" style="gap: <?php echo esc_attr($gap); ?>;">
            <?php foreach ($columns as $column): ?>
                <?php
                $col_type = $column['type'] ?? 'text';
                $content = $column['content'] ?? [];
                $col_width = $column['width'] ?? '1fr';

                // Convert grid units to flex-basis values
                // Support: percentages (50%), fr units (1fr), or pixel values (400px)
                if (strpos($col_width, 'fr') !== false) {
                    // Convert fr units to flex property
                    $flex_grow = (float) str_replace('fr', '', $col_width);
                    $flex_style = "flex: {$flex_grow} 1 0;";
                } else {
                    // Use explicit width (percentage or pixels) with flex-basis
                    $flex_style = "flex: 0 0 {$col_width};";
                }
                ?>

                <div class="lcms-column-layout__column" style="<?php echo esc_attr($flex_style); ?>">
                    <?php
                    // Render column content using content renderers
                    $content_renderer = __DIR__ . '/_lib/content/' . $col_type . '.php';

                    if (file_exists($content_renderer)) {
                        include $content_renderer;
                    } else {
                        // Log error for unknown content type
                        error_log("Pro-Sites 2-column: Unknown column type '{$col_type}' in " . __FILE__);
                    }
                    ?>
                </div><!-- .lcms-column-layout__column -->
            <?php endforeach; ?>
        </div><!-- .lcms-column-layout -->
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