<?php
/**
 * Home Page Template
 *
 * Main landing page with hero, features, about section, and CTA.
 * Built with Pro-Sites partial system.
 *
 * @filepath templates/pages/slug-home.php
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
<section class="lcms-hero">
    <div class="lcms-hero__badge">Welcome to HelloCMS</div>
    <h1 class="lcms-hero__title">Simple, Powerful Content Management</h1>
    <p class="lcms-hero__subtitle">Build beautiful websites with ease. A streamlined CMS designed for simplicity and performance.</p>
    <div class="lcms-button-group lcms-button-group--align-center" style="margin-top: 32px;">
        <a href="/about" class="lcms-button lcms-button--primary">Learn More</a>
        <a href="/contact" class="lcms-button lcms-button--outline">Get in Touch</a>
    </div>
</section>

<?php
// ============================================
// FEATURES SECTION
// ============================================
$features_intro = [
    'settings' => [
        'custom_id' => 'features',
    ],
    'header' => [
        'heading' => [
            'label' => 'Why Choose Us',
            'title' => 'Everything You Need',
            'subtitle' => 'Powerful features wrapped in simplicity',
            'align' => 'center',
        ],
    ],
];

partial('column', $features_intro, 'pro-sites');

// Features Grid
$features_grid = [
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
                                    <div style="font-size: 48px; margin-bottom: 20px;">🚀</div>
                                    <h3 style="color: var(--color-brand-primary); margin: 0 0 16px;">Fast & Lightweight</h3>
                                    <p>Optimized for speed with minimal overhead. Your pages load instantly.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'border' => true,
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
                                    <div style="font-size: 48px; margin-bottom: 20px;">🎨</div>
                                    <h3 style="color: var(--color-brand-primary); margin: 0 0 16px;">Flexible Design</h3>
                                    <p>Customize every aspect with CSS variables and modular components.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'border' => true,
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
                                    <div style="font-size: 48px; margin-bottom: 20px;">📱</div>
                                    <h3 style="color: var(--color-brand-primary); margin: 0 0 16px;">Mobile Ready</h3>
                                    <p>Responsive layouts that look great on any device, from phone to desktop.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'border' => true,
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '32px',
    ],
];

partial('grid', $features_grid, 'pro-sites');

// ============================================
// ABOUT SECTION
// ============================================
$about_section = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'about',
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '
                        <h2>Built for Modern Websites</h2>
                        <p>HelloCMS combines the power of WordPress with a streamlined, developer-friendly approach. No bloat, no complexity - just the tools you need to build beautiful websites.</p>
                        <ul class="lcms-list">
                            <li><strong>Template-based pages</strong> - Full control over your layouts</li>
                            <li><strong>Partial system</strong> - Reusable, composable components</li>
                            <li><strong>CSS variables</strong> - Easy theming and customization</li>
                            <li><strong>BEM methodology</strong> - Clean, maintainable styles</li>
                        </ul>
                    ',
                    'format' => 'standard',
                ],
                'width' => '55%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.1); border-radius: 16px; padding: 40px; text-align: center;">
                            <div style="font-size: 64px; margin-bottom: 16px;">💡</div>
                            <p style="font-size: 18px; margin: 0;">Simple by design.<br>Powerful when you need it.</p>
                        </div>
                    ',
                ],
                'width' => '45%',
            ],
        ],
        'gap' => '60px',
    ],
];

partial('2-column', $about_section, 'pro-sites');

// ============================================
// CTA SECTION
// ============================================
$cta_section = [
    'settings' => [
        'custom_id' => 'cta',
        'custom_css' => 'background: linear-gradient(135deg, var(--color-brand-primary) 0%, var(--color-brand-secondary) 100%); color: white;',
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'title' => 'Ready to Get Started?',
            'subtitle' => 'Join us and experience a better way to manage content.',
            'align' => 'center',
        ],
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Contact Us',
                'url' => '/contact',
                'style' => 'secondary',
            ],
            [
                'text' => 'Learn More',
                'url' => '/about',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $cta_section, 'pro-sites');
?>

<!-- Footer -->
<footer class="lcms-cta-section" style="background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);">
    <div class="content-container">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 24px;">
            <div>
                <h3 style="font-family: var(--font-heading); font-size: 24px; margin: 0 0 8px; font-weight: 700;">HelloCMS</h3>
                <p style="margin: 0; opacity: 0.7; font-size: 14px;">Simple, powerful content management.</p>
            </div>
            <div style="display: flex; gap: 24px; font-size: 14px;">
                <a href="/about" style="color: white; opacity: 0.8; text-decoration: none;">About</a>
                <a href="/contact" style="color: white; opacity: 0.8; text-decoration: none;">Contact</a>
                <a href="/privacy-policy" style="color: white; opacity: 0.8; text-decoration: none;">Privacy</a>
                <a href="/terms-of-service" style="color: white; opacity: 0.8; text-decoration: none;">Terms</a>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.1); margin-top: 24px; padding-top: 24px;">
            <p style="margin: 0; opacity: 0.5; font-size: 12px; text-align: center;">&copy; <?php echo date('Y'); ?> HelloCMS. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php get_footer(); ?>
