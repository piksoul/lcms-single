<?php
/**
 * Reframe WA Brand Hub Index - Modern Minimalist Format
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-index.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'DejaVu Sans', 'Segoe UI', Arial, sans-serif;
        color: #36454f;
        line-height: 1.6;
        background: #f8f8f8;
    }

    /* Hero */
    .hero {
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 120px 60px;
        text-align: center;
    }

    .hero-logo {
        max-width: 200px;
        height: auto;
        margin: 0 auto 30px;
        display: block;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 14px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .hero h1 {
        font-size: 56px;
        font-weight: bold;
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 24px;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto 40px;
    }

    .hero-description {
        font-size: 18px;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Documents Section */
    .documents-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 60px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-label {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #708090;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 42px;
        font-weight: bold;
        color: #36454f;
        margin-bottom: 20px;
    }

    .section-description {
        font-size: 18px;
        color: #708090;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Document Cards Grid */
    .document-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-top: 60px;
    }

    .document-card {
        background: white;
        border: 2px solid #d3d3d3;
        border-radius: 10px;
        padding: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
        position: relative;
        overflow: hidden;
    }

    .document-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #36454f 0%, #708090 100%);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .document-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        border-color: #708090;
    }

    .document-card:hover:before {
        transform: scaleX(1);
    }

    .document-icon {
        font-size: 56px;
        margin-bottom: 25px;
        display: block;
    }

    .document-type {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #708090;
        margin-bottom: 15px;
    }

    .document-title {
        font-size: 32px;
        font-weight: bold;
        color: #36454f;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .document-description {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .document-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-top: 20px;
        border-top: 2px solid #d3d3d3;
    }

    .meta-item {
        font-size: 14px;
        color: #708090;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-icon {
        font-size: 16px;
    }

    .document-arrow {
        position: absolute;
        bottom: 30px;
        right: 30px;
        font-size: 24px;
        color: #708090;
        transition: all 0.3s ease;
    }

    .document-card:hover .document-arrow {
        transform: translateX(5px);
        color: #36454f;
    }

    /* Info Section */
    .info-section {
        background: white;
        padding: 80px 60px;
        margin-top: 80px;
        border-top: 2px solid #d3d3d3;
    }

    .info-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 60px;
    }

    .info-card {
        text-align: center;
    }

    .info-icon {
        font-size: 48px;
        margin-bottom: 20px;
        display: block;
    }

    .info-card h3 {
        font-size: 24px;
        color: #36454f;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .info-card p {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 100px 60px;
        text-align: center;
        margin-top: 0;
    }

    .cta-section h2 {
        font-size: 42px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .cta-section p {
        font-size: 20px;
        opacity: 0.95;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-button {
        display: inline-block;
        background: white;
        color: #36454f;
        padding: 18px 50px;
        border-radius: 50px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .document-grid {
            grid-template-columns: 1fr;
        }

        .info-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 80px 30px;
        }

        .hero h1 {
            font-size: 36px;
        }

        .hero-subtitle {
            font-size: 20px;
        }

        .documents-section {
            padding: 60px 30px;
        }

        .section-title {
            font-size: 32px;
        }

        .document-card {
            padding: 40px 30px;
        }

        .document-title {
            font-size: 24px;
        }

        .info-section {
            padding: 60px 30px;
        }

        .cta-section {
            padding: 80px 30px;
        }

        .cta-section h2 {
            font-size: 32px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
        <img src="https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert_REV.svg" alt="Reframe WA Logo" class="hero-logo">
        <div class="hero-badge">Brand Resource Hub</div>
        <h1>Reframe WA</h1>
        <p class="hero-subtitle">Leadership isn't a title. It's how you show up.</p>
        <p class="hero-description">
            Access brand guidelines, website reviews, and resources to maintain consistency across all Reframe WA communications and materials.
        </p>
    </section>

    <!-- Documents Section -->
    <section class="documents-section">
        <div class="section-header">
            <div class="section-label">Available Resources</div>
            <h2 class="section-title">Brand Documents</h2>
            <p class="section-description">
                Click any document below to view detailed information and guidelines for maintaining our brand identity.
            </p>
        </div>

        <div class="document-grid">
            <!-- Brand Guidelines Card -->
            <a href="/refr-brand-guide" class="document-card">
                <span class="document-icon">📋</span>
                <div class="document-type">Brand Guidelines</div>
                <h3 class="document-title">Brand Style Guide</h3>
                <p class="document-description">
                    Comprehensive brand identity guidelines including color palette, typography, logo usage, and design principles for consistent brand application.
                </p>
                <div class="document-meta">
                    <span class="meta-item">
                        <span class="meta-icon">📄</span>
                        <span>Style Guide</span>
                    </span>
                    <span class="meta-item">
                        <span class="meta-icon">✓</span>
                        <span>Current</span>
                    </span>
                </div>
                <span class="document-arrow">→</span>
            </a>

            <!-- Web Review Card -->
            <a href="/refr-web-review" class="document-card">
                <span class="document-icon">🔍</span>
                <div class="document-type">Website Analysis</div>
                <h3 class="document-title">Website Review</h3>
                <p class="document-description">
                    In-depth analysis of the Reframe WA website with scoring, strengths assessment, and recommendations for improvement in messaging and conversion optimization.
                </p>
                <div class="document-meta">
                    <span class="meta-item">
                        <span class="meta-icon">📊</span>
                        <span>Case Study</span>
                    </span>
                    <span class="meta-item">
                        <span class="meta-icon">⭐</span>
                        <span>Score: 8.0/10</span>
                    </span>
                </div>
                <span class="document-arrow">→</span>
            </a>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section">
        <div class="info-container">
            <div class="info-card">
                <span class="info-icon">🎨</span>
                <h3>Brand Consistency</h3>
                <p>Maintain visual and messaging consistency across all touchpoints with our comprehensive brand guidelines.</p>
            </div>

            <div class="info-card">
                <span class="info-icon">📈</span>
                <h3>Performance Insights</h3>
                <p>Access detailed website reviews and analytics to understand what's working and where to improve.</p>
            </div>

            <div class="info-card">
                <span class="info-icon">💼</span>
                <h3>Professional Standards</h3>
                <p>Follow best practices for professional presentation that reflects Reframe WA's leadership expertise.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <h2>Need Additional Resources?</h2>
        <p>Contact us if you need specific brand assets, templates, or guidance on applying these standards to your project.</p>
        <a href="#" class="cta-button">Get in Touch</a>
    </section>
</main>

<?php get_footer(); ?>
