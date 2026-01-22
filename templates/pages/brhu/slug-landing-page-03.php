<?php
/**
 * LeanCMS Brand Hub - Image-Rich Landing Page
 *
 * Centralized brand management for WordPress
 * Generated using landing-page recipe with enhanced image integration
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   brhu/slug-landing-page-03.php
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
// HERO IMAGE
// ============================================
partial('column', [
    'settings' => [
        'custom_css' => 'padding-top: 0; padding-bottom: 60px;',
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--wide">
                <figure class="lcms-figure">
                    <img
                        src="https://static.brand-hub.com.au/client/placeholder1.jpg"
                        alt="LeanCMS Brand Hub Dashboard Interface"
                        loading="lazy"
                        class="lcms-image lcms-image--responsive"
                        width="1200"
                        height="675"
                    />
                    <figcaption class="lcms-figure__caption">Modern brand management interface with component library</figcaption>
                </figure>
            </div>
        ',
    ],
], 'pro-sites');

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
// VALUE PROPS - VISUAL ACCENT
// ============================================
partial('column', [
    'settings' => [
        'dark_mode' => false,
        'custom_css' => 'padding-top: 0;',
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <div class="lcms-container lcms-container--wide">
                <figure class="lcms-figure">
                    <img
                        src="https://static.brand-hub.com.au/client/placeholder2.jpg"
                        alt="Component library structure diagram"
                        loading="lazy"
                        class="lcms-image lcms-image--responsive"
                        width="1200"
                        height="675"
                    />
                    <figcaption class="lcms-figure__caption">Organized component hierarchy: Widgets → Sections → Patterns</figcaption>
                </figure>
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
// SHOWCASE SECTION - IMAGE-RICH FEATURES
// ============================================
partial('column', [
    'settings' => ['dark_mode' => true],
    'header' => [
        'heading' => [
            'title' => 'Powerful Features',
            'subtitle' => 'Everything you need for brand management success',
            'align' => 'center',
        ],
    ],
    'content' => [
        'type' => 'html',
        'html' => '
            <!-- Feature 1: Image Left, Text Right -->
            <div class="lcms-feature-block">
                <div class="grid-2col lcms-grid--align-center" style="gap: 60px; margin-bottom: 80px;">
                    <figure class="lcms-figure">
                        <img
                            src="https://static.brand-hub.com.au/client/placeholder3.jpg"
                            alt="Component library browser interface"
                            loading="lazy"
                            class="lcms-image lcms-image--responsive lcms-image--rounded"
                            width="600"
                            height="400"
                        />
                    </figure>
                    <div class="lcms-stack gap-16">
                        <h3>Visual Component Library</h3>
                        <p class="lcms-text--large">Browse and select from 50+ pre-built components with live previews. Each component includes documentation, usage examples, and customization options.</p>
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item">Comprehensive widget catalog</li>
                            <li class="lcms-list__item">Section templates ready to deploy</li>
                            <li class="lcms-list__item">Complex pattern compositions</li>
                            <li class="lcms-list__item">Live preview functionality</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Feature 2: Text Left, Image Right -->
            <div class="lcms-feature-block">
                <div class="grid-2col lcms-grid--align-center" style="gap: 60px; margin-bottom: 80px;">
                    <div class="lcms-stack gap-16">
                        <h3>Brand Configuration Dashboard</h3>
                        <p class="lcms-text--large">Manage all your client brands from a single, intuitive interface. Update colors, typography, and assets with instant preview across all templates.</p>
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item">Centralized brand settings</li>
                            <li class="lcms-list__item">Real-time preview updates</li>
                            <li class="lcms-list__item">Multi-client management</li>
                            <li class="lcms-list__item">Asset library integration</li>
                        </ul>
                    </div>
                    <figure class="lcms-figure">
                        <img
                            src="https://static.brand-hub.com.au/client/placeholder4.jpg"
                            alt="Brand configuration interface"
                            loading="lazy"
                            class="lcms-image lcms-image--responsive lcms-image--rounded"
                            width="600"
                            height="400"
                        />
                    </figure>
                </div>
            </div>

            <!-- Feature 3: Image Left, Text Right -->
            <div class="lcms-feature-block">
                <div class="grid-2col lcms-grid--align-center" style="gap: 60px;">
                    <figure class="lcms-figure">
                        <img
                            src="https://static.brand-hub.com.au/client/placeholder5.jpg"
                            alt="Template recipe builder"
                            loading="lazy"
                            class="lcms-image lcms-image--responsive lcms-image--rounded"
                            width="600"
                            height="400"
                        />
                    </figure>
                    <div class="lcms-stack gap-16">
                        <h3>Template Recipe System</h3>
                        <p class="lcms-text--large">Choose from pre-built recipes or create custom layouts using our drag-and-drop interface. AI assists with content placement and component selection.</p>
                        <ul class="lcms-list lcms-list--check">
                            <li class="lcms-list__item">Pre-built page templates</li>
                            <li class="lcms-list__item">AI-assisted composition</li>
                            <li class="lcms-list__item">Custom recipe creation</li>
                            <li class="lcms-list__item">Guided workflow system</li>
                        </ul>
                    </div>
                </div>
            </div>
        ',
    ],
], 'pro-sites');

// ============================================
// BENEFITS & FEATURES
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
    'settings' => ['dark_mode' => true],
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
    'settings' => ['dark_mode' => false],
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
                        <li class="lcms-list__item">Visual template builder interface</li>
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
            'title' => 'Ready to Transform Your Brand Management?',
            'subtitle' => 'See LeanCMS Brand Hub in action',
            'align' => 'center'
        ],
    ],
    'content' => [
        'type' => 'text',
        'text' => '<p>Join forward-thinking agencies using centralized brand management. Schedule a personalized demo and discover how LeanCMS Brand Hub scales your client work.</p>',
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
                'url' => '/components',
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
                <p><strong>Status:</strong> Production Ready - Managing 5+ Client Brands</p>
                <p><strong>Last Updated:</strong> November 18, 2025</p>
            </div>
        ',
    ],
], 'pro-sites');
?>

<?php get_footer(); ?>
