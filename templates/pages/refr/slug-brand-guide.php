<?php
/**
 * Reframe WA Brand Guidelines - Modern Minimalist Format
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-brand-guide.php
 */

defined('ABSPATH') || exit;

get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$client_config = include(__DIR__ . '/config.php');

// Merge CSS variables (client overrides global)
$css_vars = array_merge(
    $global_config['css_variables'] ?? [],
    $client_config['css_variables'] ?? []
);
?>

<!-- Google Fonts (Client-specific) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Inter:wght@400&display=swap" rel="stylesheet">

<!-- 1. LeanCMS Design System - Phase 1-3 Components (Base + BEM Components) -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- 2. CSS Variables (Generated from config.php) -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
}
</style>

<!-- 3. Legacy Component Styles - Phase 4-5 (Hero, CTA, Brand Guide, etc.) -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- 4. Partial CSS auto-loads here via registry when partials render -->

<!-- 5. Client Theme CSS Rule Overrides -->
<?php
$client_theme_css = LEANCMS_PLUGIN_DIR . 'templates/pages/refr/assets/refr-theme.css';
if (file_exists($client_theme_css)):
?>
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/pages/refr/assets/refr-theme.css">
<?php endif; ?>

<main id="primary" class="site-main">
    <!-- Hero -->
    <?php
    $hero_settings = [
        'logo' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert_REV.svg',
        'logo_alt' => 'Reframe WA Logo',
        'badge' => 'Brand Guidelines',
        'title' => 'REFRAME WA CONSULTING',
        'subtitle' => 'REVIEW · RENEW · REGENERATE',
    ];
    partial('hero', $hero_settings, 'top-section');
    ?>

    <!-- Color Palette -->
    <?php
    $color_settings = $client_config['brand_guide']['color_palette'];
    partial('color-palette', $color_settings, 'brand-guide');
    ?>

    <!-- Typography -->
    <?php
    $typography_settings = $client_config['brand_guide']['typography'];
    partial('typography', $typography_settings, 'brand-guide');
    ?>

    <!-- Logo Usage -->
    <?php
    $logo_settings = $client_config['brand_guide']['logo_usage'];
    partial('logo', $logo_settings, 'brand-guide');
    ?>

    <!-- Do's and Don'ts -->
    <?php
    $guidelines_settings = $client_config['brand_guide']['guidelines'];
    partial('guidelines', $guidelines_settings, 'brand-guide');
    ?>

    <!-- Spacing System -->
    <?php
    $spacing_settings = [
        'label' => 'Layout System',
        'title' => 'Spacing & Layout',
        'description' => 'Consistent spacing creates visual rhythm and improves readability. Use these standard spacing values throughout all materials.',
        'spacing' => [
            [
                'label' => 'Small',
                'value' => '20px',
                'height' => 20,
            ],
            [
                'label' => 'Medium',
                'value' => '40px',
                'height' => 40,
            ],
            [
                'label' => 'Large',
                'value' => '60px',
                'height' => 60,
            ],
            [
                'label' => 'XLarge',
                'value' => '80px',
                'height' => 80,
            ],
        ],
    ];
    partial('spacing', $spacing_settings, 'brand-guide');
    ?>

    <!-- CTA -->
    <?php
    $cta_settings = [
        'title' => 'Questions About Brand Usage?',
        'description' => 'Need guidance on applying these guidelines to your project? We\'re here to help ensure brand consistency.',
        'button_text' => 'Get in Touch',
        'button_url' => '#contact',
    ];
    partial('cta', $cta_settings, 'bottom-section');
    ?>
</main>

<?php get_footer(); ?>
