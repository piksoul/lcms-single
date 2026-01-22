<?php
/**
 * Color Palette Section Component - BEM Version
 *
 * Displays a brand's color palette with swatches, names, and color values.
 * Uses .lcms-section-heading, .lcms-grid, and .lcms-color-swatch BEM components from lcms-design-system.css.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/brand-guide/color-palette.php
 * @since      2.0.0 - Migrated to BEM naming convention
 *
 * Usage:
 * $color_config = [
 *     'label' => 'Visual Identity',
 *     'title' => 'Color Palette',
 *     'description' => 'Our color palette combines...',
 *     'colors' => [
 *         [
 *             'hex' => '#08093E',
 *             'rgb' => '8, 9, 62',
 *             'name' => 'Primary Navy',
 *             'usage' => 'Primary backgrounds, headers',
 *         ],
 *         // ... more colors
 *     ],
 * ];
 */

// Set defaults
$label = $color_config['label'] ?? 'Color Palette';
$title = $color_config['title'] ?? 'Brand Colors';
$description = $color_config['description'] ?? '';
$colors = $color_config['colors'] ?? [];
?>

<section class="lcms-brand-guide">
    <div class="lcms-container">

        <!-- Section Heading Component (BEM) -->
        <div class="lcms-section-heading">
            <div class="lcms-section-heading__label"><?php echo esc_html($label); ?></div>
            <h2 class="lcms-section-heading__title"><?php echo esc_html($title); ?></h2>

            <?php if ($description): ?>
                <p class="lcms-section-heading__subtitle"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <!-- Grid with Color Swatches (BEM) -->
        <div class="lcms-grid lcms-grid--3col">
            <?php foreach ($colors as $color): ?>
                <div class="lcms-color-swatch">
                    <div class="lcms-color-swatch__display" style="background: <?php echo esc_attr($color['hex']); ?>;"></div>
                    <div class="lcms-color-swatch__name"><?php echo esc_html($color['name']); ?></div>
                    <div class="lcms-color-swatch__values">
                        <div><strong>HEX:</strong> <?php echo esc_html($color['hex']); ?></div>
                        <div><strong>RGB:</strong> <?php echo esc_html($color['rgb']); ?></div>
                        <div><strong>Use:</strong> <?php echo esc_html($color['usage']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
