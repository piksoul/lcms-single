<?php
/**
 * Jiku Character Universe - Project Overview
 *
 * Australian animal characters designed for educational content,
 * entertainment, and digital media
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/jiku/slug-project-overview.php
 * @since      1.2.6
 */

defined('ABSPATH') || exit;
get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');

// Merge CSS variables
$css_vars = $global_config['css_variables'] ?? [];
?>

<!-- Base Structural CSS -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/lcms-design-system.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
    --<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
    /* Jiku Character Universe custom overrides */
    --color-brand-primary: #2D6A4F;
    --color-brand-secondary: #52B788;
    --color-accent: #FF6B35;
    --color-earth: #8B7355;
}
</style>

<!-- Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Custom Styles for Jiku -->
<style>
.progress-indicator {
    background: linear-gradient(135deg, #f0f0f0 0%, #ffffff 100%);
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
    border-left: 5px solid var(--progress-color, #666);
}

.progress-indicator h3 {
    font-family: var(--font-heading);
    font-size: 24px;
    margin: 0 0 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.progress-indicator h3 .icon {
    font-size: 32px;
}

.progress-bar-container {
    background: #e0e0e0;
    height: 30px;
    border-radius: 15px;
    overflow: hidden;
    margin: 15px 0;
}

.progress-bar-fill {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 14px;
    transition: width 0.6s ease;
}

.milestone-list {
    list-style: none;
    padding: 0;
    margin: 15px 0;
}

.milestone-list li {
    padding: 8px 0 8px 30px;
    position: relative;
    line-height: 1.6;
}

.milestone-list.completed li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #4CAF50;
    font-weight: bold;
    font-size: 18px;
}

.milestone-list.in-progress li:before {
    content: "◐";
    position: absolute;
    left: 0;
    color: #52B788;
    font-weight: bold;
    font-size: 18px;
}

.milestone-list.upcoming li:before {
    content: "○";
    position: absolute;
    left: 0;
    color: #999;
    font-size: 18px;
}

.character-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.character-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    border: 2px solid #e0e0e0;
    text-align: center;
    transition: all 0.3s ease;
}

.character-card:hover {
    border-color: #52B788;
    box-shadow: 0 8px 20px rgba(82, 183, 136, 0.2);
    transform: translateY(-5px);
}

.character-card .emoji {
    font-size: 48px;
    margin-bottom: 10px;
}

.character-card .name {
    font-family: var(--font-heading);
    font-size: 18px;
    font-weight: 700;
    color: #2D6A4F;
    margin-bottom: 5px;
}

.character-card .species {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.character-card .status {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.status-complete {
    background: #4CAF50;
    color: white;
}

.status-review {
    background: #FFA726;
    color: white;
}

.market-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 30px;
    border-radius: 12px;
    border-left: 5px solid #2D6A4F;
    margin-bottom: 25px;
}

.market-card h3 {
    font-family: var(--font-heading);
    font-size: 24px;
    margin: 0 0 15px;
    color: #2D6A4F;
}

.market-card ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.market-card ul li {
    padding: 6px 0 6px 25px;
    position: relative;
    line-height: 1.6;
}

.market-card ul li:before {
    content: "▸";
    position: absolute;
    left: 0;
    color: #52B788;
    font-weight: bold;
}

.advantage-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin: 30px 0;
}

.advantage-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    border: 2px solid #e0e0e0;
    transition: all 0.3s ease;
}

.advantage-card:hover {
    border-color: #52B788;
    box-shadow: 0 6px 16px rgba(82, 183, 136, 0.15);
    transform: translateY(-3px);
}

.advantage-card h4 {
    font-family: var(--font-heading);
    font-size: 18px;
    margin: 0 0 10px;
    color: #2D6A4F;
}

.advantage-card p {
    font-size: 14px;
    color: #666;
    margin: 0;
    line-height: 1.6;
}

.metric-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin: 30px 0;
}

