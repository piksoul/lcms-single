<?php
/**
 * 4D Library Brand Guidelines - Modern Minimalist Format
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/4dli/slug-brand-guide.php
 */

defined('ABSPATH') || exit;

// Load client resources (hooks into wp_head)
load_client_resources('4dli');

// Load client config
$config = include(__DIR__ . '/config.php');
$brand_guide = $config['brand_guide'] ?? [];

// Debug: verify data is loaded
if (defined('WP_DEBUG') && WP_DEBUG) {
    error_log('Brand Guide - Colors count: ' . count($brand_guide['colors']['colors'] ?? []));
    error_log('Brand Guide - Logos count: ' . count($brand_guide['logos']['logos'] ?? []));
}

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero -->
    <?php
    partial('hero', $brand_guide['hero'] ?? [], 'top-section');
    ?>

    <!-- Color Palette -->
    <?php
    partial('color-palette', $brand_guide['colors'] ?? [], 'brand-guide');
    ?>

    <!-- Typography -->
    <?php
    partial('typography', $brand_guide['typography'] ?? [], 'brand-guide');
    ?>

    <!-- Logo Usage -->
    <?php
    partial('logo', $brand_guide['logos'] ?? [], 'brand-guide');
    ?>

    <!-- Do's and Don'ts -->
    <?php
    partial('guidelines', $brand_guide['guidelines'] ?? [], 'brand-guide');
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
