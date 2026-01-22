<?php
/**
 * Big Boss City - Project Overview
 *
 * A world overtaken by too many big bosses
 * Multi-format creative IP featuring urban chaos and bold visual storytelling
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/bibo/slug-project-overview.php
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
    /* Big Boss City custom overrides */
    --color-brand-primary: #000000;
    --color-brand-secondary: #FFFFFF;
    --color-accent: #FFA500;
    --color-danger: #DC143C;
}
</style>

<!-- Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Custom Styles for Big Boss City -->
<style>
.bibo-hero {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    color: white;
    padding: 100px 60px;
    text-align: center;
    border-bottom: 5px solid #FFA500;
}

.bibo-hero h1 {
    font-family: var(--font-heading);
    font-size: 56px;
    font-weight: 700;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.bibo-hero .tagline {
    font-size: 24px;
    font-style: italic;
    margin-bottom: 10px;
    color: #FFA500;
}

.bibo-hero .subtitle {
    font-size: 18px;
    opacity: 0.9;
    max-width: 800px;
    margin: 0 auto;
}

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
    color: #FFA500;
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

.highlight-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin: 30px 0;
}

.highlight-card {
    background: white;
    padding: 30px;
    border-radius: 12px;
    border: 2px solid #e0e0e0;
    transition: all 0.3s ease;
}

.highlight-card:hover {
    border-color: #FFA500;
    box-shadow: 0 8px 20px rgba(255, 165, 0, 0.2);
    transform: translateY(-5px);
}

.highlight-card h3 {
    font-family: var(--font-heading);
    font-size: 20px;
    margin: 0 0 15px;
    color: #000;
}

.highlight-card p {
    font-size: 15px;
    line-height: 1.6;
    color: #444;
    margin: 0;
}

.product-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    padding: 35px;
    border-radius: 12px;
    border-left: 5px solid #000;
    margin-bottom: 30px;
}

.product-card h3 {
    font-family: var(--font-heading);
    font-size: 26px;
    margin: 0 0 10px;
    color: #000;
}

.product-card .format {
    font-size: 14px;
    color: #FFA500;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.product-card h4 {
    font-size: 18px;
    margin: 20px 0 10px;
    color: #000;
}

.product-card ul {
    list-style: none;
    padding: 0;
    margin: 10px 0;
}

.product-card ul li {
    padding: 6px 0 6px 25px;
    position: relative;
    line-height: 1.6;
}

.product-card ul li:before {
    content: "▸";
    position: absolute;
    left: 0;
    color: #FFA500;
    font-weight: bold;
}

.roadmap-phase {
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 25px;
    position: relative;
    padding-left: 80px;
}

.roadmap-phase .phase-number {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 48px;
    font-weight: 700;
    color: #e0e0e0;
}

.roadmap-phase h3 {
    font-family: var(--font-heading);
    font-size: 24px;
    margin: 0 0 10px;
    color: #000;
}

.roadmap-phase .status-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 10px;
}

.roadmap-phase .timeline {
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
}

.status-complete {
    background: #4CAF50;
    color: white;
}

.status-planning {
    background: #FFA500;
    color: white;
}

.status-pending {
    background: #DC143C;
    color: white;
}

.visual-style-box {
    background: #000;
    color: #FFF;
    padding: 40px;
    border-radius: 12px;
    margin: 30px 0;
    border: 5px solid #FFA500;
}

.visual-style-box h3 {
    font-size: 28px;
    margin: 0 0 20px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.visual-style-box ul {
    list-style: none;
    padding: 0;
    max-width: 800px;
    margin: 0 auto;
}

.visual-style-box li {
    padding: 12px 0;
    font-size: 16px;
    line-height: 1.6;
    border-bottom: 1px solid #333;
}

.visual-style-box li:last-child {
    border-bottom: none;
}

.team-role {
    background: white;
    padding: 25px;
    border-radius: 12px;
    border: 2px solid #e0e0e0;
    margin-bottom: 20px;
}

.team-role h4 {
    font-family: var(--font-heading);
    font-size: 20px;
    margin: 0 0 10px;
    color: #000;
}

.team-role p {
    font-size: 15px;
    color: #666;
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .bibo-hero h1 {
        font-size: 36px;
    }

    .bibo-hero .tagline {
        font-size: 18px;
    }

    .roadmap-phase {
        padding-left: 20px;
    }

    .roadmap-phase .phase-number {
        position: static;
        transform: none;
        font-size: 36px;
        margin-bottom: 15px;
    }
}
</style>

<?php
// ============================================
// HERO SECTION
// ============================================
$hero_section = [
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="bibo-hero">
                <h1>Big Boss City</h1>
                <p class="tagline">"A world overtaken by too many big bosses"</p>
                <p class="subtitle">Multi-format creative IP featuring urban chaos, unforgettable characters, and bold visual storytelling</p>
            </div>
        ',
    ],
];