.metric-box {
    background: linear-gradient(135deg, #2D6A4F 0%, #52B788 100%);
    color: white;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
}

.metric-box .value {
    font-size: 42px;
    font-weight: 700;
    margin: 10px 0;
}

.metric-box .label {
    font-size: 14px;
    opacity: 0.9;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.funding-card {
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 25px;
}

.funding-card h3 {
    font-family: var(--font-heading);
    font-size: 26px;
    margin: 0 0 15px;
    color: #2D6A4F;
}

.funding-card .amount {
    font-size: 32px;
    font-weight: 700;
    color: #FF6B35;
    margin: 15px 0;
}

.funding-card h4 {
    font-size: 18px;
    margin: 20px 0 10px;
    color: #2D6A4F;
}

.resource-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.resource-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 25px;
    border-radius: 12px;
    border-top: 4px solid #52B788;
    text-align: center;
}

.resource-card h4 {
    font-family: var(--font-heading);
    font-size: 18px;
    margin: 0 0 10px;
    color: #2D6A4F;
}

.resource-card p {
    font-size: 14px;
    color: #666;
    margin: 0;
    line-height: 1.6;
}

.timeline-phase {
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 20px;
    border-left: 5px solid #52B788;
}

.timeline-phase h4 {
    font-family: var(--font-heading);
    font-size: 20px;
    margin: 0 0 10px;
    color: #2D6A4F;
}

.timeline-phase .duration {
    font-size: 13px;
    color: #666;
    margin-bottom: 15px;
}

@media (max-width: 768px) {
    .character-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
    }
}
</style>

<?php
// ============================================
// HERO SECTION
// ============================================
partial('page-header', [
    'title' => 'Jiku Character Universe',
    'subtitle' => 'Australian animal characters designed for educational content, entertainment, and digital media',
], 'top-section');

