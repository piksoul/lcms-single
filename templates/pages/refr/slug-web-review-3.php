<?php
/**
 * Website Review Case Studies - Modern Minimalist Format + AI-Age Analysis
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-web-review-3.php
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

    /* Hero */
    .hero {
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 100px 60px;
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
        max-width: 800px;
        margin: 0 auto 40px;
    }

    /* Case Study Container */
    .case-study {
        margin-bottom: 0;
    }

    .case-study:nth-child(even) {
        background: #f8f8f8;
    }

    /* Overview */
    .overview-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 60px;
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
        max-width: 900px;
    }

    .website-link {
        display: inline-block;
        margin-top: 15px;
        color: #36454f;
        font-weight: bold;
        text-decoration: none;
        border-bottom: 2px solid #708090;
        transition: all 0.3s ease;
    }

    .website-link:hover {
        color: #708090;
    }

    .overview-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 60px;
    }

    .overview-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 2px solid #d3d3d3;
        transition: all 0.3s ease;
    }

    .case-study:nth-child(even) .overview-card {
        background: #f8f8f8;
    }

    .overview-card:hover {
        border-color: #708090;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .overview-card h3 {
        font-size: 18px;
        color: #36454f;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .overview-card p {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
    }

    /* Strengths Section */
    .strengths-section {
        padding: 80px 60px;
    }

    .content-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .strengths-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-top: 40px;
    }

    .strength-card {
        background: white;
        border: 2px solid #d3d3d3;
        border-radius: 10px;
        padding: 40px;
        transition: all 0.3s ease;
    }

    .case-study:nth-child(even) .strength-card {
        background: #f8f8f8;
    }

    .strength-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: #36454f;
    }

    .strength-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .strength-card h3 {
        font-size: 24px;
        color: #36454f;
        margin-bottom: 15px;
    }

    .strength-card p {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
    }

    /* Scoring Section */
    .scoring-section {
        background: #36454f;
        color: white;
        padding: 80px 60px;
    }

    .scoring-section .section-title {
        color: white;
    }

    .scoring-section .section-label {
        color: rgba(255, 255, 255, 0.8);
    }

    .scoring-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin-top: 60px;
    }

    .score-card {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        padding: 40px 20px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .score-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.15);
    }

    .score-number {
        font-size: 56px;
        font-weight: bold;
        color: white;
        margin-bottom: 15px;
    }

    .score-label {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
    }

    /* Improvements Section */
    .improvements-section {
        padding: 80px 60px;
    }

    .improvements-list {
        max-width: 900px;
        margin: 40px auto 0;
    }

    .improvement-item {
        background: white;
        padding: 30px;
        border-left: 4px solid #708090;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .case-study:nth-child(even) .improvement-item {
        background: #f8f8f8;
    }

    .improvement-item h4 {
        font-size: 18px;
        color: #36454f;
        margin-bottom: 10px;
    }

    .improvement-item p {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
    }

    /* Final Score Section */
    .final-score-section {
        background: linear-gradient(135deg, #36454f 0%, #708090 100%);
        color: white;
        padding: 80px 60px;
        text-align: center;
    }

    .final-score-container {
        max-width: 600px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.1);
        padding: 60px;
        border-radius: 15px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .final-score-number {
        font-size: 96px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .final-score-label {
        font-size: 24px;
        opacity: 0.95;
    }

    /* Divider */
    .divider {
        height: 80px;
        background: linear-gradient(to bottom, transparent 0%, #708090 50%, transparent 100%);
        opacity: 0.3;
    }

    /* Summary Section */
    .summary-section {
        padding: 100px 60px;
        background: #f8f8f8;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 60px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .summary-card {
        background: white;
        padding: 50px 40px;
        border-radius: 10px;
        border: 2px solid #d3d3d3;
        transition: all 0.3s ease;
        text-align: center;
    }

    .summary-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-color: #36454f;
    }

    .summary-card h3 {
        font-size: 28px;
        color: #36454f;
        margin-bottom: 20px;
    }

    .summary-score {
        font-size: 64px;
        font-weight: bold;
        color: #708090;
        margin-bottom: 20px;
    }

    .summary-text {
        font-size: 16px;
        color: #708090;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .summary-link {
        display: inline-block;
        margin-top: 20px;
        color: #36454f;
        text-decoration: none;
        font-weight: bold;
        border-bottom: 2px solid #708090;
    }

    /* AI Analysis Section */
    .ai-analysis-section {
        background: #2c3e50;
        color: white;
        padding: 100px 60px;
    }

    .ai-analysis-section .section-label {
        color: rgba(255, 255, 255, 0.8);
    }

    .ai-analysis-section .section-title {
        color: white;
    }

    .ai-analysis-section .section-description {
        color: rgba(255, 255, 255, 0.9);
    }

    /* Comparison Table */
    .comparison-table-wrapper {
        margin-top: 50px;
        overflow-x: auto;
        background: white;
        border-radius: 10px;
        padding: 40px;
    }

    .comparison-table {
        width: 100%;
        border-collapse: collapse;
        color: #36454f;
    }

    .comparison-table thead {
        background: #36454f;
        color: white;
    }

    .comparison-table th {
        padding: 20px 15px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .comparison-table td {
        padding: 25px 15px;
        border-bottom: 1px solid #e0e0e0;
        vertical-align: top;
    }

    .comparison-table tbody tr:last-child td {
        border-bottom: none;
    }

    .company-name {
        font-weight: 700;
        font-size: 18px;
        color: #36454f;
    }

    .risk-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .risk-low {
        background: #d4edda;
        color: #155724;
    }

    .risk-moderate {
        background: #fff3cd;
        color: #856404;
    }

    .risk-high {
        background: #f8d7da;
        color: #721c24;
    }

    .tangibility-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        background: #e3f2fd;
        color: #1565c0;
    }

    /* Takeaways */
    .takeaways-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 50px;
    }

    .takeaway-card {
        background: rgba(255, 255, 255, 0.1);
        padding: 35px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .takeaway-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-5px);
    }

    .takeaway-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .takeaway-card h3 {
        font-size: 22px;
        color: white;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .takeaway-card p {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.7;
    }

    .takeaway-verdict {
        display: inline-block;
        margin-top: 15px;
        padding: 8px 16px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 600;
    }

    .verdict-resilient {
        background: rgba(76, 175, 80, 0.3);
        color: #a5d6a7;
    }

    .verdict-adaptable {
        background: rgba(33, 150, 243, 0.3);
        color: #90caf9;
    }

    .verdict-vulnerable {
        background: rgba(255, 152, 0, 0.3);
        color: #ffcc80;
    }

    /* Strategic Positioning */
    .positioning-section {
        padding: 100px 60px;
        background: #f8f8f8;
    }

    .positioning-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 50px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .positioning-card {
        background: white;
        padding: 40px;
        border-radius: 10px;
        border: 2px solid #d3d3d3;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .positioning-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #36454f, #708090);
    }

    .positioning-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        border-color: #36454f;
    }

    .positioning-card h3 {
        font-size: 24px;
        color: #36454f;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .positioning-label {
        display: inline-block;
        background: #e3f2fd;
        color: #1565c0;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }

    .positioning-strategy {
        font-size: 16px;
        color: #36454f;
        font-weight: 600;
        margin-bottom: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-left: 4px solid #3498db;
        border-radius: 5px;
    }

    .positioning-details {
        font-size: 15px;
        color: #708090;
        line-height: 1.7;
    }

    /* Summary Insight */
    .summary-insight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 60px;
        text-align: center;
    }

    .summary-insight h2 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .insight-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .insight-item {
        background: rgba(255, 255, 255, 0.15);
        padding: 40px 30px;
        border-radius: 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .insight-icon {
        font-size: 56px;
        margin-bottom: 20px;
    }

    .insight-item h3 {
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .insight-item p {
        font-size: 16px;
        opacity: 0.95;
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .overview-grid,
        .strengths-grid,
        .scoring-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .summary-grid,
        .takeaways-grid,
        .positioning-grid,
        .insight-grid {
            grid-template-columns: 1fr;
        }

        .comparison-table-wrapper {
            padding: 20px;
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 80px 30px;
        }

        .hero h1 {
            font-size: 36px;
        }

        .section-title {
            font-size: 32px;
        }

        .overview-grid,
        .strengths-grid,
        .scoring-grid {
            grid-template-columns: 1fr;
        }

        .overview-section,
        .strengths-section,
        .scoring-section,
        .improvements-section,
        .final-score-section,
        .summary-section,
        .ai-analysis-section,
        .positioning-section,
        .summary-insight {
            padding-left: 30px;
            padding-right: 30px;
        }

        .comparison-table {
            font-size: 13px;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 12px 8px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
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
            <p class="section-description">
                Reframe WA is a leadership and executive coaching consultancy founded by Dr Nancy Pavisich. Their tagline is "Leadership isn't a title. It's how you show up." The site emphasizes individual transformation and professional development, asking visitors: "Do you ever wonder how others really see you at work?"
            </p>
            <a href="https://reframewa.com" class="website-link" target="_blank">Visit reframewa.com →</a>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>Services</h3>
                    <p>Workshops & training, coaching, mentoring, and books/products focused on leadership development</p>
                </div>
                <div class="overview-card">
                    <h3>Target Audience</h3>
                    <p>Professionals, executives, and leaders seeking life and executive coaching</p>
                </div>
                <div class="overview-card">
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

                <div class="strengths-grid">
                    <div class="strength-card">
                        <div class="strength-icon">🎯</div>
                        <h3>Compelling Hook</h3>
                        <p>"Do you ever wonder how others really see you at work?" This immediately resonates with potential clients and identifies their core pain point.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">🏆</div>
                        <h3>Strong Authority</h3>
                        <p>25+ years of experience, published writer, quadruple award winner in leadership with clear testimonials from credible sources.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">💼</div>
                        <h3>Clear Positioning</h3>
                        <p>Personal transformation and leadership identity messaging is consistent throughout the site with the Review/Renew/Regenerate framework.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">📞</div>
                        <h3>Clear Call-to-Action</h3>
                        <p>Free 30-minute consultation offer provides a clear, low-risk next step for potential clients.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scoring -->
        <section class="scoring-section">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="scoring-grid">
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

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="improvements-list">
                    <div class="improvement-item">
                        <h4>Add Video Testimonials</h4>
                        <p>While text testimonials exist, video testimonials would strengthen social proof and authenticity significantly.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Deeper Founder Story</h4>
                        <p>Include a more personal "I started this because..." origin story to create emotional resonance with visitors.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Client Case Studies with Metrics</h4>
                        <p>Showcase more detailed success stories with before/after metrics and tangible results.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Sharper Audience Segmentation</h4>
                        <p>Create dedicated flows for specific segments like "midsize orgs," "senior executives," or "emerging leaders."</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Pricing Transparency</h4>
                        <p>Provide clearer pricing indicators and next-step flows for services and membership options.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Score -->
        <section class="final-score-section">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">8.0</div>
                <div class="final-score-label">Strong positioning with room to polish storytelling and social proof</div>
            </div>
        </section>
    </div>

    <div class="divider"></div>

    <!-- Case Study 2: John Blake -->
    <div class="case-study">
        <!-- Overview -->
        <section class="overview-section">
            <div class="section-label">Case Study 2</div>
            <h2 class="section-title">John Blake</h2>
            <p class="section-description">
                John Blake positions himself as a sales coach and strategist based in Western Australia with 37 years of business experience and 21 years of elite sales training. His hero headline: "Boost Your Sales with Proven Strategy & Expert Coaching" targets business owners who want to increase conversion and optimize sales processes.
            </p>
            <a href="https://john-blake.com.au" class="website-link" target="_blank">Visit john-blake.com.au →</a>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>Services</h3>
                    <p>Sales audits, sales training, free resources, and the "High Stakes Selling" book</p>
                </div>
                <div class="overview-card">
                    <h3>Target Audience</h3>
                    <p>Business owners and sales professionals seeking to improve conversion rates</p>
                </div>
                <div class="overview-card">
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

                <div class="strengths-grid">
                    <div class="strength-card">
                        <div class="strength-icon">💪</div>
                        <h3>Exceptional Authority</h3>
                        <p>37 years of business experience and 21 years of elite sales training clearly positioned upfront with strong testimonials including 100% conversion results.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">🎣</div>
                        <h3>Pain-Based Hook</h3>
                        <p>"Are you wasting good leads on poor sales systems?" immediately identifies the core problem many businesses face.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">🎯</div>
                        <h3>Excellent Segmentation</h3>
                        <p>Clear paths for Business Owners vs Sales Professionals with targeted questions to identify visitor needs.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">🔄</div>
                        <h3>Smart Funnel Design</h3>
                        <p>Free resources act as lead magnets, moving visitors through awareness → interest → conversion seamlessly.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scoring -->
        <section class="scoring-section">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="scoring-grid">
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

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="improvements-list">
                    <div class="improvement-item">
                        <h4>Add Video Testimonials</h4>
                        <p>Written reviews are strong, but video testimonials would add immediacy and emotional proof.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Humanize with Story</h4>
                        <p>While authority is clear, a more personal origin story would create deeper connection with potential clients.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Industry-Specific Case Studies</h4>
                        <p>Showcase detailed case studies segmented by industry with specific metrics and outcomes.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Membership/Continuity Options</h4>
                        <p>Consider adding ongoing membership or continuity programs for recurring revenue and client relationships.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Pricing Framework</h4>
                        <p>While custom pricing makes sense, providing pricing ranges or packages could improve conversion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Score -->
        <section class="final-score-section">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">8.5</div>
                <div class="final-score-label">Excellent authority and funnel structure—very solid B2B site</div>
            </div>
        </section>
    </div>

    <div class="divider"></div>

    <!-- Case Study 3: Heartware Group -->
    <div class="case-study">
        <!-- Overview -->
        <section class="overview-section">
            <div class="section-label">Case Study 3</div>
            <h2 class="section-title">Heartware Group</h2>
            <p class="section-description">
                The Heartware Group is a leadership and organisational-culture consultancy in Western Australia. Their messaging emphasizes "People First, Now More Than Ever" and blends the art of leadership with the science of behavioural analytics using tools like The Predictive Index.
            </p>
            <a href="https://heartwaregroup.com.au" class="website-link" target="_blank">Visit heartwaregroup.com.au →</a>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>Services</h3>
                    <p>Leadership programs, workforce surveys/analytics, consulting, speaker/MC engagement</p>
                </div>
                <div class="overview-card">
                    <h3>Target Audience</h3>
                    <p>CEOs/MDs, HR Professionals, Managers and Team Leaders</p>
                </div>
                <div class="overview-card">
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

                <div class="strengths-grid">
                    <div class="strength-card">
                        <div class="strength-icon">🎨</div>
                        <h3>Unique Positioning</h3>
                        <p>"Art + Science" approach differentiates them by combining emotional intelligence (heart) with data analytics and behavioural science.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">👥</div>
                        <h3>Clear Segmentation</h3>
                        <p>Strong "Who We Help" sections targeting CEOs, HR professionals, and team leaders with relevant messaging for each.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">📊</div>
                        <h3>Data-Driven Credibility</h3>
                        <p>Use of The Predictive Index and human data analytics adds scientific credibility to leadership consulting.</p>
                    </div>

                    <div class="strength-card">
                        <div class="strength-icon">🎁</div>
                        <h3>Smart Lead Magnet</h3>
                        <p>Free Predictive Index behavioural assessment provides value upfront while capturing leads effectively.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scoring -->
        <section class="scoring-section">
            <div class="content-container">
                <div class="section-label">Detailed Assessment</div>
                <h2 class="section-title">Performance Metrics</h2>

                <div class="scoring-grid">
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

        <!-- Improvements -->
        <section class="improvements-section">
            <div class="content-container">
                <div class="section-label">Opportunities</div>
                <h2 class="section-title">Areas for Improvement</h2>

                <div class="improvements-list">
                    <div class="improvement-item">
                        <h4>Strengthen Founder Story</h4>
                        <p>Dawn Russell is mentioned but her personal origin story could be more prominent to create emotional connection.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Add Video Testimonials</h4>
                        <p>Text-based success stories exist, but video testimonials would elevate authenticity and engagement.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Transparent Pricing</h4>
                        <p>While the Heartwired Evolution program shows pricing, other services could benefit from pricing transparency or ranges.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Client Metrics & Case Studies</h4>
                        <p>Showcase more visible before/after metrics, client logos, and detailed case studies with measurable outcomes.</p>
                    </div>

                    <div class="improvement-item">
                        <h4>Prominent CTAs</h4>
                        <p>Make "book a free strategy call" or similar CTAs more prominent across all pages for better conversion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Score -->
        <section class="final-score-section">
            <div class="section-label">Overall Assessment</div>
            <div class="final-score-container">
                <div class="final-score-number">7.5</div>
                <div class="final-score-label">Strong intellectual positioning needing more personality and visual proof</div>
            </div>
        </section>
    </div>

    <!-- Summary Comparison -->
    <section class="summary-section">
        <div class="content-container">
            <div class="section-label">Comparative Analysis</div>
            <h2 class="section-title">Side-by-Side Summary</h2>

            <div class="summary-grid">
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

    <div class="divider"></div>

    <!-- AI-Age Strategic Analysis -->
    <section class="ai-analysis-section">
        <div class="content-container">
            <div class="section-label">⚙️ Future-Focused Analysis</div>
            <h2 class="section-title">AI-Age Strategic Positioning</h2>
            <p class="section-description">
                Comparative analysis of core offerings through the lens of AI disruption risk, defensibility, and strategic positioning opportunities in an AI-augmented business landscape.
            </p>

            <div class="comparison-table-wrapper">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Core Offer Summary</th>
                            <th>Tangibility /<br>Defensibility</th>
                            <th>AI Disruption<br>Risk</th>
                            <th>Strategic Commentary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="company-name">Heartware<br>Group</div></td>
                            <td>Sells leadership + culture programs built on behavioural analytics (Predictive Index) and measurable data for workforce alignment.</td>
                            <td><span class="tangibility-badge">High</span><br><br>Anchored in data models and analytics tools that can integrate with AI systems; "quant + qual" blend.</td>
                            <td><span class="risk-badge risk-low">Low–Moderate</span><br><br>AI enhances their toolkit rather than replaces it; behavioural analytics are data-driven, so easily augmentable.</td>
                            <td>Positioned well for AI-augmented leadership ops if they lean into automation + dashboarding + predictive modelling.</td>
                        </tr>
                        <tr>
                            <td><div class="company-name">John Blake<br>Consulting</div></td>
                            <td>Sells sales performance transformation — training, scripts, and audits to improve conversion and closing rates.</td>
                            <td><span class="tangibility-badge">Medium–High</span><br><br>"Sales" is measurable and always valuable; his IP (methodology + experience) still commands authority.</td>
                            <td><span class="risk-badge risk-moderate">Moderate</span><br><br>AI tools (CRM automation, sales enablement bots, conversation analytics) can replicate portions, but human sales psychology and trust remain strong differentiators.</td>
                            <td>If John reframes his offer as "AI-augmented sales mastery," he could extend authority rather than lose it.</td>
                        </tr>
                        <tr>
                            <td><div class="company-name">Reframe<br>WA</div></td>
                            <td>Sells leadership & personal development coaching via mentoring, courses, workshops, and books — largely human/relationship based.</td>
                            <td><span class="tangibility-badge">Medium–Low</span><br><br>Harder to prove ROI; leadership development is often qualitative and subjective.</td>
                            <td><span class="risk-badge risk-high">High</span><br><br>AI coaching platforms, psychometric bots, and microlearning systems can replicate or outperform generic coaching models.</td>
                            <td>Needs to anchor around unique frameworks or live experiential delivery (e.g., group transformation) to remain defensible.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="takeaways-grid">
                <div class="takeaway-card">
                    <div class="takeaway-icon">🛡️</div>
                    <h3>Heartware Group</h3>
                    <p>Has the most future-proof foundation: they already lean into analytics, data, and systems thinking. They could easily layer AI dashboards or predictive workforce models.</p>
                    <div class="takeaway-verdict verdict-resilient">✅ Structured + Data-driven → Resilient</div>
                </div>

                <div class="takeaway-card">
                    <div class="takeaway-icon">🔄</div>
                    <h3>John Blake Consulting</h3>
                    <p>Has a commercially resilient offer: sales improvement is perennial, but needs reframing to stay current — e.g., integrating AI sales analytics, voice-of-customer tools, or lead intelligence.</p>
                    <div class="takeaway-verdict verdict-adaptable">✅ Outcome-based → Adaptable</div>
                </div>

                <div class="takeaway-card">
                    <div class="takeaway-icon">⚠️</div>
                    <h3>Reframe WA</h3>
                    <p>Has a brand strength in humanity but a weaker moat — "leadership coaching" is already being replicated by AI-driven personal development tools. Without productising the IP (e.g., assessment tools, certified frameworks), it risks dilution.</p>
                    <div class="takeaway-verdict verdict-vulnerable">⚠️ Human/relationship-based → Vulnerable unless evolved</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Positioning Opportunities -->
    <section class="positioning-section">
        <div class="content-container">
            <div class="section-label">💡 Strategic Recommendations</div>
            <h2 class="section-title">AI-Age Pivot & Reinforcement Opportunities</h2>
            <p class="section-description">
                Forward-looking strategic positioning recommendations to strengthen defensibility and leverage AI as an enhancement rather than a threat.
            </p>

            <div class="positioning-grid">
                <div class="positioning-card">
                    <div class="positioning-label">Data-Driven Leader</div>
                    <h3>Heartware Group</h3>
                    <div class="positioning-strategy">"Human Intelligence Meets Artificial Intelligence"</div>
                    <p class="positioning-details">
                        Integrate predictive analytics dashboards, AI-assisted employee engagement insights, and data-driven leadership profiling. Position as the bridge between human culture and intelligent systems.
                    </p>
                    <p class="positioning-details" style="margin-top: 15px;">
                        <strong>Opportunity:</strong> Launch AI-powered culture analytics platform that combines Predictive Index data with real-time engagement metrics and predictive turnover modeling.
                    </p>
                </div>

                <div class="positioning-card">
                    <div class="positioning-label">Hybrid Transformation</div>
                    <h3>John Blake Consulting</h3>
                    <div class="positioning-strategy">"AI + Human Sales Acceleration"</div>
                    <p class="positioning-details">
                        Offer hybrid coaching using sales analytics, call transcriptions, or AI playbook audits. Position as the expert who knows how to make AI sales tools actually work for humans.
                    </p>
                    <p class="positioning-details" style="margin-top: 15px;">
                        <strong>Opportunity:</strong> Develop "AI-Enhanced STRIKE System" that combines traditional methodology with conversation intelligence, predictive lead scoring, and automated follow-up optimization.
                    </p>
                </div>

                <div class="positioning-card">
                    <div class="positioning-label">IP Development</div>
                    <h3>Reframe WA</h3>
                    <div class="positioning-strategy">Proprietary Frameworks + AI Co-Coaching</div>
                    <p class="positioning-details">
                        Develop proprietary frameworks (e.g., "Reframe Index"), or leverage AI as co-coach (reflective journaling bots, leadership simulations). Needs IP to become defensible and more measurable.
                    </p>
                    <p class="positioning-details" style="margin-top: 15px;">
                        <strong>Opportunity:</strong> Create certified "Reframe Leadership Assessment" tool with AI-powered personalized development plans, combining human coaching with continuous digital reinforcement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Summary Insight -->
    <section class="summary-insight">
        <h2>The AI-Age Bottom Line</h2>
        <div class="insight-grid">
            <div class="insight-item">
                <div class="insight-icon">🎯</div>
                <h3>Tangibility Wins</h3>
                <p>Organizations with measurable, data-driven offerings (Heartware) or outcome-focused services (John Blake) are better positioned to integrate AI as an enhancement tool.</p>
            </div>

            <div class="insight-item">
                <div class="insight-icon">🔬</div>
                <h3>IP Creates Moats</h3>
                <p>Proprietary methodologies, assessment tools, and certified frameworks create defensibility that generic coaching models lack. Productizing expertise is now essential.</p>
            </div>

            <div class="insight-item">
                <div class="insight-icon">🤝</div>
                <h3>Hybrid Is The Future</h3>
                <p>The winners will position AI as their co-pilot, not their replacement. "Human expertise + AI acceleration" beats either alone.</p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
