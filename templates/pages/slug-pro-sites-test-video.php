<?php
/**
 * Pro-Sites Column Section Test Template (Video Content)
 *
 * Tests column partial with video content type using various embed types.
 * Demonstrates the new v1.2.0+ layout-based approach.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-video.php
 * @since 1.1.6
 * @updated 1.2.1 - Migrated to column partial and fixed video rendering
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => 'Column Section Tests (Video Content)',
    'subtitle' => 'Testing new column partial with video content type (v1.2.0+)',
], 'top-section');
?>

<?php
// Test 1: YouTube embed
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1',
            'title' => 'YouTube Video Embed',
            'subtitle' => 'Standard YouTube embed with controls',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '500px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test1, 'pro-sites');

// Test 2: YouTube with autoplay
$test2 = [
    'header' => [
        'heading' => [
            'label' => 'Test 2',
            'title' => 'YouTube with Autoplay',
            'subtitle' => 'Video starts playing automatically',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '400px',
            'autoplay' => true,
            'controls' => true,
        ],
    ],
];
partial('column', $test2, 'pro-sites');

// Test 3: Vimeo embed
$test3 = [
    'header' => [
        'heading' => [
            'label' => 'Test 3',
            'title' => 'Vimeo Video Embed',
            'subtitle' => 'Alternative video platform support',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'vimeo',
            'src' => '76979871',
            'width' => '100%',
            'height' => '500px',
            'autoplay' => false,
            'controls' => true,
        ],
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
            'title' => 'Video in Dark Mode',
            'subtitle' => 'With call-to-action buttons',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '450px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Watch More', 'url' => '#', 'style' => 'primary'],
            ['text' => 'Subscribe', 'url' => '#', 'style' => 'outline'],
        ],
    ],
];
partial('column', $test4, 'pro-sites');

// Test 5: Custom height
$test5 = [
    'header' => [
        'heading' => [
            'title' => 'Custom Video Height',
            'subtitle' => '600px height for larger display',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '600px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test5, 'pro-sites');

// Test 6: Smaller video with right alignment
$test6 = [
    'header' => [
        'heading' => [
            'title' => 'Smaller Video Size',
            'subtitle' => '350px height, right-aligned heading',
            'align' => 'right',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '350px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test6, 'pro-sites');

// Test 7: No heading
$test7 = [
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '500px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test7, 'pro-sites');

// Test 8: Custom spacing
$test8 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_classes' => 'featured-video',
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 8',
            'title' => 'Featured Video with Custom Spacing',
            'subtitle' => 'Extra padding for emphasis',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '550px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'View Playlist', 'url' => '#', 'style' => 'primary'],
        ],
    ],
];
partial('column', $test8, 'pro-sites');

// Test 9: Custom CSS container
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
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '450px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test9, 'pro-sites');

// Test 10: Data attributes for tracking
$test10 = [
    'settings' => [
        'custom_id' => 'tracked-video',
        'data_attrs' => [
            'track-event' => 'video_view',
            'video-id' => 'dQw4w9WgXcQ',
            'category' => 'engagement',
        ],
    ],
    'header' => [
        'heading' => [
            'title' => 'Video with Tracking Attributes',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'video',
        'video' => [
            'type' => 'youtube',
            'src' => 'dQw4w9WgXcQ',
            'width' => '100%',
            'height' => '500px',
            'autoplay' => false,
            'controls' => true,
        ],
    ],
];
partial('column', $test10, 'pro-sites');

// Test 11: Video with BEM Card Wrapper
$test11 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Test 11: BEM Card',
            'title' => 'Video in BEM Card Component',
            'subtitle' => 'Using lcms-card to wrap video content',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div class="lcms-card">
                    <div class="lcms-card__media">
                        <iframe
                            width="100%"
                            height="400"
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            style="display: block;"
                        ></iframe>
                    </div>
                    <div class="lcms-card__body">
                        <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                            <span class="lcms-badge lcms-badge--info">Tutorial</span>
                            <span class="lcms-badge">15:30</span>
                        </div>
                        <h3 class="lcms-card__title" style="margin: 0 0 8px;">Video Tutorial Series</h3>
                        <p class="lcms-card__description">This demonstrates wrapping a video in the BEM card component with badges, title, and action buttons.</p>
                    </div>
                    <div class="lcms-card__actions">
                        <a href="#" class="lcms-button lcms-button--primary">Watch Series</a>
                        <a href="#" class="lcms-button lcms-button--outline">Download</a>
                    </div>
                </div>
            ',
        ],
    ],
];
partial('column', $test11, 'pro-sites');

// Test 12: Video with Progress Bar
$test12 = [
    'header' => [
        'heading' => [
            'label' => 'Test 12: Progress Indicator',
            'title' => 'Video with Watch Progress',
            'subtitle' => 'Combining video with BEM progress-bar-large',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div class="lcms-stack" style="gap: 24px;">
                    <iframe
                        width="100%"
                        height="450"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="border-radius: var(--border-radius);"
                    ></iframe>

                    <div class="lcms-card" style="padding: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <h4 style="margin: 0;">Course Progress</h4>
                            <span class="lcms-badge lcms-badge--warning">In Progress</span>
                        </div>

                        <div class="lcms-progress-bar-large">
                            <div class="lcms-progress-bar-large__header">
                                <span class="lcms-progress-bar-large__label">Video 3 of 8 completed</span>
                                <span class="lcms-progress-bar-large__percentage">38%</span>
                            </div>
                            <div class="lcms-progress-bar-large__track">
                                <div class="lcms-progress-bar-large__fill lcms-progress-bar-large__fill--warning" style="width: 38%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            ',
        ],
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Continue Course', 'url' => '#', 'style' => 'primary'],
            ['text' => 'View All Videos', 'url' => '#', 'style' => 'outline'],
        ],
    ],
];
partial('column', $test12, 'pro-sites');
?>

<!-- Note about HTML5 video -->
<div style="background: var(--color-background-light); padding: 40px 0; text-align: center;">
    <div class="content-container">
        <p style="margin: 0; color: var(--color-text-secondary);"><strong>Note:</strong> HTML5 video type requires a valid MP4 file URL. Replace 'src' with your video file path to test HTML5 embed.</p>
    </div>
</div>

<?php get_footer(); ?>
