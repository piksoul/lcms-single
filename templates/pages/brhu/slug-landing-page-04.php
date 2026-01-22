<?php
/**
 * LeanCMS Brand Hub - Image-Rich Landing Page
 *
 * Centralized WordPress brand management with visual showcase
 * Generated using landing-page recipe from template library
 * Enhanced with responsive images and proper WordPress handling
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   brhu/slug-landing-page-04.php
 * @since      1.2.6
 */

defined('ABSPATH') || exit;
get_header();
partial('loader', [], 'top-section');
?>



<?php
// ============================================
// HERO SECTION WITH BADGE & HERO IMAGE
// ============================================
partial('page-header', [
    'pre_html' => '<div style="text-align: center;">
        <span class="lcms-badge lcms-badge--primary">Product Overview</span>
    </div>',
    'title' => 'LeanCMS Brand Hub',
    'subtitle' => 'Streamline multi-client brand management',
], 'top-section');

// Hero Image - Dashboard Interface
partial('column', [
    'settings' => [
        'custom_css' => 'padding-top: 20px; padding-bottom: 60px;'
    ],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder1.jpg',
        'alt' => 'LeanCMS Brand Hub dashboard interface showing centralized brand management',
        'caption' => 'Centralized dashboard for managing multiple WordPress brand identities',
        'lazy' => false, // Above the fold
        'width' => '100%',
    ],
], 'pro-sites');

// ============================================
// VALUE PROPOSITIONS WITH DIAGRAM
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'What Makes Brand Hub Unique',
            'subtitle' => 'Powerful features that set us apart',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <ul class="lcms-list lcms-list--check lcms-list--spacious">
                    <li class="lcms-list__item">Centralized component library with brand-compliant BEM architecture</li>
                    <li class="lcms-list__item">Dynamic template generation using pre-built recipe system</li>
                    <li class="lcms-list__item">AI-assisted page creation with three-tier pattern methodology</li>
                    <li class="lcms-list__item">Automated brand consistency across all client projects</li>
                </ul>
            </div>
        ',
    ],
], 'pro-sites');

// Component Structure Diagram
partial('column', [
    'settings' => ['dark_mode' => false],
    'content' => [
        'type' => 'image',
        'src' => 'https://static.brand-hub.com.au/client/placeholder2.jpg',
        'alt' => 'LeanCMS Brand Hub component structure diagram showing three-tier system',
        'caption' => 'Three-tier component system: Pre-built components, Guided patterns, and Extensible BEM framework',
        'lazy' => true,
        'width' => '100%',
    ],
], 'pro-sites');

// ============================================
// FEATURE SHOWCASE 1: COMPONENT LIBRARY
// Image LEFT, Text RIGHT
// ============================================
partial('2-column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Comprehensive Component Library',
            'subtitle' => 'Everything you need for brand-consistent pages',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'width' => '50%',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder3.jpg',
                    'alt' => 'Component library interface showing reusable BEM modules',
                    'lazy' => true,
                ],
            ],
            [
                'type' => 'html',
                'width' => '50%',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-24">
                            <h3>50+ Reusable Components</h3>
                            <p class="lead">Pre-built, brand-compliant modules ready to use:</p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item"><strong>Layout Components:</strong> Grid systems, column layouts, responsive containers</li>
                                <li class="lcms-list__item"><strong>UI Widgets:</strong> Badges, progress bars, metric cards, buttons</li>
                                <li class="lcms-list__item"><strong>Section Patterns:</strong> Hero sections, CTAs, footers, timelines</li>
                                <li class="lcms-list__item"><strong>Complex Patterns:</strong> Metrics grids, project summaries, navigation</li>
                            </ul>
                            <p>Every component follows strict BEM methodology with <code>lcms-</code> namespacing for zero conflicts.</p>
                        </div>
                    ',
                ],
            ],
        ],
        'gap' => '60px',
        'reverse' => false,
    ],
], 'pro-sites');

// ============================================
// FEATURE SHOWCASE 2: BRAND DASHBOARD
// Image RIGHT, Text LEFT
// ============================================
partial('2-column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Multi-Client Brand Dashboard',
            'subtitle' => 'Manage all your brands from one place',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'html',
                'width' => '50%',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-24">
                            <h3>Centralized Configuration</h3>
                            <p class="lead">Single WordPress installation, unlimited brand identities:</p>
                            <ul class="lcms-list lcms-list--check">
                                <li class="lcms-list__item"><strong>Client-Specific Configs:</strong> Each brand has its own color palette, typography, and spacing system</li>
                                <li class="lcms-list__item"><strong>Asset Management:</strong> Centralized logo, image, and media library per client</li>
                                <li class="lcms-list__item"><strong>Template Isolation:</strong> Brand-specific page templates with zero cross-contamination</li>
                                <li class="lcms-list__item"><strong>Quick Switching:</strong> Instant brand context switching during development</li>
                            </ul>
                            <div class="lcms-card lcms-card--compact">
                                <strong>Example:</strong> Manage Reframe WA, 4D Leadership, and Break Move Guy brands all within one WordPress hub.
                            </div>
                        </div>
                    ',
                ],
            ],
            [
                'type' => 'image',
                'width' => '50%',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder4.jpg',
                    'alt' => 'Brand dashboard showing multiple client configurations and settings',
                    'lazy' => true,
                ],
            ],
        ],
        'gap' => '60px',
        'reverse' => false,
    ],
], 'pro-sites');

