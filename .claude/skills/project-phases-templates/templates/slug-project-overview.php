<?php
/**
 * {{CLIENT_NAME}} - Project Overview
 *
 * Project overview page with progress tracking, milestones, and key information
 *
 * @package    LeanCMS_Plugin
 * @subpackage Templates/Pages
 * @filepath   templates/pages/{{CLIENT_CODE}}/slug-project-overview.php
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
	/* {{CLIENT_NAME}} custom overrides */
	--color-brand-primary: {{BRAND_PRIMARY}};
	--color-brand-secondary: {{BRAND_SECONDARY}};
}
</style>

<!-- Component Styles -->
<link rel="stylesheet" href="<?php echo LEANCMS_PLUGIN_URL; ?>templates/assets/global/document-system.css">

<!-- Custom Styles -->
<style>
.progress-indicator {
	background: linear-gradient(135deg, #f0f0f0 0%, #ffffff 100%);
	border-radius: 12px;
	padding: 30px;
	margin-bottom: 30px;
	border-left: 5px solid var(--progress-color, #666);
}

.progress-indicator h3 {
	font-family: var(--font-heading);
	font-size: 24px;
	margin: 0 0 15px;
	display: flex;
	align-items: center;
	gap: 10px;
}

.progress-bar-container {
	background: #e0e0e0;
	height: 30px;
	border-radius: 15px;
	overflow: hidden;
	margin: 15px 0;
}

.progress-bar-fill {
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	color: white;
	font-weight: bold;
	font-size: 14px;
	transition: width 0.6s ease;
}

.status-badge {
	float: right;
	margin-top: 5px;
	padding: 6px 14px;
	border-radius: 12px;
	font-size: 12px;
	text-transform: uppercase;
	font-weight: 600;
}

.status-in-progress {
	background: {{BRAND_SECONDARY}};
	color: white;
}

.status-complete {
	background: #4CAF50;
	color: white;
}

.status-upcoming {
	background: #999;
	color: white;
}

.phase-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
	gap: 25px;
	margin: 30px 0;
}

.phase-card {
	background: white;
	border: 2px solid #e0e0e0;
	border-radius: 12px;
	padding: 25px;
	transition: all 0.3s ease;
}

.phase-card:hover {
	border-color: {{BRAND_SECONDARY}};
	box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
	transform: translateY(-3px);
}

.phase-card h4 {
	font-family: var(--font-heading);
	font-size: 20px;
	margin: 0 0 15px;
	color: {{BRAND_PRIMARY}};
}

.phase-card .phase-status {
	display: inline-block;
	padding: 4px 10px;
	border-radius: 12px;
	font-size: 11px;
	font-weight: 600;
	text-transform: uppercase;
	margin-bottom: 15px;
}

.milestone-list {
	list-style: none;
	padding: 0;
	margin: 15px 0;
}

.milestone-list li {
	padding: 8px 0 8px 30px;
	position: relative;
	line-height: 1.6;
	font-size: 14px;
}

.milestone-list.completed li:before {
	content: "✓";
	position: absolute;
	left: 0;
	color: #4CAF50;
	font-weight: bold;
	font-size: 18px;
}

.milestone-list.in-progress li:before {
	content: "◐";
	position: absolute;
	left: 0;
	color: {{BRAND_SECONDARY}};
	font-weight: bold;
	font-size: 18px;
}

.milestone-list.upcoming li:before {
	content: "○";
	position: absolute;
	left: 0;
	color: #999;
	font-size: 18px;
}

@media (max-width: 768px) {
	.phase-grid {
		grid-template-columns: 1fr;
		gap: 20px;
	}
}
</style>

<?php
// ============================================
// HERO SECTION
// ============================================
partial('page-header', [
	'title' => '{{PROJECT_TITLE}}',
	'subtitle' => 'Project Overview & Progress Dashboard',
], 'top-section');

// ============================================
// PROJECT SUMMARY
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'label' => 'Project Overview',
			'title' => 'About This Project',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'text',
		'text' => '<p style="text-align: center; font-size: 20px; line-height: 1.8;">This project follows a structured four-phase approach: Idea, Evaluation, Execution, and Handover. Each phase builds upon the previous, ensuring thorough planning, validation, implementation, and successful delivery.</p>',
		'format' => 'lead',
	],
], 'pro-sites');