partial('column', $hero_section, 'pro-sites');

// ============================================
// EXECUTIVE SUMMARY
// ============================================
$executive_summary = [
    'header' => [
        'heading' => [
            'label' => 'Project Overview',
            'title' => 'Executive Summary',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p style="text-align: center; font-size: 20px; line-height: 1.8;">Big Boss City is an original IP universe where 15 overpowered bosses battle for supremacy in a chaotic urban landscape. Their constant conflicts create inefficiency and opportunity for two skilled protagonists who excel at staying under the radar. The project is designed for multi-format storytelling across games, comics, and merchandise.</p>',
        'format' => 'lead',
    ],
];

partial('column', $executive_summary, 'pro-sites');

// ============================================
// UNIQUE VALUE
// ============================================
$unique_value = [
    'header' => [
        'heading' => [
            'title' => 'What Makes This Special',
            'subtitle' => 'A bold black-and-white visual aesthetic combined with rich character design, territory-based world-building, and transmedia storytelling potential',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <h3 style="margin: 30px 0 20px; text-align: center;">Target Audience</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0;">
                <div style="padding: 20px; background: #f8f9fa; border-radius: 8px; text-align: center;">
                    <div style="font-size: 32px; margin-bottom: 10px;">🎮</div>
                    <strong>Gamers</strong><br>
                    <span style="font-size: 14px; color: #666;">Beat-em-up, brawler, indie game fans</span>
                </div>
                <div style="padding: 20px; background: #f8f9fa; border-radius: 8px; text-align: center;">
                    <div style="font-size: 32px; margin-bottom: 10px;">📚</div>
                    <strong>Comic Readers</strong><br>
                    <span style="font-size: 14px; color: #666;">Action, urban fantasy, character-driven stories</span>
                </div>
                <div style="padding: 20px; background: #f8f9fa; border-radius: 8px; text-align: center;">
                    <div style="font-size: 32px; margin-bottom: 10px;">🎨</div>
                    <strong>Art Collectors</strong><br>
                    <span style="font-size: 14px; color: #666;">Bold graphic design, character art</span>
                </div>
                <div style="padding: 20px; background: #f8f9fa; border-radius: 8px; text-align: center;">
                    <div style="font-size: 32px; margin-bottom: 10px;">🛍️</div>
                    <strong>Merchandise Fans</strong><br>
                    <span style="font-size: 14px; color: #666;">Collectibles, trading cards, apparel</span>
                </div>
            </div>
        ',
        'format' => 'standard',
    ],
];

partial('column', $unique_value, 'pro-sites');

// ============================================
// PROGRESS INDICATORS - PLANNING
// ============================================
$planning_progress = [
    'header' => [
        'heading' => [
            'label' => 'Development Status',
            'title' => 'Progress Tracking',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="progress-indicator" style="--progress-color: #FFA500;">
                <h3><span class="icon">📋</span> Planning Phase <span class="status-badge status-planning" style="float: right; margin-top: 5px;">In Progress</span></h3>
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" style="width: 65%; background: linear-gradient(90deg, #FFA500 0%, #FFB732 100%);">65%</div>
                </div>

                <div style="margin-top: 25px;">
                    <h4 style="margin: 0 0 10px; color: #4CAF50;">✓ Completed</h4>
                    <ul class="milestone-list completed">
                        <li>Core concept and world premise established</li>
                        <li>All 15 boss characters designed with full specifications</li>
                        <li>Main character (Bongo) fully documented</li>
                        <li>Art style ("Bongo Style") complete with detailed guidelines</li>
                        <li>Repository structure and documentation framework</li>
                        <li>Character briefs and world-building briefs created</li>
                    </ul>
                </div>

                <div style="margin-top: 20px;">
                    <h4 style="margin: 0 0 10px; color: #FFA500;">◐ In Progress</h4>
                    <ul class="milestone-list in-progress">
                        <li>Duke character development (secondary protagonist)</li>
                        <li>Territory mapping and district assignments</li>
                        <li>Timeline and historical framework</li>
                        <li>Game mechanics design documentation</li>
                        <li>Narrative framework and story arcs</li>
                        <li>Boss relationship dynamics</li>
                    </ul>
                </div>

                <div style="margin-top: 20px;">
                    <h4 style="margin: 0 0 10px; color: #999;">○ Upcoming</h4>
                    <ul class="milestone-list upcoming">
                        <li>Final world-building decisions</li>
                        <li>Complete narrative bible</li>
                        <li>Product-specific planning (game, comics, merchandise)</li>
                        <li>Marketing and community strategy</li>
                    </ul>
                </div>
            </div>
        ',
    ],
];

partial('column', $planning_progress, 'pro-sites');

// ============================================
// PROGRESS INDICATORS - DEVELOPMENT & FUNDING
// ============================================
$dev_funding_progress = [
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="progress-indicator" style="--progress-color: #DC143C;">
                            <h3><span class="icon">🔨</span> Development <span class="status-badge status-pending" style="float: right; margin-top: 5px;">Not Started</span></h3>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 0%; background: #DC143C;">0%</div>
                            </div>
                            <p style="margin: 15px 0;"><strong>Ready For:</strong></p>
                            <ul class="milestone-list upcoming">
                                <li>Character sprite production</li>
                                <li>Background and environment art</li>
                                <li>Comic script writing</li>
                                <li>Game prototype development</li>
                                <li>Merchandise design production</li>
                            </ul>
                            <p style="margin: 15px 0 0;"><strong>Timeline:</strong> Development to begin Q2 2025 (pending funding)</p>
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
                            <h3><span class="icon">💰</span> Funding <span class="status-badge status-pending" style="float: right; margin-top: 5px;">Not Funded</span></h3>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: 0%; background: #DC143C;">0%</div>
                            </div>
                            <p style="margin: 15px 0;"><strong>Seeking:</strong> Seed funding for initial production phase</p>
                            <p style="margin: 15px 0;"><strong>Estimated Seed:</strong></p>
                            <p style="font-size: 24px; font-weight: 700; color: #DC143C; margin: 10px 0;">$150K - $300K</p>
                            <p style="margin: 0; font-size: 14px; color: #666;">For Phase 1 production</p>
                        </div>
                    ',
                ],
                'width' => '50%',
            ],
        ],
        'gap' => '30px',
    ],
];

