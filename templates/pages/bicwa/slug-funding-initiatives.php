<?php
/**
 * Funding & Initiatives (WA + Federal)
 * Using Pro-Sites Partials for structured presentation
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/BICWA
 * @filepath   templates/pages/BICWA/slug-funding-initiatives.php
 */

get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');

// CSS variables (using global defaults)
$css_vars = $global_config['css_variables'] ?? [];
?>

<!-- 1. LeanCMS Design System - Phase 1-3 Components (Base + BEM Components) -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- 2. CSS Variables (Generated from config.php) -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
    /* Honey-themed custom colors */
    --color-honey-gold: #F4A261;
    --color-honey-amber: #E76F51;
    --color-honey-dark: #264653;
    --color-honey-light: #E9C46A;
    --color-forest-green: #2A9D8F;
    --color-funding-blue: #2E86AB;
}
</style>

<!-- 3. Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Page Title Hero -->
<div style="background: linear-gradient(135deg, var(--color-funding-blue) 0%, var(--color-forest-green) 50%, var(--color-honey-light) 100%); color: white; padding: 80px 0; text-align: center;">
    <div class="content-container">
        <div style="display: inline-block; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 8px 20px; border-radius: 20px; font-size: 13px; font-weight: 700; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1.5px; border: 2px solid rgba(255,255,255,0.3);">
            WA Honey Industry — Investment Pathways
        </div>
        <h1 style="font-family: var(--font-heading); font-size: 52px; margin: 0 0 16px; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.15);">Funding & Initiatives</h1>
        <p style="font-size: 22px; margin: 0; opacity: 0.95; font-weight: 400; text-shadow: 0 1px 4px rgba(0,0,0,0.1);">WA + Federal — Grant Programs & Strategic Funding</p>
    </div>
</div>

<?php
// ============================================
// INTRODUCTION SECTION
// ============================================
$intro_section = [
    'settings' => [
        'custom_id' => 'introduction',
    ],
    'header' => [
        'heading' => [
            'title' => 'Strategic Funding Pathways',
            'subtitle' => 'From feasibility to pilot to scale — aligned funding streams for premium honey ventures',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Western Australia\'s honey sector benefits from multiple aligned funding programs spanning state and federal levels. These grants support <strong>feasibility studies, capital equipment, visitor experiences, export development, and regional infrastructure</strong>.</p><p>The key to success: <em>staged applications</em> that sequence feasibility → pilot → scale while leveraging both competitive grants and provenance programs.</p>',
        'format' => 'lead',
    ],
];

partial('column', $intro_section, 'pro-sites');

// ============================================
// REGIONAL & STATE FUNDING
// ============================================
$regional_header = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'regional-funding',
    ],
    'header' => [
        'heading' => [
            'label' => 'WA State Programs',
            'title' => 'Regional Economic Development & Value-Add',
            'subtitle' => 'DPIRD, Tourism WA & Lotterywest',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Western Australia\'s Department of Primary Industries and Regional Development (DPIRD), Tourism WA, and Lotterywest provide multiple pathways for regional food producers and experience businesses.</p>',
        'format' => 'standard',
    ],
];

partial('column', $regional_header, 'pro-sites');

