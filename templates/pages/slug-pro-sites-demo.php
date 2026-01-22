<?php
/**
 * Pro-Sites Demo Showcase Template
 *
 * A comprehensive showcase demonstrating all pro-sites partial capabilities.
 * Built with BEM methodology and the LeanCMS design system.
 *
 * Showcases:
 * - Grid layouts (3-column, 4-column, auto-fit)
 * - Column sections with various content types
 * - 2-Column layouts with mixed content
 * - Card, Stack, and Row content types
 * - Dark mode sections
 * - BEM-based styling with CSS variables
 *
 * @filepath templates/pages/test/slug-pro-sites-demo.php
 * @since 1.2.0
 * @updated 2025-11-19 - Regenerated with BEM system
 */

get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$client_config = include(__DIR__ . '/../refr/config.php');

// Merge CSS variables (client overrides global)
$css_vars = array_merge(
    $global_config['css_variables'] ?? [],
    $client_config['css_variables'] ?? []
);
?>

<!-- LeanCMS Design System -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
    /* Showcase colors */
    --color-showcase-primary: #667eea;
    --color-showcase-secondary: #764ba2;
    --color-showcase-accent: #f093fb;
    --color-showcase-success: #4facfe;
}
</style>

<!-- Legacy Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Hero Section -->
<section class="lcms-hero">
    <div class="lcms-hero__badge">Pro-Sites Partial System</div>
    <h1 class="lcms-hero__title">Build Beautiful Pages, Fast</h1>
    <p class="lcms-hero__subtitle">A flexible, reusable content section framework with grid layouts, cards, stacks, and more</p>
    <div class="lcms-button-group lcms-button-group--align-center" style="margin-top: 32px;">
        <a href="#features" class="lcms-button lcms-button--primary">Explore Features</a>
        <a href="#examples" class="lcms-button lcms-button--outline">View Examples</a>
    </div>
</section>

<?php
// ============================================
// INTRODUCTION
// ============================================
$intro_section = [
    'settings' => [
        'custom_id' => 'features',
    ],
    'header' => [
        'heading' => [
            'label' => 'Why Pro-Sites?',
            'title' => 'One System, Infinite Possibilities',
            'subtitle' => 'Build professional pages faster with a consistent, flexible framework',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>The Pro-Sites partial system provides a <strong>consistent, reusable framework</strong> for creating beautiful content sections. Mix and match layouts, content types, and styling options to create unique pages without writing custom code.</p>',
        'format' => 'lead',
    ],
];

partial('column', $intro_section, 'pro-sites');

// ============================================
// KEY FEATURES - 3 Column Grid
// ============================================
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
                                    <div style="font-size: 48px; margin-bottom: 20px;">⚡</div>
                                    <h3 class="lcms-card__header" style="color: var(--color-showcase-primary); margin: 0 0 16px;">Lightning Fast</h3>
                                    <p>Build pages in minutes, not hours. Pre-built partials with consistent patterns mean you can focus on content, not code.</p>
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
                                    <h3 class="lcms-card__header" style="color: var(--color-showcase-success); margin: 0 0 16px;">Fully Customizable</h3>
                                    <p>Control every aspect with CSS variables, custom classes, spacing, dark mode, and inline styles. Your brand, your way.</p>
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
                                    <h3 class="lcms-card__header" style="color: var(--color-showcase-accent); margin: 0 0 16px;">Mobile Responsive</h3>
                                    <p>All layouts automatically adapt to any screen size. Grid, 2-column, and stack layouts stack beautifully on mobile.</p>
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
// LAYOUT OPTIONS - Dark Mode Section
// ============================================
$layout_intro = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'examples',
    ],
    'header' => [
        'heading' => [
            'label' => 'Layout System',
            'title' => 'Choose Your Layout',
            'subtitle' => 'Mix and match layouts to create unique page structures',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Pro-Sites offers <strong>flexible layout options</strong>: single column for focus, 2-column for side-by-side content, and grid for showcasing multiple items. Each layout supports all content types.</p>',
        'format' => 'lead',
    ],
];

partial('column', $layout_intro, 'pro-sites');

// ============================================
// LAYOUT SHOWCASE - Auto-Fit Cards
// ============================================
$layout_cards = [
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
                                    <div style="font-size: 48px; margin: 0 0 16px;">1️⃣</div>
                                    <h4 style="margin: 0 0 12px;">Single Column</h4>
                                    <p style="margin: 0; opacity: 0.9;">Perfect for text, images, videos, or HTML. Clean, focused content presentation.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => false,
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
                                    <div style="font-size: 48px; margin: 0 0 16px;">2️⃣</div>
                                    <h4 style="margin: 0 0 12px;">2-Column Layout</h4>
                                    <p style="margin: 0; opacity: 0.9;">Image + text, video + buttons, or any content type combination with flexible widths.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => false,
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
                                    <div style="font-size: 48px; margin: 0 0 16px;">📊</div>
                                    <h4 style="margin: 0 0 12px;">Grid Layout</h4>
                                    <p style="margin: 0; opacity: 0.9;">Multi-item displays with 3, 4, or auto-responsive columns. Perfect for galleries and cards.</p>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => false,
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 'auto-fit',
        'min-width' => '280px',
        'gap' => '24px',
    ],
];

