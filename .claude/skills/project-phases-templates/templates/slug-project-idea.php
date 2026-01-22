<?php
/**
 * {{CLIENT_NAME}} - Idea Phase
 *
 * Project inception, research, and feasibility analysis phase
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-idea.php
 * @since      1.3.7
 * @created    {{CURRENT_DATE}}
 */

defined('ABSPATH') || exit;
get_header();

// Load CSS configurations
$global_config = include(LEANCMS_PLUGIN_DIR . 'templates/assets/global/config.php');
$css_vars = $global_config['css_variables'] ?? [];

// Load client config if exists
$client_config_path = LEANCMS_PLUGIN_DIR . 'templates/pages/{{CLIENT_CODE}}/config.php';
if (file_exists($client_config_path)) {
	$client_config = include($client_config_path);
	$css_vars = array_merge($css_vars, $client_config['css_variables'] ?? []);
}
?>

<!-- Base Structural CSS -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/base.css">

<!-- CSS Variables -->
<style id="brand-css-variables">
:root {
<?php foreach ($css_vars as $key => $value): ?>
	--<?php echo esc_attr($key); ?>: <?php echo esc_attr($value); ?>;
<?php endforeach; ?>
	--color-brand-primary: {{BRAND_PRIMARY}};
	--color-brand-secondary: {{BRAND_SECONDARY}};
}
</style>

<!-- Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<?php
// ============================================
// HERO SECTION
// ============================================
partial('page-header', [
	'pre_html' => '<div style="text-align: center; margin-bottom: 15px;">
		<span class="status-badge status-in-progress">Idea Phase</span>
	</div>',
	'title' => '{{PROJECT_TITLE}}',
	'subtitle' => 'Phase 1: Idea',
], 'top-section');

// ============================================
// PHASE SUMMARY
// ============================================
partial('column', [
	'settings' => [
		'custom_classes' => 'inner-card summary-card mt--50 pt-0 pb-0',
	],
	'content' => [
		'type' => 'stack',
		'items' => [
			// Idea Phase
			[
				'type' => 'html',
				'content' => [
					'html' => '
						<div class="content-column">
							<div class="progress-bar-container">
								<div class="progress-bar-header flex justify-space-between align-flex-start">
									<h3>💡 Idea</h3>
									<span class="status-badge status-in-progress">In Progress</span>
								</div>
								<div class="progress-bar-indicator">
									<div class="progress-bar-fill" style="width: 50%;">50%</div>
								</div>
							</div>
							<hr />
							<div class="grid-3col mt-24">
								<div>
									<h4 class="mb-16" style="color: #4CAF50;">✓ Completed Tasks</h4>
									<ul class="list check-list">
										<li>Project inception</li>
										<li>Initial research</li>
										<li>Problem definition</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: {{BRAND_PRIMARY}};">⏳ In Progress</h4>
									<ul class="list check-list in-progress">
										<li>Feasibility analysis</li>
										<li>Stakeholder interviews</li>
										<li>Competitive research</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: #999;">○ Upcoming</h4>
									<ul class="list check-list upcoming">
										<li>Concept validation</li>
										<li>Budget estimation</li>
										<li>Timeline proposal</li>
									</ul>
								</div>
							</div>
						</div>
					',
				],
			],
		],
	],
], 'pro-sites');

// ============================================
// OBJECTIVES
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'title' => 'Phase Objectives',
			'subtitle' => 'What we aim to achieve in the Idea phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 30px; border-radius: 12px; border-left: 5px solid {{BRAND_PRIMARY}};">
				<ul style="list-style: none; padding: 0; margin: 0;">
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Validate the Concept:</strong> Ensure the project idea solves a real problem
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Research & Analysis:</strong> Gather data on market needs and competition
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Feasibility Check:</strong> Determine technical, financial, and operational viability
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Preliminary Planning:</strong> Create initial timelines and resource estimates
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Stakeholder Alignment:</strong> Gain early buy-in from key stakeholders
					</li>
				</ul>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// KEY ACTIVITIES
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => false,
	],
	'header' => [
		'heading' => [
			'title' => 'Key Activities',
			'subtitle' => 'Core tasks in the Idea phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🔍 Research</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Market analysis</li>
						<li style="padding: 6px 0;">• User research</li>
						<li style="padding: 6px 0;">• Competitor analysis</li>
						<li style="padding: 6px 0;">• Technology review</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">💭 Ideation</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Brainstorming sessions</li>
						<li style="padding: 6px 0;">• Concept sketches</li>
						<li style="padding: 6px 0;">• Feature lists</li>
						<li style="padding: 6px 0;">• Use case scenarios</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📋 Documentation</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Project brief</li>
						<li style="padding: 6px 0;">• Research findings</li>
						<li style="padding: 6px 0;">• Initial requirements</li>
						<li style="padding: 6px 0;">• Risk log</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">👥 Stakeholders</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Stakeholder mapping</li>
						<li style="padding: 6px 0;">• Initial meetings</li>
						<li style="padding: 6px 0;">• Feedback collection</li>
						<li style="padding: 6px 0;">• Alignment sessions</li>
					</ul>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// DELIVERABLES
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => true,
	],
	'header' => [
		'heading' => [
			'title' => 'Phase Deliverables',
			'subtitle' => 'Expected outputs from the Idea phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📄 Project Brief</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Detailed project description, goals, and vision</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📊 Feasibility Study</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Analysis of technical, financial, and operational viability</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🎯 Initial Requirements</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">High-level feature requirements and user needs</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">💰 Budget Estimate</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Preliminary cost projections and resource needs</p>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// NEXT STEPS
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'title' => 'Next Steps',
			'subtitle' => 'Moving to Evaluation phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="background: linear-gradient(135deg, {{BRAND_PRIMARY}} 0%, {{BRAND_SECONDARY}} 100%); color: white; padding: 40px; border-radius: 12px; text-align: center;">
				<h3 style="margin: 0 0 15px; font-size: 24px;">Ready for Evaluation?</h3>
				<p style="margin: 0 0 25px; font-size: 16px; opacity: 0.9;">Once the Idea phase is complete, we\'ll move to detailed evaluation and planning.</p>
				<div style="display: inline-block; padding: 12px 24px; background: rgba(255,255,255,0.2); border-radius: 8px; font-weight: 600;">
					Phase 2: Evaluation →
				</div>
			</div>
		',
	],
], 'pro-sites');
?>

<?php get_footer(); ?>
