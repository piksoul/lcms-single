<?php
/**
 * {{CLIENT_NAME}} - Evaluation Phase
 *
 * Project validation, planning, and stakeholder approval phase
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-evaluation.php
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
		<span class="status-badge status-upcoming">Evaluation Phase</span>
	</div>',
	'title' => '{{PROJECT_TITLE}}',
	'subtitle' => 'Phase 2: Evaluation',
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
			// Evaluation Phase
			[
				'type' => 'html',
				'content' => [
					'html' => '
						<div class="content-column">
							<div class="progress-bar-container">
								<div class="progress-bar-header flex justify-space-between align-flex-start">
									<h3>📊 Evaluation</h3>
									<span class="status-badge status-upcoming">Not Started</span>
								</div>
								<div class="progress-bar-indicator">
									<div class="progress-bar-fill" style="width: 0%;">0%</div>
								</div>
							</div>
							<hr />
							<div class="grid-3col mt-24">
								<div>
									<h4 class="mb-16" style="color: #4CAF50;">✓ Prerequisites</h4>
									<ul class="list check-list">
										<li>Idea phase complete</li>
										<li>Project brief approved</li>
										<li>Feasibility confirmed</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: {{BRAND_PRIMARY}};">⏳ Key Tasks</h4>
									<ul class="list check-list upcoming">
										<li>Requirements analysis</li>
										<li>Risk assessment</li>
										<li>Resource planning</li>
										<li>Budget finalization</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: #999;">○ Approvals Needed</h4>
									<ul class="list check-list upcoming">
										<li>Stakeholder sign-off</li>
										<li>Budget approval</li>
										<li>Go/No-go decision</li>
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
			'subtitle' => 'What we aim to achieve in the Evaluation phase',
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
						<strong>Detailed Requirements:</strong> Define comprehensive functional and technical requirements
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Risk Management:</strong> Identify, assess, and plan mitigation for project risks
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Resource Allocation:</strong> Finalize team structure and resource commitments
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Project Plan:</strong> Create detailed timeline, milestones, and success criteria
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Stakeholder Approval:</strong> Secure formal commitment to proceed
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
			'subtitle' => 'Core tasks in the Evaluation phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📝 Requirements</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Functional specs</li>
						<li style="padding: 6px 0;">• Technical requirements</li>
						<li style="padding: 6px 0;">• User stories</li>
						<li style="padding: 6px 0;">• Acceptance criteria</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">⚠️ Risk Analysis</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Risk identification</li>
						<li style="padding: 6px 0;">• Impact assessment</li>
						<li style="padding: 6px 0;">• Mitigation planning</li>
						<li style="padding: 6px 0;">• Contingency plans</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📅 Planning</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Project timeline</li>
						<li style="padding: 6px 0;">• Milestone definition</li>
						<li style="padding: 6px 0;">• Resource schedule</li>
						<li style="padding: 6px 0;">• Dependency mapping</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">💼 Governance</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Decision framework</li>
						<li style="padding: 6px 0;">• Change control</li>
						<li style="padding: 6px 0;">• Quality standards</li>
						<li style="padding: 6px 0;">• Communication plan</li>
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
			'subtitle' => 'Expected outputs from the Evaluation phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📋 Requirements Document</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Comprehensive functional and technical specifications</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🎯 Project Plan</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Detailed timeline, milestones, and resource allocation</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">⚠️ Risk Register</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Identified risks with mitigation strategies</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">✅ Approval Documents</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Stakeholder sign-offs and go-ahead authorization</p>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// DECISION GATE
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'title' => 'Go/No-Go Decision',
			'subtitle' => 'Critical evaluation checkpoint',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="background: linear-gradient(135deg, #FFA726 0%, #FF6B35 100%); color: white; padding: 40px; border-radius: 12px; text-align: center;">
				<h3 style="margin: 0 0 15px; font-size: 24px;">⚡ Decision Point</h3>
				<p style="margin: 0 0 25px; font-size: 16px; opacity: 0.9;">At the end of this phase, stakeholders will make the final decision to proceed with execution or pivot based on findings.</p>
				<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; max-width: 500px; margin: 0 auto;">
					<div style="padding: 15px; background: rgba(255,255,255,0.2); border-radius: 8px; font-weight: 600;">
						✓ Proceed to Execution
					</div>
					<div style="padding: 15px; background: rgba(255,255,255,0.2); border-radius: 8px; font-weight: 600;">
						× Hold or Cancel
					</div>
				</div>
			</div>
		',
	],
], 'pro-sites');
?>

<?php get_footer(); ?>
