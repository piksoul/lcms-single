<?php
/**
 * Logo Section Component - BEM Version
 *
 * Displays logo variations with descriptions and usage guidelines.
 * Uses .lcms-section-heading for header, .lcms-grid (3-column) for layout, .lcms-logo-card for display elements.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/brand-guide/logo.php
 * @since      2.0.0 - Migrated section heading to BEM naming convention
 * @since      2.0.3 - Migrated grid to BEM naming (.lcms-grid--3col)
 * @since      2.0.5 - Migrated logo card to BEM naming (.lcms-logo-card)
 *
 * Usage:
 * $logo_config = [
 *     'label' => 'Logo Guidelines',
 *     'title' => 'Logo Usage',
 *     'description' => 'The Reframe WA logo features...',
 *     'logos' => [
 *         [
 *             'image' => '/path/to/logo.svg',
 *             'title' => 'Primary Vertical',
 *             'description' => 'Main logo in formal vertical arrangement...',
 *             'bg_color' => '',  // optional background color
 *             'text_color' => '', // optional text color for dark backgrounds
 *         ],
 *         // ... more logos
 *     ],
 * ];
 */

// Set defaults
$label = $logo_config['label'] ?? 'Logo Guidelines';
$title = $logo_config['title'] ?? 'Logo Usage';
$description = $logo_config['description'] ?? '';
$logos = $logo_config['logos'] ?? [];
?>

<section class="logo-section lcms-brand-guide">
    <div class="lcms-container">

        <!-- Section Heading Component (BEM) -->
        <div class="lcms-section-heading">
            <div class="lcms-section-heading__label"><?php echo esc_html($label); ?></div>
            <h2 class="lcms-section-heading__title"><?php echo esc_html($title); ?></h2>

            <?php if ($description): ?>
                <p class="lcms-section-heading__subtitle"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>

        <div class="lcms-grid lcms-grid--3col">
            <?php foreach ($logos as $logo): ?>
                <div class="lcms-logo-card"<?php if (!empty($logo['bg_color'])): ?> style="background: <?php echo esc_attr($logo['bg_color']); ?>;"<?php endif; ?>>
                    <img src="<?php echo esc_url($logo['image']); ?>"
                         alt="<?php echo esc_attr($logo['title']); ?>"
                         class="lcms-logo-card__image">
                    <h3 class="lcms-logo-card__title"<?php if (!empty($logo['text_color'])): ?> style="color: <?php echo esc_attr($logo['text_color']); ?>;"<?php endif; ?>>
                        <?php echo esc_html($logo['title']); ?>
                    </h3>
                    <p class="lcms-logo-card__description"<?php if (!empty($logo['text_color'])): ?> style="color: <?php echo esc_attr($logo['text_color']); ?>;"<?php endif; ?>>
                        <?php echo esc_html($logo['description']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
