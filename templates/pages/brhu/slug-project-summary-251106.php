<?php
/**
 * Brand Hub System - Project Overview (Sunset Boulevard Theme)
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/brhu/slug-project-summary-251106.php
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
        font-family: Arial, Helvetica, sans-serif;
        color: #264653;
        line-height: 1.65;
        background: #f9f9f9;
    }

    /* Hero */
    .hero {
        background: linear-gradient(135deg, #e76f51 0%, #f4a261 100%);
        color: white;
        padding: 100px 60px;
        text-align: center;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.25);
        padding: 10px 24px;
        border-radius: 25px;
        font-size: 14px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
    }

    .hero h1 {
        font-size: 58px;
        font-weight: 700;
        font-family: Georgia, 'Times New Roman', serif;
        margin-bottom: 25px;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-subtitle {
        font-size: 22px;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto 40px;
        font-weight: 300;
    }

    /* Progress Bar */
    .status-indicator {
        display: inline-block;
        background: rgba(233, 196, 106, 0.3);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 25px;
        border: 2px solid rgba(255, 255, 255, 0.4);
    }

    .progress-container {
        max-width: 600px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 8px;
        backdrop-filter: blur(10px);
    }

    .progress-bar {
        background: linear-gradient(90deg, #e9c46a 0%, #ffffff 100%);
        height: 30px;
        border-radius: 50px;
        width: 10%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        color: #264653;
        transition: width 0.6s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }

    .progress-label {
        margin-top: 15px;
        font-size: 14px;
        opacity: 0.9;
    }

    /* Content Container */
    .content-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 60px;
    }

    .section-label {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #e76f51;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .section-title {
        font-size: 42px;
        font-weight: 700;
        font-family: Georgia, 'Times New Roman', serif;
        color: #264653;
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .section-description {
        font-size: 18px;
        line-height: 1.8;
        color: #264653;
        max-width: 900px;
        margin-bottom: 50px;
    }

    /* Overview Section */
    .overview-section {
        background: white;
    }

    .overview-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 50px;
    }

    .overview-card {
        background: linear-gradient(135deg, #ffffff 0%, #fef9f5 100%);
        padding: 40px;
        border-radius: 15px;
        border-left: 5px solid #e76f51;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .overview-card h3 {
        font-size: 24px;
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        color: #e76f51;
        margin-bottom: 20px;
    }

    .overview-card p {
        font-size: 16px;
        color: #264653;
        line-height: 1.8;
    }

    .overview-card ul {
        list-style: none;
        margin-top: 20px;
    }

    .overview-card ul li {
        font-size: 16px;
        color: #264653;
        line-height: 2;
        padding-left: 30px;
        position: relative;
    }

    .overview-card ul li:before {
        content: "▸";
        position: absolute;
        left: 10px;
        color: #f4a261;
        font-weight: bold;
    }

    /* File Structure Section */
    .structure-section {
        background: #fef9f5;
    }

    .code-block {
        background: #264653;
        color: #e9c46a;
        padding: 30px;
        border-radius: 10px;
        font-family: 'Courier New', monospace;
        font-size: 14px;
        line-height: 2;
        overflow-x: auto;
        margin-bottom: 30px;
    }

    .code-comment {
        color: #f4a261;
        font-style: italic;
    }

    /* Business Model Section */
    .business-section {
        background: white;
    }

    .tier-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }

    .tier-card {
        background: linear-gradient(135deg, #e76f51 0%, #f4a261 100%);
        color: white;
        padding: 50px 40px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(231, 111, 81, 0.3);
    }

    .tier-number {
        font-size: 72px;
        font-weight: 700;
        font-family: Georgia, 'Times New Roman', serif;
        opacity: 0.3;
        line-height: 1;
        margin-bottom: 10px;
    }

    .tier-card h3 {
        font-size: 28px;
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .tier-card .tier-price {
        font-size: 36px;
        font-weight: 700;
        margin: 20px 0;
        font-family: Georgia, 'Times New Roman', serif;
    }

    .tier-card p {
        font-size: 16px;
        opacity: 0.95;
        line-height: 1.6;
    }

    /* Strategy Section */
    .strategy-section {
        background: #fef9f5;
    }

    .strategy-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .strategy-card {
        background: white;
        padding: 35px;
        border-radius: 15px;
        border-top: 4px solid #e9c46a;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    .strategy-icon {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .strategy-card h3 {
        font-size: 20px;
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        color: #264653;
        margin-bottom: 15px;
    }

    .strategy-card p {
        font-size: 15px;
        color: #264653;
        line-height: 1.7;
    }

    /* Implementation Section */
    .implementation-section {
        background: white;
    }

    .timeline {
        position: relative;
        padding-left: 40px;
    }

    .timeline:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #e76f51 0%, #f4a261 50%, #e9c46a 100%);
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        padding: 30px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .timeline-item:last-child {
        border-bottom: none;
    }

    .timeline-item:before {
        content: "";
        position: absolute;
        left: -46px;
        top: 35px;
        width: 16px;
        height: 16px;
        background: #e76f51;
        border: 4px solid white;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(231, 111, 81, 0.4);
    }

    .timeline-item h3 {
        font-size: 22px;
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        color: #e76f51;
        margin-bottom: 12px;
    }

    .timeline-item p {
        font-size: 16px;
        color: #264653;
        line-height: 1.8;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #264653 0%, #1a3945 100%);
        color: white;
        padding: 100px 60px;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 42px;
        font-weight: 700;
        font-family: Georgia, 'Times New Roman', serif;
        margin-bottom: 20px;
    }

    .cta-section p {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-button {
        display: inline-block;
        background: linear-gradient(135deg, #e76f51 0%, #f4a261 100%);
        color: white;
        padding: 18px 50px;
        border-radius: 50px;
        font-size: 18px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(231, 111, 81, 0.4);
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(231, 111, 81, 0.5);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .overview-grid,
        .tier-grid {
            grid-template-columns: 1fr;
        }

        .strategy-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 80px 30px;
        }

        .hero h1 {
            font-size: 38px;
        }

        .section-title {
            font-size: 32px;
        }

        .content-container {
            padding: 60px 30px;
        }

        .strategy-grid {
            grid-template-columns: 1fr;
        }

        .tier-card {
            padding: 40px 30px;
        }
    }
</style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
        <div class="hero-badge">Project Overview</div>
        <h1>Brand Hub System</h1>
        <p class="hero-subtitle">Managed brand asset & document distribution platform powered by AI</p>

        <div class="status-indicator">Active Development - v1.0.4</div>

        <div class="progress-container">
            <div class="progress-bar" style="width: 35%;">35%</div>
        </div>
        <div class="progress-label">Phase 1 Core Foundation Complete</div>
    </section>

    <!-- Current Implementation Status -->
    <section class="strategy-section">
        <div class="content-container">
            <div class="section-label">Release v1.0.4 - November 2025</div>
            <h2 class="section-title">Current Implementation Status</h2>
            <p class="section-description">
                Core foundation successfully deployed with scalable template organization, machine-readable configuration system, and AI-assisted automation capabilities.
            </p>

            <div class="strategy-grid">
                <div class="strategy-card">
                    <div class="strategy-icon">📁</div>
                    <h3>Client Subfolders</h3>
                    <p>Organized structure with client-specific folders (refr/, brhu/, test/), shared templates, and reusable partials for scalability.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">🎯</div>
                    <h3>Smart Resolution</h3>
                    <p>Automatic client detection from page slugs with backwards-compatible fallback to flat structure.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">🤖</div>
                    <h3>Config-Driven</h3>
                    <p>Machine-readable config.php files enable AI-assisted template generation with perfect brand consistency.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">⚙️</div>
                    <h3>Template Generator</h3>
                    <p>Programmatic template creation utility reads brand configs and auto-generates compliant components.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">📚</div>
                    <h3>Dual Documentation</h3>
                    <p>config.php for machines (AI/tools), README.md for humans (developers) - both kept in sync.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">✅</div>
                    <h3>Brand Validation</h3>
                    <p>Automated compliance checking ensures all templates meet client brand standards.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Assignment Technical Planning -->
    <section class="overview-section">
        <div class="content-container">
            <div class="section-label">Technical Architecture Decision</div>
            <h2 class="section-title">Client Assignment Mechanism</h2>
            <p class="section-description">
                Currently evaluating approaches for assigning pages to clients. The slug-based system is implemented and working, with post-meta and taxonomy options under consideration for future enhancement.
            </p>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>✅ Current: Slug-Based (Implemented v1.0.4)</h3>
                    <p><strong>Mechanism:</strong> Extract 4-letter client code from page slug prefix</p>
                    <p><strong>Example:</strong> <code>refr-brand-guide</code> → client code <code>refr</code> → <code>templates/pages/refr/</code></p>
                    <ul>
                        <li><strong>Pro:</strong> Zero configuration, works automatically</li>
                        <li><strong>Pro:</strong> Visible in URL, easy to identify ownership</li>
                        <li><strong>Pro:</strong> Simple, fast (no database queries)</li>
                        <li><strong>Pro:</strong> Easy to see what belongs to which client</li>
                        <li><strong>Con:</strong> Client code visible in URL (<code>/refr-brand-guide/</code>)</li>
                        <li><strong>Con:</strong> Changing client requires slug change</li>
                    </ul>
                </div>

                <div class="overview-card">
                    <h3>🔮 Option 2: Post Meta Field (Under Consideration)</h3>
                    <p><strong>Mechanism:</strong> Store client assignment as <code>_leancms_client</code> post meta</p>
                    <p><strong>Example:</strong> Page slug: <code>brand-guide</code>, Meta: <code>refr</code> → <code>templates/pages/refr/</code></p>
                    <ul>
                        <li><strong>Pro:</strong> Clean URLs (<code>/brand-guide/</code> instead of <code>/refr-brand-guide/</code>)</li>
                        <li><strong>Pro:</strong> Can change client without changing URL</li>
                        <li><strong>Pro:</strong> Hidden implementation detail</li>
                        <li><strong>Con:</strong> Requires admin UI (dropdown) to assign client</li>
                        <li><strong>Con:</strong> Extra database query on every page load</li>
                        <li><strong>Con:</strong> Less obvious ownership in page list</li>
                        <li><strong>Con:</strong> Manual assignment for every page</li>
                    </ul>
                </div>

                <div class="overview-card">
                    <h3>🔮 Option 3: Custom Taxonomy (Under Consideration)</h3>
                    <p><strong>Mechanism:</strong> Register <code>leancms_client</code> taxonomy, assign via terms</p>
                    <p><strong>Example:</strong> Assign page to "refr" taxonomy term → <code>templates/pages/refr/</code></p>
                    <ul>
                        <li><strong>Pro:</strong> Clean URLs</li>
                        <li><strong>Pro:</strong> Easy to query all pages for a client</li>
                        <li><strong>Pro:</strong> Native WordPress UI</li>
                        <li><strong>Pro:</strong> Could support multiple clients per page (if needed)</li>
                        <li><strong>Con:</strong> More complex setup</li>
                        <li><strong>Con:</strong> Visible in admin (might confuse editors)</li>
                        <li><strong>Con:</strong> Database query overhead</li>
                    </ul>
                </div>

                <div class="overview-card">
                    <h3>💡 Hybrid Approach (Recommended for Future)</h3>
                    <p><strong>Mechanism:</strong> Check meta/taxonomy first, fall back to slug extraction</p>
                    <p><strong>Strategy:</strong> Maintain slug-based for simplicity, add meta/taxonomy when clean URLs become priority</p>
                    <ul>
                        <li><strong>Pro:</strong> Backwards compatible transition path</li>
                        <li><strong>Pro:</strong> Zero breaking changes</li>
                        <li><strong>Pro:</strong> Choose per-client (some use slug, some use meta)</li>
                        <li><strong>Con:</strong> Two code paths to maintain</li>
                        <li><strong>Current Decision:</strong> Staying with slug-based for Phase 1</li>
                        <li><strong>Re-evaluate:</strong> When clean URLs become client requirement</li>
                    </ul>
                </div>
            </div>

            <div class="code-block" style="margin-top: 40px;">
<span class="code-comment"># Current Implementation (v1.0.4)</span>
Page Slug: refr-brand-guide
           ↓ (extract client code)
Client: "refr"
           ↓ (check subfolder first)
Template: templates/pages/refr/slug-brand-guide.php
           ↓ (or fallback to flat)
Fallback: templates/pages/slug-refr-brand-guide.php

<span class="code-comment"># Future Option: Post Meta Approach</span>
Page Slug: brand-guide (clean!)
           ↓ (read post meta)
Meta: _leancms_client = "refr"
           ↓
Template: templates/pages/refr/slug-brand-guide.php

<span class="code-comment"># Future Option: Taxonomy Approach</span>
Page Slug: brand-guide
           ↓ (read taxonomy term)
Taxonomy: leancms_client → "refr"
           ↓
Template: templates/pages/refr/slug-brand-guide.php
            </div>
        </div>
    </section>

    <!-- Core Concept -->
    <section class="overview-section">
        <div class="content-container">
            <div class="section-label">The Vision</div>
            <h2 class="section-title">Core Concept</h2>
            <p class="section-description">
                Brand Hub represents an evolution from manual document workflows to an intelligent, managed platform for brand asset and document distribution. Our agency creates AI-generated, on-brand documents for clients with minimal manual work, while clients receive clean links and passwords with zero maintenance on their end.
            </p>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>For the Agency</h3>
                    <p>Streamlined workflow automation that leverages AI to generate consistent, on-brand documents without the manual overhead of traditional processes.</p>
                    <ul>
                        <li>AI-powered document generation</li>
                        <li>Automated brand asset management</li>
                        <li>Scalable template system</li>
                        <li>Zero-touch deployment</li>
                    </ul>
                </div>

                <div class="overview-card">
                    <h3>For the Client</h3>
                    <p>Effortless access to brand materials through secure, password-protected links with no technical maintenance required.</p>
                    <ul>
                        <li>Clean, simple access links</li>
                        <li>Password-protected security</li>
                        <li>Always up-to-date documents</li>
                        <li>Zero maintenance overhead</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- File Structure -->
    <section class="structure-section">
        <div class="content-container">
            <div class="section-label">Architecture</div>
            <h2 class="section-title">File Structure</h2>
            <p class="section-description">
                Clean separation enables logo and brand asset reuse across documents, with a logical naming convention that scales effortlessly.
            </p>

            <div class="code-block">
<span class="code-comment"># Templates - Document Structure</span>
templates/
  └── [clientcode]-[doctype]-[identifier]-[version].php

<span class="code-comment"># Assets - Organized for Reuse</span>
assets/
  └── [clientcode]/
      ├── _shared/               <span class="code-comment"># Reusable brand assets</span>
      │   ├── logos/
      │   ├── colors/
      │   └── fonts/
      └── [doctype]-[identifier]-[version]/  <span class="code-comment"># Document-specific</span>
          ├── images/
          └── data/
            </div>
        </div>
    </section>

    <!-- Business Model -->
    <section class="business-section">
        <div class="content-container">
            <div class="section-label">Revenue Model</div>
            <h2 class="section-title">Two-Tier Business Model</h2>
            <p class="section-description">
                Flexible pricing structure that serves both growing businesses and enterprise clients with distinct needs.
            </p>

            <div class="tier-grid">
                <div class="tier-card">
                    <div class="tier-number">1</div>
                    <h3>Pooled SaaS</h3>
                    <div class="tier-price">$150-400<span style="font-size: 18px; font-weight: 400;">/month</span></div>
                    <p>Hosted on brand-hub.com.au with shared infrastructure. Perfect for small to medium businesses looking for professional brand management without the overhead.</p>
                </div>

                <div class="tier-card">
                    <div class="tier-number">2</div>
                    <h3>White-Label Standalone</h3>
                    <div class="tier-price">$3-5k<span style="font-size: 18px; font-weight: 400;"> setup</span></div>
                    <p>Deployed on client's own subdomain with full white-labeling. Ideal for enterprise clients requiring complete brand control and custom infrastructure.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- AI Visibility Strategy -->
    <section class="strategy-section">
        <div class="content-container">
            <div class="section-label">Future-Proof Technology</div>
            <h2 class="section-title">AI Visibility Strategy</h2>
            <p class="section-description">
                Building on durable web standards that have proven their longevity over 20+ years, ensuring our system remains compatible with evolving AI technologies.
            </p>

            <div class="strategy-grid">
                <div class="strategy-card">
                    <div class="strategy-icon">🗺️</div>
                    <h3>sitemap.xml</h3>
                    <p>Standard XML sitemaps for AI crawlers to discover and index all brand assets efficiently.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">🔐</div>
                    <h3>.well-known/</h3>
                    <p>Well-known URIs for service discovery and configuration following RFC 8615 standards.</p>
                </div>

                <div class="strategy-card">
                    <div class="strategy-icon">📊</div>
                    <h3>JSON-LD</h3>
                    <p>Structured data using JSON-LD and Schema.org for rich semantic understanding.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Graduated System -->
    <section class="overview-section">
        <div class="content-container">
            <div class="section-label">Phase 2 Enhancement</div>
            <h2 class="section-title">Graduated System (Future)</h2>
            <p class="section-description">
                The next evolution introduces intelligent client management with REST APIs and AI agent integration for downstream services.
            </p>

            <div class="overview-grid">
                <div class="overview-card">
                    <h3>Client Portal System</h3>
                    <p>Custom Post Type (CPT) with comprehensive brand data including colors, assets, snippets, and voice guidelines. Optional client index pages showing all documents per client.</p>
                </div>

                <div class="overview-card">
                    <h3>API Integration Layer</h3>
                    <p>REST API for downstream services with master prompt API for AI agents. Auto-generated metadata with zero manual maintenance required.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Implementation Path -->
    <section class="implementation-section">
        <div class="content-container">
            <div class="section-label">Roadmap</div>
            <h2 class="section-title">Implementation Path</h2>
            <p class="section-description">
                A pragmatic, phased approach that validates workflow before scaling, keeping complexity minimal while building on proven standards.
            </p>

            <div class="timeline">
                <div class="timeline-item">
                    <h3>Phase 1: Manual Validation</h3>
                    <p>Start with manual processes to validate the workflow, understand client needs, and identify optimization opportunities. Focus on individual document links initially, parking client index pages for later development.</p>
                </div>

                <div class="timeline-item">
                    <h3>Phase 2: Gradual Automation</h3>
                    <p>Automate deployment processes incrementally, introducing AI-powered document generation and streamlining asset management based on Phase 1 learnings.</p>
                </div>

                <div class="timeline-item">
                    <h3>Phase 3: CPT/API Layer</h3>
                    <p>Build the Custom Post Type and API layer when ready to scale. Introduce client portals, REST APIs, and master prompt systems for AI agent integration.</p>
                </div>

                <div class="timeline-item">
                    <h3>Phase 4: Scale & Optimize</h3>
                    <p>Keep it simple and standards-based. Leverage durable web conventions, avoid reinventing formats, and auto-generate all metadata to ensure future-proof, zero-maintenance operations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <h2>Building the Future of Brand Management</h2>
        <p>From manual workflows to intelligent automation—Brand Hub is designed to scale with your agency while delivering effortless experiences for your clients.</p>
        <a href="#contact" class="cta-button">Let's Discuss</a>
    </section>
</main>

<?php get_footer(); ?>
