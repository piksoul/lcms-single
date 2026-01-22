<?php
/**
 * Typography Section Component - BEM Version
 *
 * Displays typography specimens with font families, sizes, and usage examples.
 * Uses .lcms-section-heading for header, .lcms-type-specimen for display elements.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/brand-guide/typography.php
 * @since      2.0.0 - Migrated section heading to BEM naming convention
 * @since      2.0.5 - Migrated type specimen to BEM naming (.lcms-type-specimen)
 *
 * Usage:
 * $typography_config = [
 *     'label' => 'Typography',
 *     'title' => 'Type System',
 *     'description' => 'Our typography combines...',
 *     'specimens' => [
 *         [
 *             'label' => 'Heading XL',
 *             'class' => 'heading-xl',
 *             'text' => 'REFRAME WA CONSULTING',
 *             'font' => 'Raleway',
 *             'size' => '56px',
 *             'weight' => '700 (Bold)',
 *             'transform' => 'Uppercase',
 *             'line_height' => '1.1',
 *         ],
 *         // ... more specimens
 *     ],
 * ];
 */

// Set defaults
$label = $typography_config['label'] ?? 'Typography';
$title = $typography_config['title'] ?? 'Type System';
$description = $typography_config['description'] ?? '';
$specimens = $typography_config['specimens'] ?? [];
?>

<section class="typography-section lcms-brand-guide">
    <div class="lcms-container">

        <!-- Section Heading Component (BEM) -->
        <div class="lcms-section-heading">
            <div class="lcms-section-heading__label"><?php echo esc_html($label); ?></div>
            <h2 class="lcms-section-heading__title"><?php echo esc_html($title); ?></h2>

            <?php if ($description): ?>
                <p class="lcms-section-heading__subtitle"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <?php foreach ($specimens as $specimen): ?>
            <div class="lcms-type-specimen">
                <div class="lcms-type-specimen__label"><?php echo esc_html($specimen['label']); ?></div>
                <div class="lcms-type-specimen__display <?php echo esc_attr($specimen['class']); ?>">
                    <?php echo esc_html($specimen['text']); ?>
                </div>
                <div class="lcms-type-specimen__info">
                    <strong>Font:</strong> <?php echo esc_html($specimen['font']); ?><br>
                    <strong>Size:</strong> <?php echo esc_html($specimen['size']); ?> |
                    <strong>Weight:</strong> <?php echo esc_html($specimen['weight']); ?>
                    <?php if (!empty($specimen['transform'])): ?>
                        | <strong>Transform:</strong> <?php echo esc_html($specimen['transform']); ?>
                    <?php endif; ?>
                    | <strong>Line Height:</strong> <?php echo esc_html($specimen['line_height']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