// ============================================
// PROJECT SUMMARY
// ============================================
$project_summary = [
    'header' => [
        'heading' => [
            'label' => 'Project Overview',
            'title' => 'About Jiku',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p style="text-align: center; font-size: 20px; line-height: 1.8;">Jiku Character Universe features Australian animal characters set in authentic Western Australian locations. The project centers on Jiku the Quokka and his eight diverse friends, designed for educational content, children\'s entertainment, and digital media applications.</p>',
        'format' => 'lead',
    ],
];

partial('column', $project_summary, 'pro-sites');

// ============================================
// PROGRESS - PLANNING
// ============================================
$planning_progress = [
    'header' => [
        'heading' => [
            'label' => 'Development Status',
            'title' => 'Planning Phase',
            'subtitle' => 'Building the foundation for production',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="progress-indicator" style="--progress-color: #52B788;">
                <h3><span class="icon">📋</span> Planning <span class="status-badge status-review" style="float: right; margin-top: 5px; background: #52B788; color: white; padding: 6px 14px; border-radius: 12px; font-size: 12px; text-transform: uppercase;">In Progress</span></h3>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: 75%; background: linear-gradient(90deg, #2D6A4F 0%, #52B788 100%);">75%</div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 20px 0;">
                    <div style="text-align: center;">
                        <div style="font-size: 32px; font-weight: 700; color: #2D6A4F;">75%</div>
                        <div style="font-size: 13px; color: #666;">Character Development</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 32px; font-weight: 700; color: #2D6A4F;">60%</div>
                        <div style="font-size: 13px; color: #666;">World Building</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 32px; font-weight: 700; color: #2D6A4F;">90%</div>
                        <div style="font-size: 13px; color: #666;">Style Guide</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 32px; font-weight: 700; color: #4CAF50;">100%</div>
                        <div style="font-size: 13px; color: #666;">Documentation</div>
                    </div>
                </div>

                <div style="margin-top: 25px;">
                    <h4 style="margin: 0 0 10px; color: #4CAF50;">✓ Key Achievements</h4>
                    <ul class="milestone-list completed">
                        <li>Repository structure established with standardized conventions</li>
                        <li>Master art style directive completed (bold black line art on white)</li>
                        <li>Primary character (Jiku) fully documented and approved</li>
                        <li>Legacy documentation migrated and consolidated</li>
                        <li>Production standards defined (naming, file structure, workflows)</li>
                        <li>Core locations established (Rottnest Island, Yalgorup National Park)</li>
                    </ul>
                </div>

                <div style="margin-top: 20px;">
                    <h4 style="margin: 0 0 10px; color: #52B788;">◐ Next Steps</h4>
                    <ul class="milestone-list in-progress">
                        <li>Complete character directive reviews for 8 remaining characters</li>
                        <li>Finalize world-building lore documentation</li>
                        <li>Create character relationship mapping</li>
                        <li>Develop AI generation workflow templates</li>
                    </ul>
                </div>
            </div>
        ',
    ],
];

partial('column', $planning_progress, 'pro-sites');

// ============================================
// CHARACTERS
// ============================================
$characters_section = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Character Roster',
            'subtitle' => '9 Australian animal characters',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="character-grid">
                <div class="character-card">
                    <div class="emoji">🦘</div>
                    <div class="name">Jiku</div>
                    <div class="species">Quokka</div>
                    <span class="status status-complete">Complete</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🦘</div>
                    <div class="name">Kanga</div>
                    <div class="species">Kangaroo</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🕷️</div>
                    <div class="name">REX</div>
                    <div class="species">Redback Spider</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">❄️</div>
                    <div class="name">Snow</div>
                    <div class="species">TBD</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🐙</div>
                    <div class="name">Octo</div>
                    <div class="species">TBD</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🦦</div>
                    <div class="name">Duggy</div>
                    <div class="species">TBD</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🦢</div>
                    <div class="name">Emm</div>
                    <div class="species">Emu</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🦆</div>
                    <div class="name">Gogo</div>
                    <div class="species">TBD</div>
                    <span class="status status-review">In Review</span>
                </div>
                <div class="character-card">
                    <div class="emoji">🦜</div>
                    <div class="name">Kook</div>
                    <div class="species">Kookaburra</div>
                    <span class="status status-review">In Review</span>
                </div>
            </div>

            <div style="margin-top: 30px; padding: 25px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); border-radius: 12px; border: 2px solid #52B788;">
                <h4 style="margin: 0 0 15px; color: #2D6A4F; font-size: 20px;">🎨 Art Style</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="padding: 8px 0; border-bottom: 1px solid #e0e0e0;">✓ Bold black line art on white background</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid #e0e0e0;">✓ Simplified, playful shapes that remain structurally accurate</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid #e0e0e0;">✓ No shading or gradients, clean confident lines</li>
                    <li style="padding: 8px 0; border-bottom: 1px solid #e0e0e0;">✓ High contrast for easy reproduction</li>
                    <li style="padding: 8px 0;">✓ Suitable for print, digital, and animation</li>
                </ul>
            </div>

            <div style="margin-top: 30px; padding: 25px; background: linear-gradient(135deg, #2D6A4F 0%, #52B788 100%); color: white; border-radius: 12px;">
                <h4 style="margin: 0 0 15px; font-size: 20px;">📍 Locations</h4>
                <p style="margin: 0 0 10px; font-size: 16px;"><strong>Primary:</strong> Rottnest Island, Western Australia (Jiku\'s home)</p>
                <p style="margin: 0 0 10px; font-size: 16px;"><strong>Adventure Settings:</strong> Yalgorup National Park</p>
                <p style="margin: 0; font-size: 16px;"><strong>Future Expansion:</strong> Major world cities and international locations</p>
            </div>
        ',
    ],
];

partial('column', $characters_section, 'pro-sites');

// ============================================
// DEVELOPMENT & FUNDING
// ============================================
$dev_funding_section = [
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="progress-indicator" style="--progress-color: #DC143C;">
                            <h3><span class="icon">🔨</span> Development <span class="status-badge" style="float: right; margin-top: 5px; background: #DC143C; color: white; padding: 6px 14px; border-radius: 12px; font-size: 12px; text-transform: uppercase;">Not Started</span></h3>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 0%; background: #DC143C;">0%</div>
                            </div>

                            <h4 style="margin: 20px 0 10px;">Planned Phases:</h4>
                            <div class="timeline-phase">
                                <h4>Phase 1: Asset Production</h4>
                                <div class="duration">Q1 2026 (3 months)</div>
                                <p style="margin: 0; font-size: 14px;">AI workflows, validation scripts, templates, batch processing</p>
                            </div>
                            <div class="timeline-phase">
                                <h4>Phase 2: Content Creation</h4>
                                <div class="duration">Q2-Q3 2026 (6 months)</div>
                                <p style="margin: 0; font-size: 14px;">Model sheets, expressions, scenes, props, location art</p>
                            </div>
                            <div class="timeline-phase">
                                <h4>Phase 3: Interactive Products</h4>
                                <div class="duration">Q4 2026 (3 months)</div>
                                <p style="margin: 0; font-size: 14px;">Coloring books, educational modules, web content, trading cards</p>
                            </div>
                            <div class="timeline-phase">
                                <h4>Phase 4: Distribution</h4>
                                <div class="duration">Q1 2027 (3 months)</div>
                                <p style="margin: 0; font-size: 14px;">Asset packaging, brand guidelines, licensing framework</p>
                            </div>
                        </div>
                    ',
                ],
                'width' => '50%',
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="progress-indicator" style="--progress-color: #DC143C;">
                            <h3><span class="icon">💰</span> Funding <span class="status-badge" style="float: right; margin-top: 5px; background: #DC143C; color: white; padding: 6px 14px; border-radius: 12px; font-size: 12px; text-transform: uppercase;">Not Funded</span></h3>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 0%; background: #DC143C;">0%</div>
                            </div>

                            <div class="funding-card" style="background: linear-gradient(135deg, #fff5f0 0%, #ffffff 100%); border-color: #FF6B35;">
                                <h3>Initial Development</h3>
                                <div class="amount">$50K - $75K AUD</div>
                                <h4>Breakdown:</h4>
                                <ul class="milestone-list upcoming">
                                    <li>Character art production: $20K</li>
                                    <li>Technical infrastructure: $15K</li>
                                    <li>Content development: $10K</li>
                                    <li>Legal & IP protection: $5K-$10K</li>
                                </ul>
                            </div>

                            <div style="margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                                <h4 style="margin: 0 0 10px; color: #2D6A4F; font-size: 16px;">Growth Phase</h4>
                                <p style="margin: 0; font-size: 24px; font-weight: 700; color: #FF6B35;">$100K - $150K AUD</p>
                                <p style="margin: 10px 0 0; font-size: 13px; color: #666;">Production scaling, platform development, marketing, team expansion</p>
                            </div>
                        </div>
                    ',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '30px',
    ],
];