partial('grid', $layout_cards, 'pro-sites');

// ============================================
// CONTENT TYPES SHOWCASE
// ============================================
$content_types_header = [
    'header' => [
        'heading' => [
            'label' => 'Content Types',
            'title' => 'Every Type of Content You Need',
            'subtitle' => 'From simple text to complex nested structures',
            'align' => 'center',
        ],
    ],
];

partial('column', $content_types_header, 'pro-sites');

// Content Types Grid - 4 Column
$content_types_grid = [
    'content' => [
        'items' => [
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-primary); color: white;">📝</div>
                                    <h4 class="lcms-card__header">Text</h4>
                                    <p>Standard, lead, or small formats. Perfect for paragraphs, lists, and formatted content.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">format: standard | lead | small</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-success); color: white;">🖼️</div>
                                    <h4 class="lcms-card__header">Images</h4>
                                    <p>Display images with captions, alt text, and lazy loading support.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">src, alt, caption, lazy</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-accent); color: white;">🎥</div>
                                    <h4 class="lcms-card__header">Videos</h4>
                                    <p>Embed YouTube, Vimeo, or HTML5 videos with responsive sizing.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">youtube | vimeo | html5</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-secondary); color: white;">🔧</div>
                                    <h4 class="lcms-card__header">Custom HTML</h4>
                                    <p>Insert any HTML for forms, embeds, or custom layouts.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">Full HTML control</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-primary); color: white;">🔘</div>
                                    <h4 class="lcms-card__header">Buttons</h4>
                                    <p>Call-to-action buttons with primary, secondary, and outline styles.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">style: primary | secondary | outline</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-success); color: white;">📚</div>
                                    <h4 class="lcms-card__header">Stack</h4>
                                    <p>Vertically stack multiple content types with controlled spacing.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">items[], gap, align</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-accent); color: white;">🃏</div>
                                    <h4 class="lcms-card__header">Card</h4>
                                    <p>Structured cards with media, body, and footer sections.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">media, body, footer</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div class="lcms-card__content" style="padding: 0;">
                                    <div class="lcms-badge" style="background: var(--color-showcase-secondary); color: white;">↔️</div>
                                    <h4 class="lcms-card__header">Row</h4>
                                    <p>Horizontal layouts with flex control. Great for icon + text.</p>
                                    <code style="font-size: 12px; opacity: 0.7;">items[], gap, align, justify</code>
                                </div>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'border' => true,
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '20px',
    ],
];

partial('grid', $content_types_grid, 'pro-sites');

// ============================================
// 2-COLUMN SHOWCASE
// ============================================
$showcase_2col = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'title' => '2-Column Layouts for Side-by-Side Content',
            'subtitle' => 'Combine images, text, videos, and buttons with flexible column widths',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => '2-Column Layout Example',
                    'lazy' => true,
                ],
                'width' => '45%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '
                        <h3>Perfect for Feature Highlights</h3>
                        <p>Two-column layouts are ideal for:</p>
                        <ul class="lcms-list">
                            <li><strong>Product showcases</strong> - Image + description</li>
                            <li><strong>Feature highlights</strong> - Visual + benefits</li>
                            <li><strong>Video presentations</strong> - Video + call-to-action</li>
                            <li><strong>Testimonials</strong> - Photo + quote</li>
                        </ul>
                        <p>Control column widths (40/60, 50/50, 30/70), gap spacing, and mobile stacking order.</p>
                    ',
                    'format' => 'standard',
                ],
                'width' => '55%',
            ],
        ],
        'gap' => '60px',
        'reverse' => false,
    ],
];

partial('2-column', $showcase_2col, 'pro-sites');

// ============================================
// STACK & ROW CONTENT EXAMPLES
// ============================================
$stack_showcase = [
    'header' => [
        'heading' => [
            'title' => 'Stack & Row Content for Flexible Layouts',
            'subtitle' => 'Combine multiple content types in vertical or horizontal flows',
            'align' => 'center',
        ],
    ],
];

partial('column', $stack_showcase, 'pro-sites');

