<?php
/**
 * LeanCMS Brand Hub - Product Landing Page
 *
 * Centralized brand management for WordPress
 * Generated using landing-page recipe from template library
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   brhu/slug-landing-page.php
 * @since      1.2.6
 */

defined('ABSPATH') || exit;
get_header();
partial('loader', [], 'top-section');
?>



<?php
// ============================================
// HERO SECTION WITH BADGE
// ============================================
partial('page-header', [
    'pre_html' => '<div style="text-align: center;">
        <span class="lcms-badge lcms-badge--primary">Product Overview</span>
    </div>',
    'title' => 'LeanCMS Brand Hub',
    'subtitle' => 'Centralized brand management for WordPress',
], 'top-section');

// ============================================
// VALUE PROPOSITIONS
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
                    <li class="lcms-list__item">Centralized brand asset management with client-specific configurations</li>
                    <li class="lcms-list__item">Dynamic template generation using brand-compliant BEM components</li>
                    <li class="lcms-list__item">AI-assisted page creation with three-tier pattern system</li>
                    <li class="lcms-list__item">Consistent typography and color systems across all client projects</li>
                    <li class="lcms-list__item">Modular partial system for reusable, maintainable layouts</li>
                </ul>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// TARGET AUDIENCE GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
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
                <div class="lcms-stack gap-8">
                    <h4>🎨 Brand Managers</h4>
                    <p>Maintain consistent brand identity across digital properties</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>💼 Marketing Teams</h4>
                    <p>Quick deployment of on-brand marketing pages</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>👨‍💻 Developers</h4>
                    <p>Efficient, maintainable template development workflow</p>
                </div>
                <div class="lcms-stack gap-8">
                    <h4>🏢 Agencies</h4>
                    <p>Multi-client brand management in single WordPress instance</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// KEY METRICS GRID
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Key Metrics',
            'subtitle' => 'Results that speak for themselves',
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
                    <div class="lcms-metric__description">Faster page development with template library</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Brand Compliance</div>
                    <div class="lcms-metric__value">100%</div>
                    <div class="lcms-metric__description">Brand compliance through BEM component system</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Client Brands</div>
                    <div class="lcms-metric__value">10+</div>
                    <div class="lcms-metric__description">Client brands managed in single installation</div>
                </div>
                <div class="lcms-metric lcms-metric--transparent">
                    <div class="lcms-metric__label">Components</div>
                    <div class="lcms-metric__value">50+</div>
                    <div class="lcms-metric__description">Reusable components and patterns</div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// BENEFITS & FEATURES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
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
            <div class="grid-2col">
                <div class="lcms-card">
                    <h4>🎯 Automated Brand Consistency</h4>
                    <p>Components enforce brand guidelines automatically</p>
                </div>
                <div class="lcms-card">
                    <h4>⚡ Rapid Page Deployment</h4>
                    <p>Pre-built recipes for common page types</p>
                </div>
                <div class="lcms-card">
                    <h4>📈 Scalable Architecture</h4>
                    <p>Add clients without code duplication</p>
                </div>
                <div class="lcms-card">
                    <h4>🤖 AI-Ready Workflow</h4>
                    <p>Structured for AI-assisted content generation</p>
                </div>
                <div class="lcms-card">
                    <h4>💻 Developer-Friendly</h4>
                    <p>Clean BEM methodology with clear documentation</p>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// SOCIAL PROOF & TRUST
// ============================================
partial('column', [
    'settings' => ['dark_mode' => false],
    'header' => [
        'heading' => [
            'title' => 'Why Choose Brand Hub',
            'subtitle' => 'Proven technology, trusted approach',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--thin">
                <div class="grid-2col">
                    <div class="lcms-card">
                        <h4>🥇 First-to-Market</h4>
                        <p>First-to-market WordPress brand hub solution</p>
                    </div>
                    <div class="lcms-card">
                        <h4>🔧 Three-Tier System</h4>
                        <p>Three-tier component system (pre-built, guided, extensible)</p>
                    </div>
                    <div class="lcms-card">
                        <h4>✅ Production Proven</h4>
                        <p>Proven with multiple client brands in production</p>
                    </div>
                    <div class="lcms-card">
                        <h4>📖 Open Documentation</h4>
                        <p>Open documentation and extensible architecture</p>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// NEXT STEPS TIMELINE
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Product Roadmap',
            'subtitle' => 'What\'s next for Brand Hub',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="grid-3col">
                <div class="lcms-card">
                    <h4>⚡ Immediate (Current)</h4>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Template library system operational</li>
                        <li class="lcms-list__item">9 core components documented</li>
                        <li class="lcms-list__item">3 production recipes available</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🎯 Short-term (1-3 months)</h4>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Expand component library to 30+ components</li>
                        <li class="lcms-list__item">Add 10+ recipes for common page types</li>
                        <li class="lcms-list__item">PHP generator automation</li>
                        <li class="lcms-list__item">Enhanced AI integration</li>
                    </ul>
                </div>

                <div class="lcms-card">
                    <h4>🚀 Long-term (6-12 months)</h4>
                    <ul class="lcms-list lcms-list--check">
                        <li class="lcms-list__item">Visual template builder interface</li>
                        <li class="lcms-list__item">Multi-language support</li>
                        <li class="lcms-list__item">Advanced theme system</li>
                        <li class="lcms-list__item">Marketplace for community components</li>
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
            'title' => 'Ready to Streamline Your Brand Management?',
            'subtitle' => 'Join the future of WordPress brand hubs',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>LeanCMS Brand Hub brings enterprise-level brand consistency to WordPress. With our component library, recipe system, and AI-ready architecture, you can deploy on-brand pages faster than ever.</p>',
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
                'url' => '/docs',
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
                <p><strong>Status:</strong> Beta - Accepting Early Adopters</p>
                <p><strong>Last Updated:</strong> November 18, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