partial('2-column', $dev_funding_section, 'pro-sites');

// ============================================
// MARKET OPPORTUNITY
// ============================================
$market_section = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Market Opportunity',
            'subtitle' => 'Multiple revenue streams and target markets',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="market-card">
                <h3>📚 Educational Publishing</h3>
                <ul>
                    <li>Early childhood literacy programs</li>
                    <li>Environmental education materials</li>
                    <li>Indigenous culture integration opportunities</li>
                    <li>STEM education through character-based learning</li>
                </ul>
            </div>

            <div class="market-card">
                <h3>🎭 Children\'s Entertainment</h3>
                <ul>
                    <li>Picture books and graphic novels</li>
                    <li>Animation series potential</li>
                    <li>Interactive digital experiences</li>
                    <li>YouTube Kids content</li>
                </ul>
            </div>

            <div class="market-card">
                <h3>🗺️ Tourism & Regional Marketing</h3>
                <ul>
                    <li>Western Australia tourism campaigns</li>
                    <li>Wildlife conservation awareness</li>
                    <li>Cultural tourism enhancement</li>
                    <li>Destination marketing partnerships</li>
                </ul>
            </div>

            <div class="market-card">
                <h3>💻 Digital Products</h3>
                <ul>
                    <li>Print-on-demand coloring books</li>
                    <li>Educational apps and games</li>
                    <li>Digital stickers and emoji packs</li>
                    <li>NFT/digital collectibles</li>
                </ul>
            </div>
        ',
    ],
];

partial('column', $market_section, 'pro-sites');

// ============================================
// COMPETITIVE ADVANTAGES
// ============================================
$advantages_section = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'title' => 'Competitive Advantages',
            'subtitle' => 'Why Jiku stands out',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="advantage-grid">
                <div class="advantage-card">
                    <h4>🇦🇺 Authentic Australian Identity</h4>
                    <p>Based on real native animals and authentic locations</p>
                </div>
                <div class="advantage-card">
                    <h4>📖 Educational Value</h4>
                    <p>Natural fit for STEM and environmental learning</p>
                </div>
                <div class="advantage-card">
                    <h4>🎨 Scalable Art Style</h4>
                    <p>Line art approach enables cost-effective production</p>
                </div>
                <div class="advantage-card">
                    <h4>📱 Multi-platform Ready</h4>
                    <p>Characters designed for print, digital, and animation</p>
                </div>
                <div class="advantage-card">
                    <h4>🌏 Cultural Relevance</h4>
                    <p>Opportunities for Indigenous collaboration and storytelling</p>
                </div>
                <div class="advantage-card">
                    <h4>📋 Established IP Framework</h4>
                    <p>Clear documentation and production standards</p>
                </div>
            </div>
        ',
    ],
];

