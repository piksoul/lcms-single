<?php
/**
 * Pro-Sites 2-Column Section Test Template
 *
 * Tests 2-column section partial with various content combinations.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-2-column.php
 * @since 1.1.6
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => '2-Column Section Tests',
    'subtitle' => 'Testing 2-column partial with various content combinations',
], 'top-section');
?>

<?php
// Test 1: Image + Text with BEM Badge (50/50)
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1: BEM Badge',
            'title' => 'Image + Text with Status Badge',
            'subtitle' => 'Showcasing BEM badge component integration',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Feature Image',
                    'lazy' => true,
                ],
                'width' => '50%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack" style="gap: 20px;">
                            <span class="lcms-badge lcms-badge--success">New Feature</span>
                            <h3>Powerful Features</h3>
                            <p>This two-column layout combines an image with descriptive text. Notice the <strong>BEM badge component</strong> (lcms-badge) showcasing status or categories.</p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item">Equal width columns (50% each)</li>
                                <li class="lcms-list__item">Responsive mobile stacking</li>
                                <li class="lcms-list__item">BEM component integration</li>
                            </ul>
                        </div>
                    ',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
    ],
];
partial('2-column', $test1, 'pro-sites');

// Test 2: Text with Progress Bars + Image (40/60)
$test2 = [
    'header' => [
        'heading' => [
            'label' => 'Test 2: Progress Bars',
            'title' => 'Project Progress + Showcase',
            'subtitle' => 'BEM progress-bar-large component in 40/60 layout',
            'align' => 'left',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack" style="gap: 24px;">
                            <h3>Project Milestones</h3>
                            <p>This layout uses a 40/60 split. The left column showcases <strong>BEM progress-bar-large components</strong> for tracking completion.</p>

                            <div class="lcms-progress-bar-large">
                                <div class="lcms-progress-bar-large__header">
                                    <span class="lcms-progress-bar-large__label">Design Phase</span>
                                    <span class="lcms-progress-bar-large__percentage">100%</span>
                                </div>
                                <div class="lcms-progress-bar-large__track">
                                    <div class="lcms-progress-bar-large__fill lcms-progress-bar-large__fill--success" style="width: 100%;"></div>
                                </div>
                            </div>

                            <div class="lcms-progress-bar-large">
                                <div class="lcms-progress-bar-large__header">
                                    <span class="lcms-progress-bar-large__label">Development</span>
                                    <span class="lcms-progress-bar-large__percentage">65%</span>
                                </div>
                                <div class="lcms-progress-bar-large__track">
                                    <div class="lcms-progress-bar-large__fill lcms-progress-bar-large__fill--warning" style="width: 65%;"></div>
                                </div>
                            </div>

                            <div class="lcms-progress-bar-large">
                                <div class="lcms-progress-bar-large__header">
                                    <span class="lcms-progress-bar-large__label">Testing</span>
                                    <span class="lcms-progress-bar-large__percentage">20%</span>
                                </div>
                                <div class="lcms-progress-bar-large__track">
                                    <div class="lcms-progress-bar-large__fill" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>
                    ',
                ],
                'width' => '40%',
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Project Showcase',
                    'caption' => 'Larger image column (60% width)',
                    'lazy' => true,
                ],
                'width' => '60%',
            ],
        ],
        'gap' => '60px',
    ],
];
partial('2-column', $test2, 'pro-sites');

// Test 3: Video + Text
$test3 = [
    'header' => [
        'heading' => [
            'label' => 'Test 3',
            'title' => 'Video + Text',
            'subtitle' => 'Combine different content types',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'video',
                'content' => [
                    'type' => 'youtube',
                    'src' => 'dQw4w9WgXcQ',
                    'width' => '100%',
                    'height' => '300px',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Watch & Learn</h3><p>Two-column sections support any content type in each column. This example combines a YouTube video with explanatory text.</p><p>The responsive design ensures both columns stack gracefully on mobile devices.</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
    ],
];
partial('2-column', $test3, 'pro-sites');

// Test 4: Text + Buttons
$test4 = [
    'header' => [
        'heading' => [
            'label' => 'Test 4',
            'title' => 'Text + Buttons',
            'subtitle' => 'Call-to-action layouts',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Ready to Get Started?</h3><p>Combine text content with a button column to create effective call-to-action sections. Perfect for landing pages and conversion-focused layouts.</p>',
                    'format' => 'lead',
                ],
                'width' => '60%',
            ],
            [
                'type' => 'buttons',
                'content' => [
                    'buttons' => [
                        ['text' => 'Start Free Trial', 'url' => '#', 'style' => 'primary'],
                        ['text' => 'View Pricing', 'url' => '#', 'style' => 'secondary'],
                        ['text' => 'Contact Sales', 'url' => '#', 'style' => 'outline'],
                    ],
                ],
                'width' => '40%',
            ],
        ],
        'gap' => '50px',
    ],
];
partial('2-column', $test4, 'pro-sites');

// Test 5: Dark mode
$test5 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 5',
            'title' => '2-Column in Dark Mode',
            'subtitle' => 'All content types work in dark theme',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Example Image',
                    'lazy' => true,
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Dark Mode Support</h3><p>Two-column sections work seamlessly in dark mode with automatic color adjustments for all content types.</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Learn More', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];
partial('2-column', $test5, 'pro-sites');

// Test 6: Reverse on mobile
$test6 = [
    'header' => [
        'heading' => [
            'label' => 'Test 6',
            'title' => 'Reverse Column Order on Mobile',
            'subtitle' => 'Image first on desktop, text first on mobile',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder4.jpg',
                    'alt' => 'Feature Image',
                    'caption' => 'Shows first on desktop, second on mobile',
                    'lazy' => true,
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Mobile Optimization</h3><p>The <code>reverse: true</code> setting reverses column order on mobile devices. This ensures text appears before images on small screens for better user experience.</p><p>Resize your browser to see it in action!</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
        'reverse' => true,
    ],
];
partial('2-column', $test6, 'pro-sites');

// Test 7: BEM Metric Cards + Text
$test7 = [
    'header' => [
        'heading' => [
            'label' => 'Test 7: Metric Cards',
            'title' => 'BEM Metric Cards + Description',
            'subtitle' => 'Template Library metric-card component',
            'align' => 'left',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack" style="gap: 20px;">
                            <div class="lcms-metric-card lcms-metric-card--success">
                                <div class="lcms-metric-card__icon">📊</div>
                                <div class="lcms-metric-card__value">2,500+</div>
                                <div class="lcms-metric-card__label">Happy Clients</div>
                            </div>

                            <div class="lcms-metric-card lcms-metric-card--warning">
                                <div class="lcms-metric-card__icon">⭐</div>
                                <div class="lcms-metric-card__value">4.9/5</div>
                                <div class="lcms-metric-card__label">Average Rating</div>
                            </div>

                            <div class="lcms-metric-card">
                                <div class="lcms-metric-card__icon">🚀</div>
                                <div class="lcms-metric-card__value">350+</div>
                                <div class="lcms-metric-card__label">Projects Launched</div>
                            </div>
                        </div>
                    ',
                ],
                'width' => '40%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack" style="gap: 16px;">
                            <span class="lcms-badge lcms-badge--info">Template Library</span>
                            <h3>BEM Metric Card Component</h3>
                            <p>The left column showcases the <strong>lcms-metric-card</strong> component from the Template Library. These cards use proper BEM naming conventions:</p>
                            <ul class="lcms-list lcms-list--bullet">
                                <li class="lcms-list__item"><code>.lcms-metric-card</code> (block)</li>
                                <li class="lcms-list__item"><code>.lcms-metric-card__value</code> (element)</li>
                                <li class="lcms-list__item"><code>.lcms-metric-card--success</code> (modifier)</li>
                            </ul>
                            <p>Perfect for dashboards, reports, and data visualization.</p>
                        </div>
                    ',
                ],
                'width' => '60%',
            ],
        ],
        'gap' => '40px',
    ],
];
partial('2-column', $test7, 'pro-sites');

// Test 8: Custom gap spacing
$test8 = [
    'header' => [
        'heading' => [
            'title' => 'Custom Gap Spacing',
            'subtitle' => '80px gap between columns',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Flexible Spacing</h3><p>The gap parameter controls spacing between columns. This example uses 80px for generous whitespace.</p>',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Visual Separation</h3><p>Larger gaps create more visual separation between content, perfect for distinct topics or contrasting information.</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '80px',
    ],
];
partial('2-column', $test8, 'pro-sites');

// Test 9: Section-level buttons
$test9 = [
    'header' => [
        'heading' => [
            'title' => '2-Column with Section Buttons',
            'subtitle' => 'Buttons appear after columns',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Column Content</h3><p>This two-column section demonstrates section-level buttons that appear below the columns.</p>',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>More Content</h3><p>The buttons parameter adds call-to-action buttons after all column content has been displayed.</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '40px',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Primary Action', 'url' => '#', 'style' => 'primary'],
            ['text' => 'Secondary Action', 'url' => '#', 'style' => 'secondary'],
        ],
    ],
];
partial('2-column', $test9, 'pro-sites');

// Test 10: Custom spacing and styling
$test10 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_css' => 'background: var(--color-background-light);',
        'custom_classes' => 'featured-2col',
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 10',
            'title' => 'Custom Spacing & Styling',
            'subtitle' => 'Extra padding and background color',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Customizable</h3><p>Like all pro-sites sections, 2-column layouts support custom spacing, IDs, classes, CSS, and data attributes.</p>',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Consistent API</h3><p>The same settings array works across all section types, making the system predictable and easy to learn.</p>',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '60px',
    ],
];
partial('2-column', $test10, 'pro-sites');
?>

<?php get_footer(); ?>
