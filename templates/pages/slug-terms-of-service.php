<?php
/**
 * Terms of Service Page Template
 *
 * Standard terms of service text page.
 * Built with Pro-Sites partial system.
 *
 * @filepath templates/pages/slug-terms-of-service.php
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
    <h1 class="lcms-hero__title">Terms of Service</h1>
    <p class="lcms-hero__subtitle">Last updated: <?php echo date('F j, Y'); ?></p>
</section>

<?php
// ============================================
// TERMS CONTENT
// ============================================
$terms_content = [
    'settings' => [
        'container_css' => 'max-width: 800px;',
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <h2>Agreement to Terms</h2>
            <p>By accessing or using HelloCMS, you agree to be bound by these Terms of Service. If you disagree with any part of these terms, you may not access our services.</p>

            <h2>Use of Our Services</h2>
            <p>You agree to use our services only for lawful purposes and in accordance with these terms. You agree not to:</p>
            <ul>
                <li>Use the service in any way that violates applicable laws or regulations</li>
                <li>Attempt to gain unauthorized access to any portion of the service</li>
                <li>Interfere with or disrupt the integrity or performance of the service</li>
                <li>Upload or transmit viruses or other malicious code</li>
                <li>Collect or harvest any information from the service without permission</li>
            </ul>

            <h2>Intellectual Property</h2>
            <p>The service and its original content, features, and functionality are owned by HelloCMS and are protected by international copyright, trademark, and other intellectual property laws.</p>

            <h2>User Content</h2>
            <p>You retain ownership of any content you submit, post, or display on or through the service. By submitting content, you grant us a license to use, modify, and display that content in connection with the service.</p>

            <h2>Termination</h2>
            <p>We may terminate or suspend your access to the service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach these terms.</p>

            <h2>Limitation of Liability</h2>
            <p>In no event shall HelloCMS, its directors, employees, partners, agents, suppliers, or affiliates be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses.</p>

            <h2>Disclaimer</h2>
            <p>The service is provided on an "AS IS" and "AS AVAILABLE" basis. We make no warranties, expressed or implied, regarding the operation of the service or the information, content, or materials included.</p>

            <h2>Governing Law</h2>
            <p>These terms shall be governed by and construed in accordance with applicable laws, without regard to conflict of law principles.</p>

            <h2>Changes to Terms</h2>
            <p>We reserve the right to modify or replace these terms at any time. If a revision is material, we will provide notice prior to any new terms taking effect.</p>

            <h2>Contact Us</h2>
            <p>If you have any questions about these Terms of Service, please <a href="/contact">contact us</a>.</p>
        ',
        'format' => 'standard',
    ],
];

partial('column', $terms_content, 'pro-sites');

get_footer();
