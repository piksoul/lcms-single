<?php
/**
 * BICWA Funding & Initiatives Presentation
 *
 * Overview of WA + Federal funding programs for honey sector innovation
 *
 * @filepath templates/pages/bicwa/slug-funding-presentation.php
 */

// Include the partial helper
require_once LEANCMS_PLUGIN_DIR . 'includes/helpers/partial-helper.php';

// ============================================
// 1. OVERVIEW SECTION
// ============================================
$overview_section = [
    'settings' => [
        'custom_id' => 'overview',
        'spacing_top' => '80px',
        'spacing_bottom' => '60px',
    ],
    'header' => [
        'heading' => [
            'label' => '🧭 Section 1',
            'title' => 'Funding & Initiatives — Western Australia + Federal',
            'subtitle' => 'Aligned funding streams for honey sector innovation',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'content' => [
            'items' => [
                [
                    'type' => 'text',
                    'content' => [
                        'text' => '<p><strong>Purpose:</strong> Identify aligned funding streams for honey sector innovation, visitor economy activation, and regional manufacturing pilots.</p>',
                        'format' => 'lead',
                    ],
                ],
                [
                    'type' => 'text',
                    'content' => [
                        'text' => '<p><strong>Context:</strong> WA\'s honey industry can leverage multiple programs that encourage regional job creation, agrifood value-adding, tourism development, and export readiness.</p>',
                        'format' => 'standard',
                    ],
                ],
            ],
            'gap' => '20px',
            'align' => 'center',
        ],
    ],
];

partial('column', $overview_section, 'pro-sites');

// ============================================
// 2. KEY GRANT STREAMS
// ============================================
$grants_section = [
    'settings' => [
        'custom_id' => 'grant-streams',
        'dark_mode' => true,
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => '💰 Section 2',
            'title' => 'Key Grant Streams',
            'subtitle' => 'WA State and Federal funding opportunities',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            // 2.1 RED Grants
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Regional Economic Development (RED) Grants</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">DPIRD</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Supports small–medium capital or pilot projects in <strong>regional WA</strong></li>
                                    <li>Delivered via <strong>Regional Development Commissions</strong></li>
                                    <li>Typical ask: <strong>$50K–$250K</strong></li>
                                    <li>Focus: job creation, value-add food, visitor economy</li>
                                </ul>
                                <a href="https://www.dpird.wa.gov.au/businesses/grants-and-support/regional-economic-development-grants" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.2 VAIG
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Value Add Investment Grants (VAIG) – Feasibility</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">DPIRD</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Covers <strong>feasibility studies, detailed design, trials</strong></li>
                                    <li>De-risking for food & beverage value-add projects</li>
                                    <li>Ideal for <strong>Honey House</strong>, <strong>micro-portioning line</strong>, or <strong>TA lab/QC</strong> planning</li>
                                </ul>
                                <a href="https://www.dpird.wa.gov.au/businesses/grants-and-support/feasibility-stream" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.3 Tourism WA
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Tourism WA — Industry Development & Events</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">Tourism WA</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li><strong>Industry Development:</strong> Advisory + support for new tourism experiences</li>
                                    <li>Useful for <strong>concept shaping and investor packs</strong></li>
                                    <li><strong>Regional Events Scheme (RES):</strong> Cash support for regional events</li>
                                    <li>Ideal for <strong>"Jarrah Harvest" launch/festival</strong></li>
                                </ul>
                                <a href="https://www.tourism.wa.gov.au/resources-and-support/industry-development" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.4 Lotterywest
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Lotterywest Grants</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">Lotterywest (WA)</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Supports <strong>community infrastructure</strong>, <strong>education displays</strong></li>
                                    <li>Covers <strong>interpretation</strong>, <strong>accessibility</strong>, and <strong>innovation</strong></li>
                                    <li>Useful for <strong>visitor-centre-style projects</strong></li>
                                    <li>Ideal for <strong>public-benefit installations</strong></li>
                                </ul>
                                <a href="https://www.lotterywest.wa.gov.au/grants/grant-opportunities" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.5 Buy West Eat Best
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Buy West Eat Best</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">DPIRD</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li><strong>Not cash</strong>, but a powerful <strong>provenance certification</strong></li>
                                    <li>Marketing platform for WA products</li>
                                    <li>Builds <strong>consumer trust</strong></li>
                                    <li>Strengthens retail + export credibility</li>
                                </ul>
                                <a href="https://www.dpird.wa.gov.au/businesses/food-and-beverage/buy-west-eat-best" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.6 Growing Regions
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Growing Regions Program</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">Federal</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Large-scale capital grants: <strong>$0.5M–$15M</strong></li>
                                    <li>For regional community infrastructure</li>
                                    <li>Requires <strong>NFP/LGA partner</strong></li>
                                    <li>Must demonstrate <strong>regional benefit</strong></li>
                                </ul>
                                <a href="https://www.infrastructure.gov.au/territories-regions/regional-australia/regional-and-community-programs/growing-regions-program" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.7 EMDG
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Export Market Development Grants (EMDG)</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">Austrade (Federal)</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Matched funding for <strong>export marketing</strong></li>
                                    <li>Covers <strong>trade shows</strong>, <strong>digital campaigns</strong></li>
                                    <li>Ideal for <strong>certified honey exports</strong> (SG/MY/JP)</li>
                                    <li><strong>Highly competitive</strong>—plan early</li>
                                </ul>
                                <a href="https://www.austrade.gov.au/en/how-we-can-help-you/grants/export-market-development-grants" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
            // 2.8 SFFC
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 16px; font-size: 20px; font-weight: 700; color: var(--color-honey-dark);">Southern Forests Food Council (SFFC)</h3>
                                <p style="margin: 0 0 12px; font-size: 14px; color: #666; font-weight: 600;">Regional Support</p>
                                <ul style="margin: 0 0 16px; padding-left: 20px; line-height: 1.8;">
                                    <li>Targeted support for <strong>Manjimup–Pemberton–Donnybrook</strong> producers</li>
                                    <li>Subsidies for <strong>project planning</strong></li>
                                    <li>Support for <strong>funding application prep</strong></li>
                                    <li>Local knowledge and networking</li>
                                </ul>
                                <a href="https://www.southernforestsfood.com/growersubsidies2024" target="_blank" style="color: var(--color-primary); font-weight: 600; text-decoration: none;">🔗 Learn More →</a>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 2,  // 2x4 grid on desktop, stacks on mobile
        'gap' => '30px',
    ],
];

partial('grid', $grants_section, 'pro-sites');

// ============================================
// 3. FUNDING MATRIX
// ============================================
$matrix_section = [
    'settings' => [
        'custom_id' => 'funding-matrix',
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => '🏗️ Section 3',
            'title' => 'What Each Could Fund',
            'subtitle' => 'Matching grants to project concepts',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'content' => [
            'html' => '
                <div style="overflow-x: auto; margin: 0 auto; max-width: 100%;">
                    <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, var(--color-honey-dark) 0%, var(--color-honey-medium) 100%); color: white;">
                                <th style="padding: 20px; text-align: left; font-weight: 700; font-size: 16px; border-right: 1px solid rgba(255,255,255,0.2);">Project Concept</th>
                                <th style="padding: 20px; text-align: left; font-weight: 700; font-size: 16px; border-right: 1px solid rgba(255,255,255,0.2);">Suitable Grants</th>
                                <th style="padding: 20px; text-align: left; font-weight: 700; font-size: 16px;">Use Cases</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #e5e5e5;">
                                <td style="padding: 24px; vertical-align: top;">
                                    <strong style="font-size: 16px; color: var(--color-honey-dark);">Honey House</strong>
                                    <p style="margin: 8px 0 0; font-size: 14px; color: #666;">(café, glass apiary, education, shop)</p>
                                </td>
                                <td style="padding: 24px; vertical-align: top;">
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #E9F5F9; color: #0077B6; border-radius: 4px; font-size: 13px; font-weight: 600;">VAIG Feasibility</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #E9F5F9; color: #0077B6; border-radius: 4px; font-size: 13px; font-weight: 600;">RED</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #E9F5F9; color: #0077B6; border-radius: 4px; font-size: 13px; font-weight: 600;">Lotterywest</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #E9F5F9; color: #0077B6; border-radius: 4px; font-size: 13px; font-weight: 600;">Growing Regions</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #E9F5F9; color: #0077B6; border-radius: 4px; font-size: 13px; font-weight: 600;">RES</span>
                                </td>
                                <td style="padding: 24px; vertical-align: top; font-size: 14px; line-height: 1.7; color: #333;">
                                    Feasibility → capital → launch event
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #e5e5e5; background: #fafafa;">
                                <td style="padding: 24px; vertical-align: top;">
                                    <strong style="font-size: 16px; color: var(--color-honey-dark);">Active Honey Micro-Portions Line</strong>
                                    <p style="margin: 8px 0 0; font-size: 14px; color: #666;">(premium packaging & distribution)</p>
                                </td>
                                <td style="padding: 24px; vertical-align: top;">
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #FFF4E6; color: #E76F51; border-radius: 4px; font-size: 13px; font-weight: 600;">VAIG Feasibility</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #FFF4E6; color: #E76F51; border-radius: 4px; font-size: 13px; font-weight: 600;">RED</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #FFF4E6; color: #E76F51; border-radius: 4px; font-size: 13px; font-weight: 600;">Buy West Eat Best</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #FFF4E6; color: #E76F51; border-radius: 4px; font-size: 13px; font-weight: 600;">EMDG</span>
                                </td>
                                <td style="padding: 24px; vertical-align: top; font-size: 14px; line-height: 1.7; color: #333;">
                                    Feasibility → pilot line → marketing/export
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 24px; vertical-align: top;">
                                    <strong style="font-size: 16px; color: var(--color-honey-dark);">Certified WA Honey Marketplace</strong>
                                    <p style="margin: 8px 0 0; font-size: 14px; color: #666;">(digital platform & certification)</p>
                                </td>
                                <td style="padding: 24px; vertical-align: top;">
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #F0F7F0; color: #2D6A4F; border-radius: 4px; font-size: 13px; font-weight: 600;">VAIG Feasibility</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #F0F7F0; color: #2D6A4F; border-radius: 4px; font-size: 13px; font-weight: 600;">RED</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #F0F7F0; color: #2D6A4F; border-radius: 4px; font-size: 13px; font-weight: 600;">Lotterywest</span>
                                    <span style="display: inline-block; padding: 6px 12px; margin: 4px; background: #F0F7F0; color: #2D6A4F; border-radius: 4px; font-size: 13px; font-weight: 600;">Tourism WA</span>
                                </td>
                                <td style="padding: 24px; vertical-align: top; font-size: 14px; line-height: 1.7; color: #333;">
                                    Prototype → education trust infra → demand activation
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            ',
        ],
    ],
];

