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
        <span class="status-badge status-in-progress">Early Stage Development</span>
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
        'type' => 'row',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="content-column">
                            <div class="heading">
                                <h2>Project Summary</h2>
                                <div class="sub-heading">Summary sub line statement to describe current state</div>
                            </div>
                            <div class="text">
                                Statement about current state. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eleifend convallis neque eget commodo. Mauris sit amet tortor nec orci commodo ultricies. Curabitur velit dolor, fringilla in consectetur vel, ultricies at nibh. 
                            </div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="status-summary">
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h4>📋 Idea </h4>
                                    <span class="status-badge status-in-progress">In Progress</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 75%;">75%</div>
                                </div>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h4>💻 Evaulation </h4>
                                    <span class="status-badge status-not-started">Not Started</span>
                                </div>
                                <div class="progress-bar-indicator">
                                        <div class="progress-bar-fill" style="width: 0%;">0%</div>
                                </div>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h4>🎬 Execution</h4>
                                    <span class="status-badge status-not-started">Not Started</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 0%;">0%</div>
                                </div>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h4>🎬 Handover</h4>
                                    <span class="status-badge status-not-started">Not Started</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 0%;">0%</div>
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
            'title' => 'What Makes BMG Unique',
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
                        <div>
                            <div>
                                <span>▸</span>
                                Standardized character design specifications ensuring visual consistency across 36+ breakdancing moves
                            </div>
                            <div>
                                <span>▸</span>
                                Proprietary Directive Control Vocabulary for precise pose descriptions
                            </div>
                            <div>
                                <span>▸</span>
                                3D coordinate system enabling exact positioning and reproducible results
                            </div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div>
                            <div>
                                <span>▸</span>
                                AI-powered workflow reducing sprite production time by 80% compared to manual illustration
                            </div>
                            <div>
                                <span>▸</span>
                                Modular architecture supporting multiple export formats for various game engines
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
// TARGET MARKET - Combined using Grid
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Target Market',
            'subtitle' => 'Who will benefit from BMG',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div>
                    <h3 class="mb-16">🎮 Game Developers</h3>
                    <p>Independent game developers seeking high-quality character animations</p>
                </div>
                <div>
                    <h3 class="mb-16">📱 Mobile Gaming Studios</h3>
                    <p>Studios requiring sprite-based 2D assets for mobile platforms</p>
                </div>
                <div>
                    <h3 class="mb-16">🎓 Educational Software</h3>
                    <p>Software for dance and movement instruction with visual demonstrations</p>
                </div>
                <div>
                    <h3 class="mb-16">🎬 Animation Studios</h3>
                    <p>Studios exploring AI-assisted production workflows for efficiency</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// PROGRESS INDICATORS
