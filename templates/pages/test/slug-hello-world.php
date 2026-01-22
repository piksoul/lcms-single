<?php
/**
 * Hello World Example - Modern Minimalist Theme
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/test/slug-hello-world.php
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
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 120px 60px;
        text-align: center;
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
        max-width: 700px;
        margin: 0 auto;
    }

    /* Content Section */
    .content-section {
        max-width: 1200px;
        margin: 80px auto;
        padding: 0 60px;
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
        margin-bottom: 25px;
    }

    .section-description {
        font-size: 20px;
        line-height: 1.8;
        color: #708090;
        max-width: 800px;
    }

    /* Feature Cards */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 60px;
    }

    .feature-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 2px solid #d3d3d3;
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        border-color: #708090;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        font-size: 22px;
        color: #36454f;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .feature-card p {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
    }

    /* Stats Section */
    .stats-section {
        background: #36454f;
        color: white;
        padding: 80px 60px;
        text-align: center;
    }

    .stats-section .section-title {
        color: white;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 40px;
        max-width: 1200px;
        margin: 50px auto 0;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        padding: 40px 20px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 56px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .stat-label {
        font-size: 16px;
        opacity: 0.9;
    }

    /* CTA Section */
    .cta-section {
        max-width: 1200px;
        margin: 80px auto;
        padding: 60px;
        background: #f8f8f8;
        border-radius: 15px;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 36px;
        color: #36454f;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .cta-section p {
        font-size: 18px;
        color: #708090;
        margin-bottom: 30px;
    }

    .cta-button {
        display: inline-block;
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 16px 40px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(54, 69, 79, 0.3);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
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
            font-size: 18px;
        }

        .features-grid,
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .content-section,
        .stats-section,
        .cta-section {
            padding-left: 30px;
            padding-right: 30px;
        }

        .section-title {
            font-size: 32px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-badge">Demo Template</div>
        <h1>Hello, World!</h1>
        <p class="hero-subtitle">This is a demonstration of the Theme Factory skill using the Modern Minimalist design theme</p>
    </section>

    <!-- Features Section -->
    <section class="content-section">
        <div class="section-label">Key Features</div>
        <h2 class="section-title">What Makes This Special</h2>
        <p class="section-description">
            This template demonstrates the modern minimalist theme with card-based layouts, gradient backgrounds, and responsive design optimized for WordPress.
        </p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>Beautiful Design</h3>
                <p>Clean, modern aesthetics with carefully chosen color palettes and smooth transitions.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Fully Responsive</h3>
                <p>Looks great on all devices with mobile-first design principles and fluid layouts.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>WordPress Ready</h3>
                <p>Integrated with get_header() and get_footer() for seamless theme compatibility.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Security First</h3>
                <p>Includes proper security checks and follows WordPress coding standards.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Performance</h3>
                <p>Lightweight inline CSS with no external dependencies for fast page loads.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">✨</div>
                <h3>Interactive</h3>
                <p>Smooth hover effects and transitions create engaging user experiences.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <h2 class="section-title">By The Numbers</h2>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label">Design Themes</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Responsive</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">∞</div>
                <div class="stat-label">Possibilities</div>
            </div>

            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Simple Skill</div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Create Your Own?</h2>
        <p>Use the theme-factory skill to generate beautiful, WordPress-ready templates in seconds.</p>
        <a href="#" class="cta-button">Get Started →</a>
    </section>
</main>

<?php get_footer(); ?>