partial('column', $advantages_section, 'pro-sites');

// ============================================
// SUCCESS METRICS
// ============================================
$success_metrics = [
    'header' => [
        'heading' => [
            'title' => 'Success Metrics',
            'subtitle' => 'Measurable goals across three timeframes',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <div style="background: white; border: 2px solid #e0e0e0; border-radius: 12px; padding: 30px; border-top: 5px solid #52B788;">
                    <h3 style="margin: 0 0 20px; font-size: 22px; color: #2D6A4F;">Short-term (6-12 months)</h3>
                    <ul class="milestone-list upcoming">
                        <li>Complete all 9 character directives</li>
                        <li>Generate 100+ approved character assets</li>
                        <li>Establish partnerships with 2-3 educational publishers</li>
                        <li>Secure initial funding ($50K+)</li>
                        <li>Launch pilot coloring book product</li>
                    </ul>
                </div>

                <div style="background: white; border: 2px solid #e0e0e0; border-radius: 12px; padding: 30px; border-top: 5px solid #FFA726;">
                    <h3 style="margin: 0 0 20px; font-size: 22px; color: #2D6A4F;">Medium-term (1-2 years)</h3>
                    <ul class="milestone-list upcoming">
                        <li>Publish 5+ books or content products</li>
                        <li>Generate $200K+ in licensing revenue</li>
                        <li>Build audience of 50K+ followers</li>
                        <li>Develop animation proof-of-concept</li>
                        <li>Expand character universe to 12-15 characters</li>
                    </ul>
                </div>

                <div style="background: white; border: 2px solid #e0e0e0; border-radius: 12px; padding: 30px; border-top: 5px solid #FF6B35;">
                    <h3 style="margin: 0 0 20px; font-size: 22px; color: #2D6A4F;">Long-term (3-5 years)</h3>
                    <ul class="milestone-list upcoming">
                        <li>Establish Jiku as recognized Australian children\'s brand</li>
                        <li>Achieve $1M+ annual revenue</li>
                        <li>Secure animation series production deal</li>
                        <li>International distribution in 5+ countries</li>
                        <li>Franchise expansion (theme parks, merchandise)</li>
                    </ul>
                </div>
            </div>
        ',
    ],
];

partial('column', $success_metrics, 'pro-sites');

// ============================================
// REVENUE MODEL
// ============================================
$revenue_model = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Revenue Model',
            'subtitle' => 'Multiple monetization pathways',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="metric-row">
                <div class="metric-box">
                    <div class="label">Licensing</div>
                    <div class="value">📚</div>
                    <p style="margin: 15px 0 0; font-size: 14px; opacity: 0.9;">Educational publishers, media partners</p>
                </div>
                <div class="metric-box">
                    <div class="label">Digital Sales</div>
                    <div class="value">🖨️</div>
                    <p style="margin: 15px 0 0; font-size: 14px; opacity: 0.9;">Coloring books, printables, assets</p>
                </div>
                <div class="metric-box">
                    <div class="label">Adaptation Rights</div>
                    <div class="value">🎬</div>
                    <p style="margin: 15px 0 0; font-size: 14px; opacity: 0.9;">Animation, media production</p>
                </div>
                <div class="metric-box">
                    <div class="label">Merchandise</div>
                    <div class="value">🛍️</div>
                    <p style="margin: 15px 0 0; font-size: 14px; opacity: 0.9;">Licensed products, collectibles</p>
                </div>
                <div class="metric-box">
                    <div class="label">Subscriptions</div>
                    <div class="value">🔄</div>
                    <p style="margin: 15px 0 0; font-size: 14px; opacity: 0.9;">Content platform, member access</p>
                </div>
            </div>
        ',
    ],
];

partial('column', $revenue_model, 'pro-sites');

