<?php
/**
 * Break Move Guy (BMG) - Project Overview
 *
 * AI-Driven Character Sprite System for Breakdancing Animation
 * Using pro-sites partials for clean, consistent layout
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/proj/slug-project-overview.php
 * @since      1.2.6
 */

defined('ABSPATH') || exit;
get_header();
partial('loader', [], 'top-section');
?>



<?php
// ============================================
// HERO SECTION
// ============================================
partial('page-header', [
    'pre_html' => '<div style="text-align: center;">
        <span class="lcms-badge lcms-badge--warning">Overview</span>
    </div>',
    'title' => 'Project Name',
    'subtitle' => 'AI-Driven Breakin Project',
], 'top-section');

// ============================================
// PROJECT SUMMARY
// ============================================
partial('column', [
    'settings' => [
        'container_classes' => 'lcms-card lcms-card--summary',
        'container_css' => 'margin-top: -50px;',
        'custom_css' => 'padding-top: 0; padding-bottom: 0;',
    ],
    'content' => [
        'type' => 'row',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-8">
                            <div class="heading lcms-stack gap-16">
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
                        <div class="lcms-stack gap-32">
                            <div class="lcms-stack gap-8">
                                <div class="flex justify-space-between align-flex-start mb-12">
                                    <h4 style="margin: 0;">📋 Idea</h4>
                                    <span class="lcms-badge lcms-badge--warning">In Progress</span>
                                </div>
                                <div class="lcms-progress">
                                    <div class="lcms-progress__bar" style="width: 75%;">
                                        <span class="lcms-progress__label">75%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lcms-stack gap-8">
                                <div class="flex justify-space-between align-flex-start mb-12">
                                    <h4 style="margin: 0;">💻 Evaulation</h4>
                                    <span class="lcms-badge lcms-badge--secondary">Not Started</span>
                                </div>
                                <div class="lcms-progress lcms-progress--inactive">
                                    <div class="lcms-progress__bar" style="width: 0%;">
                                        <span class="lcms-progress__label">0%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lcms-stack gap-8">
                                <div class="flex justify-space-between align-flex-start mb-12">
                                    <h4 style="margin: 0;">🎬 Execution</h4>
                                    <span class="lcms-badge lcms-badge--secondary">Not Started</span>
                                </div>
                                <div class="lcms-progress lcms-progress--inactive">
                                    <div class="lcms-progress__bar" style="width: 0%;">
                                        <span class="lcms-progress__label">0%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lcms-stack gap-8">
                                <div class="flex justify-space-between align-flex-start mb-12">
                                    <h4 style="margin: 0;">🎬 Handover</h4>
                                    <span class="lcms-badge lcms-badge--secondary">Not Started</span>
                                </div>
                                <div class="lcms-progress lcms-progress--inactive">
                                    <div class="lcms-progress__bar" style="width: 0%;">
                                        <span class="lcms-progress__label">0%</span>
                                    </div>
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
                'custom_classes' => 'lcms-card',
                'content' => [
                    'html' => '
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item">Standardized character design specifications ensuring visual consistency across 36+ breakdancing moves</li>
                            <li class="lcms-list__item">Proprietary Directive Control Vocabulary for precise pose descriptions</li>
                            <li class="lcms-list__item">3D coordinate system enabling exact positioning and reproducible results</li>
                        </ul>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item">AI-powered workflow reducing sprite production time by 80% compared to manual illustration</li>
                                <li class="lcms-list__item">Modular architecture supporting multiple export formats for various game engines</li>
                            </ul>
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
                <div class="lcms-stack gap-8">
                    <h4>🎮 Game Developers</h4>
                    <p>Independent game developers seeking high-quality character animations</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>📱 Mobile Gaming Studios</h4>
                    <p>Studios requiring sprite-based 2D assets for mobile platforms</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>🎓 Educational Software</h4>
                    <p>Software for dance and movement instruction with visual demonstrations</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>🎬 Animation Studios</h4>
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
                        <div class="lcms-card lcms-card--summary lcms-grid--gap-medium">
                            <div class="flex justify-space-between align-flex-start mb-12">
                                <h3 style="margin: 0;">📋 Planning Phase</h3>
                                <span class="lcms-badge lcms-badge--warning">In Progress</span>
                            </div>
                            <div class="lcms-progress lcms-progress--large">
                                <div class="lcms-progress__bar" style="width: 75%;">
                                    <span class="lcms-progress__label">75%</span>
                                </div>
                            </div>
                            <p><strong>Next Milestone:</strong> Complete master prompt templates and JSON schemas | <strong>Est:</strong> 2 weeks</p>
                            <hr />
                            <div class="grid-3col">
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: #4CAF50;">Completed</h4>
                                    <ul class="lcms-list lcms-list--check">
                                        <li class="lcms-list__item">Character design specifications and style guide</li>
                                        <li class="lcms-list__item">3D coordinate pose system developed</li>
                                        <li class="lcms-list__item">Directive Control Vocabulary established</li>
                                        <li class="lcms-list__item">Repository structure and documentation framework</li>
                                        <li class="lcms-list__item">36-move animation specification defined</li>
                                    </ul>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: var(--color-brand-primary);">In Progress</h4>
                                    <ul class="lcms-list lcms-list--todo">
                                        <li class="lcms-list__item">Master prompt templates creation</li>
                                        <li class="lcms-list__item">JSON schemas for pose data validation</li>
                                        <li class="lcms-list__item">Asset pipeline documentation</li>
                                    </ul>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: #999;">Upcoming</h4>
                                    <ul class="lcms-list lcms-list--todo">
                                        <li class="lcms-list__item">Quality assurance criteria finalization</li>
                                        <li class="lcms-list__item">Contributor guidelines completion</li>
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
                'custom_classes' => 'lcms-card lcms-grid--gap-medium',
                'content' => [
                    'html' => '
                        <div class="flex justify-space-between align-flex-start mb-12">
                            <h3 style="margin: 0;">💻 Development Phase</h3>
                            <span class="lcms-badge lcms-badge--secondary">Not Started</span>
                        </div>
                        <div class="lcms-progress lcms-progress--inactive lcms-progress--large">
                            <div class="lcms-progress__bar" style="width: 0%;">
                                <span class="lcms-progress__label">0%</span>
                            </div>
                        </div>
                        <p><strong>Estimated Start:</strong> Week 3-4 | <strong>Duration:</strong> 8-10 weeks</p>
                        <hr />
                        <div class="lcms-stack gap-8">
                            <h4>Planned Features</h4>
                            <ul class="lcms-list lcms-list--todo lcms-list--3col">
                                <li class="lcms-list__item">Prompt generation script</li>
                                <li class="lcms-list__item">Schema validation tools</li>
                                <li class="lcms-list__item">Batch generation workflow</li>
                                <li class="lcms-list__item">Sprite sheet compiler</li>
                                <li class="lcms-list__item">Silhouette validator</li>
                                <li class="lcms-list__item">Style consistency checker</li>
                                <li class="lcms-list__item">Interactive web-based pose builder</li>
                            </ul>
                        </div>

                        <div class="lcms-card__panel">
                            <h4>Technical Stack</h4>
                            <p><strong>Languages:</strong> Python 3.8+, JavaScript</p>
                            <p><strong>AI Platforms:</strong> MidJourney, DALL-E, Stable Diffusion</p>
                            <p><strong>Tools:</strong> Git, JSON Schema, Canvas API</p>
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
            <div class="grid-4col">
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Total Poses</div>
                    <div class="lcms-metric__value">36</div>
                    <div class="lcms-metric__description">Breakdancing moves covering toprock, freezes, power moves</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">Completed: 0</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Sprites Per Pose</div>
                    <div class="lcms-metric__value">8</div>
                    <div class="lcms-metric__description">Animation frames per complete move cycle</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">Total: 288 sprites</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Time Reduction</div>
                    <div class="lcms-metric__value">80%</div>
                    <div class="lcms-metric__description">AI-assisted production efficiency</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">From 15-30 min to 3-5 min</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Repository Status</div>
                    <div class="lcms-metric__value">Active</div>
                    <div class="lcms-metric__description">Documentation: Complete<br>Schemas: In Progress<br>Scripts: Not Started</div>
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
                    'html' => '<div class="text-center"><span class="lcms-badge lcms-badge--danger">Seeking Funding</span></div>',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="grid-2col">
                            <div class="lcms-card lcms-stack gap-16 align-center">
                                <h4>Phase 1: MVP Development</h4>
                                <div style="font-size: 36px; font-weight: 700; color: var(--color-brand-accent);">$25,000 - $40,000</div>
                                <p class="align-center"><strong>Timeline:</strong> 3 months | <strong>Purpose:</strong> Complete automation pipeline, generate core 10-pose library, validate workflow</p>

                                <div class="lcms-stack gap-16 align-center">
                                    <h4 class="align-center">Deliverables:</h4>
                                    <ul class="lcms-list lcms-list--check">
                                        <li class="lcms-list__item">Functional prompt generation system</li>
                                        <li class="lcms-list__item">10 production-ready pose sprites</li>
                                        <li class="lcms-list__item">Automated sprite sheet compiler</li>
                                        <li class="lcms-list__item">Quality validation tools</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="lcms-card lcms-stack gap-16 align-center">
                                <h4>Phase 2: Full Production</h4>
                                <div style="font-size: 36px; font-weight: 700; color: var(--color-brand-accent);">$60,000 - $100,000</div>
                                <p class="align-center"><strong>Timeline:</strong> 6 months | <strong>Purpose:</strong> Complete all 36 poses, build tooling ecosystem, market launch</p>

                                <div class="lcms-stack gap-16 align-center">
                                    <h4 class="align-center">Deliverables:</h4>
                                    <ul class="lcms-list lcms-list--check">
                                        <li class="lcms-list__item">Complete 36-pose sprite library</li>
                                        <li class="lcms-list__item">Web-based pose builder tool</li>
                                        <li class="lcms-list__item">Game engine export plugins</li>
                                        <li class="lcms-list__item">Documentation and tutorials</li>
                                        <li class="lcms-list__item">Marketing and distribution platform</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="lcms-stack gap-16 lcms-container lcms-container--thin">
                            <h4 class="align-center">Use of Funds</h4>
                            <div class="grid-2col">
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
                                    <div style="display: flex; flex-direction: column; gap: 16px;">
                                        <h3>💰 Direct Sales</h3>
                                        <ul class="lcms-list lcms-list--check">
                                            <li class="lcms-list__item">Sprite library licensing</li>
                                            <li class="lcms-list__item">Custom character commissions</li>
                                        </ul>
                                    </div>
                                ',
                                'format' => 'standard',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'content' => [
                                'text' => '
                                    <div style="display: flex; flex-direction: column; gap: 16px;">
                                        <h3>🔄 Recurring Revenue</h3>
                                        <ul class="lcms-list lcms-list--check">
                                            <li class="lcms-list__item">Tool subscription access</li>
                                            <li class="lcms-list__item">Educational licensing</li>
                                        </ul>
                                    </div>
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
                <div class="lcms-card lcms-card--compact">
                    <h4>🥇 First to Market</h4>
                    <p>First AI-driven breakdancing sprite system available</p>
                </div>
                <div class="lcms-card lcms-card--compact">
                    <h4>📖 Proprietary Vocabulary</h4>
                    <p>Custom system enabling consistent AI outputs</p>
                </div>
                <div class="lcms-card lcms-card--compact">
                    <h4>📈 Scalable Architecture</h4>
                    <p>Support expansion to other dance styles</p>
                </div>
                <div class="lcms-card lcms-card--compact">
                    <h4>🌐 Open Documentation</h4>
                    <p>Enable community contributions and growth</p>
                </div>
                <div class="lcms-card lcms-card--compact">
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
            <ul class="lcms-list lcms-list--arrow lcms-list--spacious" style="max-width: 900px; margin: 0 auto;">
                <li class="lcms-list__item"><strong>Game Developers</strong> — Ready-to-use breakdancing character assets for your projects</li>
                <li class="lcms-list__item"><strong>AI Companies</strong> — Domain-specific prompt engineering case studies and collaboration</li>
                <li class="lcms-list__item"><strong>Educational Institutions</strong> — Interactive dance curriculum development partnerships</li>
                <li class="lcms-list__item"><strong>Investment Firms</strong> — Creative technology and AI application opportunities</li>
                <li class="lcms-list__item"><strong>Animation Studios</strong> — AI-assisted production workflow exploration</li>
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
                <div class="lcms-card">
                    <h4>⚡ Immediate </h4>
                    <p>(2 weeks)</p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Complete prompt template library</li>
                        <li class="lcms-list__item">Generate first 10 core pose sprites</li>
                        <li class="lcms-list__item">Develop automation scripts for batch generation</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🎯 Short-Term </h4>
                    <p>(1-3 months)</p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Launch funding campaign or pitch to investors</li>
                        <li class="lcms-list__item">Build web demonstration showcasing sprite generation</li>
                        <li class="lcms-list__item">Establish partnerships with indie game developers</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🚀 Long-Term</h4>
                    <p>(6-12 months)</p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Expand to additional dance styles (hip-hop, popping, locking)</li>
                        <li class="lcms-list__item">Develop marketplace for community-contributed poses</li>
                        <li class="lcms-list__item">Create educational platform for learning breakdancing</li>
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
        'custom_classes' => 'gradient-light align-center lcms-container--thin',
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
            <div class="text-center text-muted" style="display: flex; flex-direction: column; gap: 16px;">
                <p><strong>Project Status:</strong> Seeking Funding & Development Partners</p>
                <p><strong>Last Updated:</strong> November 11, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
