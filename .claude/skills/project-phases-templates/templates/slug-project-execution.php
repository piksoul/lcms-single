<?php
/**
 * {{CLIENT_NAME}} - Execution Phase
 *
 * Project implementation, development, and delivery phase
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-execution.php
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
		<span class="status-badge status-upcoming">Execution Phase</span>
	</div>',
	'title' => '{{PROJECT_TITLE}}',
	'subtitle' => 'Phase 3: Execution',
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
			// Execution Phase
			[
				'type' => 'html',
				'content' => [
					'html' => '
						<div class="content-column">
							<div class="progress-bar-container">
								<div class="progress-bar-header flex justify-space-between align-flex-start">
									<h3>🚀 Execution</h3>
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
										<li>Evaluation complete</li>
										<li>Approvals obtained</li>
										<li>Resources allocated</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: {{BRAND_PRIMARY}};">⏳ Key Tasks</h4>
									<ul class="list check-list upcoming">
										<li>Development sprint</li>
										<li>Quality assurance</li>
										<li>Testing & validation</li>
										<li>Deployment prep</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: #999;">○ Deliverables</h4>
									<ul class="list check-list upcoming">
										<li>Working solution</li>
										<li>Test results</li>
										<li>User documentation</li>
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
			'subtitle' => 'What we aim to achieve in the Execution phase',
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
						<strong>Build the Solution:</strong> Develop and implement according to specifications
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Quality Assurance:</strong> Ensure deliverables meet defined standards
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Testing & Validation:</strong> Verify functionality and performance
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Issue Resolution:</strong> Address bugs, defects, and feedback
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Deployment Readiness:</strong> Prepare for production launch
					</li>
				</ul>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// SPRINT STRUCTURE
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => false,
	],
	'header' => [
		'heading' => [
			'title' => 'Development Sprints',
			'subtitle' => 'Iterative execution approach',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
				<div style="background: white; padding: 25px; border-radius: 12px; border-top: 5px solid {{BRAND_PRIMARY}}; text-align: center;">
					<div style="font-size: 32px; margin-bottom: 10px;">📐</div>
					<h4 style="margin: 0 0 10px; color: {{BRAND_PRIMARY}};">Sprint 1</h4>
					<p style="margin: 0; font-size: 14px; color: #666;">Foundation & Core Features</p>
				</div>
				<div style="background: white; padding: 25px; border-radius: 12px; border-top: 5px solid {{BRAND_SECONDARY}}; text-align: center;">
					<div style="font-size: 32px; margin-bottom: 10px;">🔧</div>
					<h4 style="margin: 0 0 10px; color: {{BRAND_PRIMARY}};">Sprint 2</h4>
					<p style="margin: 0; font-size: 14px; color: #666;">Feature Completion & Integration</p>
				</div>
				<div style="background: white; padding: 25px; border-radius: 12px; border-top: 5px solid #4CAF50; text-align: center;">
					<div style="font-size: 32px; margin-bottom: 10px;">✅</div>
					<h4 style="margin: 0 0 10px; color: {{BRAND_PRIMARY}};">Sprint 3</h4>
					<p style="margin: 0; font-size: 14px; color: #666;">Testing & Refinement</p>
				</div>
				<div style="background: white; padding: 25px; border-radius: 12px; border-top: 5px solid #FFA726; text-align: center;">
					<div style="font-size: 32px; margin-bottom: 10px;">🎁</div>
					<h4 style="margin: 0 0 10px; color: {{BRAND_PRIMARY}};">Sprint 4</h4>
					<p style="margin: 0; font-size: 14px; color: #666;">Polish & Deployment Prep</p>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// KEY ACTIVITIES
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'title' => 'Key Activities',
			'subtitle' => 'Core tasks in the Execution phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">💻 Development</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Code implementation</li>
						<li style="padding: 6px 0;">• API integration</li>
						<li style="padding: 6px 0;">• Database design</li>
						<li style="padding: 6px 0;">• Version control</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🧪 Testing</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Unit testing</li>
						<li style="padding: 6px 0;">• Integration testing</li>
						<li style="padding: 6px 0;">• User acceptance</li>
						<li style="padding: 6px 0;">• Performance testing</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📊 Tracking</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Progress monitoring</li>
						<li style="padding: 6px 0;">• Issue tracking</li>
						<li style="padding: 6px 0;">• Status reporting</li>
						<li style="padding: 6px 0;">• Risk management</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📚 Documentation</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Technical docs</li>
						<li style="padding: 6px 0;">• User guides</li>
						<li style="padding: 6px 0;">• API documentation</li>
						<li style="padding: 6px 0;">• Change logs</li>
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
			'subtitle' => 'Expected outputs from the Execution phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🎁 Working Solution</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Fully functional product ready for deployment</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">✅ Test Reports</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Comprehensive testing results and validation</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📖 Documentation</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Complete user and technical documentation</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🚀 Deployment Package</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Production-ready build and deployment scripts</p>
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
			'title' => 'Moving Forward',
			'subtitle' => 'Transition to Handover phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="background: linear-gradient(135deg, {{BRAND_PRIMARY}} 0%, {{BRAND_SECONDARY}} 100%); color: white; padding: 40px; border-radius: 12px; text-align: center;">
				<h3 style="margin: 0 0 15px; font-size: 24px;">Ready for Handover?</h3>
				<p style="margin: 0 0 25px; font-size: 16px; opacity: 0.9;">Once execution is complete and all deliverables are validated, we proceed to the final handover phase.</p>
				<div style="display: inline-block; padding: 12px 24px; background: rgba(255,255,255,0.2); border-radius: 8px; font-weight: 600;">
					Phase 4: Handover →
				</div>
			</div>
		',
	],
], 'pro-sites');
?>

<?php get_footer(); ?>
