<?php
/**
 * Hero Section Component - BEM Version
 *
 * Displays a hero banner with optional logo, badge, title, and subtitle.
 * Uses .lcms-hero BEM component from lcms-design-system.css.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Partials
 * @filepath   templates/pages/_partials/top-section/hero.php
 * @since      2.0.0 - Migrated to BEM naming convention
 *
 * Usage:
 * $hero_settings = [
 *     'pre_html' => 'HTML string to render before hero',  // optional
 *     'logo' => '/path/to/logo.svg',           // optional
 *     'logo_alt' => 'Company Logo',            // optional
 *     'badge' => 'Brand Guidelines',           // optional
 *     'title' => 'COMPANY NAME',               // required
 *     'subtitle' => 'Tagline Here',            // optional
 *     'post_html' => 'HTML string to render after hero',  // optional
 *     'modifiers' => '',                       // optional: --small, --large, --dark, --light, etc.
 * ];
 * partial('hero', $hero_settings);
 */

// Extract config from wrapper if present (supports both new and legacy patterns)
if (isset($hero_config) && is_array($hero_config)) {
    extract($hero_config);
}

// Set defaults
$logo = $logo ?? '';
$logo_alt = $logo_alt ?? 'Logo';
$badge = $badge ?? '';
$title = $title ?? 'Welcome';
$subtitle = $subtitle ?? '';
$pre_html = $pre_html ?? '';
$post_html = $post_html ?? '';
$modifiers = $modifiers ?? '';

// Build BEM modifier classes
$hero_class = 'lcms-hero' . ($modifiers ? ' ' . $modifiers : '');
?>
<section class="<?php echo esc_attr($hero_class); ?>">

    <?php if (!empty($pre_html)): ?>
        <?php echo $pre_html; ?>
    <?php endif; ?>

    <?php if ($logo): ?>
        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($logo_alt); ?>" class="lcms-hero__logo">
    <?php endif; ?>

    <?php if ($badge): ?>
        <div class="lcms-hero__badge"><?php echo esc_html($badge); ?></div>
    <?php endif; ?>

    <?php if ($title): ?>
        <h1 class="lcms-hero__title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <?php if ($subtitle): ?>
        <p class="lcms-hero__subtitle"><?php echo esc_html($subtitle); ?></p>
    <?php endif; ?>

    <?php if (!empty($post_html)): ?>
        <?php echo $post_html; ?>
    <?php endif; ?>
</section>
