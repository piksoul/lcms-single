<?php
/**
 * Pro-Sites Demo Showcase Template
 *
 * A visually enhanced showcase demonstrating all pro-sites partial capabilities.
 * Uses the v1.2.0+ layout-based approach with modern styling.
 *
 * Sections demonstrated:
 * - Grid layouts (3-column, 4-column, auto-fit cards)
 * - Column sections with all content types
 * - Stack content (vertical layouts)
 * - Card content (structured card layouts)
 * - Row content (horizontal layouts)
 * - 2-Column sections (mixed content types)
 * - Dark mode and custom styling
 *
 * @filepath templates/pages/test/slug-pro-sites-demo.php
 * @since 1.2.0
 * @updated 2025-11-18 - Enhanced showcase layout
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

<!-- 1. LeanCMS Design System - Phase 1-3 Components (Base + BEM Components) -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- 2. CSS Variables (Generated from config.php) -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
    /* Showcase custom colors */
    --color-showcase-primary: #667eea;
    --color-showcase-secondary: #764ba2;
    --color-showcase-accent: #f093fb;
    --color-showcase-success: #4facfe;
}
</style>

<!-- 3. Legacy Component Styles - Phase 4-5 (Hero, CTA, Brand Guide, etc.) -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- 4. Partial CSS auto-loads here via registry -->

<!-- Enhanced Hero Section -->
<div style="background: linear-gradient(135deg, var(--color-showcase-primary) 0%, var(--color-showcase-secondary) 100%); color: white; padding: 100px 0; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%); pointer-events: none;"></div>
    <div class="content-container" style="position: relative; z-index: 1;">
        <div style="display: inline-block; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 8px 24px; border-radius: 24px; font-size: 13px; font-weight: 700; margin-bottom: 24px; text-transform: uppercase; letter-spacing: 2px; border: 2px solid rgba(255,255,255,0.3);">
            Pro-Sites Partial System
        </div>
        <h1 style="font-family: var(--font-heading); font-size: 56px; margin: 0 0 20px; line-height: 1.2; text-shadow: 0 4px 16px rgba(0,0,0,0.2); font-weight: 800;">Build Beautiful Pages, Fast</h1>
        <p style="font-size: 24px; margin: 0 0 32px; opacity: 0.95; font-weight: 400; text-shadow: 0 2px 8px rgba(0,0,0,0.1); max-width: 800px; margin-left: auto; margin-right: auto;">A flexible, reusable content section framework with grid layouts, cards, stacks, and more</p>
        <div style="display: inline-flex; gap: 16px; flex-wrap: wrap; justify-content: center;">
            <a href="#features" style="background: white; color: var(--color-showcase-primary); padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.15); transition: transform 0.2s;">Explore Features</a>
            <a href="#examples" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); color: white; padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 16px; border: 2px solid rgba(255,255,255,0.4); transition: transform 0.2s;">View Examples</a>
        </div>
    </div>
</div>

<?php
// ============================================
// INTRODUCTION - Lead Format
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
// KEY FEATURES GRID - 3 Column Cards
// ============================================
$features_grid = [
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 40px; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--color-showcase-primary);">
                            <div style="font-size: 48px; margin-bottom: 20px;">⚡</div>
                            <h3 style="margin: 0 0 16px; font-size: 24px; font-weight: 700; color: var(--color-showcase-primary);">Lightning Fast</h3>
                            <p style="margin: 0; line-height: 1.7; color: #666;">Build pages in minutes, not hours. Pre-built partials with consistent patterns mean you can focus on content, not code.</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 40px; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--color-showcase-success);">
                            <div style="font-size: 48px; margin-bottom: 20px;">🎨</div>
                            <h3 style="margin: 0 0 16px; font-size: 24px; font-weight: 700; color: var(--color-showcase-success);">Fully Customizable</h3>
                            <p style="margin: 0; line-height: 1.7; color: #666;">Control every aspect with CSS variables, custom classes, spacing, dark mode, and inline styles. Your brand, your way.</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 40px; border-radius: 16px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--color-showcase-accent);">
                            <div style="font-size: 48px; margin-bottom: 20px;">📱</div>
                            <h3 style="margin: 0 0 16px; font-size: 24px; font-weight: 700; color: var(--color-showcase-accent);">Mobile Responsive</h3>
                            <p style="margin: 0; line-height: 1.7; color: #666;">All layouts automatically adapt to any screen size. Grid, 2-column, and stack layouts stack beautifully on mobile.</p>
                        </div>
                    ',
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
// LAYOUT SHOWCASE - Card Grid (Auto-Fit)
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
                            'html' => '<div style="text-align: center;"><h3 style="font-size: 48px; margin: 0 0 16px;">1️⃣</h3><h4 style="margin: 0 0 12px;">Single Column</h4><p style="margin: 0; opacity: 0.9;">Perfect for text, images, videos, or HTML. Clean, focused content presentation.</p></div>',
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
                            'html' => '<div style="text-align: center;"><h3 style="font-size: 48px; margin: 0 0 16px;">2️⃣</h3><h4 style="margin: 0 0 12px;">2-Column Layout</h4><p style="margin: 0; opacity: 0.9;">Image + text, video + buttons, or any content type combination with flexible widths.</p></div>',
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
                            'html' => '<div style="text-align: center;"><h3 style="font-size: 48px; margin: 0 0 16px;">📊</h3><h4 style="margin: 0 0 12px;">Grid Layout</h4><p style="margin: 0; opacity: 0.9;">Multi-item displays with 3, 4, or auto-responsive columns. Perfect for galleries and cards.</p></div>',
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
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(102,126,234,0.1) 0%, rgba(102,126,234,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-primary); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-primary);">📝 Text</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Standard, lead, or small formats. Perfect for paragraphs, lists, and formatted content.</p>
                            <code style="font-size: 12px; opacity: 0.7;">format: standard | lead | small</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(79,172,254,0.1) 0%, rgba(79,172,254,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-success); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-success);">🖼️ Images</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Display images with captions, alt text, and lazy loading support.</p>
                            <code style="font-size: 12px; opacity: 0.7;">src, alt, caption, lazy</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(240,147,251,0.1) 0%, rgba(240,147,251,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-accent); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-accent);">🎥 Videos</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Embed YouTube, Vimeo, or HTML5 videos with responsive sizing.</p>
                            <code style="font-size: 12px; opacity: 0.7;">youtube | vimeo | html5</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(118,75,162,0.1) 0%, rgba(118,75,162,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-secondary); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-secondary);">🔧 Custom HTML</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Insert any HTML for forms, embeds, or custom layouts.</p>
                            <code style="font-size: 12px; opacity: 0.7;">Full HTML control</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(102,126,234,0.1) 0%, rgba(102,126,234,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-primary); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-primary);">🔘 Buttons</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Call-to-action buttons with primary, secondary, and outline styles.</p>
                            <code style="font-size: 12px; opacity: 0.7;">style: primary | secondary | outline</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(79,172,254,0.1) 0%, rgba(79,172,254,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-success); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-success);">📚 Stack</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Vertically stack multiple content types with controlled spacing.</p>
                            <code style="font-size: 12px; opacity: 0.7;">items[], gap, align</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(240,147,251,0.1) 0%, rgba(240,147,251,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-accent); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-accent);">🃏 Card</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Structured cards with media, body, and footer sections.</p>
                            <code style="font-size: 12px; opacity: 0.7;">media, body, footer</code>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(118,75,162,0.1) 0%, rgba(118,75,162,0.05) 100%); padding: 32px; border-radius: 12px; border-left: 4px solid var(--color-showcase-secondary); height: 100%;">
                            <h4 style="margin: 0 0 12px; color: var(--color-showcase-secondary);">↔️ Row</h4>
                            <p style="margin: 0 0 12px; font-size: 14px; line-height: 1.6;">Horizontal layouts with flex control. Great for icon + text.</p>
                            <code style="font-size: 12px; opacity: 0.7;">items[], gap, align, justify</code>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '20px',
    ],
];