partial('2-column', $dev_funding_progress, 'pro-sites');

// ============================================
// KEY HIGHLIGHTS
// ============================================
$key_highlights = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Key Highlights',
            'subtitle' => 'What makes Big Boss City stand out',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="highlight-grid">
                <div class="highlight-card">
                    <h3>Unique Concept</h3>
                    <p>The "too many bosses" premise creates inherent chaos, inefficiency, and dark humor—a fresh take on urban crime narratives</p>
                </div>
                <div class="highlight-card">
                    <h3>15 Fully Designed Boss Characters</h3>
                    <p>Each boss has complete sprite specifications, unique personality, signature weapons, and territorial control. Natural collection mechanics for merchandise and games</p>
                </div>
                <div class="highlight-card">
                    <h3>Bold Visual Identity</h3>
                    <p>The strict "Bongo Style" aesthetic—pure black-and-white, thick outlines, strong silhouettes—creates instant brand recognition across all products</p>
                </div>
                <div class="highlight-card">
                    <h3>Multi-Format Ready</h3>
                    <p>Designed from the ground up for games (beat-em-up/brawler), comics (character-driven narratives), and merchandise (prints, cards, apparel)</p>
                </div>
                <div class="highlight-card">
                    <h3>Territory-Based World</h3>
                    <p>15 distinct districts, each controlled by a different boss with unique aesthetics, providing rich environmental storytelling and level design</p>
                </div>
                <div class="highlight-card">
                    <h3>Dual Protagonists</h3>
                    <p>Bongo and Duke offer complementary gameplay styles, narrative perspectives, and audience appeal—avoidance and stealth as core mechanics</p>
                </div>
            </div>
        ',
    ],
];

partial('column', $key_highlights, 'pro-sites');

