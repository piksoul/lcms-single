<?php
/**
 * Pro-Sites Grid Section Test Template
 *
 * Tests grid-section partial with various grid layouts.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-grid.php
 * @since 1.2.3
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => 'Grid Section Tests',
    'subtitle' => 'Testing grid-section partial with CSS Grid layouts',
], 'top-section');
?>

<?php
// =============================================================================
// Test 1: Basic 3-Column Image Grid (Fixed Columns)
// =============================================================================
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1: Fixed Columns',
            'title' => '3-Column Image Grid',
            'subtitle' => 'Fixed column count with grid-template-columns: repeat(3, 1fr)',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Image 1',
                    'caption' => 'Grid Item 1',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Image 2',
                    'caption' => 'Grid Item 2',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Image 3',
                    'caption' => 'Grid Item 3',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder4.jpg',
                    'alt' => 'Image 4',
                    'caption' => 'Grid Item 4',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Image 5',
                    'caption' => 'Grid Item 5',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Image 6',
                    'caption' => 'Grid Item 6',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test1, 'pro-sites');

// =============================================================================
// Test 2: Auto-Fit Grid (Responsive)
// =============================================================================
$test2 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 2: Auto-Fit',
            'title' => 'Auto-Responsive Card Grid',
            'subtitle' => 'Using auto-fit with minmax(250px, 1fr) for automatic responsive columns',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Feature One</h3><p>This grid automatically adjusts the number of columns based on available space. Resize your browser to see it in action!</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Feature Two</h3><p>Each card has a minimum width of 250px and will grow to fill available space equally.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Feature Three</h3><p>The auto-fit keyword automatically creates as many columns as will fit in the container.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Feature Four</h3><p>Perfect for product grids, feature showcases, and card-based layouts.</p>',
                ],
            ],
        ],
        'columns' => 'auto-fit',
        'min-width' => '250px',
        'gap' => '30px',
    ],
];
partial('grid', $test2, 'pro-sites');

// =============================================================================
// Test 3: 4-Column Product Grid
// =============================================================================
$test3 = [
    'header' => [
        'heading' => [
            'label' => 'Test 3: Product Grid',
            'title' => '4-Column Product Showcase',
            'subtitle' => 'Fixed 4-column layout for product displays',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Product 1',
                    'caption' => 'Product Name - $99',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Product 2',
                    'caption' => 'Product Name - $149',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Product 3',
                    'caption' => 'Product Name - $79',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder4.jpg',
                    'alt' => 'Product 4',
                    'caption' => 'Product Name - $199',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Product 5',
                    'caption' => 'Product Name - $129',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Product 6',
                    'caption' => 'Product Name - $89',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Product 7',
                    'caption' => 'Product Name - $159',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder4.jpg',
                    'alt' => 'Product 8',
                    'caption' => 'Product Name - $119',
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '24px',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'View All Products',
                'url' => '#',
                'style' => 'primary',
            ],
        ],
    ],
];
partial('grid', $test3, 'pro-sites');

// =============================================================================
// Test 4: Video Gallery Grid
// =============================================================================
$test4 = [
    'header' => [
        'heading' => [
            'label' => 'Test 4: Video Grid',
            'title' => 'Video Gallery Layout',
            'subtitle' => '2-column video grid with embedded YouTube videos',
            'align' => 'left',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'video',
                'content' => [
                    'video' => [
                        'type' => 'youtube',
                        'src' => 'dQw4w9WgXcQ',
                    ],
                ],
            ],
            [
                'type' => 'video',
                'content' => [
                    'video' => [
                        'type' => 'youtube',
                        'src' => 'dQw4w9WgXcQ',
                    ],
                ],
            ],
            [
                'type' => 'video',
                'content' => [
                    'video' => [
                        'type' => 'youtube',
                        'src' => 'dQw4w9WgXcQ',
                    ],
                ],
            ],
            [
                'type' => 'video',
                'content' => [
                    'video' => [
                        'type' => 'youtube',
                        'src' => 'dQw4w9WgXcQ',
                    ],
                ],
            ],
        ],
        'columns' => 2,
        'gap' => '40px',
    ],
];
partial('grid', $test4, 'pro-sites');

// =============================================================================
// Test 5: Mixed Content Grid
// =============================================================================
$test5 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 5: Mixed Content',
            'title' => 'Grid with Mixed Content Types',
            'subtitle' => 'Combining text, images, and videos in a single grid layout',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Text Content</h3><p>This grid demonstrates mixing different content types. You can combine text, images, videos, HTML, and even buttons in the same grid.</p>',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Mixed grid image',
                    'caption' => 'Image in grid',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>More Text</h3><p>Each grid item can be a different content type, making this layout extremely flexible for various use cases.</p>',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Another image',
                    'caption' => 'Another image',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '<div style="padding: 20px; background: rgba(255,255,255,0.1); border-radius: 8px; text-align: center;"><h4>Custom HTML</h4><p>You can also include custom HTML in grid items for maximum flexibility.</p></div>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h3>Final Item</h3><p>The grid automatically handles different content heights and maintains a clean, organized layout.</p>',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Learn More',
                'url' => '#',
                'style' => 'primary',
            ],
            [
                'text' => 'View Examples',
                'url' => '#',
                'style' => 'outline',
            ],
        ],
    ],
];
partial('grid', $test5, 'pro-sites');

// =============================================================================
// Test 6: Auto-Fill Grid with Larger Min Width
// =============================================================================
$test6 = [
    'header' => [
        'heading' => [
            'label' => 'Test 6: Auto-Fill',
            'title' => 'Auto-Fill with 350px Minimum',
            'subtitle' => 'Using auto-fill creates empty columns if there\'s extra space',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Gallery image 1',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Gallery image 2',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Gallery image 3',
                ],
            ],
        ],
        'columns' => 'auto-fill',
        'min-width' => '350px',
        'gap' => '30px',
    ],
];
partial('grid', $test6, 'pro-sites');

// =============================================================================
// Test 7: Compact 5-Column Grid
// =============================================================================
$test7 = [
    'settings' => [
        'spacing_top' => '40px',
        'spacing_bottom' => '40px',
    ],
    'header' => [
        'heading' => [
            'title' => '5-Column Compact Grid',
            'subtitle' => 'Tighter spacing with smaller gap',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => array_fill(0, 10, [
            'type' => 'image',
            'content' => [
                'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                'alt' => 'Grid item',
            ],
        ]),
        'columns' => 5,
        'gap' => '16px',
    ],
];
partial('grid', $test7, 'pro-sites');

// =============================================================================
// Test 8: Text Cards Grid
// =============================================================================
$test8 = [
    'header' => [
        'heading' => [
            'label' => 'Test 8: Feature Cards',
            'title' => 'Text-Based Feature Grid',
            'subtitle' => 'Perfect for feature listings and benefit showcases',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>🚀 Fast Performance</h4><p>Optimized for speed with lazy loading and efficient rendering.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>📱 Responsive Design</h4><p>Looks great on all devices from mobile to desktop.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>🎨 Customizable</h4><p>Fully themeable with CSS variables and custom styles.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>♿ Accessible</h4><p>Built with accessibility in mind following WCAG guidelines.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>🔧 Developer Friendly</h4><p>Clean API and consistent patterns across all components.</p>',
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>📚 Well Documented</h4><p>Comprehensive documentation with examples and guides.</p>',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test8, 'pro-sites');

// =============================================================================
// Test 9: Custom Spacing and Styling
// =============================================================================
$test9 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_css' => 'background: var(--color-background-light);',
        'custom_classes' => 'featured-grid',
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 9: Custom Settings',
            'title' => 'Grid with Custom Spacing & Styling',
            'subtitle' => 'Extra padding and background color applied',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                    'alt' => 'Featured item 1',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Featured item 2',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Featured item 3',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '40px',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'View Gallery', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];
partial('grid', $test9, 'pro-sites');

// =============================================================================
// Test 10: Button Grid
// =============================================================================
$test10 = [
    'header' => [
        'heading' => [
            'label' => 'Test 10: Button Grid',
            'title' => 'Grid of Action Buttons',
            'subtitle' => 'Use buttons content type for navigation grids',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'buttons',
                'content' => [
                    'buttons' => [
                        ['text' => 'Documentation', 'url' => '#', 'style' => 'primary'],
                    ],
                ],
            ],
            [
                'type' => 'buttons',
                'content' => [
                    'buttons' => [
                        ['text' => 'Examples', 'url' => '#', 'style' => 'secondary'],
                    ],
                ],
            ],
            [
                'type' => 'buttons',
                'content' => [
                    'buttons' => [
                        ['text' => 'Get Started', 'url' => '#', 'style' => 'primary'],
                    ],
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test10, 'pro-sites');

// =============================================================================
// Test 11: Stack Content Type
// =============================================================================
$test11 = [
    'header' => [
        'heading' => [
            'label' => 'Test 11: Stack',
            'title' => 'Stacked Content Items',
            'subtitle' => 'Multiple content types stacked vertically in each grid item',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'stack',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                                'alt' => 'Product 1',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h3>Product One</h3><p>Stack content allows you to combine multiple content types in a single grid item.</p>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Learn More', 'url' => '#', 'style' => 'primary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                ],
            ],
            [
                'type' => 'stack',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                                'alt' => 'Product 2',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h3>Product Two</h3><p>Each stack item is independently rendered using existing content renderers.</p>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'View Details', 'url' => '#', 'style' => 'secondary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                ],
            ],
            [
                'type' => 'stack',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                                'alt' => 'Product 3',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h3>Product Three</h3><p>Perfect for product showcases, team members, or feature cards.</p>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Buy Now', 'url' => '#', 'style' => 'primary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test11, 'pro-sites');

// =============================================================================
// Test 12: Card Content Type
// =============================================================================
$test12 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 12: Card',
            'title' => 'Card-Style Grid Items',
            'subtitle' => 'Structured card layout with media, body, and footer sections',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'card',
                'content' => [
                    'media' => [
                        'type' => 'image',
                        'content' => [
                            'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                            'alt' => 'Feature 1',
                        ],
                    ],
                    'body' => [
                        'type' => 'text',
                        'content' => [
                            'text' => '<h3>Featured Product</h3><p>Card layout provides a structured format with optional media, body, and footer sections.</p>',
                        ],
                    ],
                    'footer' => [
                        'type' => 'buttons',
                        'content' => [
                            'buttons' => [
                                ['text' => 'View Product', 'url' => '#', 'style' => 'primary'],
                            ],
                        ],
                    ],
                    'padding' => '20px',
                    'border' => false,
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'media' => [
                        'type' => 'image',
                        'content' => [
                            'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                            'alt' => 'Feature 2',
                        ],
                    ],
                    'body' => [
                        'type' => 'text',
                        'content' => [
                            'text' => '<h3>Premium Design</h3><p>Cards support borders, shadows, and hover effects for a polished appearance.</p>',
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
                    'border' => false,
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'media' => [
                        'type' => 'image',
                        'content' => [
                            'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                            'alt' => 'Feature 3',
                        ],
                    ],
                    'body' => [
                        'type' => 'text',
                        'content' => [
                            'text' => '<h3>Flexible Content</h3><p>Each card section can use different content types for maximum flexibility.</p>',
                        ],
                    ],
                    'footer' => [
                        'type' => 'buttons',
                        'content' => [
                            'buttons' => [
                                ['text' => 'Get Started', 'url' => '#', 'style' => 'primary'],
                            ],
                        ],
                    ],
                    'padding' => '20px',
                    'border' => false,
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test12, 'pro-sites');

// =============================================================================
// Test 13: Mixed Stack and Card
// =============================================================================
$test13 = [
    'header' => [
        'heading' => [
            'label' => 'Test 13: Mixed Types',
            'title' => 'Combining Stack, Card, and Simple Content',
            'subtitle' => 'Demonstrates flexibility of mixing different grid item types',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'card',
                'content' => [
                    'media' => [
                        'type' => 'image',
                        'content' => [
                            'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                            'alt' => 'Card item',
                        ],
                    ],
                    'body' => [
                        'type' => 'text',
                        'content' => [
                            'text' => '<h4>Card Item</h4><p>A card with shadow and border.</p>',
                        ],
                    ],
                    'padding' => '15px',
                    'border' => true,
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'text',
                'content' => [
                    'text' => '<h4>Simple Text</h4><p>A simple text grid item without special formatting.</p>',
                ],
            ],
            [
                'type' => 'stack',
                'content' => [
                    'items' => [
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Stack Item</h4><p>Combining text and buttons.</p>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Action', 'url' => '#', 'style' => 'secondary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '15px',
                ],
            ],
            [
                'type' => 'image',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                    'alt' => 'Simple image',
                    'caption' => 'Simple image item',
                ],
            ],
        ],
        'columns' => 2,
        'gap' => '30px',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'View All Examples', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];
partial('grid', $test13, 'pro-sites');

// =============================================================================
// Test 14: Row Content Type
// =============================================================================
$test14 = [
    'header' => [
        'heading' => [
            'label' => 'Test 14: Row',
            'title' => 'Horizontal Row Layouts',
            'subtitle' => 'Multiple content types arranged horizontally with flexbox',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
                                'alt' => 'Icon',
                            ],
                            'width' => '80px',
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Feature One</h4><p>Row layout arranges content horizontally. Perfect for icon + text combinations.</p>',
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                    'justify' => 'start',
                ],
            ],
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
                                'alt' => 'Icon',
                            ],
                            'width' => '80px',
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Feature Two</h4><p>Control vertical alignment (top, center, bottom) and horizontal spacing.</p>',
                            ],
                        ],
                    ],
                    'gap' => '20px',
                    'align' => 'center',
                    'justify' => 'start',
                ],
            ],
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'image',
                            'content' => [
                                'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                                'alt' => 'Icon',
                            ],
                            'width' => '80px',
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Feature Three</h4><p>Each row item can have an optional width for precise layout control.</p>',
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
        'gap' => '30px',
    ],
];
partial('grid', $test14, 'pro-sites');

// =============================================================================
// Test 15: Row with Different Alignments
// =============================================================================
$test15 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 15: Row Alignment',
            'title' => 'Row Justify and Align Options',
            'subtitle' => 'Demonstrating different horizontal and vertical alignment options',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Left Aligned</h4>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Action', 'url' => '#', 'style' => 'primary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '15px',
                    'align' => 'center',
                    'justify' => 'start',
                ],
            ],
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Centered</h4>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Action', 'url' => '#', 'style' => 'secondary'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '15px',
                    'align' => 'center',
                    'justify' => 'center',
                ],
            ],
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '<h4>Space Between</h4>',
                            ],
                        ],
                        [
                            'type' => 'buttons',
                            'content' => [
                                'buttons' => [
                                    ['text' => 'Action', 'url' => '#', 'style' => 'outline'],
                                ],
                            ],
                        ],
                    ],
                    'gap' => '15px',
                    'align' => 'center',
                    'justify' => 'space-between',
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '30px',
    ],
];
partial('grid', $test15, 'pro-sites');

// =============================================================================
// Test 16: BEM Metric Cards Grid
// =============================================================================
$test16 = [
    'header' => [
        'heading' => [
            'label' => 'Test 16: Template Library',
            'title' => 'BEM Metric Cards Grid',
            'subtitle' => 'Template Library metric-card components in 4-column grid',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-metric-card lcms-metric-card--success">
                            <div class="lcms-metric-card__icon">✅</div>
                            <div class="lcms-metric-card__value">98%</div>
                            <div class="lcms-metric-card__label">Success Rate</div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-metric-card lcms-metric-card--warning">
                            <div class="lcms-metric-card__icon">⏱️</div>
                            <div class="lcms-metric-card__value">24hrs</div>
                            <div class="lcms-metric-card__label">Avg Response</div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-metric-card lcms-metric-card--info">
                            <div class="lcms-metric-card__icon">👥</div>
                            <div class="lcms-metric-card__value">2,500+</div>
                            <div class="lcms-metric-card__label">Active Users</div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-metric-card">
                            <div class="lcms-metric-card__icon">🚀</div>
                            <div class="lcms-metric-card__value">350+</div>
                            <div class="lcms-metric-card__label">Projects</div>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '24px',
    ],
];
partial('grid', $test16, 'pro-sites');

// =============================================================================
// Test 17: BEM Badge Grid
// =============================================================================
$test17 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 17: BEM Badges',
            'title' => 'Status Badges Grid',
            'subtitle' => 'Template Library badge component in various states',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-card" style="padding: 24px; text-align: center;">
                            <span class="lcms-badge lcms-badge--success">Active</span>
                            <h4 style="margin: 16px 0 8px;">Success State</h4>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;">Used for completed items</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-card" style="padding: 24px; text-align: center;">
                            <span class="lcms-badge lcms-badge--warning">Pending</span>
                            <h4 style="margin: 16px 0 8px;">Warning State</h4>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;">Used for in-progress items</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-card" style="padding: 24px; text-align: center;">
                            <span class="lcms-badge lcms-badge--error">Error</span>
                            <h4 style="margin: 16px 0 8px;">Error State</h4>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;">Used for failed items</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-card" style="padding: 24px; text-align: center;">
                            <span class="lcms-badge lcms-badge--info">New</span>
                            <h4 style="margin: 16px 0 8px;">Info State</h4>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;">Used for informational items</p>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 4,
        'gap' => '24px',
    ],
];
partial('grid', $test17, 'pro-sites');
?>

<?php get_footer(); ?>
