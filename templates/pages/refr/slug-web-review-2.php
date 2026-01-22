<?php
/**
 * Website Review Case Studies - Technical Whitepaper Format
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/refr/slug-web-review-2.php
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
            color: #2c3e50;
            line-height: 1.8;
            background: #f5f5f5;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 80px 60px 60px;
            text-align: center;
        }

        .document-type {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 20px;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .meta-info {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            font-size: 14px;
            opacity: 0.85;
        }

        /* Container */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }

        .section {
            padding: 60px 80px;
            border-bottom: 1px solid #e0e0e0;
        }

        .section:last-child {
            border-bottom: none;
        }

        /* Section Headers */
        .section-number {
            display: inline-block;
            background: #3498db;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
            font-size: 14px;
            font-weight: 700;
            margin-right: 12px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .section-subtitle {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 30px;
            font-style: italic;
        }

        .section-content {
            font-size: 16px;
            line-height: 1.8;
            color: #34495e;
        }

        /* Executive Summary */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .summary-card {
            background: #f8f9fa;
            padding: 30px;
            border-left: 4px solid #3498db;
            border-radius: 4px;
        }

        .summary-card h3 {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .summary-card .metric {
            font-size: 36px;
            font-weight: 700;
            color: #3498db;
            margin-bottom: 10px;
        }

        .summary-card p {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* Methodology */
        .criteria-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .criteria-item {
            display: flex;
            align-items: start;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 4px;
        }

        .criteria-number {
            background: #3498db;
            color: white;
            min-width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            margin-right: 15px;
        }

        .criteria-content h4 {
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .criteria-content p {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* Data Tables */
        .data-table-container {
            margin: 40px 0;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table thead {
            background: #2c3e50;
            color: white;
        }

        .data-table th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table th:first-child {
            border-radius: 4px 0 0 0;
        }

        .data-table th:last-child {
            border-radius: 0 4px 0 0;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table tbody tr:hover {
            background: #f8f9fa;
        }

        .data-table td {
            padding: 16px 12px;
            color: #34495e;
        }

        .data-table .website-name {
            font-weight: 600;
            color: #2c3e50;
        }

        .score-cell {
            font-weight: 700;
            text-align: center;
        }

        .score-high {
            color: #27ae60;
        }

        .score-medium {
            color: #f39c12;
        }

        .score-low {
            color: #e74c3c;
        }

        /* Case Study Sections */
        .case-study {
            margin-top: 50px;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .case-study-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #3498db;
        }

        .case-study-title {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
        }

        .case-study-score {
            background: #3498db;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-size: 24px;
            font-weight: 700;
        }

        .case-study-url {
            display: inline-block;
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            border-bottom: 1px solid #3498db;
        }

        .case-study-url:hover {
            color: #2980b9;
        }

        .case-study-section {
            margin-top: 30px;
        }

        .case-study-section h3 {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .case-study-section h3::before {
            content: "▪";
            color: #3498db;
            margin-right: 10px;
            font-size: 24px;
        }

        .findings-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .finding-item {
            background: white;
            padding: 20px;
            border-radius: 4px;
            border-left: 3px solid #27ae60;
        }

        .finding-item.improvement {
            border-left-color: #f39c12;
        }

        .finding-item h4 {
            font-size: 15px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .finding-item p {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* Score Breakdown */
        .score-breakdown {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .score-item {
            background: white;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        .score-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .score-label {
            font-size: 12px;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Comparison Chart */
        .comparison-section {
            margin-top: 40px;
        }

        .comparison-bar-chart {
            margin-top: 30px;
        }

        .chart-row {
            margin-bottom: 25px;
        }

        .chart-label {
            font-size: 14px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .chart-bars {
            display: flex;
            gap: 10px;
        }

        .chart-bar {
            height: 32px;
            background: linear-gradient(90deg, #3498db, #5dade2);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 12px;
            color: white;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .chart-bar:hover {
            transform: translateX(5px);
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }

        .chart-bar.bar-1 { background: linear-gradient(90deg, #e74c3c, #ec7063); }
        .chart-bar.bar-2 { background: linear-gradient(90deg, #3498db, #5dade2); }
        .chart-bar.bar-3 { background: linear-gradient(90deg, #2ecc71, #58d68d); }

        .bar-label {
            position: absolute;
            left: -120px;
            font-size: 12px;
            color: #7f8c8d;
            width: 110px;
            text-align: right;
        }

        /* Key Findings */
        .key-findings {
            background: #fff9e6;
            border: 2px solid #f39c12;
            border-radius: 8px;
            padding: 30px;
            margin-top: 40px;
        }

        .key-findings h3 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .key-findings ul {
            list-style: none;
        }

        .key-findings li {
            padding: 12px 0 12px 30px;
            position: relative;
            font-size: 15px;
            color: #34495e;
            line-height: 1.7;
        }

        .key-findings li::before {
            content: "→";
            position: absolute;
            left: 0;
            color: #f39c12;
            font-weight: 700;
        }

        /* Recommendations */
        .recommendations {
            background: #e8f8f5;
            border: 2px solid #27ae60;
            border-radius: 8px;
            padding: 30px;
            margin-top: 40px;
        }

        .recommendations h3 {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .recommendations ol {
            margin-left: 20px;
        }

        .recommendations li {
            padding: 10px 0;
            font-size: 15px;
            color: #34495e;
            line-height: 1.7;
        }

        .recommendations li strong {
            color: #27ae60;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 60px;
            text-align: center;
        }

        .footer p {
            font-size: 14px;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .summary-grid,
            .criteria-list,
            .findings-grid,
            .score-breakdown {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 40px 40px;
            }

            .case-study {
                padding: 30px 20px;
            }

            .case-study-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 60px 30px 40px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .section {
                padding: 30px 25px;
            }

            .section-title {
                font-size: 26px;
            }

            .data-table {
                font-size: 12px;
            }

            .data-table th,
            .data-table td {
                padding: 10px 8px;
            }
        }
    </style>

<main id="primary" class="site-main">
    <!-- Hero -->
    <section class="hero">
        <div class="document-type">Technical Whitepaper</div>
        <h1>Consulting Website Analysis</h1>
        <p class="hero-subtitle">Comprehensive Performance Assessment of Three Australian Consulting Firms: Leadership & Sales Coaching Sector Analysis</p>
        <div class="meta-info">
            <span>Publication Date: November 2025</span>
            <span>Analysis Period: Q4 2025</span>
            <span>Sites Reviewed: 3</span>
            <span>Criteria Evaluated: 8</span>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container">
        <!-- Executive Summary -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">1</span>
                Executive Summary
            </h2>
            <p class="section-subtitle">Overview of findings and key performance indicators</p>

            <div class="section-content">
                <p>This whitepaper presents a comprehensive analysis of three Australian consulting websites operating in the leadership and sales coaching sector. Each website was evaluated against eight critical criteria encompassing user experience, marketing effectiveness, and conversion optimization.</p>

                <p style="margin-top: 15px;">The analysis reveals significant variation in implementation quality across the sector, with overall scores ranging from 7.5/10 to 8.5/10. Key differentiators include authority presentation, funnel design, and the strategic use of social proof mechanisms.</p>
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <h3>Highest Performer</h3>
                    <div class="metric">8.5/10</div>
                    <p>John Blake Consulting demonstrated superior authority positioning and funnel optimization</p>
                </div>
                <div class="summary-card">
                    <h3>Average Score</h3>
                    <div class="metric">8.0/10</div>
                    <p>Industry average indicates strong baseline performance across all reviewed sites</p>
                </div>
                <div class="summary-card">
                    <h3>Common Gap</h3>
                    <div class="metric">5/10</div>
                    <p>Video testimonials remain critically underutilized across all three organizations</p>
                </div>
            </div>
        </section>

        <!-- Methodology -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">2</span>
                Methodology
            </h2>
            <p class="section-subtitle">Evaluation framework and assessment criteria</p>

            <div class="section-content">
                <p>Our analysis framework employs an 8-dimensional evaluation model specifically designed for professional services websites. Each criterion is scored on a 10-point scale, with detailed qualitative assessment supporting quantitative findings.</p>
            </div>

            <div class="criteria-list">
                <div class="criteria-item">
                    <div class="criteria-number">1</div>
                    <div class="criteria-content">
                        <h4>Personality vs Organisation</h4>
                        <p>Measures the balance between personal founder narrative and organizational messaging, assessing the presence and emotional resonance of the "why" story.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">2</div>
                    <div class="criteria-content">
                        <h4>Authority Presentation</h4>
                        <p>Evaluates credibility signals including credentials, experience, testimonials, and third-party validation mechanisms.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">3</div>
                    <div class="criteria-content">
                        <h4>Hook, Story & Offer</h4>
                        <p>Assesses the clarity and effectiveness of value proposition, narrative structure, and call-to-action elements.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">4</div>
                    <div class="criteria-content">
                        <h4>Video Testimonials</h4>
                        <p>Measures the presence and quality of video-based social proof, recognized as a high-impact conversion element.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">5</div>
                    <div class="criteria-content">
                        <h4>Headlines & Messaging</h4>
                        <p>Analyzes consistency, clarity, and persuasiveness of key messaging across the site.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">6</div>
                    <div class="criteria-content">
                        <h4>Audience Segmentation</h4>
                        <p>Reviews the effectiveness of targeting different customer segments with tailored messaging and pathways.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">7</div>
                    <div class="criteria-content">
                        <h4>Offer Clarity</h4>
                        <p>Examines transparency of service offerings, pricing indicators, and next-step clarity.</p>
                    </div>
                </div>

                <div class="criteria-item">
                    <div class="criteria-number">8</div>
                    <div class="criteria-content">
                        <h4>Sales Workflow</h4>
                        <p>Evaluates funnel design, lead capture mechanisms, and the logical progression from awareness to conversion.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Comparative Analysis -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">3</span>
                Comparative Performance Analysis
            </h2>
            <p class="section-subtitle">Quantitative assessment across all evaluation criteria</p>

            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Website</th>
                            <th>Personality</th>
                            <th>Authority</th>
                            <th>Hook/Story</th>
                            <th>Video Test.</th>
                            <th>Headlines</th>
                            <th>Segmentation</th>
                            <th>Offer Clarity</th>
                            <th>Workflow</th>
                            <th>Overall</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="website-name">Reframe WA</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-low">5/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-high">8.0/10</td>
                        </tr>
                        <tr>
                            <td class="website-name">John Blake</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">9/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-low">5/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">8/10</td>
                            <td class="score-cell score-high">8.5/10</td>
                        </tr>
                        <tr>
                            <td class="website-name">Heartware Group</td>
                            <td class="score-cell score-medium">6/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-low">5/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7/10</td>
                            <td class="score-cell score-medium">7.5/10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="comparison-section">
                <h3 style="font-size: 20px; margin-bottom: 25px; color: #2c3e50;">Performance Visualization by Criteria</h3>

                <div class="comparison-bar-chart">
                    <div class="chart-row">
                        <div class="chart-label">Authority Presentation</div>
                        <div class="chart-bars">
                            <div class="chart-bar bar-1" style="width: 80%;">
                                <span class="bar-label">Reframe WA</span>
                                8/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-2" style="width: 90%;">
                                <span class="bar-label">John Blake</span>
                                9/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-3" style="width: 70%;">
                                <span class="bar-label">Heartware Group</span>
                                7/10
                            </div>
                        </div>
                    </div>

                    <div class="chart-row">
                        <div class="chart-label">Audience Segmentation</div>
                        <div class="chart-bars">
                            <div class="chart-bar bar-1" style="width: 70%;">
                                <span class="bar-label">Reframe WA</span>
                                7/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-2" style="width: 80%;">
                                <span class="bar-label">John Blake</span>
                                8/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-3" style="width: 70%;">
                                <span class="bar-label">Heartware Group</span>
                                7/10
                            </div>
                        </div>
                    </div>

                    <div class="chart-row">
                        <div class="chart-label">Sales Workflow Design</div>
                        <div class="chart-bars">
                            <div class="chart-bar bar-1" style="width: 70%;">
                                <span class="bar-label">Reframe WA</span>
                                7/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-2" style="width: 80%;">
                                <span class="bar-label">John Blake</span>
                                8/10
                            </div>
                        </div>
                        <div class="chart-bars" style="margin-top: 5px;">
                            <div class="chart-bar bar-3" style="width: 70%;">
                                <span class="bar-label">Heartware Group</span>
                                7/10
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Case Study 1: Reframe WA -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">4</span>
                Detailed Case Studies
            </h2>
            <p class="section-subtitle">In-depth analysis of each consulting website</p>

            <div class="case-study">
                <div class="case-study-header">
                    <div>
                        <div class="case-study-title">Reframe WA</div>
                        <a href="https://reframewa.com" class="case-study-url" target="_blank">reframewa.com →</a>
                    </div>
                    <div class="case-study-score">8.0/10</div>
                </div>

                <div class="section-content">
                    <p><strong>Business Model:</strong> Leadership and executive coaching consultancy founded by Dr Nancy Pavisich, focused on individual transformation and professional development.</p>
                    <p style="margin-top: 10px;"><strong>Core Value Proposition:</strong> "Leadership isn't a title. It's how you show up."</p>
                    <p style="margin-top: 10px;"><strong>Service Portfolio:</strong> Workshops, training programs, one-on-one coaching, mentoring services, and published resources.</p>
                </div>

                <div class="case-study-section">
                    <h3>Performance Breakdown</h3>
                    <div class="score-breakdown">
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Personality</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Authority</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Hook/Story</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-low">5/10</div>
                            <div class="score-label">Video Test.</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Headlines</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Segmentation</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Offer Clarity</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Workflow</div>
                        </div>
                    </div>
                </div>

                <div class="case-study-section">
                    <h3>Key Findings</h3>
                    <div class="findings-grid">
                        <div class="finding-item">
                            <h4>Compelling Hook</h4>
                            <p>The homepage question "Do you ever wonder how others really see you at work?" creates immediate resonance with target audience pain points.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Strong Credibility Signals</h4>
                            <p>25+ years experience, published author status, and quadruple award recognition establish robust authority positioning.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Structured Framework</h4>
                            <p>The "Review → Renew → Regenerate" process provides clear transformation pathway and consistent thematic messaging.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Clear Call-to-Action</h4>
                            <p>Free 30-minute consultation removes initial friction and provides low-risk entry point for prospective clients.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Limited Video Proof</h4>
                            <p>Absence of video testimonials represents missed opportunity for enhanced social proof and emotional engagement.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Origin Story Gap</h4>
                            <p>Personal founder narrative lacks depth; opportunity to strengthen emotional connection through "why I started" storytelling.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Segmentation Opportunity</h4>
                            <p>Could benefit from more targeted pathways for specific segments (e.g., emerging leaders vs. senior executives).</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Pricing Transparency</h4>
                            <p>Service pricing and package details could be more visible to accelerate decision-making process.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Case Study 2: John Blake -->
            <div class="case-study">
                <div class="case-study-header">
                    <div>
                        <div class="case-study-title">John Blake</div>
                        <a href="https://john-blake.com.au" class="case-study-url" target="_blank">john-blake.com.au →</a>
                    </div>
                    <div class="case-study-score">8.5/10</div>
                </div>

                <div class="section-content">
                    <p><strong>Business Model:</strong> Sales coaching and strategy consultancy specializing in conversion optimization and sales system development for B2B organizations.</p>
                    <p style="margin-top: 10px;"><strong>Core Value Proposition:</strong> "Boost Your Sales with Proven Strategy & Expert Coaching" - 37 years business experience, 21 years elite sales training.</p>
                    <p style="margin-top: 10px;"><strong>Service Portfolio:</strong> Sales audits, sales training programs, STRIKE sales system implementation, and published book "High Stakes Selling".</p>
                </div>

                <div class="case-study-section">
                    <h3>Performance Breakdown</h3>
                    <div class="score-breakdown">
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Personality</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">9/10</div>
                            <div class="score-label">Authority</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Hook/Story</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-low">5/10</div>
                            <div class="score-label">Video Test.</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Headlines</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Segmentation</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Offer Clarity</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-high">8/10</div>
                            <div class="score-label">Workflow</div>
                        </div>
                    </div>
                </div>

                <div class="case-study-section">
                    <h3>Key Findings</h3>
                    <div class="findings-grid">
                        <div class="finding-item">
                            <h4>Exceptional Authority</h4>
                            <p>Decades of documented experience combined with compelling testimonials (including 100% conversion metrics) create powerful credibility.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Pain-Focused Hook</h4>
                            <p>"Are you wasting good leads on poor sales systems?" directly addresses primary business concern and reframes the problem.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Superior Segmentation</h4>
                            <p>Clear differentiation between Business Owner and Sales Professional pathways with targeted messaging for each segment.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Optimized Funnel</h4>
                            <p>Strategic use of free resources as lead magnets creates effective awareness → interest → conversion progression.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Video Testimonial Gap</h4>
                            <p>Strong written testimonials would be significantly enhanced by video format for increased emotional impact.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Story Depth</h4>
                            <p>While authority is clear, personal journey narrative could create deeper emotional connection with prospects.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Industry Specificity</h4>
                            <p>Opportunity to showcase industry-specific case studies to demonstrate vertical expertise and applicability.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Pricing Indicators</h4>
                            <p>While custom pricing is appropriate, providing ranges or package tiers could accelerate qualification.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Case Study 3: Heartware Group -->
            <div class="case-study">
                <div class="case-study-header">
                    <div>
                        <div class="case-study-title">Heartware Group</div>
                        <a href="https://heartwaregroup.com.au" class="case-study-url" target="_blank">heartwaregroup.com.au →</a>
                    </div>
                    <div class="case-study-score">7.5/10</div>
                </div>

                <div class="section-content">
                    <p><strong>Business Model:</strong> Leadership and organizational culture consultancy combining behavioral science with human-centered leadership development.</p>
                    <p style="margin-top: 10px;"><strong>Core Value Proposition:</strong> "People First, Now More Than Ever" - Blending the art of leadership with the science of behavioral analytics.</p>
                    <p style="margin-top: 10px;"><strong>Service Portfolio:</strong> Heartwired Evolution leadership program, workforce analytics, Predictive Index assessments, consulting services, speaking engagements.</p>
                </div>

                <div class="case-study-section">
                    <h3>Performance Breakdown</h3>
                    <div class="score-breakdown">
                        <div class="score-item">
                            <div class="score-value score-medium">6/10</div>
                            <div class="score-label">Personality</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Authority</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Hook/Story</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-low">5/10</div>
                            <div class="score-label">Video Test.</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Headlines</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Segmentation</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Offer Clarity</div>
                        </div>
                        <div class="score-item">
                            <div class="score-value score-medium">7/10</div>
                            <div class="score-label">Workflow</div>
                        </div>
                    </div>
                </div>

                <div class="case-study-section">
                    <h3>Key Findings</h3>
                    <div class="findings-grid">
                        <div class="finding-item">
                            <h4>Unique Positioning</h4>
                            <p>"Art + Science" framework effectively differentiates from competitors by combining emotional intelligence with data-driven analytics.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Strategic Segmentation</h4>
                            <p>Clear "Who We Help" structure targeting CEOs, HR professionals, and team leaders with role-specific messaging.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Data Credibility</h4>
                            <p>Integration of Predictive Index and behavioral analytics tools adds scientific credibility to consulting services.</p>
                        </div>
                        <div class="finding-item">
                            <h4>Lead Magnet Strategy</h4>
                            <p>Free behavioral assessment provides immediate value while capturing qualified leads for follow-up.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Founder Narrative</h4>
                            <p>Organization-centric messaging overshadows personal founder story; opportunity to humanize brand through Dawn Russell's journey.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Video Social Proof</h4>
                            <p>Text testimonials present but lack the emotional impact and authenticity of video format.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Pricing Visibility</h4>
                            <p>While Heartwired Evolution shows pricing, other service lines would benefit from transparent pricing frameworks.</p>
                        </div>
                        <div class="finding-item improvement">
                            <h4>Results Metrics</h4>
                            <p>Opportunity to showcase quantifiable before/after outcomes and client logos to strengthen proof of results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Key Findings -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">5</span>
                Cross-Cutting Findings
            </h2>
            <p class="section-subtitle">Common patterns and sector-wide opportunities</p>

            <div class="key-findings">
                <h3>🔍 Critical Observations</h3>
                <ul>
                    <li><strong>Video Testimonial Gap:</strong> All three sites scored 5/10 on video testimonials, representing the single largest sector-wide opportunity for improvement. Video testimonials deliver 2-3x higher conversion impact than text alternatives.</li>

                    <li><strong>Authority Variation:</strong> Authority presentation scores ranged from 7/10 to 9/10, with John Blake's extensive experience documentation setting the benchmark. Sites with 20+ years documented experience significantly outperform newer entrants.</li>

                    <li><strong>Funnel Sophistication:</strong> Sales workflow scores (7-8/10) indicate solid baseline competence, with John Blake's free resource strategy demonstrating superior lead magnet implementation.</li>

                    <li><strong>Segmentation Effectiveness:</strong> Sites with explicit audience segmentation (John Blake, Heartware Group) demonstrate higher clarity scores and likely achieve better conversion through message-market match.</li>

                    <li><strong>Pricing Transparency:</strong> All three sites maintain limited pricing visibility, suggesting industry norm for custom pricing. However, this may create friction in decision-making process for price-sensitive segments.</li>
                </ul>
            </div>

            <div class="recommendations">
                <h3>💡 Strategic Recommendations</h3>
                <ol>
                    <li><strong>Implement Video Testimonials:</strong> Priority recommendation for all three sites. Invest in professional video testimonial production featuring quantifiable results and emotional transformation narratives.</li>

                    <li><strong>Deepen Founder Narratives:</strong> Particularly for Heartware Group and Reframe WA, develop compelling "origin story" content that creates emotional resonance and differentiation beyond service features.</li>

                    <li><strong>Add Quantified Case Studies:</strong> Move beyond testimonial quotes to detailed case studies with specific metrics (e.g., "increased engagement by X%," "reduced turnover by Y").</li>

                    <li><strong>Introduce Pricing Frameworks:</strong> While maintaining custom pricing flexibility, provide indicative ranges or tiered packages to accelerate qualification and reduce inquiry friction.</li>

                    <li><strong>Enhance Segmentation:</strong> Reframe WA should consider implementing more explicit segmentation pathways similar to John Blake's Business Owner vs. Sales Professional model.</li>

                    <li><strong>Optimize Lead Magnets:</strong> Heartware Group's free assessment model and John Blake's free resources demonstrate effective lead capture. Reframe WA could benefit from similar value-first approach beyond consultation offer.</li>
                </ol>
            </div>
        </section>

        <!-- Conclusion -->
        <section class="section">
            <h2 class="section-title">
                <span class="section-number">6</span>
                Conclusions
            </h2>
            <p class="section-subtitle">Summary assessment and forward outlook</p>

            <div class="section-content">
                <p>The Australian leadership and sales consulting sector demonstrates strong baseline website performance, with all reviewed sites scoring above 7.5/10. This indicates mature understanding of digital marketing fundamentals and professional services positioning.</p>

                <p style="margin-top: 15px;"><strong>Competitive Differentiation:</strong> John Blake emerges as the performance leader (8.5/10) through exceptional authority positioning and sophisticated funnel design. The site's clear B2B focus, pain-based messaging, and segmentation strategy provide a benchmark for the sector.</p>

                <p style="margin-top: 15px;"><strong>Sector Opportunity:</strong> The universal 5/10 score for video testimonials represents the single largest improvement opportunity across all sites. Early adopters of professional video social proof can expect significant competitive advantage and conversion lift.</p>

                <p style="margin-top: 15px;"><strong>Strategic Priority:</strong> Organizations should focus on enhancing emotional engagement through founder storytelling, quantified results demonstration, and rich media social proof. The shift from feature-focused to transformation-focused messaging will drive improved conversion performance.</p>

                <p style="margin-top: 15px;"><strong>Future Evolution:</strong> As the sector matures, differentiation will increasingly depend on sophisticated segmentation, personalized user journeys, and data-driven social proof. Sites that invest in these areas now will establish sustainable competitive advantages.</p>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 Technical Whitepaper - Consulting Website Analysis. All rights reserved.</p>
        <p style="margin-top: 10px; font-size: 12px;">This document is provided for informational purposes. Analysis based on publicly available website content as of November 2025.</p>
    </footer>
</main>

<?php get_footer(); ?>