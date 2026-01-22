<?php
/**
 * Reframe WA Brand Guidelines - No Access / Password Form
 *
 * This template displays when the brand guide page is password protected.
 * Shows branded teaser content and custom password form.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-brand-guide-noaccess.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Inter:wght@400&display=swap" rel="stylesheet">

<!-- Document System CSS (Brand-agnostic) -->
<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(dirname(__FILE__))); ?>pages/refr/assets/document-system.css">
<!-- Reframe WA Brand Theme -->
<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(dirname(__FILE__))); ?>pages/refr/assets/refr-theme.css">

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
        <img src="https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert_REV.svg" alt="Reframe WA Logo" class="hero-logo">
        <div class="hero-badge">Restricted Access</div>
        <h1>BRAND GUIDELINES</h1>
        <p class="hero-subtitle">AUTHORIZED PARTNERS ONLY</p>
    </section>

    <!-- Password Form Section -->
    <section class="content-container">
        <div class="password-section">
            <?php if (LeanCMS_Helpers::check_url_param('show-teaser')): ?>
            <div class="section-label">What's Inside</div>
            <h2 class="section-title">Brand Guide Contents</h2>
            <p class="section-description">
                This comprehensive brand guide contains everything partners need to represent Reframe WA consistently and professionally across all materials.
            </p>

            <div class="teaser-grid">
                <div class="teaser-item">
                    <div class="teaser-icon">🎨</div>
                    <h3>Color Palette</h3>
                    <p>Complete color specifications including primary navy blues, accent colors, with HEX and RGB values for all brand colors.</p>
                </div>

                <div class="teaser-item">
                    <div class="teaser-icon">✍️</div>
                    <h3>Typography</h3>
                    <p>Font families, weights, sizes, and usage guidelines for Raleway and Inter across all applications.</p>
                </div>

                <div class="teaser-item">
                    <div class="teaser-icon">🏷️</div>
                    <h3>Logo Usage</h3>
                    <p>Logo variations, clear space requirements, dos and don'ts, and downloadable logo files in multiple formats.</p>
                </div>

                <div class="teaser-item">
                    <div class="teaser-icon">📐</div>
                    <h3>Layout System</h3>
                    <p>Spacing standards, grid systems, and layout guidelines to maintain consistency across all materials.</p>
                </div>
            </div>
            <?php endif; ?>
            <div class="password-form-container">
                <?php echo get_the_password_form(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
