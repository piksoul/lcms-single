<?php
/**
 * Theme Factory Demonstration - Multi-Theme Showcase
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/test/slug-hello-world-2.php
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
        line-height: 1.6;
    }

    /* ===========================
       OCEAN DEPTHS THEME SECTION
       ========================== */

    .theme-ocean {
        background: linear-gradient(135deg, #1a2332 0%, #2d8b8b 100%);
        color: #f1faee;
        padding: 100px 60px;
        text-align: center;
    }

    .theme-ocean .theme-badge {
        display: inline-block;
        background: rgba(168, 218, 220, 0.3);
        border: 2px solid #a8dadc;
        color: #a8dadc;
        padding: 8px 24px;
        border-radius: 25px;
        font-size: 12px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
    }

    .theme-ocean h1 {
        font-family: 'DejaVu Sans', 'Segoe UI', Arial, sans-serif;
        font-size: 64px;
        font-weight: bold;
        margin-bottom: 20px;
        line-height: 1.1;
    }

    .theme-ocean .subtitle {
        font-size: 22px;
        color: #a8dadc;
        max-width: 800px;
        margin: 0 auto 40px;
        opacity: 0.95;
    }

    .color-palette {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 50px;
        flex-wrap: wrap;
    }

    .color-swatch {
        text-align: center;
    }

    .color-box {
        width: 100px;
        height: 100px;
        border-radius: 12px;
        margin-bottom: 10px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .color-name {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .color-code {
        font-size: 12px;
        opacity: 0.8;
        font-family: 'Courier New', monospace;
    }

    /* ===========================
       SUNSET BOULEVARD THEME SECTION
       ========================== */

    .theme-sunset {
        background: #264653;
        color: #f1faee;
        padding: 100px 60px;
    }

    .theme-sunset .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .theme-sunset .theme-badge {
        display: inline-block;
        background: #e76f51;
        color: white;
        padding: 8px 24px;
        border-radius: 25px;
        font-size: 12px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
    }

    .theme-sunset h2 {
        font-family: 'DejaVu Serif', Georgia, serif;
        font-size: 52px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #e9c46a;
    }

    .theme-sunset .description {
        font-size: 20px;
        line-height: 1.8;
        margin-bottom: 50px;
        max-width: 800px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 40px;
    }

    .feature-card {
        background: rgba(231, 111, 81, 0.1);
        border: 2px solid #e76f51;
        border-radius: 15px;
        padding: 40px 30px;
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        background: rgba(231, 111, 81, 0.2);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(231, 111, 81, 0.3);
    }

    .feature-icon {
        font-size: 48px;
        margin-bottom: 20px;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    .feature-card h3 {
        font-size: 24px;
        color: #f4a261;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .feature-card p {
        font-size: 16px;
        color: #f1faee;
        line-height: 1.7;
        opacity: 0.9;
    }

    /* ===========================
       TECH INNOVATION THEME SECTION
       ========================== */

    .theme-tech {
        background: #1e1e1e;
        color: #ffffff;
        padding: 100px 60px;
    }

    .theme-tech .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .theme-tech .theme-badge {
        display: inline-block;
        background: rgba(0, 102, 255, 0.2);
        border: 2px solid #0066ff;
        color: #00ffff;
        padding: 8px 24px;
        border-radius: 25px;
        font-size: 12px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
    }

    .theme-tech h2 {
        font-family: 'DejaVu Sans', Arial, sans-serif;
        font-size: 52px;
        font-weight: bold;
        margin-bottom: 25px;
        background: linear-gradient(135deg, #0066ff 0%, #00ffff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .theme-tech .description {
        font-size: 20px;
        line-height: 1.8;
        margin-bottom: 50px;
        max-width: 800px;
        color: rgba(255, 255, 255, 0.9);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin-top: 50px;
    }

    .stat-card {
        background: rgba(0, 102, 255, 0.1);
        border: 2px solid #0066ff;
        border-radius: 15px;
        padding: 40px 20px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: rgba(0, 102, 255, 0.2);
        border-color: #00ffff;
        box-shadow: 0 0 30px rgba(0, 255, 255, 0.3);
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 56px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #00ffff;
        text-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
    }

    .stat-label {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.8);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* ===========================
       COMPARISON TABLE SECTION
       ========================== */

    .comparison-section {
        background: linear-gradient(135deg, #f1faee 0%, #e9c46a 100%);
        padding: 80px 60px;
    }

    .comparison-section h2 {
        text-align: center;
        font-size: 42px;
        color: #264653;
        margin-bottom: 50px;
        font-weight: bold;
    }

    .theme-table {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .theme-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .theme-table th {
        background: #264653;
        color: white;
        padding: 20px;
        text-align: left;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .theme-table td {
        padding: 20px;
        border-bottom: 1px solid #e9c46a;
        font-size: 15px;
        color: #264653;
    }

    .theme-table tr:last-child td {
        border-bottom: none;
    }

    .theme-table tr:hover {
        background: rgba(233, 196, 106, 0.1);
    }

    .theme-table code {
        background: #264653;
        color: #00ffff;
        padding: 3px 8px;
        border-radius: 4px;
        font-family: 'Courier New', monospace;
        font-size: 13px;
    }

    /* ===========================
       CTA SECTION
       ========================== */

    .cta-section {
        background: linear-gradient(135deg, #1a2332 0%, #1e1e1e 100%);
        color: white;
        padding: 100px 60px;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 48px;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .cta-section p {
        font-size: 20px;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        display: inline-block;
        padding: 16px 40px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .cta-button.primary {
        background: linear-gradient(135deg, #0066ff 0%, #00ffff 100%);
        color: white;
    }

    .cta-button.primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 255, 255, 0.4);
    }

    .cta-button.secondary {
        background: transparent;
        border: 2px solid #00ffff;
        color: #00ffff;
    }

    .cta-button.secondary:hover {
        background: rgba(0, 255, 255, 0.1);
        transform: translateY(-3px);
    }

    /* ===========================
       RESPONSIVE DESIGN
       ========================== */

    @media (max-width: 1024px) {
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .theme-ocean,
        .theme-sunset,
        .theme-tech,
        .comparison-section,
        .cta-section {
            padding: 60px 30px;
        }

        .theme-ocean h1 {
            font-size: 42px;
        }

        .theme-sunset h2,
        .theme-tech h2 {
            font-size: 36px;
        }

        .features-grid,
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .color-palette {
            gap: 15px;
        }

        .color-box {
            width: 70px;
            height: 70px;
        }

        .cta-section h2 {
            font-size: 32px;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .cta-button {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Ocean Depths Theme Section -->
    <section class="theme-ocean">
        <div class="theme-badge">Ocean Depths Theme</div>
        <h1>Theme Factory Showcase</h1>
        <p class="subtitle">
            Demonstrating professional theme integration with the Claude Code theme-factory skill.
            This page showcases three distinct themes with complete color palettes and typography systems.
        </p>

        <div class="color-palette">
            <div class="color-swatch">
                <div class="color-box" style="background: #1a2332;"></div>
                <div class="color-name">Deep Navy</div>
                <div class="color-code">#1a2332</div>
            </div>
            <div class="color-swatch">
                <div class="color-box" style="background: #2d8b8b;"></div>
                <div class="color-name">Teal</div>
                <div class="color-code">#2d8b8b</div>
            </div>
            <div class="color-swatch">
                <div class="color-box" style="background: #a8dadc;"></div>
                <div class="color-name">Seafoam</div>
                <div class="color-code">#a8dadc</div>
            </div>
            <div class="color-swatch">
                <div class="color-box" style="background: #f1faee;"></div>
                <div class="color-name">Cream</div>
                <div class="color-code">#f1faee</div>
            </div>
        </div>
    </section>

    <!-- Sunset Boulevard Theme Section -->
    <section class="theme-sunset">
        <div class="content-wrapper">
            <div class="theme-badge">Sunset Boulevard Theme</div>
            <h2>Warm & Vibrant Design</h2>
            <p class="description">
                The Sunset Boulevard theme brings warmth and energy with its sunset-inspired color palette.
                Perfect for creative presentations, marketing materials, and lifestyle brands seeking an
                inviting and dynamic visual presence.
            </p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>Warm Palette</h3>
                    <p>Burnt orange, coral, and warm sand create an inviting atmosphere perfect for creative content.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">✨</div>
                    <h3>Energetic Feel</h3>
                    <p>Vibrant colors and bold typography capture attention and convey enthusiasm.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🌅</div>
                    <h3>Golden Hour</h3>
                    <p>Inspired by sunset colors that evoke feelings of warmth, creativity, and inspiration.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Versatile</h3>
                    <p>Works beautifully across presentations, documents, and web content.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Brand Ready</h3>
                    <p>Complete color system ready for immediate brand application and consistency.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💼</div>
                    <h3>Professional</h3>
                    <p>Balances creativity with professionalism for business and marketing contexts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Innovation Theme Section -->
    <section class="theme-tech">
        <div class="content-wrapper">
            <div class="theme-badge">Tech Innovation Theme</div>
            <h2>Future-Forward Technology</h2>
            <p class="description">
                The Tech Innovation theme delivers a bold, modern aesthetic with high-contrast colors perfect
                for technology presentations, software launches, and digital transformation content. Electric
                blue and neon cyan on dark backgrounds create a cutting-edge visual identity.
            </p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Themes</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Custom Options</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">WordPress Ready</div>
                </div>

                <div class="stat-card">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Showcased Here</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Theme Comparison Table -->
    <section class="comparison-section">
        <h2>Theme Comparison</h2>
        <div class="theme-table">
            <table>
                <thead>
                    <tr>
                        <th>Theme Name</th>
                        <th>Primary Color</th>
                        <th>Header Font</th>
                        <th>Best For</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Ocean Depths</strong></td>
                        <td><code>#1a2332</code> Deep Navy</td>
                        <td>DejaVu Sans Bold</td>
                        <td>Corporate, Financial, Professional</td>
                    </tr>
                    <tr>
                        <td><strong>Sunset Boulevard</strong></td>
                        <td><code>#e76f51</code> Burnt Orange</td>
                        <td>DejaVu Serif Bold</td>
                        <td>Creative, Marketing, Lifestyle</td>
                    </tr>
                    <tr>
                        <td><strong>Tech Innovation</strong></td>
                        <td><code>#0066ff</code> Electric Blue</td>
                        <td>DejaVu Sans Bold</td>
                        <td>Tech, Software, Innovation</td>
                    </tr>
                    <tr>
                        <td><strong>Forest Canopy</strong></td>
                        <td><code>#2d5016</code> Forest Green</td>
                        <td>DejaVu Sans Bold</td>
                        <td>Natural, Environmental, Organic</td>
                    </tr>
                    <tr>
                        <td><strong>Modern Minimalist</strong></td>
                        <td><code>#36454f</code> Charcoal</td>
                        <td>DejaVu Sans Bold</td>
                        <td>Clean, Contemporary, Universal</td>
                    </tr>
                    <tr>
                        <td><strong>Golden Hour</strong></td>
                        <td><code>#d4af37</code> Gold</td>
                        <td>DejaVu Serif Bold</td>
                        <td>Luxury, Premium, Elegant</td>
                    </tr>
                    <tr>
                        <td><strong>Arctic Frost</strong></td>
                        <td><code>#b0c4de</code> Light Steel Blue</td>
                        <td>DejaVu Sans</td>
                        <td>Cool, Crisp, Winter-Inspired</td>
                    </tr>
                    <tr>
                        <td><strong>Desert Rose</strong></td>
                        <td><code>#c99a83</code> Dusty Rose</td>
                        <td>DejaVu Serif</td>
                        <td>Soft, Sophisticated, Elegant</td>
                    </tr>
                    <tr>
                        <td><strong>Botanical Garden</strong></td>
                        <td><code>#7cb342</code> Garden Green</td>
                        <td>DejaVu Sans</td>
                        <td>Fresh, Organic, Natural</td>
                    </tr>
                    <tr>
                        <td><strong>Midnight Galaxy</strong></td>
                        <td><code>#0f0f23</code> Deep Space</td>
                        <td>DejaVu Sans Bold</td>
                        <td>Dramatic, Cosmic, Bold</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Use Theme Factory?</h2>
        <p>
            All 10 themes are available in the Claude Code theme-factory skill. Use them for presentations,
            documents, web pages, and more. Create custom themes on-the-fly for unique brand requirements.
        </p>
        <div class="cta-buttons">
            <a href="#" class="cta-button primary">View All Themes →</a>
            <a href="#" class="cta-button secondary">Read Documentation</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
