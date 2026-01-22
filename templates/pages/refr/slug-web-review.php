<?php
/**
 * Website Review Case Studies - Modern Minimalist Format
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-web-review.php
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

<style>
    /* ============================================
       PAGE-SPECIFIC STYLES: Web Review Case Studies
       ============================================ */

    /* Hero override for this page */
    .hero-subtitle {
        margin-bottom: 40px;
    }

    /* Case Study Container - Alternating backgrounds */
    .case-study {
        margin-bottom: 0;
    }

    .case-study:nth-child(even) {
        background: #f8f8f8;
    }

    /* Overview section spacing */
    .overview-section {
        max-width: 992px;
        margin: 0 auto;
        padding: 80px 60px;
    }

    /* Strengths section spacing */
    .strengths-section {
        padding: 80px 60px;
    }

    /* Improvements section spacing */
    .improvements-section {
        padding: 80px 60px;
    }

    /* Summary Section - specific background */
    .summary-section {
        padding: 100px 60px;
        background: #f8f8f8;
    }

    .summary-grid {
        margin-top: 60px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    /* TaskList Section - Unique nested structure */
    .tasklist-section {
        padding: 100px 60px;
        background: white;
    }

    .tasklist-category {
        margin-top: 60px;
        padding: 40px;
        background: #f8f8f8;
        border-radius: 10px;
        border-left: 5px solid #12195B;
    }

    .tasklist-category-title {
        font-size: 32px;
        color: #12195B;
        margin-bottom: 30px;
        font-weight: 700;
        font-family: 'Raleway', Arial, Helvetica, sans-serif;
        text-transform: uppercase;
    }

    .tasklist-group {
        margin-bottom: 30px;
    }

    .tasklist-group:last-child {
        margin-bottom: 0;
    }

    .tasklist-group-title {
        font-size: 20px;
        color: #12195B;
        margin-bottom: 15px;
        font-weight: 700;
        font-family: 'Raleway', Arial, Helvetica, sans-serif;
        text-transform: uppercase;
        display: flex;
        align-items: center;
    }

    .tasklist-group-title::before {
        content: "→";
        color: #12195B;
        font-size: 24px;
        margin-right: 10px;
        font-weight: normal;
    }

    .tasklist-items {
        list-style: none;
        padding-left: 34px;
        margin: 0;
    }

    .tasklist-items li {
        font-size: 16px;
        color: #161617;
        line-height: 1.8;
        margin-bottom: 12px;
        padding-left: 20px;
        position: relative;
    }

    .tasklist-items li::before {
        content: "•";
        color: #12195B;
        font-size: 20px;
        position: absolute;
        left: 0;
        top: -2px;
    }

    .tasklist-subitems {
        list-style: none;
        padding-left: 20px;
        margin-top: 10px;
    }

    .tasklist-subitems li {
        font-size: 15px;
        color: #161617;
        line-height: 1.7;
        margin-bottom: 8px;
        padding-left: 20px;
    }

    .tasklist-subitems li::before {
        content: "◦";
        color: #12195B;
        font-size: 16px;
        position: absolute;
        left: 0;
    }

    /* Responsive - Page-specific */
    @media (max-width: 768px) {
        .overview-section,
        .strengths-section,
        .improvements-section,
        .summary-section,
        .tasklist-section {
            padding-left: 30px;
            padding-right: 30px;
        }

        .tasklist-category {
            padding: 25px;
        }

        .tasklist-category-title {
            font-size: 24px;
        }

        .tasklist-group-title {
            font-size: 18px;
        }

        .tasklist-items {
            padding-left: 20px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
        <img src="https://static.brand-hub.com.au/client/refr/ReframeWALogo-Vert_REV.svg" alt="Reframe WA Logo" class="hero-logo">
        <div class="hero-badge">Website Analysis Report</div>
        <h1>Consulting Website Case Studies</h1>
        <p class="hero-subtitle">In-depth analysis of three leadership and sales consulting websites, evaluating personality, authority, messaging, and conversion optimization</p>
    </section>

    <!-- Case Study 1: Reframe WA -->
    <div class="case-study">
        <!-- Overview -->
        <section class="overview-section">
            <div class="section-label">Case Study 1</div>
            <h2 class="section-title">Reframe WA</h2>
            <div class="section-description">
                <p>
                    Reframe WA is a leadership and executive coaching consultancy founded by Dr Nancy Pavisich. Their tagline is "Leadership isn't a title. It's how you show up." The site emphasizes individual transformation and professional development, asking visitors: "Do you ever wonder how others really see you at work?"
                </p>
                <a href="https://reframewa.com" class="text-link" target="_blank">Visit reframewa.com →</a>
            </div>
            <div class="grid-3">
                <div class="card">
                    <h3>Services</h3>
                    <p>Workshops & training, coaching, mentoring, and books/products focused on leadership development</p>
                </div>
                <div class="card">
                    <h3>Target Audience</h3>
                    <p>Professionals, executives, and leaders seeking life and executive coaching</p>
                </div>
                <div class="card">
                    <h3>Key Framework</h3>
                    <p>Review → Renew → Regenerate transformation process</p>
                </div>
            </div>
        </section>

        <!-- Strengths -->
        <section class="strengths-section">
            <div class="content-container">
                <div class="section-label">Key Strengths</div>
                <h2 class="section-title">What They Do Well</h2>

                <div class="grid-2">
                    <div class="card card-hover-lift">
                        <div class="card-icon">🎯</div>
                        <h3 class="large">Compelling Hook</h3>
                        <p>"Do you ever wonder how others really see you at work?" This immediately resonates with potential clients and identifies their core pain point.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">🏆</div>
                        <h3 class="large">Strong Authority</h3>
                        <p>25+ years of experience, published writer, quadruple award winner in leadership with clear testimonials from credible sources.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">💼</div>
                        <h3 class="large">Clear Positioning</h3>
                        <p>Personal transformation and leadership identity messaging is consistent throughout the site with the Review/Renew/Regenerate framework.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">📞</div>
                        <h3 class="large">Clear Call-to-Action</h3>
                        <p>Free 30-minute consultation offer provides a clear, low-risk next step for potential clients.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Scoring -->
        <section class="section-dark">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="grid-4">
                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Personality vs Organisation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Authority Presentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Hook, Story & Offer</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">5/10</div>
                        <div class="score-label">Video Testimonials</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Headlines & Terms</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Audience Segmentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Offer Clarity</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Sales Workflow</div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="item-list">
                    <div class="item">
                        <h4>Add Video Testimonials</h4>
                        <p>While text testimonials exist, video testimonials would strengthen social proof and authenticity significantly.</p>
                    </div>

                    <div class="item">
                        <h4>Deeper Founder Story</h4>
                        <p>Include a more personal "I started this because..." origin story to create emotional resonance with visitors.</p>
                    </div>

                    <div class="item">
                        <h4>Client Case Studies with Metrics</h4>
                        <p>Showcase more detailed success stories with before/after metrics and tangible results.</p>
                    </div>

                    <div class="item">
                        <h4>Sharper Audience Segmentation</h4>
                        <p>Create dedicated flows for specific segments like "midsize orgs," "senior executives," or "emerging leaders."</p>
                    </div>

                    <div class="item">
                        <h4>Pricing Transparency</h4>
                        <p>Provide clearer pricing indicators and next-step flows for services and membership options.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Final Score -->
        <section class="section-dark" style="text-align: center;">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">8.0</div>
                <div class="final-score-label">Strong positioning with room to polish storytelling and social proof</div>
            </div>
        </section>
        <?php endif; ?>
    </div>

    <div class="section-divider"></div>

    <!-- Case Study 2: John Blake -->
    <div class="case-study">
        <!-- Overview -->
        <section class="overview-section">
            <div class="section-label">Case Study 2</div>
            <h2 class="section-title">John Blake</h2>
            <div class="section-description">
                <p>
                    John Blake positions himself as a sales coach and strategist based in Western Australia with 37 years of business experience and 21 years of elite sales training. His hero headline: "Boost Your Sales with Proven Strategy & Expert Coaching" targets business owners who want to increase conversion and optimize sales processes.
                </p>
                <a href="https://john-blake.com.au" class="text-link" target="_blank">Visit john-blake.com.au →</a>
            </div>
            <div class="grid-3">
                <div class="card">
                    <h3>Services</h3>
                    <p>Sales audits, sales training, free resources, and the "High Stakes Selling" book</p>
                </div>
                <div class="card">
                    <h3>Target Audience</h3>
                    <p>Business owners and sales professionals seeking to improve conversion rates</p>
                </div>
                <div class="card">
                    <h3>Key Framework</h3>
                    <p>STRIKE sales system with proven conversion methodology</p>
                </div>
            </div>
        </section>

        <!-- Strengths -->
        <section class="strengths-section">
            <div class="content-container">
                <div class="section-label">Key Strengths</div>
                <h2 class="section-title">What They Do Well</h2>

                <div class="grid-2">
                    <div class="card card-hover-lift">
                        <div class="card-icon">💪</div>
                        <h3 class="large">Exceptional Authority</h3>
                        <p>37 years of business experience and 21 years of elite sales training clearly positioned upfront with strong testimonials including 100% conversion results.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">🎣</div>
                        <h3 class="large">Pain-Based Hook</h3>
                        <p>"Are you wasting good leads on poor sales systems?" immediately identifies the core problem many businesses face.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">🎯</div>
                        <h3 class="large">Excellent Segmentation</h3>
                        <p>Clear paths for Business Owners vs Sales Professionals with targeted questions to identify visitor needs.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">🔄</div>
                        <h3 class="large">Smart Funnel Design</h3>
                        <p>Free resources act as lead magnets, moving visitors through awareness → interest → conversion seamlessly.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Scoring -->
        <section class="section-dark">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="grid-4">
                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Personality vs Organisation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">9/10</div>
                        <div class="score-label">Authority Presentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Hook, Story & Offer</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">5/10</div>
                        <div class="score-label">Video Testimonials</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Headlines & Terms</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Audience Segmentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Offer Clarity</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">8/10</div>
                        <div class="score-label">Sales Workflow</div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="item-list">
                    <div class="item">
                        <h4>Add Video Testimonials</h4>
                        <p>Written reviews are strong, but video testimonials would add immediacy and emotional proof.</p>
                    </div>

                    <div class="item">
                        <h4>Humanize with Story</h4>
                        <p>While authority is clear, a more personal origin story would create deeper connection with potential clients.</p>
                    </div>

                    <div class="item">
                        <h4>Industry-Specific Case Studies</h4>
                        <p>Showcase detailed case studies segmented by industry with specific metrics and outcomes.</p>
                    </div>

                    <div class="item">
                        <h4>Membership/Continuity Options</h4>
                        <p>Consider adding ongoing membership or continuity programs for recurring revenue and client relationships.</p>
                    </div>

                    <div class="item">
                        <h4>Pricing Framework</h4>
                        <p>While custom pricing makes sense, providing pricing ranges or packages could improve conversion.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Final Score -->
        <section class="section-dark" style="text-align: center;">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">8.5</div>
                <div class="final-score-label">Excellent authority and funnel structure—very solid B2B site</div>
            </div>
        </section>
        <?php endif; ?>
    </div>

    <div class="section-divider"></div>

    <!-- Case Study 3: Heartware Group -->
    <div class="case-study">
        <!-- Overview -->
        <section class="overview-section">
            <div class="section-label">Case Study 3</div>
            <h2 class="section-title">Heartware Group</h2>
            <div class="section-description">
                <p>
                    The Heartware Group is a leadership and organisational-culture consultancy in Western Australia. Their messaging emphasizes "People First, Now More Than Ever" and blends the art of leadership with the science of behavioural analytics using tools like The Predictive Index.
                </p>
                <a href="https://heartwaregroup.com.au" class="text-link" target="_blank">Visit heartwaregroup.com.au →</a>
            </div>
            <div class="grid-3">
                <div class="card">
                    <h3>Services</h3>
                    <p>Leadership programs, workforce surveys/analytics, consulting, speaker/MC engagement</p>
                </div>
                <div class="card">
                    <h3>Target Audience</h3>
                    <p>CEOs/MDs, HR Professionals, Managers and Team Leaders</p>
                </div>
                <div class="card">
                    <h3>Unique Positioning</h3>
                    <p>"Art meets Science" approach blending heart with data-driven behavioural analytics</p>
                </div>
            </div>
        </section>

        <!-- Strengths -->
        <section class="strengths-section">
            <div class="content-container">
                <div class="section-label">Key Strengths</div>
                <h2 class="section-title">What They Do Well</h2>

                <div class="grid-2">
                    <div class="card card-hover-lift">
                        <div class="card-icon">🎨</div>
                        <h3 class="large">Unique Positioning</h3>
                        <p>"Art + Science" approach differentiates them by combining emotional intelligence (heart) with data analytics and behavioural science.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">👥</div>
                        <h3 class="large">Clear Segmentation</h3>
                        <p>Strong "Who We Help" sections targeting CEOs, HR professionals, and team leaders with relevant messaging for each.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">📊</div>
                        <h3 class="large">Data-Driven Credibility</h3>
                        <p>Use of The Predictive Index and human data analytics adds scientific credibility to leadership consulting.</p>
                    </div>

                    <div class="card card-hover-lift">
                        <div class="card-icon">🎁</div>
                        <h3 class="large">Smart Lead Magnet</h3>
                        <p>Free Predictive Index behavioural assessment provides value upfront while capturing leads effectively.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Scoring -->
        <section class="section-dark">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="grid-4">
                    <div class="score-card">
                        <div class="score-number">6/10</div>
                        <div class="score-label">Personality vs Organisation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Authority Presentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Hook, Story & Offer</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">5/10</div>
                        <div class="score-label">Video Testimonials</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Headlines & Terms</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Audience Segmentation</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Offer Clarity</div>
                    </div>

                    <div class="score-card">
                        <div class="score-number">7/10</div>
                        <div class="score-label">Sales Workflow</div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="item-list">
                    <div class="item">
                        <h4>Strengthen Founder Story</h4>
                        <p>Dawn Russell is mentioned but her personal origin story could be more prominent to create emotional connection.</p>
                    </div>

                    <div class="item">
                        <h4>Add Video Testimonials</h4>
                        <p>Text-based success stories exist, but video testimonials would elevate authenticity and engagement.</p>
                    </div>

                    <div class="item">
                        <h4>Transparent Pricing</h4>
                        <p>While the Heartwired Evolution program shows pricing, other services could benefit from pricing transparency or ranges.</p>
                    </div>

                    <div class="item">
                        <h4>Client Metrics & Case Studies</h4>
                        <p>Showcase more visible before/after metrics, client logos, and detailed case studies with measurable outcomes.</p>
                    </div>

                    <div class="item">
                        <h4>Prominent CTAs</h4>
                        <p>Make "book a free strategy call" or similar CTAs more prominent across all pages for better conversion.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (LeanCMS_Helpers::check_url_param()): ?>
        <!-- Final Score -->
        <section class="section-dark" style="text-align: center;">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">7.5</div>
                <div class="final-score-label">Strong intellectual positioning needing more personality and visual proof</div>
            </div>
        </section>
        <?php endif; ?>
    </div>

    <!-- Summary Comparison -->
    <section class="summary-section">
        <div class="content-container">
            <div class="section-label">Comparative Analysis</div>
            <h2 class="section-title">Side-by-Side Summary</h2>

            <div class="summary-grid grid-3">
                <div class="summary-card">
                    <h3>Reframe WA</h3>
                    <div class="summary-score">8.0/10</div>
                    <p class="summary-text">
                        <strong>Strengths:</strong> Authentic founder presence, credible positioning, compelling hook, structured transformation process.
                        <br><br>
                        <strong>Focus:</strong> Individual transformation and leadership identity.
                    </p>
                    <a href="https://reframewa.com" class="summary-link" target="_blank">reframewa.com →</a>
                </div>

                <div class="summary-card">
                    <h3>John Blake</h3>
                    <div class="summary-score">8.5/10</div>
                    <p class="summary-text">
                        <strong>Strengths:</strong> Exceptional authority, smart funnel, excellent segmentation, strong B2B tone, outcome-driven messaging.
                        <br><br>
                        <strong>Focus:</strong> Sales conversion and proven methodology.
                    </p>
                    <a href="https://john-blake.com.au" class="summary-link" target="_blank">john-blake.com.au →</a>
                </div>

                <div class="summary-card">
                    <h3>Heartware Group</h3>
                    <div class="summary-score">7.5/10</div>
                    <p class="summary-text">
                        <strong>Strengths:</strong> Unique art+science positioning, clear segmentation, data-driven credibility, relevant to current workplace trends.
                        <br><br>
                        <strong>Focus:</strong> Organisational culture and people-first leadership.
                    </p>
                    <a href="https://heartwaregroup.com.au" class="summary-link" target="_blank">heartwaregroup.com.au →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- TaskList Section -->
    <section class="tasklist-section">
        <div class="content-container">
            <div class="section-label">Roadmap</div>
            <h2 class="section-title">TaskList</h2>

            <!-- Quick Wins -->
            <div class="tasklist-category">
                <h3 class="tasklist-category-title">Quick Wins (0–3 months)</h3>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Messaging & Positioning</h4>
                    <ul class="tasklist-items">
                        <li>Refine homepage headline to focus on a single, tangible transformation outcome (e.g., "Lead with confidence and clarity in 90 days").</li>
                        <li>Add a short "Why I started Reframe WA" paragraph or video clip from Dr Nancy to deepen authenticity.</li>
                        <li>Create a concise one-sentence "core offer" (e.g., "We help leaders realign how they're perceived at work to match their intent.").</li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Social Proof</h4>
                    <ul class="tasklist-items">
                        <li>Record 2–3 short (30 sec) video testimonials with clear metrics or emotional outcomes.</li>
                        <li>Re-order testimonial section so social proof appears higher on key pages.</li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Funnel / Conversion</h4>
                    <ul class="tasklist-items">
                        <li>Make the Free 30-Minute Call CTA more prominent and repeated on all pages.</li>
                        <li>Add a simple follow-up email sequence confirming the booking and sharing a quick value resource (PDF or video).</li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Website UX</h4>
                    <ul class="tasklist-items">
                        <li>Add one "Start Here" or "Work With Us" summary page showing a 3-step client journey (Awareness → Call → Program).</li>
                        <li>Simplify navigation: group "Coaching," "Workshops," and "Courses" under a clear Services dropdown.</li>
                    </ul>
                </div>
            </div>

            <!-- Further Work -->
            <div class="tasklist-category">
                <h3 class="tasklist-category-title">🔁 Further Work (3–12 months)</h3>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Offer Development</h4>
                    <ul class="tasklist-items">
                        <li>Productise the leadership framework into a branded model (e.g., The Reframe Method), making it measurable and teachable.</li>
                        <li>Create tiered service paths:
                            <ul class="tasklist-subitems">
                                <li><strong>Essentials (online)</strong> – short course</li>
                                <li><strong>Professional (1:1 + group)</strong> – coaching program</li>
                                <li><strong>Enterprise</strong> – for organisations</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">AI / Augmentation Readiness</h4>
                    <ul class="tasklist-items">
                        <li>Explore integrating behavioural or 360-feedback tools with simple analytics dashboards.</li>
                        <li>Develop an AI-assisted reflection or journaling companion to enhance between-session engagement.</li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Authority Building</h4>
                    <ul class="tasklist-items">
                        <li>Launch a monthly "Leadership Reflections" blog or podcast.</li>
                        <li>Publish an updated version of the book or e-book with a lead-capture funnel.</li>
                        <li>Collect and visualise program impact data (before/after leadership confidence, engagement scores).</li>
                    </ul>
                </div>

                <div class="tasklist-group">
                    <h4 class="tasklist-group-title">Brand & Marketing</h4>
                    <ul class="tasklist-items">
                        <li>Build a short brand video introducing Dr Nancy and the philosophy behind Reframe WA.</li>
                        <li>Align visuals and tone for consistency across LinkedIn, website, and email templates.</li>
                        <li>Introduce a quarterly thought-leadership webinar or panel to showcase expertise and generate leads.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
