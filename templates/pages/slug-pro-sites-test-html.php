<?php
/**
 * Pro-Sites Column Section Test Template (HTML Content)
 *
 * Tests column partial with HTML content type using custom layouts.
 * Demonstrates the new v1.2.0+ layout-based approach.
 *
 * @filepath templates/pages/test/slug-pro-sites-test-html.php
 * @since 1.1.6
 * @updated 1.2.1 - Migrated to column partial
 */

get_header();

partial('loader', [
    'client_config_path' => __DIR__ . '/../refr/config.php',
], 'top-section');

partial('page-header', [
    'title' => 'Column Section Tests (HTML Content)',
    'subtitle' => 'Testing new column partial with HTML content type (v1.2.0+)',
], 'top-section');
?>

<?php
// Test 1: Custom card layout
$test1 = [
    'header' => [
        'heading' => [
            'label' => 'Test 1',
            'title' => 'Custom Card Layout',
            'subtitle' => 'Using HTML for specialized layouts',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                <div class="card" style="text-align: center; padding: 30px;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🚀</div>
                    <h3 style="margin: 0 0 10px;">Fast</h3>
                    <p style="margin: 0; color: var(--color-text-secondary);">Lightning-fast performance</p>
                </div>
                <div class="card" style="text-align: center; padding: 30px;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🎨</div>
                    <h3 style="margin: 0 0 10px;">Flexible</h3>
                    <p style="margin: 0; color: var(--color-text-secondary);">Fully customizable</p>
                </div>
                <div class="card" style="text-align: center; padding: 30px;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🔒</div>
                    <h3 style="margin: 0 0 10px;">Secure</h3>
                    <p style="margin: 0; color: var(--color-text-secondary);">Enterprise-grade security</p>
                </div>
            </div>
        ',
    ],
];
partial('column', $test1, 'pro-sites');

// Test 2: Stats grid
$test2 = [
    'header' => [
        'heading' => [
            'label' => 'Test 2',
            'title' => 'Statistics Grid',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; text-align: center;">
                <div>
                    <div style="font-size: 48px; font-weight: 700; color: var(--color-brand-accent); margin-bottom: 10px;">500+</div>
                    <div style="color: var(--color-text-secondary);">Projects Delivered</div>
                </div>
                <div>
                    <div style="font-size: 48px; font-weight: 700; color: var(--color-brand-accent); margin-bottom: 10px;">98%</div>
                    <div style="color: var(--color-text-secondary);">Client Satisfaction</div>
                </div>
                <div>
                    <div style="font-size: 48px; font-weight: 700; color: var(--color-brand-accent); margin-bottom: 10px;">24/7</div>
                    <div style="color: var(--color-text-secondary);">Support Available</div>
                </div>
                <div>
                    <div style="font-size: 48px; font-weight: 700; color: var(--color-brand-accent); margin-bottom: 10px;">15+</div>
                    <div style="color: var(--color-text-secondary);">Years Experience</div>
                </div>
            </div>
        ',
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
            'title' => 'Dark Mode HTML Content',
            'subtitle' => 'Custom HTML in dark theme',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="background: rgba(255,255,255,0.1); padding: 40px; border-radius: 10px; text-align: center;">
                <h3 style="margin: 0 0 20px; font-size: 28px;">Ready to Get Started?</h3>
                <p style="margin: 0 0 20px; font-size: 18px; opacity: 0.9;">Custom HTML sections work perfectly in dark mode with automatic color adaptations.</p>
                <ul style="list-style: none; padding: 0; margin: 0; display: inline-block; text-align: left;">
                    <li style="margin: 10px 0;">✓ Flexible layouts</li>
                    <li style="margin: 10px 0;">✓ Custom styling</li>
                    <li style="margin: 10px 0;">✓ Third-party embeds</li>
                    <li style="margin: 10px 0;">✓ Rich content support</li>
                </ul>
            </div>
        ',
    ],
    'footer' => [
        'buttons' => [
            ['text' => 'Get Started', 'url' => '#', 'style' => 'primary'],
            ['text' => 'Learn More', 'url' => '#', 'style' => 'outline'],
        ],
    ],
];
partial('column', $test3, 'pro-sites');

// Test 4: Pricing table
$test4 = [
    'header' => [
        'heading' => [
            'title' => 'Pricing Table Example',
            'subtitle' => 'Complex layouts made easy',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-3" style="gap: 30px;">
                <div class="card" style="text-align: center;">
                    <h3 style="margin: 0 0 10px;">Starter</h3>
                    <div style="font-size: 36px; font-weight: 700; margin: 20px 0;">$29<span style="font-size: 18px; font-weight: 400;">/mo</span></div>
                    <ul style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 10px 0;">✓ 5 Projects</li>
                        <li style="margin: 10px 0;">✓ Email Support</li>
                        <li style="margin: 10px 0;">✓ Basic Features</li>
                    </ul>
                    <a href="#" class="button button-outline" style="display: inline-block; width: 100%;">Choose Plan</a>
                </div>
                <div class="card" style="text-align: center; border: 3px solid var(--color-brand-accent);">
                    <div style="background: var(--color-brand-accent); color: white; padding: 5px; margin: -40px -40px 20px; font-size: 14px; font-weight: 600;">POPULAR</div>
                    <h3 style="margin: 0 0 10px;">Professional</h3>
                    <div style="font-size: 36px; font-weight: 700; margin: 20px 0;">$79<span style="font-size: 18px; font-weight: 400;">/mo</span></div>
                    <ul style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 10px 0;">✓ 25 Projects</li>
                        <li style="margin: 10px 0;">✓ Priority Support</li>
                        <li style="margin: 10px 0;">✓ All Features</li>
                    </ul>
                    <a href="#" class="button button-primary" style="display: inline-block; width: 100%;">Choose Plan</a>
                </div>
                <div class="card" style="text-align: center;">
                    <h3 style="margin: 0 0 10px;">Enterprise</h3>
                    <div style="font-size: 36px; font-weight: 700; margin: 20px 0;">$199<span style="font-size: 18px; font-weight: 400;">/mo</span></div>
                    <ul style="list-style: none; padding: 0; margin: 20px 0;">
                        <li style="margin: 10px 0;">✓ Unlimited Projects</li>
                        <li style="margin: 10px 0;">✓ 24/7 Support</li>
                        <li style="margin: 10px 0;">✓ Custom Features</li>
                    </ul>
                    <a href="#" class="button button-outline" style="display: inline-block; width: 100%;">Choose Plan</a>
                </div>
            </div>
        ',
    ],
];
partial('column', $test4, 'pro-sites');

// Test 5: BEM Numbered Timeline (Vertical)
$test5 = [
    'header' => [
        'heading' => [
            'label' => 'Template Library Pattern',
            'title' => 'Numbered Timeline (Vertical)',
            'subtitle' => 'BEM step-number component with lcms-timeline-vertical',
            'align' => 'left',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-timeline-vertical">
                <div class="lcms-timeline-vertical__item">
                    <div class="lcms-step-number lcms-step-number--success">
                        <span class="lcms-step-number__number">1</span>
                    </div>
                    <div class="lcms-timeline-vertical__content">
                        <h4 class="lcms-timeline-vertical__title">Discovery Phase</h4>
                        <p class="lcms-timeline-vertical__description">We analyze your needs and goals to create a tailored strategy that aligns with your business objectives.</p>
                    </div>
                </div>

                <div class="lcms-timeline-vertical__item">
                    <div class="lcms-step-number lcms-step-number--success">
                        <span class="lcms-step-number__number">2</span>
                    </div>
                    <div class="lcms-timeline-vertical__content">
                        <h4 class="lcms-timeline-vertical__title">Design Phase</h4>
                        <p class="lcms-timeline-vertical__description">Our team creates beautiful, functional designs for your approval using modern design principles.</p>
                    </div>
                </div>

                <div class="lcms-timeline-vertical__item">
                    <div class="lcms-step-number lcms-step-number--warning">
                        <span class="lcms-step-number__number">3</span>
                    </div>
                    <div class="lcms-timeline-vertical__content">
                        <h4 class="lcms-timeline-vertical__title">Development Phase</h4>
                        <p class="lcms-timeline-vertical__description">We build your solution with clean, scalable code following best practices and industry standards.</p>
                    </div>
                </div>

                <div class="lcms-timeline-vertical__item">
                    <div class="lcms-step-number">
                        <span class="lcms-step-number__number">4</span>
                    </div>
                    <div class="lcms-timeline-vertical__content">
                        <h4 class="lcms-timeline-vertical__title">Launch & Support</h4>
                        <p class="lcms-timeline-vertical__description">Your project goes live with ongoing support and optimization to ensure long-term success.</p>
                    </div>
                </div>
            </div>
        ',
    ],
];
partial('column', $test5, 'pro-sites');

// Test 6: Form embed placeholder
$test6 = [
    'header' => [
        'heading' => [
            'title' => 'Third-Party Embed Example',
            'subtitle' => 'Forms, maps, widgets, etc.',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="background: var(--color-background-light); padding: 40px; border-radius: var(--border-radius); text-align: center;">
                <p style="margin: 0 0 20px; font-size: 18px;"><strong>Form Embed Placeholder</strong></p>
                <p style="margin: 0; color: var(--color-text-secondary);">Insert your form embed code (Gravity Forms, Contact Form 7, Typeform, etc.) in the html content parameter.</p>
                <div style="margin-top: 30px; padding: 60px; background: white; border: 2px dashed var(--color-brand-accent); border-radius: 8px;">
                    Your form embed code goes here
                </div>
            </div>
        ',
    ],
];
partial('column', $test6, 'pro-sites');

// Test 7: Custom spacing
$test7 = [
    'settings' => [
        'spacing_top' => '120px',
        'spacing_bottom' => '120px',
        'custom_css' => 'background: linear-gradient(135deg, var(--color-brand-primary) 0%, var(--color-brand-secondary) 100%); color: white;',
    ],
    'header' => [
        'heading' => [
            'title' => 'Featured HTML Content',
            'subtitle' => 'Custom spacing and gradient background',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <p style="font-size: 20px; margin: 0;">HTML sections support any custom layout or third-party embed you need. Perfect for specialized content that doesn\'t fit other section types.</p>
            </div>
        ',
    ],
];
partial('column', $test7, 'pro-sites');

// Test 8: FAQ List Pattern
$test8 = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'label' => 'Template Library Pattern',
            'title' => 'FAQ List Pattern',
            'subtitle' => 'Simple FAQ section with BEM composition',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-faq-list">
                <div class="lcms-faq-list__item">
                    <h3 class="lcms-faq-list__question">What is the Pro-Sites partial system?</h3>
                    <div class="lcms-faq-list__answer">
                        <p>Pro-Sites is a flexible, reusable content section framework for building professional WordPress pages. It provides standardized configuration patterns with extensive customization options.</p>
                    </div>
                </div>

                <div class="lcms-faq-list__item">
                    <h3 class="lcms-faq-list__question">What are BEM components?</h3>
                    <div class="lcms-faq-list__answer">
                        <p>BEM (Block Element Modifier) is a naming methodology for CSS classes that creates reusable components and code sharing. All components use the <code>lcms-</code> prefix for consistency.</p>
                    </div>
                </div>

                <div class="lcms-faq-list__item">
                    <h3 class="lcms-faq-list__question">How do I use Template Library components?</h3>
                    <div class="lcms-faq-list__answer">
                        <p>Template Library components are pre-built patterns you can use in HTML content types. Simply copy the component structure and customize the content while maintaining the BEM class structure.</p>
                    </div>
                </div>

                <div class="lcms-faq-list__item">
                    <h3 class="lcms-faq-list__question">Can I combine multiple content types?</h3>
                    <div class="lcms-faq-list__answer">
                        <p>Yes! Use the stack, row, or grid content types to combine multiple content types within a single section. Or use 2-column and grid-section partials for more complex layouts.</p>
                    </div>
                </div>
            </div>
        ',
    ],
];
partial('column', $test8, 'pro-sites');

// Test 9: Numbered Timeline (Horizontal)
$test9 = [
    'header' => [
        'heading' => [
            'label' => 'Template Library Pattern',
            'title' => 'Numbered Timeline (Horizontal)',
            'subtitle' => 'Step-number components in horizontal layout',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-timeline-horizontal">
                <div class="lcms-timeline-horizontal__item">
                    <div class="lcms-step-number lcms-step-number--success">
                        <span class="lcms-step-number__number">1</span>
                    </div>
                    <div class="lcms-timeline-horizontal__content">
                        <h4 class="lcms-timeline-horizontal__title">Discovery</h4>
                        <p class="lcms-timeline-horizontal__description">Research & analysis</p>
                    </div>
                </div>

                <div class="lcms-timeline-horizontal__item">
                    <div class="lcms-step-number lcms-step-number--success">
                        <span class="lcms-step-number__number">2</span>
                    </div>
                    <div class="lcms-timeline-horizontal__content">
                        <h4 class="lcms-timeline-horizontal__title">Design</h4>
                        <p class="lcms-timeline-horizontal__description">Visual concepts</p>
                    </div>
                </div>

                <div class="lcms-timeline-horizontal__item">
                    <div class="lcms-step-number lcms-step-number--warning">
                        <span class="lcms-step-number__number">3</span>
                    </div>
                    <div class="lcms-timeline-horizontal__content">
                        <h4 class="lcms-timeline-horizontal__title">Development</h4>
                        <p class="lcms-timeline-horizontal__description">Build solution</p>
                    </div>
                </div>

                <div class="lcms-timeline-horizontal__item">
                    <div class="lcms-step-number">
                        <span class="lcms-step-number__number">4</span>
                    </div>
                    <div class="lcms-timeline-horizontal__content">
                        <h4 class="lcms-timeline-horizontal__title">Launch</h4>
                        <p class="lcms-timeline-horizontal__description">Go live</p>
                    </div>
                </div>
            </div>
        ',
    ],
];
partial('column', $test9, 'pro-sites');
?>

<?php get_footer(); ?>