// ============================================
// TEAM & RESOURCES
// ============================================
$team_resources = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'title' => 'Team & Resources Required',
            'subtitle' => 'Building the production team',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="resource-grid">
                <div class="resource-card">
                    <h4>🎨 Creative Director</h4>
                    <p>Lead art direction and brand consistency</p>
                </div>
                <div class="resource-card">
                    <h4>✏️ Illustrator/Artist</h4>
                    <p>Character and scene production</p>
                </div>
                <div class="resource-card">
                    <h4>✍️ Writer/Content Developer</h4>
                    <p>Story, educational content, marketing</p>
                </div>
                <div class="resource-card">
                    <h4>💻 Technical Developer</h4>
                    <p>Pipeline automation, digital products</p>
                </div>
                <div class="resource-card">
                    <h4>🤝 Business Development</h4>
                    <p>Partnerships, licensing, funding</p>
                </div>
            </div>

            <div style="margin-top: 40px; padding: 30px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
                <h3 style="margin: 0 0 15px; font-size: 22px;">Current Status</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
                    <div>
                        <div style="font-size: 14px; opacity: 0.8; margin-bottom: 5px;">Documentation</div>
                        <div style="font-size: 24px; font-weight: 700;">Complete ✓</div>
                    </div>
                    <div>
                        <div style="font-size: 14px; opacity: 0.8; margin-bottom: 5px;">IP Development</div>
                        <div style="font-size: 24px; font-weight: 700;">Active ◐</div>
                    </div>
                    <div>
                        <div style="font-size: 14px; opacity: 0.8; margin-bottom: 5px;">Production Capability</div>
                        <div style="font-size: 24px; font-weight: 700;">Ready ○</div>
                    </div>
                </div>
            </div>
        ',
    ],
];

partial('column', $team_resources, 'pro-sites');

// ============================================
// INVESTMENT HIGHLIGHTS
// ============================================
$investment_highlights = [
    'header' => [
        'heading' => [
            'title' => 'Investment Highlights',
            'subtitle' => 'Why invest in Jiku Character Universe?',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <ul style="list-style: none; padding: 0; max-width: 900px; margin: 0 auto;">
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Clear IP Ownership:</strong> All documentation, characters, and processes fully defined
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Production-Ready:</strong> Standardized workflows and style guides enable immediate scaling
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Multiple Revenue Streams:</strong> Publishing, licensing, digital products, animation rights
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Authentic Cultural Value:</strong> Genuine Australian identity with global appeal
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Scalable Model:</strong> AI-assisted production reduces costs while maintaining quality
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Low Production Risk:</strong> Line art style significantly reduces illustration costs
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #52B788; font-size: 24px;">▸</span>
                    <strong>Partnership Potential:</strong> Natural fit for tourism, education, and conservation organizations
                </li>
            </ul>
        ',
        'format' => 'standard',
    ],
];

partial('column', $investment_highlights, 'pro-sites');

// ============================================
// CALL TO ACTION
// ============================================
$cta_section = [
    'settings' => [
        'custom_css' => 'background: linear-gradient(135deg, #2D6A4F 0%, #52B788 100%); color: white;',
    ],
    'header' => [
        'heading' => [
            'title' => 'Join the Jiku Journey',
            'subtitle' => 'Partnership and collaboration opportunities',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; margin: 30px 0;">
                <div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">📚 For Publishers</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Licensing opportunities for educational content and children\'s books</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">💰 For Investors</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Seed funding opportunities for production and scaling</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">🤝 For Institutions</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Educational partnerships and curriculum integration</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.3);">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">🎨 For Collaborators</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Join the team bringing Jiku to life</p>
                </div>
            </div>
        ',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Contact Us',
                'url' => '#contact',
                'style' => 'primary',
            ],
            [
                'text' => 'View Documentation',
                'url' => '#',
                'style' => 'outline',
            ],
        ],
    ],
];

partial('column', $cta_section, 'pro-sites');

// ============================================
// FOOTER INFO
// ============================================
$footer_info = [
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="text-align: center; padding: 30px 0; color: #999; font-size: 14px;">
                <p style="margin: 0 0 10px;"><strong>Project Status:</strong> Planning Phase (75% Complete) - Seeking Development Funding</p>
                <p style="margin: 0;"><strong>Last Updated:</strong> November 11, 2025 | Document Version 1.0</p>
            </div>
        ',
    ],
];

partial('column', $footer_info, 'pro-sites');
?>

<?php get_footer(); ?>
