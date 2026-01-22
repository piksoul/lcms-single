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
                            <form action="#" method="post" style="display: flex; flex-direction: column; gap: 20px;">
                                <div>
                                    <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px;">Name</label>
                                    <input type="text" id="name" name="name" placeholder="Your name" style="width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 16px; box-sizing: border-box;">
                                </div>
                                <div>
                                    <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px;">Email</label>
                                    <input type="email" id="email" name="email" placeholder="your@email.com" style="width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 16px; box-sizing: border-box;">
                                </div>
                                <div>
                                    <label for="message" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px;">Message</label>
                                    <textarea id="message" name="message" rows="5" placeholder="How can we help?" style="width: 100%; padding: 12px 16px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 16px; resize: vertical; box-sizing: border-box;"></textarea>
                                </div>
                                <button type="submit" class="lcms-button lcms-button--primary" style="align-self: flex-start;">Send Message</button>
                            </form>
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