// Regional Funding Grid
$regional_grid = [
    'settings' => [
        'dark_mode' => true,
    ],
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                            <div style="font-size: 40px; margin-bottom: 16px;">🏞️</div>
                            <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Regional Economic Development (RED) Grants</h3>
                            <p style="margin: 0 0 12px; line-height: 1.7; opacity: 0.9;">Small–mid capital or pilot projects in regional WA; delivered via Regional Development Commissions. Competitive but very aligned to job creation, value-add food, and visitor economy.</p>
                            <p style="margin: 0 0 8px; font-size: 14px; opacity: 0.8;"><strong>Typical range:</strong> $50k–$250k</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> DPIRD via Regional Development Commissions</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                            <div style="font-size: 40px; margin-bottom: 16px;">🔬</div>
                            <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">VAIG – Feasibility Stream</h3>
                            <p style="margin: 0 0 12px; line-height: 1.7; opacity: 0.9;">Value Add Investment Grants (DPIRD). Pays for feasibility, detailed design, trials, de-risking for food & beverage value-add capital projects. Perfect for scoping the Honey House, micro-portioning line, TA lab/QC process.</p>
                            <p style="margin: 0 0 8px; font-size: 14px; opacity: 0.8;"><strong>Use for:</strong> Feasibility studies, trials, design</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> DPIRD (recurring rounds)</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                            <div style="font-size: 40px; margin-bottom: 16px;">✈️</div>
                            <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Tourism WA – Industry Development & Events</h3>
                            <p style="margin: 0 0 12px; line-height: 1.7; opacity: 0.9;">Industry development: advisory + pathways for new attractions/experiences; useful for concept shaping and investor packs.</p>
                            <p style="margin: 0 0 8px; line-height: 1.7; opacity: 0.9;"><strong>Regional Events Scheme (RES):</strong> Cash support for smaller regional events—ideal for a "Jarrah Harvest" launch/festival to test visitation and drive PR.</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> Tourism Western Australia</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                            <div style="font-size: 40px; margin-bottom: 16px;">🎟️</div>
                            <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Lotterywest Grants</h3>
                            <p style="margin: 0 0 12px; line-height: 1.7; opacity: 0.9;">Infrastructure/fit-out with community benefit, interpretation, trails, innovation—often used for visitor-centre style projects when NFP/community value is clear (partner with shire or local NFP).</p>
                            <p style="margin: 0 0 8px; font-size: 14px; opacity: 0.8;"><strong>Ideal for:</strong> Glass-wall edu displays, interpretive signage, accessible facilities</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> Lotterywest</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                            <div style="font-size: 40px; margin-bottom: 16px;">🏅</div>
                            <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Buy West Eat Best</h3>
                            <p style="margin: 0 0 12px; line-height: 1.7; opacity: 0.9;">Not a cash grant, but a powerful provenance mark + marketing platform for WA food producers—strengthens marketplace trust and retail adoption.</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> DPIRD</p>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 2,
        'gap' => '24px',
    ],
];

partial('grid', $regional_grid, 'pro-sites');

// ============================================
// FEDERAL FUNDING
// ============================================
$federal_section = [
    'settings' => [
        'custom_id' => 'federal-funding',
    ],
    'header' => [
        'heading' => [
            'label' => 'Federal Programs',
            'title' => 'Growing Regions & Export Development',
            'subtitle' => 'Larger-scale capital and international market expansion',
            'align' => 'center',
        ],
    ],
];

partial('column', $federal_section, 'pro-sites');

// Federal Funding Grid
$federal_grid = [
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(46,134,171,0.1) 0%, rgba(42,157,143,0.1) 100%); padding: 40px; border-radius: 16px; border: 3px solid var(--color-funding-blue); height: 100%;">
                            <div style="font-size: 48px; margin-bottom: 20px;">🏗️</div>
                            <h3 style="margin: 0 0 16px; font-size: 26px; font-weight: 700; color: var(--color-honey-dark);">Growing Regions Program</h3>
                            <p style="margin: 0 0 16px; line-height: 1.7;"><strong>Range:</strong> $0.5m–$15m for regional community infrastructure via eligible NFPs/LGAs.</p>
                            <p style="margin: 0 0 16px; line-height: 1.7;">If the Honey House is structured with a shire/NFP partner and strong regional benefit, this is the <strong>"go big" capital lever</strong>.</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> Infrastructure Australia (round-based)</p>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(46,134,171,0.1) 0%, rgba(42,157,143,0.1) 100%); padding: 40px; border-radius: 16px; border: 3px solid var(--color-funding-blue); height: 100%;">
                            <div style="font-size: 48px; margin-bottom: 20px;">🌏</div>
                            <h3 style="margin: 0 0 16px; font-size: 26px; font-weight: 700; color: var(--color-honey-dark);">Export Market Development Grants (EMDG)</h3>
                            <p style="margin: 0 0 16px; line-height: 1.7;">Matched funding for overseas marketing (e-commerce, trade shows, content) for certified/TA-tested premium honey exports.</p>
                            <p style="margin: 0 0 16px; line-height: 1.7; font-weight: 600; color: var(--color-honey-amber);"><strong>Note:</strong> Scheme changes and oversubscription—apply early and plan conservatively.</p>
                            <p style="margin: 0; font-size: 14px; opacity: 0.8;"><strong>Source:</strong> Austrade</p>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 2,
        'gap' => '24px',
    ],
];

