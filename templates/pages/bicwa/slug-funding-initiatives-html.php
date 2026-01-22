<?php
/**
 * Funding & Initiatives (WA + Federal)
 * Material Design HTML Layout
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/BICWA
 * @filepath   templates/pages/BICWA/slug-funding-initiatives-html.php
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
       MATERIAL DESIGN COLORS (Funding Theme)
       ======================================== */
    :root {
        --md-primary: #1976D2;           /* Blue 700 */
        --md-primary-light: #64B5F6;     /* Blue 300 */
        --md-primary-dark: #0D47A1;      /* Blue 900 */
        --md-accent: #00897B;            /* Teal 600 */
        --md-accent-light: #4DB6AC;      /* Teal 300 */
        --md-secondary: #FFA726;         /* Orange 400 */
        --md-secondary-light: #FFB74D;   /* Orange 300 */
        --md-text-primary: #212121;      /* Grey 900 */
        --md-text-secondary: #757575;    /* Grey 600 */
        --md-divider: #BDBDBD;           /* Grey 400 */
        --md-background: #FAFAFA;        /* Grey 50 */
        --md-surface: #FFFFFF;

        /* Elevation shadows */
        --md-elevation-1: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        --md-elevation-2: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        --md-elevation-3: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        --md-elevation-4: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        --md-elevation-5: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
    }

    /* ========================================
       HERO SECTION
       ======================================== */
    .md-hero {
        background: linear-gradient(135deg, var(--md-primary) 0%, var(--md-accent) 100%);
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

    .md-card-meta {
        font-size: 13px;
        color: var(--md-text-secondary);
        margin-top: 12px;
        opacity: 0.8;
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
       HERO CARD
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
        color: var(--md-accent);
        font-weight: 500;
    }

    /* ========================================
       ACCENT SECTIONS
       ======================================== */
    .md-section-dark {
        background: linear-gradient(135deg, var(--md-primary-dark) 0%, var(--md-primary) 100%);
        color: white;
    }

    .md-section-dark .md-overline {
        color: var(--md-secondary-light);
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
        color: white;
    }

    .md-section-dark .md-card-text,
    .md-section-dark .md-card-meta {
        color: rgba(255,255,255,0.9);
    }

    .md-section-dark .md-card:hover {
        background: rgba(255,255,255,0.15);
        border-color: rgba(255,255,255,0.3);
    }

    /* ========================================
       FEATURED CARDS
       ======================================== */
    .md-card-featured {
        background: linear-gradient(135deg, rgba(25,118,210,0.05) 0%, rgba(0,137,123,0.05) 100%);
        border: 2px solid var(--md-accent-light);
        padding: 36px;
    }

    .md-card-featured .md-card-title {
        font-size: 24px;
        color: var(--md-primary-dark);
        margin-bottom: 16px;
    }

    .md-card-featured ul {
        margin: 0;
        padding-left: 20px;
        line-height: 1.8;
    }

    .md-card-featured li {
        margin-bottom: 8px;
    }

    /* ========================================
       HIGHLIGHT BOX
       ======================================== */
    .md-highlight {
        background: var(--md-accent);
        color: white;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        box-shadow: var(--md-elevation-3);
    }

    .md-highlight-icon {
        font-size: 64px;
        margin-bottom: 20px;
    }

    .md-highlight h3 {
        font-family: 'Roboto Slab', serif;
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 16px;
    }

    .md-highlight p {
        font-size: 18px;
        line-height: 1.7;
        margin: 0;
        opacity: 0.95;
    }

    /* ========================================
       TAKEAWAYS GRID
       ======================================== */
    .md-takeaway-card {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        padding: 32px;
        border-radius: 12px;
        border: 2px solid rgba(255,255,255,0.3);
        text-align: center;
    }

    .md-takeaway-card-icon {
        font-size: 56px;
        margin-bottom: 16px;
    }

    .md-takeaway-card h3 {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 12px;
        color: white;
    }

    .md-takeaway-card p {
        font-size: 16px;
        line-height: 1.7;
        margin: 0;
        opacity: 0.95;
        color: white;
    }

    /* ========================================
       BUTTONS
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
        background: rgba(25,118,210,0.05);
        border-color: var(--md-primary-dark);
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

        .md-grid-2,
        .md-grid-3 {
            grid-template-columns: 1fr;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="md-hero">
        <div class="md-container" style="text-align: center;">
            <div class="md-chip">WA Honey Industry — Investment Pathways</div>
            <h1>Funding & Initiatives</h1>
            <p class="subtitle">WA + Federal — Grant Programs & Strategic Funding</p>
        </div>
    </section>

    <!-- Hero Card (Introduction) -->
    <div class="md-container">
        <div class="md-hero-card">
            <p>Western Australia's honey sector benefits from multiple aligned funding programs spanning state and federal levels. These grants support <strong>feasibility studies, capital equipment, visitor experiences, export development, and regional infrastructure</strong>.</p>
            <p>The key to success: <em>staged applications</em> that sequence feasibility → pilot → scale while leveraging both competitive grants and provenance programs.</p>
        </div>
    </div>

    <!-- Section 1: Regional & State Funding -->
    <section class="md-section md-section-dark">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">WA State Programs</div>
                <h2 class="md-section-title">Regional Economic Development & Value-Add</h2>
                <p class="md-section-subtitle">DPIRD, Tourism WA & Lotterywest</p>
            </div>

            <div class="md-grid md-grid-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🏞️</span>
                        <h3 class="md-card-title">Regional Economic Development (RED) Grants</h3>
                        <p class="md-card-text">Small–mid capital or pilot projects in regional WA; delivered via Regional Development Commissions. Competitive but very aligned to job creation, value-add food, and visitor economy.</p>
                        <div class="md-card-meta">
                            <strong>Range:</strong> $50k–$250k<br>
                            <strong>Source:</strong> DPIRD via RDCs
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🔬</span>
                        <h3 class="md-card-title">VAIG – Feasibility Stream</h3>
                        <p class="md-card-text">Value Add Investment Grants (DPIRD). Pays for feasibility, detailed design, trials, de-risking for food & beverage value-add capital projects. Perfect for scoping the Honey House, micro-portioning line, TA lab/QC process.</p>
                        <div class="md-card-meta">
                            <strong>Use for:</strong> Feasibility, trials, design<br>
                            <strong>Source:</strong> DPIRD (recurring rounds)
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">✈️</span>
                        <h3 class="md-card-title">Tourism WA – Industry Development & Events</h3>
                        <p class="md-card-text">Industry development: advisory + pathways for new attractions/experiences. Regional Events Scheme (RES): cash support for smaller regional events—ideal for a "Jarrah Harvest" launch/festival.</p>
                        <div class="md-card-meta">
                            <strong>Source:</strong> Tourism Western Australia
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🎟️</span>
                        <h3 class="md-card-title">Lotterywest Grants</h3>
                        <p class="md-card-text">Infrastructure/fit-out with community benefit, interpretation, trails, innovation. Often used for visitor-centre style projects when NFP/community value is clear (partner with shire or local NFP).</p>
                        <div class="md-card-meta">
                            <strong>Ideal for:</strong> Glass-wall displays, signage<br>
                            <strong>Source:</strong> Lotterywest
                        </div>
                    </div>
                </div>

                <div class="md-card">
                    <div class="md-card-content">
                        <span class="md-card-icon">🏅</span>
                        <h3 class="md-card-title">Buy West Eat Best</h3>
                        <p class="md-card-text">Not a cash grant, but a powerful provenance mark + marketing platform for WA food producers—strengthens marketplace trust and retail adoption.</p>
                        <div class="md-card-meta">
                            <strong>Source:</strong> DPIRD
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Federal Funding -->
    <section class="md-section">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">Federal Programs</div>
                <h2 class="md-section-title">Growing Regions & Export Development</h2>
                <p class="md-section-subtitle">Larger-scale capital and international market expansion</p>
            </div>

            <div class="md-grid md-grid-2">
                <div class="md-card md-card-featured">
                    <span class="md-card-icon">🏗️</span>
                    <h3 class="md-card-title">Growing Regions Program</h3>
                    <p class="md-card-text" style="margin-bottom: 16px;"><strong>Range:</strong> $0.5m–$15m for regional community infrastructure via eligible NFPs/LGAs.</p>
                    <p class="md-card-text">If the Honey House is structured with a shire/NFP partner and strong regional benefit, this is the <strong>"go big" capital lever</strong>.</p>
                    <div class="md-card-meta">
                        <strong>Source:</strong> Infrastructure Australia (round-based)
                    </div>
                </div>

                <div class="md-card md-card-featured">
                    <span class="md-card-icon">🌏</span>
                    <h3 class="md-card-title">Export Market Development Grants (EMDG)</h3>
                    <p class="md-card-text" style="margin-bottom: 16px;">Matched funding for overseas marketing (e-commerce, trade shows, content) for certified/TA-tested premium honey exports.</p>
                    <p class="md-card-text" style="font-weight: 500; color: var(--md-secondary);"><strong>Note:</strong> Scheme changes and oversubscription—apply early and plan conservatively.</p>
                    <div class="md-card-meta">
                        <strong>Source:</strong> Austrade
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Local Support -->
    <section class="md-section" style="background: #F5F5F5;">
        <div class="md-container">
            <div class="md-highlight">
                <div class="md-highlight-icon">🤝</div>
                <h3>Southern Forests Food Council (SFFC)</h3>
                <p style="margin-bottom: 16px;">Operates targeted programs (e.g., 2024 grower subsidy for project planning/funding applications).</p>
                <p>Useful for <strong>bid prep and pipeline intel</strong> in the Manjimup–Pemberton–Donnybrook arc.</p>
            </div>
        </div>
    </section>

    <!-- Section 4: What Each Could Fund -->
    <section class="md-section">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">Strategic Matching</div>
                <h2 class="md-section-title">What Each Could Fund</h2>
                <p class="md-section-subtitle">Match grants to your specific initiatives</p>
            </div>

            <div class="md-grid md-grid-3">
                <div class="md-card" style="border-left: 6px solid var(--md-secondary);">
                    <div class="md-card-content">
                        <h3 class="md-card-title" style="font-size: 22px; margin-bottom: 16px;">🏞️ Honey House<br><span style="font-size: 16px; font-weight: 400;">(café + glass apiary + education + shop)</span></h3>
                        <ul style="margin: 0; padding-left: 20px; line-height: 1.8; font-size: 15px;">
                            <li><strong>Feasibility/design:</strong> VAIG Feasibility (DPIRD)</li>
                            <li><strong>Capital/fit-out:</strong> RED Grants (partial), Lotterywest (education/public benefit), Growing Regions with NFP/shire partner</li>
                            <li><strong>Launch event:</strong> Tourism WA RES/REP</li>
                        </ul>
                    </div>
                </div>

                <div class="md-card" style="border-left: 6px solid var(--md-accent);">
                    <div class="md-card-content">
                        <h3 class="md-card-title" style="font-size: 22px; margin-bottom: 16px;">🍯 Premium "Active Honey"<br><span style="font-size: 16px; font-weight: 400;">Micro-portions & Value-Add Line</span></h3>
                        <ul style="margin: 0; padding-left: 20px; line-height: 1.8; font-size: 15px;">
                            <li><strong>Feasibility, packaging trials, TA testing:</strong> VAIG Feasibility (DPIRD)</li>
                            <li><strong>Pilot equipment (small line) in region:</strong> RED Grants (DPIRD)</li>
                            <li><strong>Brand/provenance leverage:</strong> Buy West Eat Best (DPIRD)</li>
                            <li><strong>Export marketing (SG/MY/JP):</strong> EMDG (Austrade)</li>
                        </ul>
                    </div>
                </div>

                <div class="md-card" style="border-left: 6px solid var(--md-primary);">
                    <div class="md-card-content">
                        <h3 class="md-card-title" style="font-size: 22px; margin-bottom: 16px;">🔐 Certified WA Honey Marketplace<br><span style="font-size: 16px; font-weight: 400;">(dropship + provenance registry)</span></h3>
                        <ul style="margin: 0; padding-left: 20px; line-height: 1.8; font-size: 15px;">
                            <li><strong>Scoping/prototype (tech + governance + QA):</strong> VAIG Feasibility; RED for regional digital commerce</li>
                            <li><strong>Trust & education infra:</strong> Lotterywest (NFP angle)</li>
                            <li><strong>Demand activation:</strong> Tourism WA RES, plus shire tourism funds</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Practical Takeaways -->
    <section class="md-section md-section-dark">
        <div class="md-container">
            <div class="md-section-header">
                <div class="md-overline">Key Actions</div>
                <h2 class="md-section-title">Practical Takeaways</h2>
                <p class="md-section-subtitle">Strategic funding pathways</p>
            </div>

            <div class="md-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
                <div class="md-takeaway-card">
                    <div class="md-takeaway-card-icon">📋</div>
                    <h3>Staged Pathway</h3>
                    <p>Run <strong>VAIG Feasibility → RED (pilot capex) → RES (launch event)</strong> as a staged pathway; layer Lotterywest/Growing Regions for bigger builds.</p>
                </div>

                <div class="md-takeaway-card">
                    <div class="md-takeaway-card-icon">🏅</div>
                    <h3>Brand Trust Matters</h3>
                    <p>Join <strong>Buy West Eat Best</strong> early—it strengthens every application and the certified marketplace story.</p>
                </div>

                <div class="md-takeaway-card">
                    <div class="md-takeaway-card-icon">🌏</div>
                    <h3>Export Planning</h3>
                    <p><strong>EMDG</strong> is viable but volatile—design export marketing with contingency funding.</p>
                </div>

                <div class="md-takeaway-card">
                    <div class="md-takeaway-card-icon">🤝</div>
                    <h3>Local Allies</h3>
                    <p>Engage <strong>SFFC and Regional Development Commissions</strong> early—they help shape stronger, region-fit proposals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="md-section">
        <div class="md-container">
            <div class="md-hero-card" style="margin-top: 0; text-align: center;">
                <h2 class="md-section-title" style="margin-bottom: 24px;">Ready to Apply?</h2>
                <p style="font-size: 22px; line-height: 1.7; color: var(--md-text-primary);">
                    Start with <strong style="color: var(--md-primary);">feasibility</strong>, sequence to <strong style="color: var(--md-accent);">pilot capital</strong>, and layer <strong style="color: var(--md-secondary);">community benefit</strong> for maximum funding leverage. The pathway exists—now map your milestones to the funding calendar.
                </p>

                <div class="md-button-group">
                    <a href="#" class="md-button md-button-primary">Download Funding Matrix</a>
                    <a href="#" class="md-button md-button-outlined">Contact SFFC</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
