<?php
/**
 * Break Move Guy (BMG) - Project Idea
 *
 * AI-Driven Character Sprite System for Breakdancing Animation
 * Using pro-sites partials for clean, consistent layout
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/proj/slug-project-idea.php
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
        <span class="lcms-badge lcms-badge--warning">{{BADGE}}</span>
    </div>',
    'title' => '{{PAGE_TITLE}}',
    'subtitle' => '{{PAGE_SUBTITLE}}',
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
        'type' => 'stack',
        'items' => [
            // Planning Phase
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <div class="lcms-grid lcms-grid--gap-medium">
                            <div class="flex justify-space-between align-flex-start mb-12">
                                <h3 style="margin: 0;">📋 Planning Phase</h3>
                                <span class="lcms-badge lcms-badge--warning">{{PROJECT_STATUS}}</span>
                            </div>
                            <div class="lcms-progress lcms-progress--large">
                                <div class="lcms-progress__bar" style="width: {{XX}}%;">
                                    <span class="lcms-progress__label">{{XX}}%</span>
                                </div>
                            </div>
                            <p><strong>Next Milestone:</strong> {{MILESTONE}}</p>
                            <hr />
                            <div class="grid-3col">
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: #4CAF50;">{{TASK_TITLE}}</h4>
                                    <ul class="lcms-list lcms-list--check">
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                    </ul>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: var(--color-brand-primary);">{{TASK_TITLE}}</h4>
                                    <ul class="lcms-list lcms-list--todo">
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                    </ul>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 16px;">
                                    <h4 style="color: #999;">{{TASK_TITLE}}</h4>
                                    <ul class="lcms-list lcms-list--todo">
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
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
// IDEA STATEMENT
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false, 'id' => 'idea-statement'],
    'header' => [
        'heading' => [
            'title' => '{{PARTIAL_TITLE}}',
            'subtitle' => '{{PARTIAL_SUBLINE}}',
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
                            <li class="lcms-list__item">{{LIST_ITEM}}</li>
                            <li class="lcms-list__item">{{LIST_ITEM}}</li>
                            <li class="lcms-list__item">{{LIST_ITEM}}</li>
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
                                <li class="lcms-list__item">{{LIST_ITEM}}</li>
                                <li class="lcms-list__item">{{LIST_ITEM}}</li>
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
// KEY METRICS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => '{{PARTIAL_TITLE}}',
            'subtitle' => '{{PARTIAL_SUBLINE}}',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">{{METRIC_ITEM}}</div>
                    <div class="lcms-metric__value">{{XX}}</div>
                    <div class="lcms-metric__description">{{METRIC_DESCRIPTION}}</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">{{METRIC_DESCRIPTION_2}}</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">{{METRIC_ITEM}}</div>
                    <div class="lcms-metric__value">{{XX}}</div>
                    <div class="lcms-metric__description">{{METRIC_DESCRIPTION}}</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">{{METRIC_DESCRIPTION_2}}</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">{{METRIC_ITEM}}</div>
                    <div class="lcms-metric__value">{{XX}}</div>
                    <div class="lcms-metric__description">{{METRIC_DESCRIPTION}}</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">{{METRIC_DESCRIPTION_2}}</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">{{METRIC_ITEM}}</div>
                    <div class="lcms-metric__value">{{XX}}</div>
                    <div class="lcms-metric__description">{{METRIC_DESCRIPTION}}</div>
                    <div class="lcms-metric__description" style="margin-top: 20px; opacity: 0.7;">{{METRIC_DESCRIPTION_2}}</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// RESOURCES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => '{{RESOURCES_TITLE}}',
            'subtitle' => '{{RESOURCES_SUBLINE}}',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '
            <ul class="lcms-list lcms-list--arrow lcms-list--spacious" style="max-width: 900px; margin: 0 auto;">
                <li class="lcms-list__item">{{LIST_ITEM}}</li>
                <li class="lcms-list__item">{{LIST_ITEM}}</li>
                <li class="lcms-list__item">{{LIST_ITEM}}</li>
                <li class="lcms-list__item">{{LIST_ITEM}}</li>
                <li class="lcms-list__item">{{LIST_ITEM}}</li>
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
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🎯 Short-Term </h4>
                    <p>(1-3 months)</p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🚀 Long-Term</h4>
                    <p>(6-12 months)</p>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
                        <li class="lcms-list__item">{{LIST_ITEM}}</li>
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