partial('column', $matrix_section, 'pro-sites');

// ============================================
// 4. PRACTICAL TAKEAWAYS
// ============================================
$takeaways_section = [
    'settings' => [
        'custom_id' => 'takeaways',
        'custom_css' => 'background: linear-gradient(135deg, #2D6A4F 0%, #52B788 100%); color: white;',
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => '🧩 Section 4',
            'title' => 'Practical Takeaways',
            'subtitle' => 'Key insights for your funding strategy',
            'align' => 'center',
        ],
    ],
    'content' => [
        'items' => [
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="font-size: 42px; text-align: center; margin-bottom: 20px;">🛤️</div>
                                <h3 style="margin: 0 0 16px; font-size: 22px; font-weight: 700; text-align: center;">Pilot Pathway Exists</h3>
                                <p style="margin: 0; line-height: 1.8; font-size: 16px; text-align: center;">Sequence: <strong>VAIG Feasibility → RED (Pilot CapEx) → RES (Launch)</strong></p>
                                <p style="margin: 12px 0 0; line-height: 1.8; font-size: 16px; text-align: center;">Layer with <em>Lotterywest/Growing Regions</em> for public build.</p>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="font-size: 42px; text-align: center; margin-bottom: 20px;">✨</div>
                                <h3 style="margin: 0 0 16px; font-size: 22px; font-weight: 700; text-align: center;">Brand Trust Multiplier</h3>
                                <p style="margin: 0; line-height: 1.8; font-size: 16px; text-align: center;">Join <strong>Buy West Eat Best</strong> early to boost every application.</p>
                                <p style="margin: 12px 0 0; line-height: 1.8; font-size: 16px; text-align: center;">Provenance certification strengthens credibility with grant assessors.</p>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="font-size: 42px; text-align: center; margin-bottom: 20px;">🌏</div>
                                <h3 style="margin: 0 0 16px; font-size: 22px; font-weight: 700; text-align: center;">Plan Exports Early</h3>
                                <p style="margin: 0; line-height: 1.8; font-size: 16px; text-align: center;"><strong>EMDG</strong> is viable but oversubscribed—plan with backup.</p>
                                <p style="margin: 12px 0 0; line-height: 1.8; font-size: 16px; text-align: center;">Start export groundwork before applying to demonstrate readiness.</p>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'shadow' => true,
                ],
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <div style="font-size: 42px; text-align: center; margin-bottom: 20px;">🤝</div>
                                <h3 style="margin: 0 0 16px; font-size: 22px; font-weight: 700; text-align: center;">Local Partners Strengthen Bids</h3>
                                <p style="margin: 0; line-height: 1.8; font-size: 16px; text-align: center;">Engage <strong>SFFC</strong> + <strong>Regional Development Commission</strong> early.</p>
                                <p style="margin: 12px 0 0; line-height: 1.8; font-size: 16px; text-align: center;">Co-endorsement improves alignment and application quality.</p>
                            ',
                        ],
                    ],
                    'padding' => '40px',
                    'shadow' => true,
                ],
            ],
        ],
        'columns' => 2,
        'gap' => '30px',
    ],
];