partial('grid', $content_types_grid, 'pro-sites');

// ============================================
// 2-COLUMN SHOWCASE - Image + Text
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
                        <ul>
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
// STACK CONTENT DEMONSTRATION
// ============================================
$stack_showcase = [
    'header' => [
        'heading' => [
            'title' => 'Stack Content for Vertical Layouts',
            'subtitle' => 'Combine multiple content types in a vertical flow',
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
			<div class="lcms-grid" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px;">
				<div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
					<div style="font-size: 40px; margin-bottom: 16px;">🎨</div>
					<h4 style="margin: 0 0 12px; font-size: 20px;">Dark Mode</h4>
					<p style="margin: 0; line-height: 1.6; opacity: 0.95;">Toggle dark backgrounds with light text for visual variety.</p>
				</div>
				<div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
					<div style="font-size: 40px; margin-bottom: 16px;">📐</div>
					<h4 style="margin: 0 0 12px; font-size: 20px;">Custom Spacing</h4>
					<p style="margin: 0; line-height: 1.6; opacity: 0.95;">Control top/bottom spacing for perfect rhythm.</p>
				</div>
				<div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
					<div style="font-size: 40px; margin-bottom: 16px;">🎯</div>
					<h4 style="margin: 0 0 12px; font-size: 20px;">Custom CSS</h4>
					<p style="margin: 0; line-height: 1.6; opacity: 0.95;">Add inline styles or custom classes for unique designs.</p>
				</div>
				<div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
					<div style="font-size: 40px; margin-bottom: 16px;">🔧</div>
					<h4 style="margin: 0 0 12px; font-size: 20px;">CSS Variables</h4>
					<p style="margin: 0; line-height: 1.6; opacity: 0.95;">Leverage global variables for brand consistency.</p>
				</div>
			</div>
        ',
    ],
];

partial('column', $customization_section, 'pro-sites');

// ============================================
// CALL TO ACTION - Final Section
// ============================================
$cta_final = [
    'settings' => [
        'custom_id' => 'get-started',
		'custom_classes' => 'align-center'
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
        'text' => '<p style="text-align: center;">The Pro-Sites partial system gives you everything you need to create professional, responsive pages quickly. Mix layouts, content types, and styling options to craft unique experiences without writing custom code.</p>',
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

<!-- Enhanced Footer -->
<div style="background: linear-gradient(135deg, #2d3748 0%, #1a202c 100%); color: white; padding: 60px 0; text-align: center;">
    <div class="content-container">
        <div style="margin-bottom: 24px;">
            <h3 style="font-family: var(--font-heading); font-size: 32px; margin: 0 0 12px; font-weight: 700;">Pro-Sites Showcase</h3>
            <p style="margin: 0; opacity: 0.8; font-size: 18px;">Version 1.2.4 | LeanCMS Brand Hub</p>
        </div>
        <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 24px;">
            <p style="margin: 0; opacity: 0.6; font-size: 14px;">All layouts demonstrated: Column, 2-Column, Grid • All content types: Text, Image, Video, HTML, Stack, Card, Row</p>
            <p style="margin: 8px 0 0; opacity: 0.6; font-size: 14px;">Built with flexibility, designed for speed</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