// ============================================
// FEATURE SHOWCASE 3: RECIPE SYSTEM
// Image LEFT, Text RIGHT
// ============================================
partial('2-column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Intelligent Recipe System',
            'subtitle' => 'Pre-built page templates for rapid deployment',
            'align' => 'center',
        ],
    ],
    'content' => [
        'columns' => [
            [
                'type' => 'image',
                'width' => '50%',
                'content' => [
                    'src' => 'https://static.brand-hub.com.au/client/placeholder5.jpg',
                    'alt' => 'Recipe system interface showing template library and pattern selection',
                    'lazy' => true,
                ],
            ],
            [
                'type' => 'html',
                'width' => '50%',
                'content' => [
                    'html' => '
                        <div class="lcms-stack gap-24">
                            <h3>Three Content Workflow Types</h3>
                            <p class="lead">Flexible approaches for different content creation needs:</p>

                            <div class="lcms-card">
                                <h4>📋 Type 1: Structured Content</h4>
                                <p>Use pre-defined recipes (project pages, landing pages, resource pages)</p>
                            </div>

                            <div class="lcms-card">
                                <h4>🎨 Type 2: Supplied Content</h4>
                                <p>AI analyzes your content and selects optimal component arrangement</p>
                            </div>

                            <div class="lcms-card">
                                <h4>🚀 Type 3: Creative Composition</h4>
                                <p>AI composes pages from scratch using composition rules and guidelines</p>
                            </div>

                            <p class="text-muted">All three approaches generate clean PHP templates with proper <code>partial()</code> calls.</p>
                        </div>
                    ',
                ],
            ],
        ],
        'gap' => '60px',
        'reverse' => false,
    ],
], 'pro-sites');

// ============================================
// TARGET AUDIENCES GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Who Brand Hub Is For',
            'subtitle' => 'Built for teams who demand brand consistency',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-card">
                    <div class="lcms-stack gap-12">
                        <h4>🎨 Brand Managers</h4>
                        <p>Maintain consistent brand identity across all digital properties with automated compliance and centralized asset management.</p>
                    </div>
                </div>
                <div class="lcms-card">
                    <div class="lcms-stack gap-12">
                        <h4>👨‍💻 Developers</h4>
                        <p>Efficient, maintainable template development workflow with BEM methodology and reusable component library.</p>
                    </div>
                </div>
                <div class="lcms-card">
                    <div class="lcms-stack gap-12">
                        <h4>🏢 Agencies</h4>
                        <p>Multi-client brand management in single WordPress instance. Scale without code duplication or brand conflicts.</p>
                    </div>
                </div>
                <div class="lcms-card">
                    <div class="lcms-stack gap-12">
                        <h4>💼 Marketing Teams</h4>
                        <p>Quick deployment of on-brand marketing pages using pre-built recipes and AI-assisted content creation.</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// KEY METRICS GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Efficiency Gains',
            'subtitle' => 'Measurable improvements in your workflow',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-4col">
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Faster Development</div>
                    <div class="lcms-metric__value">80%</div>
                    <div class="lcms-metric__description">Faster page development with pre-built component library and recipe system</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Brand Compliance</div>
                    <div class="lcms-metric__value">100%</div>
                    <div class="lcms-metric__description">Automated brand compliance through BEM component architecture</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Reduction in Errors</div>
                    <div class="lcms-metric__value">90%</div>
                    <div class="lcms-metric__description">Fewer styling inconsistencies with centralized configuration system</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Client Brands</div>
                    <div class="lcms-metric__value">10+</div>
                    <div class="lcms-metric__description">Client brands managed in single WordPress installation</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// BENEFITS GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Core Benefits',
            'subtitle' => 'Everything you need for brand consistency',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-3col">
                <div class="lcms-card">
                    <h4>🎯 Automated Brand Consistency</h4>
                    <p>Components enforce brand guidelines automatically, eliminating manual style checks and reducing human error.</p>
                </div>
                <div class="lcms-card">
                    <h4>⚡ Rapid Page Deployment</h4>
                    <p>Pre-built recipes for common page types enable 10-minute page creation instead of hours of custom development.</p>
                </div>
                <div class="lcms-card">
                    <h4>📈 Scalable Architecture</h4>
                    <p>Add unlimited clients without code duplication. Each brand maintains its own isolated configuration.</p>
                </div>
                <div class="lcms-card">
                    <h4>🤖 AI-Ready Workflow</h4>
                    <p>Structured for AI-assisted content generation with machine-readable component definitions and recipes.</p>
                </div>
                <div class="lcms-card">
                    <h4>💻 Developer-Friendly</h4>
                    <p>Clean BEM methodology with comprehensive documentation. Easy to learn, maintain, and extend.</p>
                </div>
                <div class="lcms-card">
                    <h4>🔧 Three-Tier Flexibility</h4>
                    <p>Use pre-built components, follow guided patterns, or extend the BEM framework for custom needs.</p>
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
            'title' => 'Ready to Transform Your Brand Management?',
            'subtitle' => 'Join the future of WordPress brand hubs',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>LeanCMS Brand Hub brings enterprise-level brand consistency to WordPress. With our component library, recipe system, and AI-ready architecture, you can deploy on-brand pages faster than ever while maintaining perfect consistency across all client projects.</p>',
        'format' => 'lead',
    ],
    'footer' => [
        'buttons' => [
            [
                'text' => 'Schedule Demo',
                'url' => '#contact',
                'style' => 'primary',
            ],
            [
                'text' => 'Explore Components',
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
                <p><strong>Status:</strong> Production Ready - Managing 10+ Client Brands</p>
                <p><strong>Last Updated:</strong> November 18, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