// ============================================
// PRODUCTS
// ============================================
$products_section = [
    'header' => [
        'heading' => [
            'label' => 'Multi-Format IP',
            'title' => 'Products & Formats',
            'subtitle' => 'Big Boss City is designed for games, comics, and merchandise from day one',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="product-card">
                <h3>🎮 Game</h3>
                <div class="format">Beat-em-up / Brawler</div>
                <p><strong>Platforms:</strong> PC, Console, Mobile (scalable)</p>
                <h4>Key Features:</h4>
                <ul>
                    <li>Territory-based progression through 15 boss districts</li>
                    <li>Avoidance and stealth as primary mechanics</li>
                    <li>Boss rush encounters with unique combat patterns</li>
                    <li>Co-op gameplay with Bongo and Duke</li>
                    <li>Unlockable boss content and collectibles</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Market Position:</strong> Indie action game with strong art direction, comparable to Cuphead, Skullgirls, or Streets of Rage 4</p>
            </div>

            <div class="product-card">
                <h3>📚 Comics</h3>
                <div class="format">Digital and Print Series</div>
                <p><strong>Structure:</strong> Character-driven episodic stories</p>
                <h4>Key Features:</h4>
                <ul>
                    <li>Individual boss origin stories and backstories</li>
                    <li>Bongo and Duke narrative arcs</li>
                    <li>Territory conflicts and power struggles</li>
                    <li>Relationship dynamics and character development</li>
                    <li>World-building through visual storytelling</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Market Position:</strong> Independent comic series with video game tie-in potential</p>
            </div>

            <div class="product-card">
                <h3>🛍️ Merchandise</h3>
                <div class="format">Multiple Product Lines</div>
                <h4>Product Categories:</h4>
                <ul>
                    <li><strong>Art Prints:</strong> Individual boss portraits, territory aesthetics, character duos, minimalist silhouettes</li>
                    <li><strong>Trading Cards:</strong> Complete set of 15 bosses + protagonists, collectible card game potential</li>
                    <li><strong>Apparel:</strong> T-shirts, hoodies, hats featuring boss designs and iconography</li>
                    <li><strong>Accessories:</strong> Enamel pins, stickers, patches, phone cases</li>
                    <li><strong>Collectibles:</strong> Limited edition prints, vinyl figures (future), art books</li>
                </ul>
                <p style="margin-top: 15px;"><strong>Market Position:</strong> Character-focused merchandise with strong visual appeal for indie gaming and comic communities</p>
            </div>
        ',
    ],
];

partial('column', $products_section, 'pro-sites');

// ============================================
// VISUAL IDENTITY
// ============================================
$visual_identity = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'title' => 'Visual Identity',
            'subtitle' => 'The distinctive "Bongo Style" aesthetic',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="visual-style-box">
                <h3>"Bongo Style" Core Principles</h3>
                <ul>
                    <li>✓ Pure black-and-white only (no gradients, grays, or hatching)</li>
                    <li>✓ Thick, even-width outlines with minimal internal detail</li>
                    <li>✓ Strong silhouettes readable by outline alone</li>
                    <li>✓ Clear negative space and limb separation</li>
                    <li>✓ Scalable from sprite size to poster size</li>
                    <li>✓ Bold, graphic, instantly recognizable</li>
                </ul>
                <p style="text-align: center; margin-top: 30px; font-size: 16px; opacity: 0.9;">
                    <em>Aesthetic: Classic animation meets modern graphic design—think early Disney meets contemporary streetwear</em>
                </p>
            </div>
        ',
    ],
];

partial('column', $visual_identity, 'pro-sites');

