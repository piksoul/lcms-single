<?php
/**
 * Contact Page Template
 *
 * Contact information and form placeholder.
 * Built with Pro-Sites partial system.
 *
 * @filepath templates/pages/slug-contact.php
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
}
</style>

<!-- Hero Section -->
<section class="lcms-hero" style="padding: 60px 24px;">
    <h1 class="lcms-hero__title">Contact Us</h1>
    <p class="lcms-hero__subtitle">We'd love to hear from you. Get in touch with our team.</p>
</section>

<?php
// ============================================
// CONTACT INFO + FORM
// ============================================
$contact_section = [
    'content' => [
        'columns' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '
                        <h2>Get in Touch</h2>
                        <p>Have a question or want to learn more about HelloCMS? We\'re here to help. Fill out the form and we\'ll get back to you as soon as possible.</p>

                        <div style="margin-top: 32px;">
                            <h3 style="font-size: 18px; margin-bottom: 16px;">Contact Information</h3>

                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <span style="font-size: 24px;">📧</span>
                                <div>
                                    <strong>Email</strong><br>
                                    <a href="mailto:hello@example.com" style="color: var(--color-brand-primary);">hello@example.com</a>
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <span style="font-size: 24px;">📍</span>
                                <div>
                                    <strong>Location</strong><br>
                                    Perth, Western Australia
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; gap: 12px;">
                                <span style="font-size: 24px;">🕐</span>
                                <div>
                                    <strong>Business Hours</strong><br>
                                    Monday - Friday, 9am - 5pm AWST
                                </div>
                            </div>
                        </div>
                    ',
                    'format' => 'standard',
                ],
                'width' => '45%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: #f8fafc; border-radius: 16px; padding: 32px;">
                            <h3 style="margin: 0 0 24px; font-size: 20px;">Send us a Message</h3>
                            ' . do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') . '
                        </div>
                    ',
                ],
                'width' => '55%',
            ],
        ],
        'gap' => '60px',
    ],
];

partial('2-column', $contact_section, 'pro-sites');

// ============================================
// FAQ SECTION
// ============================================
$faq_header = [
    'settings' => [
        'dark_mode' => true,
        'spacing_top' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => 'FAQ',
            'title' => 'Frequently Asked Questions',
            'align' => 'center',
        ],
    ],
];

partial('column', $faq_header, 'pro-sites');

$faq_grid = [
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
                                <h4 style="margin: 0 0 12px;">How quickly will I get a response?</h4>
                                <p style="margin: 0; opacity: 0.9;">We typically respond to all inquiries within 24-48 business hours.</p>
                            ',
                        ],
                    ],
                    'padding' => '24px',
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
                                <h4 style="margin: 0 0 12px;">Do you offer support?</h4>
                                <p style="margin: 0; opacity: 0.9;">Yes! We provide email support for all users and can arrange calls for complex questions.</p>
                            ',
                        ],
                    ],
                    'padding' => '24px',
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
                                <h4 style="margin: 0 0 12px;">Can I request a demo?</h4>
                                <p style="margin: 0; opacity: 0.9;">Absolutely! Just mention it in your message and we\'ll set up a time to walk you through everything.</p>
                            ',
                        ],
                    ],
                    'padding' => '24px',
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 3,
        'gap' => '24px',
    ],
];

partial('grid', $faq_grid, 'pro-sites');

get_footer();
