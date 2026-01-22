<?php
/**
 * About Page Template
 *
 * Information about the company/service.
 * Built with Pro-Sites partial system.
 *
 * @filepath templates/pages/slug-about.php
 */

get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$css_vars = $global_config['css_variables'] ?? [];
?>

<!-- LeanCMS Design System -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
    --color-brand-primary: #2563eb;
    --color-brand-secondary: #1e40af;
    --color-brand-accent: #3b82f6;
}
</style>

<!-- Hero Section -->
<section class="lcms-hero" style="padding: 60px 24px;">
    <h1 class="lcms-hero__title">About Us</h1>
    <p class="lcms-hero__subtitle">Learn more about our mission and values.</p>
</section>

<?php
// ============================================
// OUR STORY
// ============================================
$story_section = [
    'header' => [
        'heading' => [
            'label' => 'Our Story',
            'title' => 'Building Better Web Experiences',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <p>HelloCMS was born from a simple idea: content management should be straightforward, not complicated. We believe that creating and managing websites should be accessible to everyone, without sacrificing power or flexibility.</p>
            <p>Our team has years of experience building web solutions, and we\'ve seen firsthand the frustrations that come with overly complex systems. That\'s why we created HelloCMS - a streamlined approach that puts simplicity first while maintaining the features professionals need.</p>
        ',
        'format' => 'lead',
    ],
];

partial('column', $story_section, 'pro-sites');

// ============================================
// VALUES
// ============================================
$values_intro = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'What We Believe',
            'title' => 'Our Core Values',
            'align' => 'center',
        ],
    ],
];

partial('column', $values_intro, 'pro-sites');

$values_grid = [
    'settings' => [
        'dark_mode' => true,
    ],
    'content' => [
        'items' => [
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="text-align: center;">
                                    <div style="font-size: 40px; margin-bottom: 16px;">✨</div>
                                    <h3 style="margin: 0 0 12px;">Simplicity</h3>
                                    <p style="margin: 0; opacity: 0.9;">We remove complexity wherever possible, making tools that are intuitive and easy to use.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="text-align: center;">
                                    <div style="font-size: 40px; margin-bottom: 16px;">🔧</div>
                                    <h3 style="margin: 0 0 12px;">Quality</h3>
                                    <p style="margin: 0; opacity: 0.9;">We build things right the first time, with clean code and thoughtful design.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="text-align: center;">
                                    <div style="font-size: 40px; margin-bottom: 16px;">🤝</div>
                                    <h3 style="margin: 0 0 12px;">Trust</h3>
                                    <p style="margin: 0; opacity: 0.9;">We\'re transparent in everything we do, building lasting relationships with our users.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="text-align: center;">
                                    <div style="font-size: 40px; margin-bottom: 16px;">🌱</div>
                                    <h3 style="margin: 0 0 12px;">Growth</h3>
                                    <p style="margin: 0; opacity: 0.9;">We continuously improve, learning from feedback and evolving with technology.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '24px',
    ],
];

partial('grid', $values_grid, 'pro-sites');

// ============================================
// CTA
// ============================================
$cta = [
    'settings' => [
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'title' => 'Want to Learn More?',
            'subtitle' => 'Get in touch with us to discuss how we can help.',
            'align' => 'center',
        ],
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Contact Us',
                'url' => '/contact',
                'style' => 'primary',
            ],
            [
                'text' => 'Back to Home',
                'url' => '/home',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $cta, 'pro-sites');

get_footer();
