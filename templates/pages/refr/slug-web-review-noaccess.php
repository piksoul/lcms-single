<?php
/**
 * Website Review Case Studies - No Access / Password Form
 *
 * This template displays when the web review page is password protected.
 * Shows branded teaser content and custom password form.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-web-review-noaccess.php
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
        <h1>Website Analysis Case Study</h1>
        <p class="hero-subtitle">AUTHORIZED PARTNERS ONLY</p>
        <?php if (LeanCMS_Helpers::check_url_param('show-teaser')): ?>
            <p class="hero-subtitle">In-depth analysis of three leadership and sales consulting websites with actionable insights and proven strategies</p>
        <?php endif; ?>
    </section>

    <!-- Password Form Section -->
    <section class="content-container">
        <div class="password-section">
            <?php if (LeanCMS_Helpers::check_url_param('show-teaser')): ?>
                <div class="section-label">What's Inside</div>
                <h2 class="section-title">Comprehensive Website Reviews</h2>
                <p class="section-description">
                    This detailed analysis examines three successful consulting websites, breaking down what works, what doesn't, and actionable recommendations for improvement.
                </p>

                <div class="teaser-grid">
                    <div class="teaser-item">
                        <div class="teaser-icon">🎯</div>
                        <h3>Reframe WA</h3>
                        <p>Leadership and executive coaching consultancy analysis covering positioning, authority, and conversion strategy.</p>
                        <span class="teaser-score">Score: 8.0/10</span>
                    </div>

                    <div class="teaser-item">
                        <div class="teaser-icon">📈</div>
                        <h3>John Blake</h3>
                        <p>Sales coaching and strategy website review with funnel analysis and segmentation breakdown.</p>
                        <span class="teaser-score">Score: 8.5/10</span>
                    </div>

                    <div class="teaser-item">
                        <div class="teaser-icon">💼</div>
                        <h3>Heartware Group</h3>
                        <p>Organisational culture consultancy evaluation focusing on unique positioning and data-driven credibility.</p>
                        <span class="teaser-score">Score: 7.5/10</span>
                    </div>
                </div>

                <div class="features-section">
                    <h3>Each Case Study Includes</h3>
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Overview Analysis</strong> - Services, target audience, and positioning</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Key Strengths</strong> - What they're doing right and why it works</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Performance Metrics</strong> - Scores across 8 critical dimensions</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Improvement Opportunities</strong> - Specific actionable recommendations</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Overall Assessment</strong> - Final score and summary insights</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text"><strong>Side-by-Side Comparison</strong> - How the three sites stack up</div>
                        </div>
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