// Stack Examples Grid
$stack_examples = [
    'content' => [
        'items' => [
            [
                'type' => 'stack',
                'content' => [
                    'items' => [
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '<div style="background: linear-gradient(135deg, var(--color-showcase-primary), var(--color-showcase-secondary)); color: white; padding: 24px; border-radius: 12px; text-align: center;"><h4 style="margin: 0;">Progress Tracker</h4></div>',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<p><strong>Phase 1:</strong> Planning ✅</p><p><strong>Phase 2:</strong> Design ✅</p><p><strong>Phase 3:</strong> Development 🔄</p>',
                                'format' => 'standard',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'View Details', 'url' => '#', 'style' => 'primary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'left',
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'media' => [
                        'type' => 'image',
                        'content' => [
                            'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                            'alt' => 'Card Example',
                        ],
                    ],
                    'body' => [
                        'type' => 'text',
                        'content' => [
                            'text' => '<h4>Card Structure</h4><p>Cards have media, body, and footer sections with customizable padding, borders, and shadows.</p>',
                        ],
                    ],
                    'footer' => [
                        'type' => 'buttons',
                        'content' => [
                            'buttons' => [
                                ['text' => 'Learn More', 'url' => '#', 'style' => 'outline'],
                            ],
                        ],
                    ],
                    'padding' => '20px',
                    'border' => true,
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '<div style="width: 60px; height: 60px; background: var(--color-showcase-success); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 32px;">✨</div>',
                            ],
                            'width' => '60px',
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4 style="margin: 0 0 8px;">Row Layout</h4><p style="margin: 0;">Horizontal arrangement of content, perfect for icon + text combinations.</p>',
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                    'justify' => 'start',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '32px',
    ],
];

partial('grid', $stack_examples, 'pro-sites');

// ============================================
// CUSTOMIZATION OPTIONS
// ============================================
$customization_section = [
    'settings' => [
        'custom_css' => 'background: linear-gradient(135deg, var(--color-showcase-primary) 0%, var(--color-showcase-secondary) 100%); color: white;',
        'spacing_top' => '100px',
        'spacing_bottom' => '100px',
    ],
    'header' => [
        'heading' => [
            'title' => 'Endless Customization',
            'subtitle' => 'Control every aspect of your sections',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-content-grid lcms-content-grid--4col" style="gap: 24px;">
                <div class="lcms-card" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                    <div class="lcms-card__content">
                        <div style="font-size: 40px; margin-bottom: 16px;">🎨</div>
                        <h4 style="margin: 0 0 12px; font-size: 20px;">Dark Mode</h4>
                        <p style="margin: 0; line-height: 1.6; opacity: 0.95;">Toggle dark backgrounds with light text for visual variety.</p>
                    </div>
                </div>
                <div class="lcms-card" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                    <div class="lcms-card__content">
                        <div style="font-size: 40px; margin-bottom: 16px;">📐</div>
                        <h4 style="margin: 0 0 12px; font-size: 20px;">Custom Spacing</h4>
                        <p style="margin: 0; line-height: 1.6; opacity: 0.95;">Control top/bottom spacing for perfect rhythm.</p>
                    </div>
                </div>
                <div class="lcms-card" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                    <div class="lcms-card__content">
                        <div style="font-size: 40px; margin-bottom: 16px;">🎯</div>
                        <h4 style="margin: 0 0 12px; font-size: 20px;">Custom CSS</h4>
                        <p style="margin: 0; line-height: 1.6; opacity: 0.95;">Add inline styles or custom classes for unique designs.</p>
                    </div>
                </div>
                <div class="lcms-card" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3);">
                    <div class="lcms-card__content">
                        <div style="font-size: 40px; margin-bottom: 16px;">🔧</div>
                        <h4 style="margin: 0 0 12px; font-size: 20px;">CSS Variables</h4>
                        <p style="margin: 0; line-height: 1.6; opacity: 0.95;">Leverage global variables for brand consistency.</p>
                    </div>
                </div>
            </div>
        ',
    ],
];

partial('column', $customization_section, 'pro-sites');

// ============================================
// CALL TO ACTION
// ============================================
$cta_final = [
    'settings' => [
        'custom_id' => 'get-started',
        'custom_classes' => 'align-center',
    ],
    'header' => [
        'heading' => [
            'title' => 'Ready to Build?',
            'subtitle' => 'Start creating beautiful pages with Pro-Sites',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>The Pro-Sites partial system gives you everything you need to create professional, responsive pages quickly. Mix layouts, content types, and styling options to craft unique experiences without writing custom code.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'View Documentation',
                'url' => '/docs/partials/pro-sites.md',
                'style' => 'primary',
            ],
            [
                'text' => 'See Test Pages',
                'url' => '#',
                'style' => 'secondary',
            ],
            [
                'text' => 'GitHub Repository',
                'url' => '#',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $cta_final, 'pro-sites');
?>

<!-- Footer -->
<footer class="lcms-cta-section" style="background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%);">
    <div class="content-container">
        <div style="margin-bottom: 24px;">
            <h3 style="font-family: var(--font-heading); font-size: 32px; margin: 0 0 12px; font-weight: 700;">Pro-Sites Showcase</h3>
            <p style="margin: 0; opacity: 0.8; font-size: 18px;">Version 1.2.5 | LeanCMS Brand Hub</p>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 24px;">
            <p style="margin: 0; opacity: 0.6; font-size: 14px;">All layouts demonstrated: Column, 2-Column, Grid • All content types: Text, Image, Video, HTML, Stack, Card, Row</p>
            <p style="margin: 8px 0 0; opacity: 0.6; font-size: 14px;">Built with BEM methodology, designed for speed</p>
        </div>
    </div>
</footer>

<?php get_footer(); ?>
