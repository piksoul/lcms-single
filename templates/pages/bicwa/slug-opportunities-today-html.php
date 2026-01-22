<?php
/**
 * Honey Opportunities Today - 2025 Snapshot
 * Material Design HTML Layout
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/BICWA
 * @filepath   templates/pages/BICWA/slug-opportunities-today-html.php
 */

defined('ABSPATH') || exit;
get_header();
?>

<!-- Google Fonts - Material Design Typography -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

<style>
    /* ========================================
       MATERIAL DESIGN RESET & BASE
       ======================================== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: #212121;
        line-height: 1.6;
        background: #FAFAFA;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* ========================================
       MATERIAL DESIGN COLORS
       ======================================== */
    :root {
        --md-primary: #FF6F00;           /* Deep Orange 800 */
        --md-primary-light: #FFA040;     /* Deep Orange 400 */
        --md-primary-dark: #C43E00;      /* Deep Orange 900 */
        --md-accent: #FFB300;            /* Amber 600 */
        --md-accent-light: #FFE082;      /* Amber 200 */
        --md-secondary: #00838F;         /* Cyan 800 */
        --md-secondary-light: #4FB3BF;   /* Cyan 400 */
        --md-text-primary: #212121;      /* Grey 900 */
        --md-text-secondary: #757575;    /* Grey 600 */
        --md-divider: #BDBDBD;           /* Grey 400 */
        --md-background: #FAFAFA;        /* Grey 50 */
        --md-surface: #FFFFFF;

        /* Elevation shadows (Material Design spec) */
        --md-elevation-1: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        --md-elevation-2: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        --md-elevation-3: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        --md-elevation-4: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        --md-elevation-5: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }

    /* ========================================
       HERO SECTION - MATERIAL DESIGN
       ======================================== */
    .md-hero {
        background: linear-gradient(135deg, var(--md-primary) 0%, var(--md-primary-light) 100%);
        color: white;
        padding: 80px 24px 100px;
        position: relative;
        overflow: hidden;
    }

    .md-hero::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><circle cx="200" cy="100" r="300" fill="rgba(255,255,255,0.05)"/><circle cx="1000" cy="400" r="400" fill="rgba(255,255,255,0.05)"/></svg>') no-repeat center;
        background-size: cover;
        opacity: 0.3;
    }

    .md-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 1;
    }

    .md-chip {
        display: inline-flex;
        align-items: center;
        background: rgba(255,255,255,0.25);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 24px;
        box-shadow: var(--md-elevation-1);
    }

    .md-hero h1 {
        font-family: 'Roboto Slab', serif;
        font-size: 56px;
        font-weight: 700;
        margin: 0 0 16px;
        line-height: 1.1;
        letter-spacing: -0.5px;
    }

    .md-hero .subtitle {
        font-size: 24px;
        font-weight: 300;
        opacity: 0.95;
        line-height: 1.4;
    }

    /* ========================================
       MATERIAL CARDS
       ======================================== */
    .md-section {
        padding: 80px 0;
    }

    .md-section-header {
        text-align: center;
        margin-bottom: 56px;
    }

    .md-overline {
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--md-primary);
        margin-bottom: 8px;
    }

    .md-section-title {
        font-family: 'Roboto Slab', serif;
        font-size: 40px;
        font-weight: 700;
        color: var(--md-text-primary);
        margin: 0 0 16px;
        line-height: 1.2;
    }

    .md-section-subtitle {
        font-size: 20px;
        font-weight: 300;
        color: var(--md-text-secondary);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.5;
    }

    .md-card {
        background: var(--md-surface);
        border-radius: 8px;
        box-shadow: var(--md-elevation-2);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
    }

    .md-card:hover {
        box-shadow: var(--md-elevation-4);
        transform: translateY(-4px);
    }

    .md-card-content {
        padding: 24px;
    }

    .md-card-icon {
        font-size: 48px;
        margin-bottom: 16px;
        display: block;
    }

    .md-card-title {
        font-size: 20px;
        font-weight: 500;
        color: var(--md-text-primary);
        margin: 0 0 12px;
        line-height: 1.3;
    }

    .md-card-text {
        font-size: 15px;
        color: var(--md-text-secondary);
        line-height: 1.6;
        margin: 0;
    }

    /* ========================================
       GRID LAYOUTS
       ======================================== */
    .md-grid {
        display: grid;
        gap: 24px;
        margin-top: 32px;
    }

    .md-grid-2 {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }

    .md-grid-3 {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }

    /* ========================================
       HERO CARD (Elevated Intro)
       ======================================== */
    .md-hero-card {
        background: var(--md-surface);
        border-radius: 12px;
        box-shadow: var(--md-elevation-3);
        padding: 48px;
        margin: -60px auto 0;
        max-width: 1000px;
        position: relative;
        z-index: 2;
    }

    .md-hero-card p {
        font-size: 20px;
        line-height: 1.7;
        color: var(--md-text-primary);
        margin-bottom: 16px;
    }

    .md-hero-card p:last-child {
        margin-bottom: 0;
    }

    .md-hero-card strong {
        font-weight: 500;
        color: var(--md-primary);
    }

    .md-hero-card em {
        font-style: normal;
        color: var(--md-secondary);
        font-weight: 500;
    }

    /* ========================================
       FEATURED CARDS (Two-Column Layout)
       ======================================== */
    .md-featured-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 24px;
        margin-top: 32px;
    }

    .md-card-primary {
        background: linear-gradient(135deg, rgba(255,111,0,0.05) 0%, rgba(255,179,0,0.05) 100%);
        border: 2px solid var(--md-accent-light);
    }

    .md-card-secondary {
        background: var(--md-secondary);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .md-card-secondary .md-card-title,
    .md-card-secondary .md-card-text {
        color: white;
    }

    .md-card-secondary .md-card-text {
        opacity: 0.9;
    }

    /* ========================================
       ACCENT SECTIONS
       ======================================== */
    .md-section-dark {
        background: linear-gradient(135deg, var(--md-primary-dark) 0%, var(--md-primary) 100%);
        color: white;
    }

    .md-section-dark .md-overline {
        color: var(--md-accent-light);
    }

    .md-section-dark .md-section-title,
    .md-section-dark .md-section-subtitle {
        color: white;
    }

    .md-section-dark .md-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .md-section-dark .md-card-title {
        color: var(--md-accent-light);
    }

    .md-section-dark .md-card-text {
        color: rgba(255,255,255,0.9);
    }

    .md-section-dark .md-card:hover {
        background: rgba(255,255,255,0.15);
        border-color: rgba(255,255,255,0.3);
    }

    /* ========================================
       CALLOUT CARD
       ======================================== */
    .md-callout {
        background: linear-gradient(135deg, var(--md-accent) 0%, var(--md-accent-light) 100%);
        border-radius: 12px;
        padding: 48px;
        box-shadow: var(--md-elevation-3);
        max-width: 1000px;
        margin: 0 auto;
    }

    .md-callout-title {
        font-family: 'Roboto Slab', serif;
        font-size: 32px;
        font-weight: 700;
        color: var(--md-text-primary);
        margin: 0 0 24px;
    }

    .md-callout ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .md-callout li {
        font-size: 18px;
        line-height: 2;
        color: var(--md-text-primary);
        padding-left: 32px;
        position: relative;
    }

    .md-callout li::before {
        content: '→';
        position: absolute;
        left: 0;
        color: var(--md-primary);
        font-weight: 700;
        font-size: 20px;
    }

    /* ========================================
       BUTTONS (Material Design)
       ======================================== */
    .md-button-group {
        display: flex;
        gap: 16px;
        justify-content: center;
        margin-top: 32px;
        flex-wrap: wrap;
    }

    .md-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 32px;
        font-size: 15px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1.25px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        border: none;
        box-shadow: var(--md-elevation-2);
    }

    .md-button-primary {
        background: var(--md-primary);
        color: white;
    }

    .md-button-primary:hover {
        background: var(--md-primary-dark);
        box-shadow: var(--md-elevation-4);
        transform: translateY(-2px);
    }

    .md-button-outlined {
        background: transparent;
        color: var(--md-primary);
        border: 2px solid var(--md-primary);
        box-shadow: none;
    }

    .md-button-outlined:hover {
        background: rgba(255,111,0,0.05);
        border-color: var(--md-primary-dark);
    }

    /* ========================================
       DIVIDERS
       ======================================== */
    .md-divider {
        height: 1px;
        background: var(--md-divider);
        border: none;
        margin: 48px 0;
    }

    /* ========================================
       LIST STYLES
       ======================================== */
    .md-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .md-list li {
        padding: 8px 0 8px 28px;
        position: relative;
        line-height: 1.7;
    }

    .md-list li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: var(--md-primary);
        font-weight: 700;
        font-size: 20px;
    }

    /* ========================================
       RESPONSIVE
       ======================================== */
    @media (max-width: 768px) {
        .md-hero {
            padding: 60px 16px 80px;
        }

        .md-hero h1 {
            font-size: 40px;
        }

        .md-hero .subtitle {
            font-size: 18px;
        }

        .md-hero-card {
            padding: 32px 24px;
            margin-top: -40px;
        }

        .md-hero-card p {
            font-size: 17px;
        }

        .md-section {
            padding: 60px 0;
        }

        .md-section-title {
            font-size: 32px;
        }

        .md-section-subtitle {
            font-size: 17px;
        }

        .md-featured-grid {
            grid-template-columns: 1fr;
        }

        .md-grid-2,
        .md-grid-3 {
            grid-template-columns: 1fr;
        }

        .md-callout {
            padding: 32px 24px;
        }

        .md-callout-title {
            font-size: 26px;
        }

        .md-callout li {
            font-size: 16px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="md-hero">
        <div class="md-container" style="text-align: center;">
            <div class="md-chip">WA Honey Industry</div>
            <h1>Honey Opportunities Today</h1>
            <p class="subtitle">2025 Snapshot — Western Australia's Turning Point</p>
        </div>
    </section>

    <!-- Hero Card (Introduction) -->
    <div class="md-container">
        <div class="md-hero-card">
            <p>Western Australia's honey sector sits at a <strong>turning point</strong>. With rising global demand for <strong>bioactive, traceable, and experience-driven products</strong>, WA's unique Jarrah, Marri, and Karri honeys offer rare ecological and commercial advantages.</p>
            <p>The next five years will define who captures the value shift from <em>commodity honey → premium experience → certified marketplace ecosystems</em>.</p>
        </div>
    </div>

    <!-- Section 1: Premium Products -->
    <section class="md-section">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">1. Premium Products</div>
                <h2 class="md-section-title">Premium & Functional Honey Products</h2>
                <p class="md-section-subtitle">Micro-portions, value-add substitutes, and symbiotic formulations</p>
            </div>

            <div class="md-grid md-grid-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🍯</span>
                        <h3 class="md-card-title">Micro-Portion "Honey Shots"</h3>
                        <p class="md-card-text">10–15g single-serve, TA-verified doses for oral or topical use; vintage-labelled "active honey" for wellness markets.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🥤</span>
                        <h3 class="md-card-title">Value-Add Substitutes</h3>
                        <p class="md-card-text">"Sweetened with Jarrah" syrups, sodas, cordials, and condiments replacing refined sugar; cross-branding with beverage and food producers.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🌿</span>
                        <h3 class="md-card-title">Symbiotic Formulations</h3>
                        <p class="md-card-text">Honey-ginger-lemon shots, lozenges, skincare, and ferments (jun/kombucha); leveraging co-brand and ingredient partnerships to extend reach.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">♻️</span>
                        <h3 class="md-card-title">Packaging Innovation</h3>
                        <p class="md-card-text">Low-waste aluminium or paper-foil formats; refill models aligning with sustainability credentials.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Experience Tourism -->
    <section class="md-section" style="background: #F5F5F5;">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">2. Experience Economy</div>
                <h2 class="md-section-title">Apiary & Experience Tourism</h2>
                <p class="md-section-subtitle">The "Honey House" destination model</p>
            </div>

            <div class="md-featured-grid">
                <div class="md-card md-card-primary">
                    <div class="md-card-content">
                        <span class="md-card-icon">🏞️</span>
                        <h3 class="md-card-title" style="font-size: 24px; margin-bottom: 16px;">"Honey House" Destination Model</h3>
                        <p class="md-card-text" style="margin-bottom: 16px;">Café + glass-wall extraction + retail + education zones (like chocolate factories or cideries).</p>
                        <ul class="md-list">
                            <li><strong>Revenue mix:</strong> café, retail, workshops, and tours</li>
                            <li><strong>Ideal locations:</strong> forest-edge townsites (Donnybrook, Balingup, Nannup)</li>
                            <li><strong>Hybrid operation viability:</strong> proven in similar WA ventures</li>
                        </ul>
                    </div>
                </div>

                <div class="md-card md-card-secondary">
                    <div class="md-card-content">
                        <span class="md-card-icon">✨</span>
                        <h3 class="md-card-title" style="font-size: 24px; margin-bottom: 16px;">First-Mover Advantage</h3>
                        <p class="md-card-text" style="margin-bottom: 12px;">2025–2030 window for authentic, early entrants to secure semantic ownership and tourism trail dominance.</p>
                        <p class="md-card-text"><strong>Benefits:</strong> Strong brand equity, multi-channel income, and community engagement before category saturation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Certified Marketplace -->
    <section class="md-section md-section-dark">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">3. Digital Infrastructure</div>
                <h2 class="md-section-title">Certified Honey Marketplace</h2>
                <p class="md-section-subtitle">Digital certification, provenance, and collective branding</p>
            </div>

            <div class="md-grid md-grid-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🔐</span>
                        <h3 class="md-card-title">Digital Certification Platform</h3>
                        <p class="md-card-text">Blockchain-style or verified-batch registry for TA-tested, origin-verified WA honeys.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">📦</span>
                        <h3 class="md-card-title">Dropship & Co-Brand Network</h3>
                        <p class="md-card-text">Centralised marketplace enabling member producers to sell direct-to-consumer via shared logistics and marketing layer.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🏅</span>
                        <h3 class="md-card-title">Collective Branding</h3>
                        <p class="md-card-text">"Certified WA Honey" seal; unified export presence; trust-based differentiation from blended/imported products.</p>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🎥</span>
                        <h3 class="md-card-title">Future Integration</h3>
                        <p class="md-card-text">QR on jar → video of hive/origin → book visit. Connecting digital and physical experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Strategic Takeaways -->
    <section class="md-section">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">4. Next Steps</div>
                <h2 class="md-section-title">Strategic Takeaways</h2>
                <p class="md-section-subtitle">Immediate priorities for 2025–2030</p>
            </div>

            <div class="md-callout">
                <h3 class="md-callout-title">Immediate Priorities</h3>
                <ul>
                    <li>Demand for <strong>bioactive honeys</strong> and <strong>authentic experiences</strong> will grow rapidly through 2030</li>
                    <li>Early integrated ventures—<strong>premium product + visitor experience + certified trade channel</strong>—can anchor the next generation of WA's honey economy</li>
                    <li>Concept validation and investment feasibility for <strong>micro-portion premium product line</strong></li>
                    <li>Pilot development of experience-based <strong>"Honey House" destination</strong></li>
                    <li>Foundation build for <strong>certified marketplace infrastructure</strong></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Outcome Section -->
    <section class="md-section" style="background: linear-gradient(135deg, rgba(255,179,0,0.1) 0%, rgba(255,235,130,0.1) 100%); padding: 100px 0;">
        <div class="md-container">
            <div class="md-hero-card" style="margin-top: 0; text-align: center; background: white;">
                <h2 class="md-section-title" style="margin-bottom: 24px;">The Vision</h2>
                <p style="font-size: 22px; line-height: 1.7; color: var(--md-text-primary);">
                    Build WA's reputation as the world's benchmark for <strong style="color: var(--md-primary);">forest-sourced, certified, and experience-rich honeys</strong> — transforming local apiaries from producers into <strong style="color: var(--md-secondary);">brand destinations</strong> and <strong style="color: var(--md-secondary);">digital exporters</strong>.
                </p>

                <div class="md-button-group">
                    <a href="#" class="md-button md-button-primary">Discuss Opportunities</a>
                    <a href="#" class="md-button md-button-outlined">Download Full Report</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