partial('grid', $takeaways_section, 'pro-sites');

// ============================================
// 5. NEXT STEPS
// ============================================
$next_steps_section = [
    'settings' => [
        'custom_id' => 'next-steps',
        'spacing_top' => '80px',
        'spacing_bottom' => '100px',
    ],
    'header' => [
        'heading' => [
            'label' => '📅 Section 5',
            'title' => 'Next Steps',
            'subtitle' => 'Recommended pathway and deliverables',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'content' => [
            'items' => [
                [
                    'type' => 'html',
                    'content' => [
                        'html' => '
                            <div style="background: linear-gradient(135deg, rgba(244,162,97,0.1) 0%, rgba(233,196,106,0.1) 100%); padding: 40px; border-radius: 12px; border-left: 5px solid var(--color-honey-medium); margin-bottom: 30px;">
                                <h3 style="margin: 0 0 24px; font-size: 24px; font-weight: 700; color: var(--color-honey-dark);">Funding Pathway Timeline (Q1–Q4 2026)</h3>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                                    <div style="padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08);">
                                        <div style="font-size: 14px; font-weight: 700; color: var(--color-primary); margin-bottom: 8px;">Q1 2026</div>
                                        <div style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Feasibility</div>
                                        <div style="font-size: 14px; color: #666;">VAIG application</div>
                                    </div>
                                    <div style="padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08);">
                                        <div style="font-size: 14px; font-weight: 700; color: var(--color-primary); margin-bottom: 8px;">Q2 2026</div>
                                        <div style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Pilot Capital</div>
                                        <div style="font-size: 14px; color: #666;">RED application</div>
                                    </div>
                                    <div style="padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08);">
                                        <div style="font-size: 14px; font-weight: 700; color: var(--color-primary); margin-bottom: 8px;">Q3 2026</div>
                                        <div style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Launch/Events</div>
                                        <div style="font-size: 14px; color: #666;">RES application</div>
                                    </div>
                                    <div style="padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.08);">
                                        <div style="font-size: 14px; font-weight: 700; color: var(--color-primary); margin-bottom: 8px;">Q4 2026</div>
                                        <div style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Expansion</div>
                                        <div style="font-size: 14px; color: #666;">Lotterywest / Growing Regions</div>
                                    </div>
                                </div>
                            </div>
                        ',
                    ],
                ],
                [
                    'type' => 'card',
                    'content' => [
                        'body' => [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <h3 style="margin: 0 0 20px; font-size: 24px; font-weight: 700; color: var(--color-honey-dark);">Optional Deliverable: Bid-Prep Checklist</h3>
                                    <p style="margin: 0 0 16px; line-height: 1.8; font-size: 16px;">Tailored per grant stream with:</p>
                                    <ul style="margin: 0; padding-left: 24px; line-height: 2; font-size: 16px;">
                                        <li>Eligibility verification</li>
                                        <li>Partner letter templates</li>
                                        <li>Budget templates and co-funding structures</li>
                                        <li>KPI frameworks aligned to grant criteria</li>
                                        <li>Application timeline and submission checklists</li>
                                    </ul>
                                ',
                            ],
                        ],
                        'padding' => '40px',
                        'border' => true,
                    ],
                ],
            ],
            'gap' => '0px',
            'align' => 'center',
        ],
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Download Grant Comparison Matrix',
                'url' => '#',
                'style' => 'primary',
            ],
            [
                'text' => 'Contact SFFC for Support',
                'url' => 'https://www.southernforestsfood.com',
                'style' => 'secondary',
            ],
        ],
    ],
];

partial('column', $next_steps_section, 'pro-sites');
