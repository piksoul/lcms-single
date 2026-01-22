<?php
/**
 * Privacy Policy Page Template
 *
 * Standard privacy policy text page.
 * Built with Pro-Sites partial system.
 *
 * @filepath templates/pages/slug-privacy-policy.php
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
}
</style>

<!-- Hero Section -->
<section class="lcms-hero" style="padding: 60px 24px;">
    <h1 class="lcms-hero__title">Privacy Policy</h1>
    <p class="lcms-hero__subtitle">Last updated: <?php echo date('F j, Y'); ?></p>
</section>

<?php
// ============================================
// PRIVACY CONTENT
// ============================================
$privacy_content = [
    'settings' => [
        'container_css' => 'max-width: 800px;',
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <h2>Introduction</h2>
            <p>Welcome to HelloCMS. We respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and safeguard your information when you visit our website.</p>

            <h2>Information We Collect</h2>
            <p>We may collect information about you in various ways, including:</p>
            <ul>
                <li><strong>Personal Data:</strong> Name, email address, and contact information you voluntarily provide.</li>
                <li><strong>Usage Data:</strong> Information about how you use our website, including pages visited and time spent.</li>
                <li><strong>Technical Data:</strong> IP address, browser type, and device information.</li>
            </ul>

            <h2>How We Use Your Information</h2>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Provide and maintain our services</li>
                <li>Respond to your inquiries and support requests</li>
                <li>Improve our website and user experience</li>
                <li>Send periodic emails regarding updates or services</li>
                <li>Comply with legal obligations</li>
            </ul>

            <h2>Data Security</h2>
            <p>We implement appropriate security measures to protect your personal information. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>

            <h2>Cookies</h2>
            <p>Our website may use cookies to enhance your experience. You can choose to disable cookies through your browser settings, though this may affect some functionality.</p>

            <h2>Third-Party Services</h2>
            <p>We may use third-party services that collect, monitor, and analyze data. These services have their own privacy policies addressing how they use such information.</p>

            <h2>Your Rights</h2>
            <p>Depending on your location, you may have rights regarding your personal data, including:</p>
            <ul>
                <li>The right to access your personal data</li>
                <li>The right to rectification of inaccurate data</li>
                <li>The right to erasure of your data</li>
                <li>The right to restrict processing</li>
                <li>The right to data portability</li>
            </ul>

            <h2>Changes to This Policy</h2>
            <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>

            <h2>Contact Us</h2>
            <p>If you have any questions about this privacy policy, please <a href="/contact">contact us</a>.</p>
        ',
        'format' => 'standard',
    ],
];

partial('column', $privacy_content, 'pro-sites');
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
