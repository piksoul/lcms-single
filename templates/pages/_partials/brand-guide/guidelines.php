<?php
/**
 * Guidelines Section Component (Do's and Don'ts) - BEM Version
 *
 * Displays brand guidelines with do's and don'ts in a two-column layout.
 * Uses .lcms-section-heading for header, .lcms-grid (2-column) for layout, .lcms-guideline-card for display elements.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/brand-guide/guidelines.php
 * @since      2.0.0 - Migrated section heading to BEM naming convention
 * @since      2.0.3 - Migrated grid to BEM naming (.lcms-grid--2col)
 * @since      2.0.5 - Migrated guideline card to BEM naming (.lcms-guideline-card with --do/--dont modifiers)
 *
 * Usage:
 * $guidelines_config = [
 *     'label' => 'Best Practices',
 *     'title' => 'Brand Guidelines',
 *     'description' => 'Follow these guidelines to maintain brand integrity...',
 *     'do' => [
 *         'Use Raleway Bold Uppercase for all headings',
 *         'Use Inter Regular for body text',
 *         // ... more do's
 *     ],
 *     'dont' => [
 *         'Alter logo colors or proportions',
 *         'Use fonts other than Raleway and Inter',
 *         // ... more don'ts
 *     ],
 * ];
 */

// Set defaults
$label = $guidelines_config['label'] ?? 'Best Practices';
$title = $guidelines_config['title'] ?? 'Brand Guidelines';
$description = $guidelines_config['description'] ?? '';
$do_list = $guidelines_config['do'] ?? [];
$dont_list = $guidelines_config['dont'] ?? [];
?>

<section class="guidelines-section lcms-brand-guide">
    <div class="lcms-container">

        <!-- Section Heading Component (BEM) -->
        <div class="lcms-section-heading">
            <div class="lcms-section-heading__label"><?php echo esc_html($label); ?></div>
            <h2 class="lcms-section-heading__title"><?php echo esc_html($title); ?></h2>

            <?php if ($description): ?>
                <p class="lcms-section-heading__subtitle"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <div class="lcms-grid lcms-grid--2col">
            <div class="lcms-guideline-card lcms-guideline-card--do">
                <div class="lcms-guideline-card__icon">✓</div>
                <h3 class="lcms-guideline-card__title">Do</h3>
                <ul class="lcms-guideline-card__list">
                    <?php foreach ($do_list as $item): ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="lcms-guideline-card lcms-guideline-card--dont">
                <div class="lcms-guideline-card__icon">✗</div>
                <h3 class="lcms-guideline-card__title">Don't</h3>
                <ul class="lcms-guideline-card__list">
                    <?php foreach ($dont_list as $item): ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
