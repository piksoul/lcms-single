<?php
/**
 * Pro-Sites Column Section Test Template (Image Content)
 *
 * Tests column partial with image content type using various configurations.
 * Demonstrates the new v1.2.0+ layout-based approach.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-image.php
 * @since 1.1.6
 * @updated 1.2.1 - Migrated to column partial
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => 'Column Section Tests (Image Content)',
    'subtitle' => 'Testing new column partial with image content type (v1.2.0+)',
], 'top-section');
?>

<?php
// Test 1: Basic image with caption
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1',
            'title' => 'Basic Image with Caption',
            'subtitle' => 'Full width image with caption',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'Example image with caption text displayed below',
        'lazy' => true,
    ],
];
partial('column', $test1, 'pro-sites');

// Test 2: Image without caption
$test2 = [
    'header' => [
        'heading' => [
            'label' => 'Test 2',
            'title' => 'Image Without Caption',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'lazy' => true,
    ],
];
partial('column', $test2, 'pro-sites');

// Test 3: Dark mode with buttons
$test3 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 3',
            'title' => 'Image in Dark Mode',
            'subtitle' => 'With call-to-action buttons',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'Image caption in dark mode styling',
        'lazy' => true,
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'View Gallery', 'url' => '#', 'style' => 'primary'],
            ['text' => 'Download', 'url' => '#', 'style' => 'secondary'],
        ],
    ],
];
partial('column', $test3, 'pro-sites');

// Test 4: Fixed width image
$test4 = [
    'header' => [
        'heading' => [
            'title' => 'Fixed Width Image',
            'subtitle' => '400px wide, centered alignment',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'lazy' => true,
    ],
];
partial('column', $test4, 'pro-sites');

// Test 5: Lazy loading disabled
$test5 = [
    'header' => [
        'heading' => [
            'title' => 'Lazy Loading Disabled',
            'subtitle' => 'Image loads immediately (above the fold)',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'This image has lazy loading disabled for above-the-fold content',
        'lazy' => false,
    ],
];
partial('column', $test5, 'pro-sites');

// Test 6: Custom spacing
$test6 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_classes' => 'featured-image',
    ],
    'header' => [
        'heading' => [
            'title' => 'Custom Spacing',
            'subtitle' => 'Extra padding (120px) for visual emphasis',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'Featured image with generous spacing',
        'lazy' => true,
    ],
];
partial('column', $test6, 'pro-sites');

// Test 7: No heading
$test7 = [
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'Image section with no heading, just image and caption',
        'lazy' => true,
    ],
];
partial('column', $test7, 'pro-sites');

// Test 8: Multiple images (using multiple sections)
$test8a = [
    'header' => [
        'heading' => [
            'label' => 'Test 8',
            'title' => 'Image Gallery Pattern',
            'subtitle' => 'Multiple image sections for gallery-style layouts',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '',
    ],
];
partial('column', $test8a, 'pro-sites');

// Gallery images
$gallery_images = [
    ['caption' => 'Gallery Image 1'],
    ['caption' => 'Gallery Image 2'],
    ['caption' => 'Gallery Image 3'],
];

foreach ($gallery_images as $img) {
    $gallery_section = [
        'content' => [
        'type' => 'image',
            'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
            'alt' => 'Gallery Image',
            'caption' => $img['caption'],
            'lazy' => true,
        ],
    ];
    partial('column', $gallery_section, 'pro-sites');
}

// Test 9: Custom CSS styling
$test9 = [
    'settings' => [
        'custom_css' => 'background: var(--color-background-light); padding: 40px; border-radius: var(--border-radius);',
    ],
    'header' => [
        'heading' => [
            'title' => 'Custom Styled Container',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'Reframe WA Logo',
        'caption' => 'Image in custom styled container with background and border radius',
        'lazy' => true,
    ],
];
partial('column', $test9, 'pro-sites');

// Test 10: Image with BEM Card Wrapper
$test10 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 10: BEM Card',
            'title' => 'Image in BEM Card Component',
            'subtitle' => 'Using lcms-card to wrap image content',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div class="lcms-card">
                    <div class="lcms-card__media">
                        <img src="https://static.brand-hub.com.au/client/placeholder1.jpg" alt="Card Image" loading="lazy" style="width: 100%; display: block;">
                    </div>
                    <div class="lcms-card__body">
                        <span class="lcms-badge lcms-badge--success">Featured</span>
                        <h3 class="lcms-card__title" style="margin: 16px 0 8px;">Project Showcase</h3>
                        <p class="lcms-card__description">This demonstrates wrapping an image in the BEM card component (lcms-card) with media, body, and action sections.</p>
                    </div>
                    <div class="lcms-card__actions">
                        <a href="#" class="lcms-button lcms-button--primary">View Project</a>
                        <a href="#" class="lcms-button lcms-button--outline">Learn More</a>
                    </div>
                </div>
            ',
        ],
    ],
];
partial('column', $test10, 'pro-sites');

// Test 11: Image with Badge Overlay
$test11 = [
    'header' => [
        'heading' => [
            'label' => 'Test 11: Badge Overlay',
            'title' => 'Image with Status Badge',
            'subtitle' => 'Combining image with BEM badge component',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div style="position: relative; display: inline-block; width: 100%;">
                    <img src="https://static.brand-hub.com.au/client/placeholder1.jpg" alt="Badge Example" loading="lazy" style="width: 100%; display: block; border-radius: var(--border-radius);">
                    <div style="position: absolute; top: 20px; left: 20px;">
                        <span class="lcms-badge lcms-badge--warning">New Release</span>
                    </div>
                    <div class="lcms-stack" style="gap: 12px; margin-top: 16px;">
                        <h4 style="margin: 0;">Product Launch 2024</h4>
                        <p style="margin: 0; color: var(--color-text-secondary);">This pattern shows how to overlay BEM badges on images for status indicators, labels, or categories.</p>
                    </div>
                </div>
            ',
        ],
    ],
];
partial('column', $test11, 'pro-sites');
?>

<?php get_footer(); ?>