// ============================================
partial('column', [
    'header' => [
        'heading' => [
            'label' => 'Progress Tracking',
            'title' => 'Development Status',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="content-column progress-indicator">
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h3>📋 Planning Phase </h3>
                                    <span class="status-badge status-in-progress">In Progress</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 75%;">75%</div>
                                </div>
                            </div>
                            <p class="mb-16 mt-24"><strong>Next Milestone:</strong> Complete master prompt templates and JSON schemas | <strong>Est:</strong> 2 weeks</p>
                            <hr />
                            <div class="grid-3col mt-24">
                                <div>
                                    <h4 class="mb-16" style="color: #4CAF50;">Completed</h4>
                                    <ul class="list check-list">
                                        <li>Character design specifications and style guide</li>
                                        <li>3D coordinate pose system developed</li>
                                        <li>Directive Control Vocabulary established</li>
                                        <li>Repository structure and documentation framework</li>
                                        <li>36-move animation specification defined</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: var(--color-brand-primary);">In Progress</h4>
                                    <ul class="list check-list in-progress">
                                        <li>Master prompt templates creation</li>
                                        <li>JSON schemas for pose data validation</li>
                                        <li>Asset pipeline documentation</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: #999;">Upcoming</h4>
                                    <ul class="list check-list upcoming">
                                        <li>Quality assurance criteria finalization</li>
                                        <li>Contributor guidelines completion</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    ',
                ],
            ],
            // Development Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="content-column progress-indicator">
                            <div class="progress-bar-container">
                                <div class="progress-bar-header flex justify-space-between align-flex-start">
                                    <h3>💻 Development Phase </h3>
                                    <span class="status-badge status-not-started">Not Started</span>
                                </div>
                                <div class="progress-bar-indicator">
                                    <div class="progress-bar-fill" style="width: 0%;">0%</div>
                                </div>
                            </div>
                            <p class="mb-16 mt-24"><strong>Estimated Start:</strong> Week 3-4 | <strong>Duration:</strong> 8-10 weeks</p>
                            <hr />
                            <div class="mt-24">
                                <h4 class="mb-16">Planned Features</h4>
                                <div class="grid-2col gap-8">
                                    <div class="phase-box">✓ Prompt generation script</div>
                                    <div class="phase-box">✓ Schema validation tools</div>
                                    <div class="phase-box">✓ Batch generation workflow</div>
                                    <div class="phase-box">✓ Sprite sheet compiler</div>
                                    <div class="phase-box">✓ Silhouette validator</div>
                                    <div class="phase-box">✓ Style consistency checker</div>
                                    <div class="phase-box">✓ Interactive web-based pose builder</div>
                                </div>
                            </div>

                            <div class="tech-stack">
                                <h4>Technical Stack</h4>
                                <p><strong>Languages:</strong> Python 3.8+, JavaScript</p>
                                <p><strong>AI Platforms:</strong> MidJourney, DALL-E, Stable Diffusion</p>
                                <p><strong>Tools:</strong> Git, JSON Schema, Canvas API</p>
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
// REVENUE STREAMS & COMPETITIVE ADVANTAGES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'label' => 'Investment',
            'title' => 'Opportunities',
            'subtitle' => 'Currently identified opportunities for this project',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'stack',
        'items' => [
            [
                'type' => 'row',
                'content' => [
                    'items' => [
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '
                                    <h3 class="mb-16">💰 Direct Sales</h3>
                                    <ul class="list check-list">
                                        <li>Sprite library licensing</li>
                                        <li>Custom character commissions</li>
                                    </ul>
                                ',
                                'format' => 'standard',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '
                                    <h3 class="mb-16">🔄 Recurring Revenue</h3>
                                    <ul class="list check-list">
                                        <li>Tool subscription access</li>
                                        <li>Educational licensing</li>
                                    </ul>
                                ',
                                'format' => 'standard',
                            ],
                        ],
                    ],
                    'gap' => '40px',
                    'wrap' => true,
                ],
            ],
        ],
        'gap' => '30px',
    ],
], 'pro-sites');

// ============================================
// COMPETITIVE ADVANTAGES
// ============================================
partial('column', [
    'header' => [
        'heading' => [
            'title' => 'Competitive Advantages',
            'subtitle' => 'What sets BMG apart from alternatives',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col">
                <div class="feature-card">
                    <h4>🥇 First to Market</h4>
                    <p>First AI-driven breakdancing sprite system available</p>
                </div>
                <div class="feature-card">
                    <h4>📖 Proprietary Vocabulary</h4>
                    <p>Custom system enabling consistent AI outputs</p>
                </div>
                <div class="feature-card">
                    <h4>📈 Scalable Architecture</h4>
                    <p>Support expansion to other dance styles</p>
                </div>
                <div class="feature-card">
                    <h4>🌐 Open Documentation</h4>
                    <p>Enable community contributions and growth</p>
                </div>
                <div class="feature-card">
                    <h4>💵 Lower Costs</h4>
                    <p>80% cheaper than traditional animation methods</p>
                </div>
            </div>
        ',
        'format' => 'standard',
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
// NEXT STEPS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Next Steps',
            'subtitle' => 'Roadmap for moving forward',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-3col">
                <div class="roadmap-card">
                    <h3>⚡ Immediate (2 weeks)</h3>
                    <ul class="list check-list">
                        <li>Complete prompt template library</li>
                        <li>Generate first 10 core pose sprites</li>
                        <li>Develop automation scripts for batch generation</li>
                    </ul>
                </div>

                <div class="roadmap-card">
                    <h3>🎯 Short-Term (1-3 months)</h3>
                    <ul class="list check-list">
                        <li>Launch funding campaign or pitch to investors</li>
                        <li>Build web demonstration showcasing sprite generation</li>
                        <li>Establish partnerships with indie game developers</li>
                    </ul>
                </div>

                <div class="roadmap-card">
                    <h3>🚀 Long-Term (6-12 months)</h3>
                    <ul class="list check-list">
                        <li>Expand to additional dance styles (hip-hop, popping, locking)</li>
                        <li>Develop marketplace for community-contributed poses</li>
                        <li>Create educational platform for learning breakdancing</li>
                    </ul>
                </div>
            </div>
        ',
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
