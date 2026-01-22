<?php
/**
 * Bulk Pages Admin Form View
 *
 * @package LeanCMS
 * @since 1.3.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bulk_pages = LeanCMS_Bulk_Pages::boot();
$results    = $bulk_pages->get_last_results();
?>

<div class="wrap leancms-bulk-pages">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<p class="description">
		Create multiple WordPress pages at once using JSON templates. Pages will automatically use the LeanCMS template system.
	</p>

	<?php settings_errors( 'leancms_bulk_pages' ); ?>

	<?php if ( ! empty( $results['success'] ) ) : ?>
		<div class="leancms-results-table">
			<h2>Created Pages</h2>
			<table class="wp-list-table widefat fixed striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Client Code</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $results['success'] as $page ) : ?>
						<tr>
							<td><?php echo esc_html( $page['id'] ); ?></td>
							<td><strong><?php echo esc_html( $page['title'] ); ?></strong></td>
							<td><code><?php echo esc_html( $page['slug'] ); ?></code></td>
							<td><?php echo esc_html( $page['client_code'] ?: '—' ); ?></td>
							<td>
								<a href="<?php echo esc_url( $page['edit_url'] ); ?>" class="button button-small">Edit</a>
								<a href="<?php echo esc_url( $page['view_url'] ); ?>" class="button button-small" target="_blank">View</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif; ?>

	<div class="leancms-bulk-form-container">
		<div class="leancms-form-main">
			<form method="post" action="" id="leancms-bulk-pages-form">
				<?php wp_nonce_field( LeanCMS_Bulk_Pages::NONCE_ACTION, LeanCMS_Bulk_Pages::NONCE_NAME ); ?>

				<h2>Create Pages from Template</h2>

				<!-- Preset Selection -->
				<div class="form-section">
					<h3>1. Select Preset Template (Optional)</h3>
					<p class="description">Choose a preset to auto-fill the JSON below, or create your own custom template.</p>

					<div class="preset-controls">
						<select id="leancms-preset-select" class="regular-text">
							<option value="">— Custom Template —</option>
							<?php foreach ( $bulk_pages->get_preset_templates() as $key => $preset ) : ?>
								<option value="<?php echo esc_attr( $key ); ?>">
									<?php echo esc_html( $preset['name'] ); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div id="leancms-preset-description" style="display: none; margin-top: 10px;">
						<p class="description" id="leancms-preset-description-text"></p>
					</div>

					<div id="leancms-variable-inputs" style="display: none; margin-top: 15px;">
						<h4>Template Variables</h4>
						<p class="description">These values will replace {{CLIENT_CODE}} and {{CLIENT_NAME}} in the template.</p>
						<table class="form-table">
							<tr>
								<th scope="row">
									<label for="leancms-client-code">Client Code</label>
								</th>
								<td>
									<input type="text" id="leancms-client-code" class="regular-text" placeholder="e.g., refr, brhu" />
									<p class="description">Lowercase letters, numbers, and hyphens only (e.g., "refr", "brhu")</p>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="leancms-client-name">Client Name</label>
								</th>
								<td>
									<input type="text" id="leancms-client-name" class="regular-text" placeholder="e.g., Reference Creative" />
									<p class="description">Full client name for page titles</p>
								</td>
							</tr>
						</table>
						<button type="button" id="leancms-apply-preset" class="button button-secondary">Apply Preset with Variables</button>
					</div>
				</div>

				<!-- JSON Template -->
				<div class="form-section">
					<h3>2. Define Pages (JSON)</h3>
					<p class="description">
						Define your pages in JSON format. Each page object supports:
						<code>page-title</code> (required),
						<code>parent</code> (page ID or slug),
						<code>client-code</code>,
						<code>slug</code>,
						<code>dynamic-template</code>
					</p>

					<textarea
						name="pages_json"
						id="leancms-pages-json"
						rows="20"
						class="large-text code"
						placeholder='[
  {
    "page-title": "Brand Guide",
    "parent": 0,
    "client-code": "refr",
    "slug": "refr-brand-guide"
  },
  {
    "page-title": "Colors",
    "parent": "refr-brand-guide",
    "client-code": "refr",
    "slug": "refr-colors"
  }
]'
					><?php echo isset( $_POST['pages_json'] ) ? esc_textarea( wp_unslash( $_POST['pages_json'] ) ) : ''; ?></textarea>

					<div id="leancms-json-validation" style="margin-top: 10px;"></div>
				</div>

				<!-- Submit -->
				<div class="form-section">
					<h3>3. Create Pages</h3>
					<?php submit_button( 'Create Pages', 'primary', 'submit', false ); ?>
					<button type="button" id="leancms-validate-json" class="button button-secondary" style="margin-left: 10px;">Validate JSON</button>
				</div>
			</form>
		</div>

		<!-- Sidebar with Help -->
		<div class="leancms-form-sidebar">
			<div class="postbox">
				<h3 class="hndle">JSON Template Format</h3>
				<div class="inside">
					<h4>Required Fields</h4>
					<ul>
						<li><code>page-title</code> - The page title</li>
					</ul>

					<h4>Optional Fields</h4>
					<ul>
						<li><code>parent</code> - Parent page ID or slug (0 for top-level)</li>
						<li><code>client-code</code> - Client identifier for template routing</li>
						<li><code>slug</code> - Custom URL slug (auto-generated: top-level uses <code>client-code-title</code>, children use <code>title</code>)</li>
						<li><code>dynamic-template</code> - PHP template code (stored in database)</li>
					</ul>

					<h4>Example</h4>
					<pre><code>[
  {
    "page-title": "Parent Page",
    "parent": 0,
    "client-code": "refr",
    "slug": "parent-page"
  },
  {
    "page-title": "Child Page",
    "parent": "parent-page",
    "client-code": "refr",
    "slug": "child-page"
  }
]</code></pre>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle">Important Notes</h3>
				<div class="inside">
					<ul>
						<li><strong>Parent Order:</strong> Parent pages must appear <em>before</em> child pages in the JSON array</li>
						<li><strong>Client Code:</strong> Used for template folder routing (e.g., <code>templates/pages/refr/</code>)</li>
						<li><strong>Slug Generation:</strong> Top-level pages use <code>{client-code}-{title}</code>, child pages use just <code>{title}</code></li>
						<li><strong>URL Structure:</strong> Child pages inherit parent path (e.g., <code>refr-brand-guide/colors</code>)</li>
						<li><strong>Template System:</strong> All pages automatically use the LeanCMS Full Page template</li>
						<li><strong>Dynamic Templates:</strong> Support for database-stored layouts coming soon</li>
					</ul>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle">Integration with Pro-Sites</h3>
				<div class="inside">
					<p>After creating pages, you can build layouts using the pro-sites partial system:</p>
					<ol>
						<li>Create template file in <code>templates/pages/</code></li>
						<li>Use partials like <code>partial('column', [...], 'pro-sites')</code></li>
						<li>Leverage the modular layout system</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
.leancms-bulk-pages {
	max-width: 1400px;
}

.leancms-bulk-form-container {
	display: flex;
	gap: 30px;
	margin-top: 20px;
}

.leancms-form-main {
	flex: 1;
	min-width: 0;
}

.leancms-form-sidebar {
	width: 350px;
	flex-shrink: 0;
}

.form-section {
	margin-bottom: 30px;
	padding: 20px;
	background: #fff;
	border: 1px solid #ccd0d4;
	box-shadow: 0 1px 1px rgba(0,0,0,.04);
}

.form-section h3 {
	margin-top: 0;
	padding-bottom: 10px;
	border-bottom: 1px solid #ddd;
}

.preset-controls {
	margin-top: 10px;
}

#leancms-pages-json {
	font-family: Consolas, Monaco, monospace;
	font-size: 13px;
	line-height: 1.6;
}

#leancms-json-validation {
	padding: 10px;
	border-radius: 3px;
}

#leancms-json-validation.valid {
	background: #d4edda;
	color: #155724;
	border: 1px solid #c3e6cb;
}

#leancms-json-validation.invalid {
	background: #f8d7da;
	color: #721c24;
	border: 1px solid #f5c6cb;
}

.leancms-results-table {
	background: #fff;
	padding: 20px;
	margin: 20px 0;
	border: 1px solid #ccd0d4;
	box-shadow: 0 1px 1px rgba(0,0,0,.04);
}

.leancms-results-table h2 {
	margin-top: 0;
}

.postbox .inside {
	padding: 15px;
}

.postbox h4 {
	margin-top: 15px;
	margin-bottom: 5px;
}

.postbox h4:first-child {
	margin-top: 0;
}

.postbox ul {
	margin: 5px 0 15px 20px;
}

.postbox code {
	background: #f0f0f1;
	padding: 2px 6px;
	border-radius: 3px;
}

.postbox pre {
	background: #f6f7f7;
	padding: 10px;
	border: 1px solid #ddd;
	border-radius: 3px;
	overflow-x: auto;
	font-size: 12px;
	line-height: 1.5;
}

.postbox pre code {
	background: none;
	padding: 0;
}

@media (max-width: 1200px) {
	.leancms-bulk-form-container {
		flex-direction: column;
	}

	.leancms-form-sidebar {
		width: 100%;
	}
}
</style>