partial('grid', $federal_grid, 'pro-sites');

// ============================================
// LOCAL SUPPORT
// ============================================
$local_section = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'local-support',
        'spacing_top' => '60px',
        'spacing_bottom' => '60px',
    ],
    'header' => [
        'heading' => [
            'title' => 'Local Support & Pipeline Intelligence',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 40px; border-radius: 16px; border: 2px solid rgba(233,196,106,0.5);">
                    <div style="font-size: 56px; margin-bottom: 20px;">🤝</div>
                    <h3 style="margin: 0 0 16px; font-size: 28px; font-weight: 700;">Southern Forests Food Council (SFFC)</h3>
                    <p style="margin: 0 0 16px; font-size: 18px; line-height: 1.7; opacity: 0.95;">Operates targeted programs (e.g., 2024 grower subsidy for project planning/funding applications).</p>
                    <p style="margin: 0; font-size: 18px; line-height: 1.7; opacity: 0.95;">Useful for <strong>bid prep and pipeline intel</strong> in the Manjimup–Pemberton–Donnybrook arc.</p>
                </div>
            </div>
        ',
    ],
];

partial('column', $local_section, 'pro-sites');

// ============================================
// WHAT EACH COULD FUND
// ============================================
$funding_match_section = [
    'settings' => [
        'custom_id' => 'funding-match',
    ],
    'header' => [
        'heading' => [
            'label' => 'Strategic Matching',
            'title' => 'What Each Could Fund',
            'subtitle' => 'Match grants to your specific initiatives',
            'align' => 'center',
        ],
    ],
];

partial('column', $funding_match_section, 'pro-sites');

// Funding Match Grid - 3 main initiatives
$match_grid = [
    'content' => [
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 36px; border-radius: 16px; border-left: 6px solid var(--color-honey-gold); box-shadow: 0 4px 12px rgba(0,0,0,0.1); height: 100%;">
                            <h3 style="margin: 0 0 20px; font-size: 24px; font-weight: 700; color: var(--color-honey-dark);">🏞️ Honey House<br>(café + glass apiary + education + shop)</h3>
                            <ul style="margin: 0; padding-left: 20px; line-height: 1.8; color: var(--color-text-primary);">
                                <li><strong>Feasibility/design:</strong> VAIG Feasibility (DPIRD)</li>
                                <li><strong>Capital/fit-out:</strong> RED Grants (partial), Lotterywest (education/public benefit), Growing Regions with NFP/shire partner</li>
                                <li><strong>Launch event:</strong> Tourism WA RES/REP</li>
                            </ul>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 36px; border-radius: 16px; border-left: 6px solid var(--color-honey-amber); box-shadow: 0 4px 12px rgba(0,0,0,0.1); height: 100%;">
                            <h3 style="margin: 0 0 20px; font-size: 24px; font-weight: 700; color: var(--color-honey-dark);">🍯 Premium "Active Honey"<br>Micro-portions & Value-Add Line</h3>
                            <ul style="margin: 0; padding-left: 20px; line-height: 1.8; color: var(--color-text-primary);">
                                <li><strong>Feasibility, packaging trials, TA testing:</strong> VAIG Feasibility (DPIRD)</li>
                                <li><strong>Pilot equipment (small line) in region:</strong> RED Grants (DPIRD)</li>
                                <li><strong>Brand/provenance leverage:</strong> Buy West Eat Best (DPIRD)</li>
                                <li><strong>Export marketing (SG/MY/JP):</strong> EMDG (Austrade) — plan for tight rounds</li>
                            </ul>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: white; padding: 36px; border-radius: 16px; border-left: 6px solid var(--color-forest-green); box-shadow: 0 4px 12px rgba(0,0,0,0.1); height: 100%;">
                            <h3 style="margin: 0 0 20px; font-size: 24px; font-weight: 700; color: var(--color-honey-dark);">🔐 Certified WA Honey Marketplace<br>(dropship + provenance registry)</h3>
                            <ul style="margin: 0; padding-left: 20px; line-height: 1.8; color: var(--color-text-primary);">
                                <li><strong>Scoping/prototype (tech + governance + QA):</strong> VAIG Feasibility; RED for regional digital commerce</li>
                                <li><strong>Trust & education infra (consumer-facing, lab/QA visitor display):</strong> Lotterywest (NFP angle)</li>
                                <li><strong>Demand activation (events/trails):</strong> Tourism WA RES, plus shire tourism funds</li>
                            </ul>
                        </div>
                    ',
                ],
            ],
        ],
        'columns' => 'auto-fit',
        'min-width' => '320px',
        'gap' => '24px',
    ],
];

