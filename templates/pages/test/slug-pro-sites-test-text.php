<?php
/**
 * Pro-Sites Column Section Test Template (Text Content)
 *
 * Tests column partial with text content type using various configurations and formats.
 * Demonstrates the new v1.2.0+ layout-based approach.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-text.php
 * @since 1.1.6
 * @updated 1.2.1 - Migrated to column partial
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => 'Column Section Tests (Text Content)',
    'subtitle' => 'Testing new column partial with text content type (v1.2.0+)',
], 'top-section');
?>

<?php
// Test 1: Basic text with centered heading
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1',
            'title' => 'Basic Text Section',
            'subtitle' => 'Centered heading with standard format',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This is a basic text section with standard formatting. The content uses the default font size and line height for optimal readability.</p><p>Multiple paragraphs are supported with proper spacing.</p>',
        'format' => 'standard',
    ],
];
partial('column', $test1, 'pro-sites');

// Test 2: Lead format with left alignment
$test2 = [
    'header' => [
        'heading' => [
            'label' => 'Test 2',
            'title' => 'Lead Text Format',
            'subtitle' => 'Larger text for emphasis',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This text uses the <strong>lead format</strong> which displays larger, more prominent text. Perfect for introductory paragraphs or key messaging.</p>',
        'format' => 'lead',
    ],
];
partial('column', $test2, 'pro-sites');

// Test 3: Small format with right alignment
$test3 = [
    'header' => [
        'heading' => [
            'title' => 'Small Text Format',
            'align' => 'right',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This text uses the small format for fine print, disclaimers, or supplementary information. The font size is reduced for less prominent content.</p>',
        'format' => 'small',
    ],
];
partial('column', $test3, 'pro-sites');

// Test 4: Dark mode with buttons
$test4 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 4',
            'title' => 'Dark Mode with Buttons',
            'subtitle' => 'White text on dark background',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This section demonstrates dark mode styling with inverted colors. All text and buttons automatically adapt to the dark background.</p>',
        'format' => 'standard',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Primary Button', 'url' => '#', 'style' => 'primary'],
            ['text' => 'Secondary Button', 'url' => '#', 'style' => 'secondary'],
            ['text' => 'Outline Button', 'url' => '#', 'style' => 'outline'],
        ],
    ],
];
partial('column', $test4, 'pro-sites');

// Test 5: Custom spacing and ID
$test5 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_id' => 'custom-spacing-section',
        'custom_classes' => 'highlight-section',
    ],
    'header' => [
        'heading' => [
            'title' => 'Custom Spacing',
            'subtitle' => 'Extra padding top and bottom (120px each)',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This section has custom spacing with 120px padding on top and bottom, versus the default 80px. It also has a custom ID (#custom-spacing-section) and custom class (.highlight-section).</p>',
    ],
];
partial('column', $test5, 'pro-sites');

// Test 6: Only heading (no content)
$test6 = [
    'header' => [
        'heading' => [
            'label' => 'Test 6',
            'title' => 'Heading Only Section',
            'subtitle' => 'No content, no buttons - just the heading',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '',
    ],
];
partial('column', $test6, 'pro-sites');

// Test 7: Only content (no heading, no buttons)
$test7 = [
    'content' => [
        'type' => 'text',
        'text' => '<p><strong>Content only section:</strong> This section has no heading and no buttons, just pure content text. Useful for simple text blocks that don\'t need additional structure.</p>',
    ],
];
partial('column', $test7, 'pro-sites');

// Test 8: Rich HTML content
$test8 = [
    'header' => [
        'heading' => [
            'title' => 'Rich HTML Content',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <p>Text sections support rich HTML formatting:</p>
            <ul>
                <li><strong>Bold text</strong> for emphasis</li>
                <li><em>Italic text</em> for subtle emphasis</li>
                <li><a href="#">Links</a> for navigation</li>
                <li>Lists (ordered and unordered)</li>
                <li>And much more...</li>
            </ul>
            <blockquote style="border-left: 4px solid var(--color-brand-accent); padding-left: 20px; margin: 20px 0; font-style: italic;">
                "This is a blockquote example demonstrating custom HTML styling within text sections."
            </blockquote>
        ',
    ],
];
partial('column', $test8, 'pro-sites');

// Test 9: Inline custom CSS
$test9 = [
    'settings' => [
        'custom_css' => 'background: linear-gradient(135deg, var(--color-brand-primary) 0%, var(--color-brand-secondary) 100%); color: white;',
    ],
    'header' => [
        'heading' => [
            'title' => 'Inline Custom CSS',
            'subtitle' => 'Gradient background via custom_css setting',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This section uses inline custom CSS to apply a gradient background. The custom_css setting allows for flexible styling without modifying theme files.</p>',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Learn More', 'url' => '#', 'style' => 'outline'],
        ],
    ],
];
partial('column', $test9, 'pro-sites');

// Test 10: Data attributes
$test10 = [
    'settings' => [
        'custom_id' => 'tracked-section',
        'data_attrs' => [
            'track-event' => 'view_section',
            'category' => 'engagement',
            'label' => 'text-test',
        ],
    ],
    'header' => [
        'heading' => [
            'title' => 'Data Attributes for Tracking',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>This section includes custom data attributes for analytics tracking. Inspect the section element to see data-track-event, data-category, and data-label attributes.</p>',
    ],
];
partial('column', $test10, 'pro-sites');

// Test 11: BEM List Variants
$test11 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 11: BEM Lists',
            'title' => 'BEM List Component Variants',
            'subtitle' => 'Bullet, check, and number list styles',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div class="lcms-stack" style="gap: 32px;">
                    <div>
                        <h4>Check List (lcms-list--check)</h4>
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item">BEM component integration</li>
                            <li class="lcms-list__item">Responsive mobile design</li>
                            <li class="lcms-list__item">Dark mode support</li>
                            <li class="lcms-list__item">Accessibility compliance</li>
                        </ul>
                    </div>

                    <div>
                        <h4>Bullet List (lcms-list--bullet)</h4>
                        <ul class="lcms-list lcms-list--bullet">
                            <li class="lcms-list__item">Template Library patterns</li>
                            <li class="lcms-list__item">Pro-Sites partial system</li>
                            <li class="lcms-list__item">CSS variable customization</li>
                            <li class="lcms-list__item">Consistent configuration API</li>
                        </ul>
                    </div>

                    <div>
                        <h4>Numbered List (lcms-list--number)</h4>
                        <ol class="lcms-list lcms-list--number">
                            <li class="lcms-list__item">Read the documentation</li>
                            <li class="lcms-list__item">Review example templates</li>
                            <li class="lcms-list__item">Copy component structure</li>
                            <li class="lcms-list__item">Customize content</li>
                        </ol>
                    </div>
                </div>
            ',
        ],
    ],
];
partial('column', $test11, 'pro-sites');

// Test 12: Text with BEM Badges
$test12 = [
    'header' => [
        'heading' => [
            'label' => 'Test 12: Inline Badges',
            'title' => 'Text Content with Status Badges',
            'subtitle' => 'Combining text with BEM badge components',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div class="lcms-stack" style="gap: 20px;">
                    <p><span class="lcms-badge lcms-badge--success">Version 2.1.1</span> is now available with enhanced Template Library support and new BEM components.</p>

                    <p>This release includes <span class="lcms-badge lcms-badge--info">New</span> numbered timeline patterns and <span class="lcms-badge lcms-badge--warning">Beta</span> FAQ list components.</p>

                    <p>All BEM components follow the <code>lcms-</code> naming convention and support modifier classes like <code>--success</code>, <code>--warning</code>, <code>--error</code>, and <code>--info</code>.</p>

                    <div class="lcms-card" style="padding: 24px; margin-top: 24px;">
                        <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 12px;">
                            <span class="lcms-badge lcms-badge--success">Stable</span>
                            <span class="lcms-badge lcms-badge--info">v2.1.1</span>
                            <span class="lcms-badge">Production Ready</span>
                        </div>
                        <h4 style="margin: 0 0 8px;">Template Library System</h4>
                        <p style="margin: 0;">A comprehensive system for building brand-consistent pages using reusable BEM components and AI-guided composition.</p>
                    </div>
                </div>
            ',
        ],
    ],
];
partial('column', $test12, 'pro-sites');
?>

<?php get_footer(); ?>