// ============================================
// COMPETITIVE ADVANTAGES
// ============================================
$competitive_advantages = [
    'settings' => [
        'dark_mode' => true,
    ],
    'header' => [
        'heading' => [
            'title' => 'Competitive Advantages',
            'subtitle' => 'Why Big Boss City stands out in the market',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <ul style="list-style: none; padding: 0; max-width: 900px; margin: 0 auto;">
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    Complete creative foundation ready for production
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    15 boss characters provide natural expansion and collectibility
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    Transmedia storytelling amplifies each product format
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    Distinctive visual style cuts through market noise
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    Territory-based world-building enables endless content
                </li>
                <li style="padding: 15px 0 15px 40px; position: relative; font-size: 17px; line-height: 1.6;">
                    <span style="position: absolute; left: 0; color: #FFA500; font-size: 24px;">▸</span>
                    Dual protagonist approach broadens audience appeal
                </li>
            </ul>
        ',
        'format' => 'standard',
    ],
];

partial('column', $competitive_advantages, 'pro-sites');

// ============================================
// TEAM OPPORTUNITIES
// ============================================
$team_opportunities = [
    'header' => [
        'heading' => [
            'title' => 'Team Opportunities',
            'subtitle' => 'Join us in bringing Big Boss City to life',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="team-role">
                <h4>🎨 Character Artists</h4>
                <p>Sprite animation and character illustration following Bongo Style specifications</p>
            </div>
            <div class="team-role">
                <h4>🏙️ Environment Artists</h4>
                <p>Background and territory design with strong visual storytelling</p>
            </div>
            <div class="team-role">
                <h4>💻 Game Developers</h4>
                <p>Beat-em-up mechanics, boss encounter design, progression systems</p>
            </div>
            <div class="team-role">
                <h4>✍️ Comic Writers & Artists</h4>
                <p>Character-driven storytelling, panel layout, sequential art</p>
            </div>
            <div class="team-role">
                <h4>📖 Narrative Designer</h4>
                <p>World-building expansion, character relationships, story arc development</p>
            </div>
            <div class="team-role">
                <h4>🎯 Producer / Project Manager</h4>
                <p>Cross-product coordination, timeline management, team collaboration</p>
            </div>
        ',
    ],
];

partial('column', $team_opportunities, 'pro-sites');

// ============================================
// ROADMAP
// ============================================
$roadmap = [
    'settings' => [
        'dark_mode' => false,
    ],
    'header' => [
        'heading' => [
            'label' => 'Development Timeline',
            'title' => 'Project Roadmap',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="roadmap-phase">
                <div class="phase-number">1</div>
                <h3>Foundation Complete <span class="status-badge status-complete">65% Complete</span></h3>
                <div class="timeline">Q4 2024 - Q1 2025</div>
                <ul class="milestone-list completed">
                    <li>Core concept and world-building documentation</li>
                    <li>All 15 boss characters fully specified</li>
                    <li>Art style guidelines and specifications</li>
                    <li>Narrative framework and character relationships</li>
                </ul>
            </div>

            <div class="roadmap-phase">
                <div class="phase-number">2</div>
                <h3>Pre-Production <span class="status-badge status-planning">Planning</span></h3>
                <div class="timeline">Q2 2025</div>
                <ul class="milestone-list upcoming">
                    <li>Complete world-building bible</li>
                    <li>Game design document</li>
                    <li>First comic scripts (3-6 issues)</li>
                    <li>Merchandise design concepts</li>
                    <li>Team assembly and production pipeline</li>
                </ul>
            </div>

            <div class="roadmap-phase">
                <div class="phase-number">3</div>
                <h3>Production <span class="status-badge status-pending">Pending Funding</span></h3>
                <div class="timeline">Q3 2025 - Q4 2025</div>
                <ul class="milestone-list upcoming">
                    <li>Character sprite production (17 full sets)</li>
                    <li>Environment and background art library</li>
                    <li>Game prototype and vertical slice</li>
                    <li>First comic series production</li>
                    <li>Initial merchandise manufacturing</li>
                </ul>
            </div>

            <div class="roadmap-phase">
                <div class="phase-number">4</div>
                <h3>Launch & Marketing <span class="status-badge status-pending">Pending Funding</span></h3>
                <div class="timeline">Q1 2026</div>
                <ul class="milestone-list upcoming">
                    <li>Game early access or full launch</li>
                    <li>Comic series Issue #1 release</li>
                    <li>Merchandise store opening</li>
                    <li>Community building and social presence</li>
                    <li>Press and influencer outreach</li>
                </ul>
            </div>
        ',
    ],
];

partial('column', $roadmap, 'pro-sites');

// ============================================
// CALL TO ACTION
// ============================================
$cta_section = [
    'settings' => [
        'custom_css' => 'background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%); color: white; border-top: 5px solid #FFA500;',
    ],
    'header' => [
        'heading' => [
            'title' => 'Join Big Boss City',
            'subtitle' => 'Multiple ways to get involved',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin: 30px 0;">
                <div style="padding: 25px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 2px solid #FFA500;">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">💰 For Investors</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Join us in bringing Big Boss City to life—a bold, multi-format IP with game, comic, and merchandise potential from day one.</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 2px solid #FFA500;">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">🤝 For Publishers</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Partner with us to publish the game, comic series, or merchandise line—complete creative foundation with strong visual identity ready for market.</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 2px solid #FFA500;">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">👥 For Collaborators</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Contribute your skills to a fully documented creative universe with clear artistic vision and transmedia storytelling opportunities.</p>
                </div>
                <div style="padding: 25px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 2px solid #FFA500;">
                    <h3 style="margin: 0 0 15px; font-size: 20px;">🌟 For Community</h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6;">Follow the development of Big Boss City and be part of building this world from the ground up.</p>
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
                <p style="margin: 0 0 10px;"><strong>Project Status:</strong> Planning Phase 65% Complete | Seeking Funding & Team Members</p>
                <p style="margin: 0;"><strong>Last Updated:</strong> November 11, 2025</p>
            </div>
        ',
    ],
];

partial('column', $footer_info, 'pro-sites');
?>

<?php get_footer(); ?>
