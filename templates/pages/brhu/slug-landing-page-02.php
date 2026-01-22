<?php
/**
 * LeanCMS Brand Hub - Landing Page
 *
 * Centralized WordPress brand management for multi-client environments
 * Using the landing-page recipe from template library system
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   brhu/slug-landing-page-02/index.php
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
        <span class="lcms-badge lcms-badge--primary">WordPress Brand Management</span>
    </div>',
    'title' => 'LeanCMS Brand Hub',
    'subtitle' => 'Streamline multi-client brand management',
], 'top-section');

// ============================================
// VALUE PROPOSITIONS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Why LeanCMS Brand Hub',
            'subtitle' => 'Everything you need for consistent, scalable brand management',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'row',
        'items' => [
            [
                'type' => 'html',
                'custom_classes' => 'lcms-card',
                'content' => [
                    'html' => '
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item"><strong>Reusable Component Library</strong> — BEM-compliant, brand-consistent UI components that work across all client sites</li>
                            <li class="lcms-list__item"><strong>Intelligent Template System</strong> — Pre-built recipes and patterns for rapid page creation with guaranteed quality</li>
                        </ul>
                    ',
                ],
            ],
            [
                'type' => 'html',
                'content' => [
                    'html' => '
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item"><strong>Automated Brand Consistency</strong> — Centralized brand colors, typography, and styling enforced across all implementations</li>
                            <li class="lcms-list__item"><strong>Developer-Friendly Architecture</strong> — Clean partial() syntax, namespaced components, and comprehensive documentation</li>
                        </ul>
                    ',
                ],
            ],
        ],
        'gap' => '30px',
    ],
], 'pro-sites');

// ============================================
// TARGET AUDIENCE GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Built For You',
            'subtitle' => 'Whether you manage brands, build sites, or lead teams',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-stack gap-8">
                    <h4>👔 Brand Managers</h4>
                    <p>Maintain brand consistency across all client touchpoints with centralized control over colors, typography, and design systems</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>💻 Developers</h4>
                    <p>Build faster with pre-tested components, clear documentation, and a clean partial() syntax that makes sense</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>🏢 Agencies</h4>
                    <p>Scale your client work efficiently with reusable templates and components that reduce development time per project</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>📊 Marketing Teams</h4>
                    <p>Launch campaigns faster with conversion-optimized templates and brand-compliant components ready to deploy</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// KEY METRICS
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Measurable Impact',
            'subtitle' => 'Real efficiency gains for your team',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Development Time</div>
                    <div class="lcms-metric__value">70% Faster</div>
                    <div class="lcms-metric__description">Build pages in hours, not days, with pre-built components and recipes</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Brand Compliance</div>
                    <div class="lcms-metric__value">100%</div>
                    <div class="lcms-metric__description">Automated enforcement ensures every page meets brand standards</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Code Quality</div>
                    <div class="lcms-metric__value">BEM-Compliant</div>
                    <div class="lcms-metric__description">Clean, maintainable CSS architecture across all components</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Template Library</div>
                    <div class="lcms-metric__value">50+ Components</div>
                    <div class="lcms-metric__description">Growing library of widgets, sections, patterns, and recipes</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// CORE FEATURES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Complete Brand Management Solution',
            'subtitle' => 'Everything you need in one centralized system',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-2col">
                <div class="lcms-card">
                    <h4>🎨 Centralized Brand Configuration</h4>
                    <p>Single source of truth for colors, typography, spacing, and brand elements. Update once, apply everywhere.</p>
                </div>
                <div class="lcms-card">
                    <h4>📦 Component Library System</h4>
                    <p>Organized catalog of widgets, sections, and patterns with comprehensive documentation and usage examples.</p>
                </div>
                <div class="lcms-card">
                    <h4>📝 Template Recipes</h4>
                    <p>Pre-assembled page templates for common use cases: landing pages, project overviews, documentation pages.</p>
                </div>
                <div class="lcms-card">
                    <h4>🤖 AI-Assisted Generation</h4>
                    <p>Intelligent content placement and component selection following composition rules and best practices.</p>
                </div>
                <div class="lcms-card">
                    <h4>✅ Quality Validation</h4>
                    <p>Automated checks for BEM compliance, WordPress security standards, and brand consistency.</p>
                </div>
                <div class="lcms-card">
                    <h4>🔄 Multi-Client Management</h4>
                    <p>Manage multiple client brands from a single installation with isolated configurations and theme files.</p>
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
            'title' => 'Ready to Streamline Your Brand Management?',
            'subtitle' => 'See how LeanCMS Brand Hub can transform your workflow',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Join forward-thinking agencies and development teams who are scaling their client work with centralized brand management. Get a personalized demo and see how LeanCMS Brand Hub fits your specific needs.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Request Demo',
                'url' => '#contact',
                'style' => 'primary',
            ],
            [
                'text' => 'View Documentation',
                'url' => '/docs/template-library',
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
                <p><strong>Status:</strong> Production Ready — Currently Managing 5+ Client Brands</p>
                <p><strong>Last Updated:</strong> November 18, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
