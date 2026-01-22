<?php
/**
 * Break Move Guy (BMG) - Project Overview
 *
 * AI-Driven Character Sprite System for Breakdancing Animation
 * Using pro-sites partials for clean, consistent layout
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/brmo/slug-project-overview.php
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
}
</style>



<?php
// ============================================
// HERO SECTION
// ============================================
partial('page-header', [
    'pre_html' => '<div style="text-align: center; margin-bottom: 15px;">
        <span class="status-badge status-in-progress">Idea Phase</span>
    </div>',
    'title' => 'Break Move',
    'subtitle' => 'AI-Driven Breakin Project',
], 'top-section');

// ============================================
// PROJECT SUMMARY
// ============================================
partial('column', [
    'settings' => [
        'custom_classes' => 'inner-card summary-card mt--50 pt-0 pb-0',
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="content-column">
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h3>📋 Idea </h3>
                                    <span class="status-badge status-in-progress">In Progress</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 75%;">75%</div>
                                </div>
                            </div>
                            <hr />
                            <div class="grid-3col mt-24">
                                <div>
                                    <h4 class="mb-16" style="color: #4CAF50;">Tasks</h4>
                                    <ul class="list check-list">
                                        <li>Inception</li>
                                        <li>Research</li>
                                        <li>Feasibility</li>
                                        <li>Planning</li>
                                        <li>Prototypes</li>
                                        <li>Legal</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: var(--color-brand-primary);">Deliverables</h4>
                                    <ul class="list check-list in-progress">
                                        <li>Detailed Brief</li>
                                        <li>Statement of Work</li>
                                        <li>Resourcing</li>
                                        <li>Funding</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: #999;">Approvals to Proceed</h4>
                                    <ul class="list check-list upcoming">
                                        <li>Stakeholder Buy In</li>
                                        <li>Funding</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    ',
                ],
            ],
        ],
        'gap' => '30px',
    ],
], 'pro-sites');

// ============================================
// UNIQUE VALUE PROPOSITIONS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Idea Statement: Will it work?',
            'subtitle' => 'Innovative features that set this project apart',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'row',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'custom_classes' => 'card',
                'content' => [
                    'html' => '
                        <ul class="icon-list" style="max-width: 900px; margin: 0 auto;">
                            <li><div><strong>Game Developers</strong> — Ready-to-use breakdancing character assets for your projects</div></li>
                            <li><div><strong>AI Companies</strong> — Domain-specific prompt engineering case studies and collaboration</div></li>
                            <li><div><strong>Educational Institutions</strong> — Interactive dance curriculum development partnerships</div></li>
                        </ul>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                         <ul class="icon-list" style="max-width: 900px; margin: 0 auto;">
                            <li><div><strong>Game Developers</strong> — Ready-to-use breakdancing character assets for your projects</div></li>
                            <li><div><strong>AI Companies</strong> — Domain-specific prompt engineering case studies and collaboration</div></li>
                            <li><div><strong>Educational Institutions</strong> — Interactive dance curriculum development partnerships</div></li>
                        </ul>
                    ',
                ],
            ],
        ],
        'gap' => '30px',
    ],
], 'pro-sites');


// ============================================
// KEY METRICS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Key Metrics',
            'subtitle' => 'Project scale and efficiency targets',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="metric-grid">
                <div class="metric-card">
                    <div class="metric-label">Total Poses</div>
                    <div class="metric-value">36</div>
                    <div class="metric-description">Breakdancing moves covering toprock, freezes, power moves</div>
                    <div class="text-muted mt-24">Completed: 0</div>
                </div>
                <div class="metric-card">
                    <div class="metric-label">Sprites Per Pose</div>
                    <div class="metric-value">8</div>
                    <div class="metric-description">Animation frames per complete move cycle</div>
                    <div class="text-muted mt-24">Total: 288 sprites</div>
                </div>
                <div class="metric-card">
                    <div class="metric-label">Time Reduction</div>
                    <div class="metric-value">80%</div>
                    <div class="metric-description">AI-assisted production efficiency</div>
                    <div class="text-muted mt-24">From 15-30 min to 3-5 min</div>
                </div>
                <div class="metric-card">
                    <div class="metric-label">Repository Status</div>
                    <div class="metric-value">Active</div>
                    <div class="metric-description">Documentation: Complete<br>Schemas: In Progress<br>Scripts: Not Started</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// PARTNERSHIP OPPORTUNITIES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Partnership Opportunities',
            'subtitle' => 'Who we\'re looking to collaborate with',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <ul class="icon-list" style="max-width: 900px; margin: 0 auto;">
                <li><strong>Game Developers</strong> — Ready-to-use breakdancing character assets for your projects</li>
                <li><strong>AI Companies</strong> — Domain-specific prompt engineering case studies and collaboration</li>
                <li><strong>Educational Institutions</strong> — Interactive dance curriculum development partnerships</li>
                <li><strong>Investment Firms</strong> — Creative technology and AI application opportunities</li>
                <li><strong>Animation Studios</strong> — AI-assisted production workflow exploration</li>
            </ul>
        ',
        'format' => 'standard',
    ],
], 'pro-sites');

// ============================================
// FUNDING REQUIREMENTS
// ============================================
partial('column', [
    'header' => [
        'heading' => [
            'label' => 'Investment Opportunity',
            'title' => 'Funding Requirements',
            'subtitle' => 'Seeking investment for full-scale production',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'html',
                'content' => [
                    'html' => '<div class="text-center"><span class="status-badge status-not-funded">Seeking Funding</span></div>',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="grid-2col-funding">
                            <div class="card flex flex-column align-center">
                                <h4>Phase 1: MVP Development</h4>
                                <div class="funding-amount">$25,000 - $40,000</div>
                                <p class="mb-16 mt-24"><strong>Timeline:</strong> 3 months | <strong>Purpose:</strong> Complete automation pipeline, generate core 10-pose library, validate workflow</p>

                                <h4 class="mt-24 mb-16">Deliverables:</h4>
                                <ul class="list check-list">
                                    <li>Functional prompt generation system</li>
                                    <li>10 production-ready pose sprites</li>
                                    <li>Automated sprite sheet compiler</li>
                                    <li>Quality validation tools</li>
                                </ul>
                            </div>

                            <div class="card flex flex-column align-center">
                                <h4>Phase 2: Full Production</h4>
                                <div class="funding-amount">$60,000 - $100,000</div>
                                <p class="mb-16 mt-24"><strong>Timeline:</strong> 6 months | <strong>Purpose:</strong> Complete all 36 poses, build tooling ecosystem, market launch</p>

                                <h4 class="mt-24 mb-16">Deliverables:</h4>
                                <ul class="list check-list">
                                    <li>Complete 36-pose sprite library</li>
                                    <li>Web-based pose builder tool</li>
                                    <li>Game engine export plugins</li>
                                    <li>Documentation and tutorials</li>
                                    <li>Marketing and distribution platform</li>
                                </ul>
                            </div>
                        </div>

                        <div class="use-of-funds">
                            <h4>Use of Funds</h4>
                            <div class="use-of-funds-grid">
                                <div>AI Platform Subscriptions: <strong>25%</strong></div>
                                <div>Software Development: <strong>40%</strong></div>
                                <div>Quality Assurance: <strong>15%</strong></div>
                                <div>Documentation: <strong>10%</strong></div>
                                <div>Marketing & Distribution: <strong>10%</strong></div>
                            </div>
                        </div>
                    ',
                ],
            ],
        ],
        'gap' => '30px',
        'align' => 'center',
    ],
], 'pro-sites');




// ============================================
// CALL TO ACTION
// ============================================
partial('column', [
    'settings' => [
        'custom_classes' => 'cta-gradient align-center',
    ],
    'header' => [
        'heading' => [
            'title' => 'Get Involved',
            'subtitle' => 'Join us in revolutionizing sprite animation production',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Break Move Guy represents the convergence of creative technology and practical application. With your support, we can bring this innovative sprite system to game developers, educators, and animators worldwide.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'View Repository',
                'url' => 'https://github.com/piksoul/proj-breakmove',
                'style' => 'primary',
                'target' => '_blank',
            ],
            [
                'text' => 'Contact Us',
                'url' => '#contact',
                'style' => 'outline',
            ],
        ],
    ],
], 'pro-sites');

// ============================================
// FOOTER INFO
// ============================================
partial('column', [
    'settings' => [
        'custom_css' => 'padding: 30px 0;'
    ],
    
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="text-center text-muted">
                <p class="mb-16"><strong>Project Status:</strong> Seeking Funding & Development Partners</p>
                <p><strong>Last Updated:</strong> November 11, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
