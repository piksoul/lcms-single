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
        'logo_alt' => '4D Library',
        'badge' => 'Brand Guidelines',
        'title' => '4D Library',
        'subtitle' => 'Beyond the Box',
    ];
    partial('hero', $hero_settings, 'top-section');
    ?>

    <!-- Color Palette -->
    <?php
    $color_settings = [
        'label' => 'Visual Identity',
        'title' => 'Color Palette',
        'description' => 'Our color palette combines deep navy blues with vibrant accents, reflecting professionalism, trust, and transformation. Use these colors consistently across all brand materials.',
        'colors' => [
            [
                'hex' => '#08093E',
                'rgb' => '8, 9, 62',
                'name' => 'Primary Navy',
                'usage' => 'Primary backgrounds, headers',
            ],
            [
                'hex' => '#12195B',
                'rgb' => '18, 25, 91',
                'name' => 'Secondary Navy',
                'usage' => 'Headings, emphasis',
            ],
            [
                'hex' => '#037DED',
                'rgb' => '3, 125, 237',
                'name' => 'Bright Blue',
                'usage' => 'Links, buttons, CTAs',
            ],
            [
                'hex' => '#DAE3F3',
                'rgb' => '218, 227, 243',
                'name' => 'Light Blue',
                'usage' => 'Backgrounds, borders',
            ],
            [
                'hex' => '#161617',
                'rgb' => '22, 22, 23',
                'name' => 'Text Primary',
                'usage' => 'Body text, primary content',
            ],
            [
                'hex' => '#2998FF',
                'rgb' => '41, 152, 255',
                'name' => 'Hover Blue',
                'usage' => 'Hover states, interactions',
            ],
        ],
    ];
    partial('color-palette', $color_settings, 'brand-guide');
    ?>

    <!-- Typography -->
    <?php
    $typography_settings = [
        'label' => 'Typography',
        'title' => 'Type System',
        'description' => 'Our typography combines the bold, uppercase Raleway for headings with the clean, readable Inter for body text. This creates a professional, modern aesthetic that commands attention while remaining approachable.',
        'specimens' => [
            [
                'label' => 'Heading XL',
                'class' => 'heading-xl',
                'text' => 'REFRAME WA CONSULTING',
                'font' => 'Raleway',
                'size' => '56px',
                'weight' => '700 (Bold)',
                'transform' => 'Uppercase',
                'line_height' => '1.1',
            ],
            [
                'label' => 'Heading Large',
                'class' => 'heading-lg',
                'text' => 'REVIEW RENEW REGENERATE',
                'font' => 'Raleway',
                'size' => '42px',
                'weight' => '700 (Bold)',
                'transform' => 'Uppercase',
                'line_height' => '1.1',
            ],
            [
                'label' => 'Heading Medium',
                'class' => 'heading-md',
                'text' => 'LEADERSHIP TRANSFORMATION',
                'font' => 'Raleway',
                'size' => '32px',
                'weight' => '700 (Bold)',
                'transform' => 'Uppercase',
                'line_height' => '1.1',
            ],
            [
                'label' => 'Body Large',
                'class' => 'body-lg',
                'text' => 'Leadership coaching that helps professionals understand how others perceive them and develop authentic executive presence through our proven Review, Renew, and Regenerate process.',
                'font' => 'Inter',
                'size' => '18px',
                'weight' => '400 (Regular)',
                'transform' => '',
                'line_height' => '1.65',
            ],
            [
                'label' => 'Body Medium',
                'class' => 'body-md',
                'text' => 'Our transformative approach combines 25+ years of experience with proven frameworks to help leaders develop self-awareness, authentic presence, and executive impact. We guide professionals through meaningful change that lasts.',
                'font' => 'Inter',
                'size' => '15px',
                'weight' => '400 (Regular)',
                'transform' => '',
                'line_height' => '1.65',
            ],
        ],
    ];
    partial('typography', $typography_settings, 'brand-guide');
    ?>

    <!-- Logo Usage -->
    <?php
    $logo_settings = [
        'label' => 'Logo Guidelines',
        'title' => 'Logo Usage',
        'description' => 'The Reframe WA logo features a distinctive \'R\' symbol within a frame, representing transformation and structure. Use logo variations appropriately based on context and background.',
        'logos' => [
            [
                'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert.svg',
                'title' => 'Primary Vertical',
                'description' => 'Main logo in formal vertical arrangement. Use on light backgrounds with symbol above text and "REVIEW RENEW REGENERATE" tagline.',
            ],
            [
                'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Horiz.svg',
                'title' => 'Horizontal Layout',
                'description' => 'Horizontal arrangement with symbol on left. Ideal for headers, letterheads, and landscape formats where vertical space is limited.',
            ],
            [
                'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Horiz-REV.svg',
                'title' => 'Reversed/White',
                'description' => 'White logo on navy blue (#08093E) or dark backgrounds. Maintains brand visibility and contrast on dark surfaces.',
                'bg_color' => '#08093E',
                'text_color' => 'white',
            ],
            [
                'image' => 'https://static.brand-hub.com.au/client/refr/ReframeWALogo-Symbol.svg',
                'title' => 'Symbol Mark',
                'description' => 'Standalone \'R\' frame symbol for compact applications, social media profiles, app icons, and brand patterns.',
            ],
        ],
    ];
    partial('logo', $logo_settings, 'brand-guide');
    ?>

    <!-- Do's and Don'ts -->
    <?php
    $guidelines_settings = [
        'label' => 'Best Practices',
        'title' => 'Brand Guidelines',
        'description' => 'Follow these guidelines to maintain brand integrity and ensure consistent application across all touchpoints.',
        'do' => [
            'Use Raleway Bold Uppercase for all headings',
            'Use Inter Regular for body text',
            'Maintain proper clear space around logo',
            'Use navy blues (#08093E, #12195B) for primary elements',
            'Use bright blue (#037DED) for CTAs and links',
            'Apply gradients from brand palette',
            'Use approved logo variations only',
            'Follow "REVIEW RENEW REGENERATE" messaging',
        ],
        'dont' => [
            'Alter logo colors or proportions',
            'Use fonts other than Raleway and Inter',
            'Use lowercase for headings',
            'Stretch or distort the \'R\' symbol',
            'Use unapproved color combinations',
            'Place logo on busy backgrounds',
            'Remove tagline from primary logo',
            'Mix old and new brand elements',
        ],
    ];
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
