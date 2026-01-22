<?php
/**
 * {{CLIENT_NAME}} - Handover Phase
 *
 * Project transfer, documentation, and closure phase
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-handover.php
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
		<span class="status-badge status-upcoming">Handover Phase</span>
	</div>',
	'title' => '{{PROJECT_TITLE}}',
	'subtitle' => 'Phase 4: Handover',
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
			// Handover Phase
			[
				'type' => 'html',
				'content' => [
					'html' => '
						<div class="content-column">
							<div class="progress-bar-container">
								<div class="progress-bar-header flex justify-space-between align-flex-start">
									<h3>✅ Handover</h3>
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
										<li>Execution complete</li>
										<li>All tests passed</li>
										<li>Documentation ready</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: {{BRAND_PRIMARY}};">⏳ Key Tasks</h4>
									<ul class="list check-list upcoming">
										<li>Knowledge transfer</li>
										<li>Training sessions</li>
										<li>Final review</li>
										<li>Project closure</li>
									</ul>
								</div>
								<div>
									<h4 class="mb-16" style="color: #999;">○ Deliverables</h4>
									<ul class="list check-list upcoming">
										<li>Handover document</li>
										<li>Support plan</li>
										<li>Lessons learned</li>
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
			'subtitle' => 'What we aim to achieve in the Handover phase',
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
						<strong>Knowledge Transfer:</strong> Ensure stakeholders understand the solution
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Training & Support:</strong> Empower users to operate and maintain
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Final Validation:</strong> Confirm acceptance and satisfaction
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Project Closure:</strong> Complete administrative and financial closure
					</li>
					<li style="padding: 12px 0 12px 30px; position: relative; line-height: 1.6;">
						<span style="position: absolute; left: 0; color: {{BRAND_SECONDARY}}; font-size: 20px;">▸</span>
						<strong>Lessons Learned:</strong> Capture insights for future projects
					</li>
				</ul>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// HANDOVER CHECKLIST
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => false,
	],
	'header' => [
		'heading' => [
			'title' => 'Handover Checklist',
			'subtitle' => 'Essential items for successful transfer',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📚 Documentation</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• User manuals</li>
						<li style="padding: 6px 0;">• Technical specs</li>
						<li style="padding: 6px 0;">• Admin guides</li>
						<li style="padding: 6px 0;">• Architecture docs</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🎓 Training</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• User training sessions</li>
						<li style="padding: 6px 0;">• Admin workshops</li>
						<li style="padding: 6px 0;">• Video tutorials</li>
						<li style="padding: 6px 0;">• FAQ documentation</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🔑 Access & Credentials</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• System access</li>
						<li style="padding: 6px 0;">• Admin accounts</li>
						<li style="padding: 6px 0;">• API keys</li>
						<li style="padding: 6px 0;">• Repository access</li>
					</ul>
				</div>

				<div style="background: white; padding: 25px; border-radius: 12px; border: 2px solid #e0e0e0;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🛠️ Support</h4>
					<ul style="list-style: none; padding: 0; margin: 0;">
						<li style="padding: 6px 0;">• Support channels</li>
						<li style="padding: 6px 0;">• Maintenance plan</li>
						<li style="padding: 6px 0;">• Escalation process</li>
						<li style="padding: 6px 0;">• SLA agreements</li>
					</ul>
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
			'subtitle' => 'Core tasks in the Handover phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
				<div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 25px; border-radius: 12px; border-left: 5px solid {{BRAND_PRIMARY}};">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">👥 Knowledge Transfer</h4>
					<p style="margin: 0; font-size: 14px; color: #666; line-height: 1.6;">Conduct comprehensive sessions to transfer operational knowledge, best practices, and troubleshooting skills.</p>
				</div>

				<div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 25px; border-radius: 12px; border-left: 5px solid {{BRAND_SECONDARY}};">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">✅ Final Acceptance</h4>
					<p style="margin: 0; font-size: 14px; color: #666; line-height: 1.6;">Obtain formal sign-off from stakeholders confirming satisfaction and project completion.</p>
				</div>

				<div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 25px; border-radius: 12px; border-left: 5px solid #4CAF50;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">🎓 Retrospective</h4>
					<p style="margin: 0; font-size: 14px; color: #666; line-height: 1.6;">Gather team feedback, document lessons learned, and identify improvements for future projects.</p>
				</div>

				<div style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 25px; border-radius: 12px; border-left: 5px solid #FFA726;">
					<h4 style="margin: 0 0 15px; color: {{BRAND_PRIMARY}};">📋 Closure</h4>
					<p style="margin: 0; font-size: 14px; color: #666; line-height: 1.6;">Complete all administrative tasks, release resources, and archive project materials.</p>
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
			'subtitle' => 'Expected outputs from the Handover phase',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📦 Handover Package</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Complete documentation bundle for ongoing operations</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🎓 Training Materials</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">User guides, videos, and reference materials</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">🛡️ Support Plan</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Post-launch support and maintenance agreement</p>
				</div>
				<div style="padding: 25px; background: rgba(255,255,255,0.1); border-radius: 12px; border: 2px solid rgba(255,255,255,0.2);">
					<h4 style="margin: 0 0 10px; font-size: 18px;">📊 Project Report</h4>
					<p style="margin: 0; font-size: 14px; opacity: 0.9;">Final report with metrics and lessons learned</p>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// PROJECT COMPLETION
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'title' => 'Project Completion',
			'subtitle' => 'Successfully delivered',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="background: linear-gradient(135deg, #4CAF50 0%, #45B049 100%); color: white; padding: 50px; border-radius: 12px; text-align: center;">
				<div style="font-size: 64px; margin-bottom: 20px;">🎉</div>
				<h3 style="margin: 0 0 15px; font-size: 32px;">Project Complete!</h3>
				<p style="margin: 0 0 30px; font-size: 18px; opacity: 0.9;">All phases completed successfully. Thank you for your collaboration!</p>
				<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px; max-width: 600px; margin: 0 auto;">
					<div style="padding: 20px; background: rgba(255,255,255,0.2); border-radius: 8px;">
						<div style="font-size: 28px; font-weight: 700; margin-bottom: 5px;">4/4</div>
						<div style="font-size: 14px; opacity: 0.9;">Phases Complete</div>
					</div>
					<div style="padding: 20px; background: rgba(255,255,255,0.2); border-radius: 8px;">
						<div style="font-size: 28px; font-weight: 700; margin-bottom: 5px;">100%</div>
						<div style="font-size: 14px; opacity: 0.9;">Delivered</div>
					</div>
					<div style="padding: 20px; background: rgba(255,255,255,0.2); border-radius: 8px;">
						<div style="font-size: 28px; font-weight: 700; margin-bottom: 5px;">✓</div>
						<div style="font-size: 14px; opacity: 0.9;">Signed Off</div>
					</div>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// FOOTER INFO
// ============================================
partial('column', [
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="text-align: center; padding: 30px 0; color: #999; font-size: 14px;">
				<p style="margin: 0 0 10px;"><strong>Project:</strong> {{PROJECT_TITLE}}</p>
				<p style="margin: 0;"><strong>Completed:</strong> ' . date('F j, Y') . '</p>
			</div>
		',
	],
], 'pro-sites');
?>

<?php get_footer(); ?>
