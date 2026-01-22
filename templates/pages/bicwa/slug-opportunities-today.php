<?php
/**
 * Honey Opportunities Today - 2025 Snapshot
 * Using Pro-Sites Partials for structured presentation
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages/BICWA
 * @filepath   templates/pages/BICWA/slug-opportunities-today.php
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
}
</style>

<!-- 3. Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Page Title Hero -->
<div style="background: linear-gradient(135deg, var(--color-honey-amber) 0%, var(--color-honey-gold) 50%, var(--color-honey-light) 100%); color: white; padding: 80px 0; text-align: center;">
    <div class="content-container">
        <div style="display: inline-block; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 8px 20px; border-radius: 20px; font-size: 13px; font-weight: 700; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1.5px; border: 2px solid rgba(255,255,255,0.3);">
            WA Honey Industry
        </div>
        <h1 style="font-family: var(--font-heading); font-size: 52px; margin: 0 0 16px; line-height: 1.2; text-shadow: 0 2px 8px rgba(0,0,0,0.15);">Honey Opportunities Today</h1>
        <p style="font-size: 22px; margin: 0; opacity: 0.95; font-weight: 400; text-shadow: 0 1px 4px rgba(0,0,0,0.1);">2025 Snapshot — Western Australia's Turning Point</p>
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
            'title' => 'A Sector at a Turning Point',
            'subtitle' => 'Western Australia\'s unique honey sector offers rare ecological and commercial advantages',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Western Australia\'s honey sector sits at a turning point. With rising global demand for <strong>bioactive, traceable, and experience-driven products</strong>, WA\'s unique Jarrah, Marri, and Karri honeys offer rare ecological and commercial advantages.</p><p>The next five years will define who captures the value shift from <em>commodity honey → premium experience → certified marketplace ecosystems</em>.</p>',
        'format' => 'lead',
    ],
];

partial('column', $intro_section, 'pro-sites');

// ============================================
// 1. PREMIUM & FUNCTIONAL HONEY PRODUCTS
// ============================================
$premium_products_section = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'premium-products',
    ],
    'header' => [
        'heading' => [
            'label' => '1. Premium Products',
            'title' => 'Premium & Functional Honey Products',
            'subtitle' => 'Micro-portions, value-add substitutes, and symbiotic formulations',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<p>Transform commodity honey into premium, health-focused products that command higher margins and meet evolving consumer demands for wellness and sustainability.</p>',
                    'format' => 'standard',
                ],
            ],
            [
                'type' => 'grid',
                'content' => [
                    'items' => [
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(244,162,97,0.3); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">🍯</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-honey-light);">Micro-Portion "Honey Shots"</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">10–15g single-serve, TA-verified doses for oral or topical use; vintage-labelled "active honey" for wellness markets.</p>
                                    </div>
                                ',
                            ],
                        ],
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(244,162,97,0.3); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">🥤</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-honey-light);">Value-Add Substitutes</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">"Sweetened with Jarrah" syrups, sodas, cordials, and condiments replacing refined sugar; cross-branding with beverage and food producers.</p>
                                    </div>
                                ',
                            ],
                        ],
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(244,162,97,0.3); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">🌿</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-honey-light);">Symbiotic Formulations</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">Honey-ginger-lemon shots, lozenges, skincare, and ferments (jun/kombucha); leveraging co-brand and ingredient partnerships to extend reach.</p>
                                    </div>
                                ',
                            ],
                        ],
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(244,162,97,0.3); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">♻️</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-honey-light);">Packaging Innovation</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">Low-waste aluminium or paper-foil formats; refill models aligning with sustainability credentials.</p>
                                    </div>
                                ',
                            ],
                        ],
                    ],
                    'columns' => 2,
                    'gap' => '24px',
                ],
            ],
        ],
        'gap' => '40px',
    ],
];

partial('column', $premium_products_section, 'pro-sites');

// ============================================
// 2. APIARY & EXPERIENCE TOURISM
// ============================================
$tourism_section = [
    'settings' => [
        'custom_id' => 'experience-tourism',
    ],
    'header' => [
        'heading' => [
            'label' => '2. Experience Economy',
            'title' => 'Apiary & Experience Tourism',
            'subtitle' => 'The "Honey House" destination model',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: linear-gradient(135deg, rgba(244,162,97,0.1) 0%, rgba(233,196,106,0.1) 100%); padding: 40px; border-radius: 16px; border: 3px solid var(--color-honey-light); height: 100%;">
                            <div style="font-size: 48px; margin-bottom: 20px;">🏞️</div>
                            <h3 style="margin: 0 0 20px; font-size: 26px; font-weight: 700; color: var(--color-honey-dark);">"Honey House" Destination Model</h3>
                            <p style="margin: 0 0 16px; line-height: 1.7;">Café + glass-wall extraction + retail + education zones (like chocolate factories or cideries).</p>
                            <ul style="margin: 0; padding-left: 20px; line-height: 1.8;">
                                <li><strong>Revenue mix:</strong> café, retail, workshops, and tours</li>
                                <li><strong>Ideal locations:</strong> forest-edge townsites (Donnybrook, Balingup, Nannup)</li>
                                <li><strong>Hybrid operation viability:</strong> proven in similar WA ventures</li>
                            </ul>
                        </div>
                    ',
                ],
                'width' => '55%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div style="background: var(--color-forest-green); color: white; padding: 40px; border-radius: 16px; height: 100%; display: flex; flex-direction: column; justify-content: center;">
                            <div style="font-size: 48px; margin-bottom: 20px;">✨</div>
                            <h3 style="margin: 0 0 20px; font-size: 26px; font-weight: 700;">First-Mover Advantage</h3>
                            <p style="margin: 0 0 16px; line-height: 1.7; opacity: 0.95;">2025–2030 window for authentic, early entrants to secure semantic ownership and tourism trail dominance.</p>
                            <p style="margin: 0; line-height: 1.7; opacity: 0.95;"><strong>Benefits:</strong> Strong brand equity, multi-channel income, and community engagement before category saturation.</p>
                        </div>
                    ',
                ],
                'width' => '45%',
            ],
        ],
        'gap' => '30px',
        'reverse' => false,
    ],
];

partial('2-column', $tourism_section, 'pro-sites');

// ============================================
// 3. CERTIFIED HONEY MARKETPLACE
// ============================================
$marketplace_section = [
    'settings' => [
        'dark_mode' => true,
        'custom_id' => 'certified-marketplace',
    ],
    'header' => [
        'heading' => [
            'label' => '3. Digital Infrastructure',
            'title' => 'Certified Honey Marketplace',
            'subtitle' => 'Digital certification, provenance, and collective branding',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<p>Build trust and traceability through a unified digital platform that connects producers, consumers, and export markets with verifiable authenticity.</p>',
                    'format' => 'standard',
                ],
            ],
            [
                'type' => 'grid',
                'content' => [
                    'items' => [
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">🔐</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Digital Certification Platform</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">Blockchain-style or verified-batch registry for TA-tested, origin-verified WA honeys.</p>
                                    </div>
                                ',
                            ],
                        ],
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">📦</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Dropship & Co-Brand Network</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">Centralised marketplace enabling member producers to sell direct-to-consumer via shared logistics and marketing layer.</p>
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
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Collective Branding</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">"Certified WA Honey" seal; unified export presence; trust-based differentiation from blended/imported products.</p>
                                    </div>
                                ',
                            ],
                        ],
                        [
                            'type' => 'html',
                            'content' => [
                                'html' => '
                                    <div style="background: rgba(255,255,255,0.05); padding: 32px; border-radius: 12px; border: 2px solid rgba(42,157,143,0.5); height: 100%;">
                                        <div style="font-size: 40px; margin-bottom: 16px;">🎥</div>
                                        <h3 style="margin: 0 0 12px; font-size: 22px; font-weight: 700; color: var(--color-forest-green);">Future Integration</h3>
                                        <p style="margin: 0; line-height: 1.7; opacity: 0.9;">QR on jar → video of hive/origin → book visit. Connecting digital and physical experiences.</p>
                                    </div>
                                ',
                            ],
                        ],
                    ],
                    'columns' => 2,
                    'gap' => '24px',
                ],
            ],
        ],
        'gap' => '40px',
    ],
];

partial('column', $marketplace_section, 'pro-sites');

// ============================================
// 4. STRATEGIC TAKEAWAYS
// ============================================
$takeaways_section = [
    'settings' => [
        'custom_id' => 'strategic-takeaways',
        'custom_css' => 'background: linear-gradient(135deg, #E76F51 0%, #F4A261 50%, #E9C46A 100%); color: white;',
        'spacing_top' => '80px',
        'spacing_bottom' => '80px',
    ],
    'header' => [
        'heading' => [
            'label' => '4. Next Steps',
            'title' => 'Strategic Takeaways',
            'subtitle' => 'Immediate priorities for 2025–2030',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'row',
        'items' => [
            [
                'type' => 'text',
                'content' => [
                    'text' => '<p style="font-size: 19px; line-height: 1.8; margin: 0 0 20px; opacity: 0.95;">Demand for <strong>bioactive honeys</strong> and <strong>authentic experiences</strong> will grow rapidly through 2030.</p><p style="font-size: 19px; line-height: 1.8; margin: 0; opacity: 0.95;">Early integrated ventures—<strong>premium product + visitor experience + certified trade channel</strong>—can anchor the next generation of WA\'s honey economy.</p>',
                    'format' => 'standard',
                ],
                'width' => '45%',
            ],
            [
                'type' => 'card',
                'content' => [
                    'body' => [
                        'type' => 'html',
                        'content' => [
                            'html' => '
                                <h3 style="margin: 0 0 20px; font-size: 24px; font-weight: 700;">Immediate Priorities:</h3>
                                <ul style="margin: 0; padding-left: 20px; font-size: 17px; line-height: 2;">
                                    <li>Concept validation and investment feasibility for <strong>micro-portion premium product line</strong></li>
                                    <li>Pilot development of experience-based <strong>"Honey House" destination</strong></li>
                                    <li>Foundation build for <strong>certified marketplace infrastructure</strong></li>
                                </ul>
                            ',
                        ],
                    ],
                    'padding' => '32px',
                    'shadow' => true,
                ],
                'width' => '55%',
                'custom_css' => 'background: rgba(0,0,0,0.2); border-left: 5px solid white;',
            ],
        ],
        'gap' => '30px',
        'align' => 'stretch',
    ],
];

partial('column', $takeaways_section, 'pro-sites');

// ============================================
// OUTCOME SECTION
// ============================================
$outcome_section = [
    'settings' => [
        'custom_id' => 'outcome',
    ],
    'header' => [
        'heading' => [
            'title' => 'The Vision',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p style="font-size: 22px; text-align: center; font-weight: 600; color: var(--color-honey-dark); line-height: 1.7;">Build WA\'s reputation as the world\'s benchmark for <strong>forest-sourced, certified, and experience-rich honeys</strong> — transforming local apiaries from producers into <strong>brand destinations</strong> and <strong>digital exporters</strong>.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Discuss Opportunities',
                'url' => '#',
                'style' => 'primary',
            ],
            [
                'text' => 'Download Full Report',
                'url' => '#',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $outcome_section, 'pro-sites');
?>

<?php get_footer(); ?>