// ============================================
// OVERALL PROGRESS
// ============================================
partial('column', [
	'header' => [
		'heading' => [
			'label' => 'Status',
			'title' => 'Overall Project Progress',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div class="progress-indicator" style="--progress-color: {{BRAND_SECONDARY}};">
				<h3>Overall Progress <span class="status-badge status-in-progress">In Progress</span></h3>
				<div class="progress-bar-container">
					<div class="progress-bar-fill" style="width: 25%; background: linear-gradient(90deg, {{BRAND_PRIMARY}} 0%, {{BRAND_SECONDARY}} 100%);">25%</div>
				</div>

				<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px; margin: 20px 0;">
					<div style="text-align: center;">
						<div style="font-size: 28px; font-weight: 700; color: {{BRAND_PRIMARY}};">1/4</div>
						<div style="font-size: 13px; color: #666;">Phases Complete</div>
					</div>
					<div style="text-align: center;">
						<div style="font-size: 28px; font-weight: 700; color: {{BRAND_PRIMARY}};">--</div>
						<div style="font-size: 13px; color: #666;">Days Elapsed</div>
					</div>
					<div style="text-align: center;">
						<div style="font-size: 28px; font-weight: 700; color: {{BRAND_PRIMARY}};">--</div>
						<div style="font-size: 13px; color: #666;">Milestones</div>
					</div>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// PHASE OVERVIEW
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => false,
	],
	'header' => [
		'heading' => [
			'title' => 'Project Phases',
			'subtitle' => 'Four-phase structured approach',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div class="phase-grid">
				<div class="phase-card">
					<span class="phase-status status-complete">Phase 1</span>
					<h4>💡 Idea</h4>
					<p style="margin: 0 0 15px; font-size: 14px; color: #666;">Conception, research, and feasibility analysis</p>
					<ul class="milestone-list completed">
						<li>Project inception</li>
						<li>Initial research</li>
						<li>Feasibility study</li>
					</ul>
				</div>

				<div class="phase-card">
					<span class="phase-status status-in-progress">Phase 2</span>
					<h4>📊 Evaluation</h4>
					<p style="margin: 0 0 15px; font-size: 14px; color: #666;">Validation, planning, and stakeholder approval</p>
					<ul class="milestone-list in-progress">
						<li>Requirements analysis</li>
						<li>Risk assessment</li>
						<li>Stakeholder approval</li>
					</ul>
				</div>

				<div class="phase-card">
					<span class="phase-status status-upcoming">Phase 3</span>
					<h4>🚀 Execution</h4>
					<p style="margin: 0 0 15px; font-size: 14px; color: #666;">Implementation, development, and delivery</p>
					<ul class="milestone-list upcoming">
						<li>Development</li>
						<li>Testing</li>
						<li>Deployment</li>
					</ul>
				</div>

				<div class="phase-card">
					<span class="phase-status status-upcoming">Phase 4</span>
					<h4>✅ Handover</h4>
					<p style="margin: 0 0 15px; font-size: 14px; color: #666;">Transfer, documentation, and closure</p>
					<ul class="milestone-list upcoming">
						<li>Documentation</li>
						<li>Training</li>
						<li>Project closure</li>
					</ul>
				</div>
			</div>
		',
	],
], 'pro-sites');

// ============================================
// KEY INFORMATION
// ============================================
partial('column', [
	'settings' => [
		'dark_mode' => true,
	],
	'header' => [
		'heading' => [
			'title' => 'Project Information',
			'align' => 'center',
		],
	],
	'content' => [
		'type' => 'html',
		'html' => '
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
				<div>
					<h4 style="margin: 0 0 10px; font-size: 16px; opacity: 0.8;">Project Name</h4>
					<p style="margin: 0; font-size: 20px; font-weight: 600;">{{PROJECT_TITLE}}</p>
				</div>
				<div>
					<h4 style="margin: 0 0 10px; font-size: 16px; opacity: 0.8;">Client</h4>
					<p style="margin: 0; font-size: 20px; font-weight: 600;">{{CLIENT_NAME}}</p>
				</div>
				<div>
					<h4 style="margin: 0 0 10px; font-size: 16px; opacity: 0.8;">Start Date</h4>
					<p style="margin: 0; font-size: 20px; font-weight: 600;">{{CURRENT_DATE}}</p>
				</div>
				<div>
					<h4 style="margin: 0 0 10px; font-size: 16px; opacity: 0.8;">Status</h4>
					<p style="margin: 0; font-size: 20px; font-weight: 600;">In Progress</p>
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
				<p style="margin: 0;"><strong>Last Updated:</strong> ' . date('F j, Y') . '</p>
			</div>
		',
	],
], 'pro-sites');
?>

<?php get_footer(); ?>