partial('grid', $match_grid, 'pro-sites');

// ============================================
// PRACTICAL TAKEAWAYS
// ============================================
$takeaways_section = [
    'settings' => [
        'custom_id' => 'takeaways',
        'custom_css' => 'background: linear-gradient(135deg, var(--color-funding-blue) 0%, var(--color-forest-green) 100%); color: white;',
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => 'Key Actions',
            'title' => 'Practical Takeaways',
            'subtitle' => 'Strategic funding pathways',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="max-width: 1000px; margin: 0 auto;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 32px;">
                    <div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                        <div style="font-size: 48px; margin-bottom: 16px;">📋</div>
                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700;">Staged Pathway</h3>
                        <p style="margin: 0; line-height: 1.7; opacity: 0.95;">Run <strong>VAIG Feasibility → RED (pilot capex) → RES (launch event)</strong> as a staged pathway; layer Lotterywest/Growing Regions for bigger public-facing builds with NFP/shire partner.</p>
                    </div>

                    <div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                        <div style="font-size: 48px; margin-bottom: 16px;">🏅</div>
                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700;">Brand Trust Matters</h3>
                        <p style="margin: 0; line-height: 1.7; opacity: 0.95;">Join <strong>Buy West Eat Best</strong> early—it strengthens every application and the certified marketplace story.</p>
                    </div>

                    <div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                        <div style="font-size: 48px; margin-bottom: 16px;">🌏</div>
                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700;">Export Planning</h3>
                        <p style="margin: 0; line-height: 1.7; opacity: 0.95;"><strong>EMDG</strong> is viable but volatile—design export marketing with contingency funding.</p>
                    </div>

                    <div style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); padding: 32px; border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                        <div style="font-size: 48px; margin-bottom: 16px;">🤝</div>
                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700;">Local Allies</h3>
                        <p style="margin: 0; line-height: 1.7; opacity: 0.95;">Engage <strong>SFFC and Regional Development Commissions</strong> early—they help shape stronger, region-fit proposals.</p>
                    </div>
                </div>
            </div>
        ',
    ],
];

partial('column', $takeaways_section, 'pro-sites');

// ============================================
// CALL TO ACTION
// ============================================
$cta_section = [
    'settings' => [
        'custom_id' => 'next-steps',
        'custom_classes' => 'align-center',
    ],
    'header' => [
        'heading' => [
            'title' => 'Ready to Apply?',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p class="text-lead" style="font-weight: 600; color: var(--color-honey-dark);">Start with <strong>feasibility</strong>, sequence to <strong>pilot capital</strong>, and layer <strong>community benefit</strong> for maximum funding leverage. The pathway exists—now map your milestones to the funding calendar.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Download Funding Matrix',
                'url' => '#',
                'style' => 'primary',
            ],
            [
                'text' => 'Contact SFFC',
                'url' => '#',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $cta_section, 'pro-sites');
?>

<?php get_footer(); ?>
