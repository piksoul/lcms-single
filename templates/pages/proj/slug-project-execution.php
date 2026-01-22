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
        <span class="status-badge status-in-progress">Execution Phase</span>
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
                                    <h3>📋 Execution </h3>
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
                                    <h4 class="mb-16" style="color: #4CAF50;">Tasks</h4>
                                    <ul class="list check-list">
                                        <li>Character design specifications and style guide</li>
                                        <li>3D coordinate pose system developed</li>
                                        <li>Directive Control Vocabulary established</li>
                                        <li>Repository structure and documentation framework</li>
                                        <li>36-move animation specification defined</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: var(--color-brand-primary);">Deliverables</h4>
                                    <ul class="list check-list in-progress">
                                        <li>Master prompt templates creation</li>
                                        <li>JSON schemas for pose data validation</li>
                                        <li>Asset pipeline documentation</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="mb-16" style="color: #999;">Other</h4>
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
        ],
        'gap' => '30px',
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
