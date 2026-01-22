<?php
/**
 * Spacing Section Component - BEM Version
 *
 * Displays spacing/layout system with visual representations.
 * Uses .lcms-section-heading for header, .lcms-grid (4-column) for layout, .lcms-spacing-card for display elements.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/brand-guide/spacing.php
 * @since      2.0.0 - Migrated section heading to BEM naming convention
 * @since      2.0.3 - Migrated grid to BEM naming (.lcms-grid--4col)
 * @since      2.0.5 - Migrated spacing card to BEM naming (.lcms-spacing-card)
 *
 * Usage:
 * $spacing_config = [
 *     'label' => 'Layout System',
 *     'title' => 'Spacing & Layout',
 *     'description' => 'Consistent spacing creates visual rhythm...',
 *     'spacing' => [
 *         [
 *             'label' => 'Small',
 *             'value' => '20px',
 *             'height' => 20,
 *         ],
 *         [
 *             'label' => 'Medium',
 *             'value' => '40px',
 *             'height' => 40,
 *         ],
 *         // ... more spacing values
 *     ],
 * ];
 */

// Set defaults
$label = $spacing_config['label'] ?? 'Layout System';
$title = $spacing_config['title'] ?? 'Spacing & Layout';
$description = $spacing_config['description'] ?? '';
$spacing = $spacing_config['spacing'] ?? [];
?>

<section class="spacing-section lcms-brand-guide">
    <div class="lcms-container">

        <!-- Section Heading Component (BEM) -->
        <div class="lcms-section-heading">
            <div class="lcms-section-heading__label"><?php echo esc_html($label); ?></div>
            <h2 class="lcms-section-heading__title"><?php echo esc_html($title); ?></h2>

            <?php if ($description): ?>
                <p class="lcms-section-heading__subtitle"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <div class="lcms-grid lcms-grid--4col">
            <?php foreach ($spacing as $space): ?>
                <div class="lcms-spacing-card">
                    <div class="lcms-spacing-card__visual">
                        <div class="lcms-spacing-card__box" style="height: <?php echo esc_attr($space['height']); ?>px;"></div>
                    </div>
                    <div class="lcms-spacing-card__label"><?php echo esc_html($space['label']); ?></div>
                    <div class="lcms-spacing-card__value"><?php echo esc_html($space['value']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
