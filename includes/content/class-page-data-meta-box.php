<?php
/**
 * LeanCMS Page Data Meta Box
 *
 * Provides meta boxes for storing page data and layout in the database.
 * Shows only when "LeanCMS DB Page" template is selected.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-page-data-meta-box.php
 * @since      2.1.9
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'LeanCMS_Page_Data_Meta_Box' ) ) {

	/**
	 * Handles the Page Data and Layout meta boxes for DB-backed pages.
	 */
	final class LeanCMS_Page_Data_Meta_Box {

		/**
		 * Nonce action for security.
		 *
		 * @var string
		 */
		const NONCE_ACTION = 'leancms_page_data_save';

		/**
		 * Nonce field name.
		 *
		 * @var string
		 */
		const NONCE_NAME = 'leancms_page_data_nonce';

		/**
		 * AJAX nonce action for import.
		 *
		 * @var string
		 */
		const AJAX_NONCE_ACTION = 'leancms_import_template';

		/**
		 * Singleton instance.
		 *
		 * @var self|null
		 */
		private static $instance = null;

		/**
		 * Bootstrap the meta box singleton.
		 */
		public static function boot(): self {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register hooks.
		 */
		private function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
			add_action( 'save_post_page', array( $this, 'save_meta_boxes' ), 10, 2 );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
			add_action( 'admin_footer', array( $this, 'render_template_toggle_script' ) );

			// AJAX handlers for import functionality.
			add_action( 'wp_ajax_leancms_get_clients', array( $this, 'ajax_get_clients' ) );
			add_action( 'wp_ajax_leancms_get_templates', array( $this, 'ajax_get_templates' ) );
			add_action( 'wp_ajax_leancms_import_config', array( $this, 'ajax_import_config' ) );
			add_action( 'wp_ajax_leancms_import_layout', array( $this, 'ajax_import_layout' ) );
		}

		/**
		 * Ensure cloning is disabled.
		 */
		private function __clone() {}

		/**
		 * Ensure unserializing is disabled.
		 */
		public function __wakeup() {
			throw new \RuntimeException( 'Cannot unserialize singleton' );
		}

		/**
		 * Register meta boxes for pages.
		 */
		public function register_meta_boxes(): void {
			add_meta_box(
				'leancms_page_data',
				__( 'LeanCMS Data', 'brandhub-client-cms' ),
				array( $this, 'render_data_meta_box' ),
				'page',
				'normal',
				'high'
			);

			add_meta_box(
				'leancms_page_layout',
				__( 'LeanCMS Layout', 'brandhub-client-cms' ),
				array( $this, 'render_layout_meta_box' ),
				'page',
				'normal',
				'high'
			);
		}

		/**
		 * Enqueue admin assets for the meta boxes.
		 *
		 * @param string $hook Current admin page hook.
		 */
		public function enqueue_admin_assets( string $hook ): void {
			if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
				return;
			}

			$screen = get_current_screen();
			if ( ! $screen || 'page' !== $screen->post_type ) {
				return;
			}

			// Enqueue CodeMirror for PHP editing.
			wp_enqueue_code_editor( array( 'type' => 'application/x-php' ) );
			wp_enqueue_script( 'wp-theme-plugin-editor' );
			wp_enqueue_style( 'wp-codemirror' );

			// Enqueue jQuery UI Sortable for drag-drop reordering.
			wp_enqueue_script( 'jquery-ui-sortable' );

			// Inline styles for the meta boxes.
			wp_add_inline_style( 'wp-codemirror', $this->get_inline_styles() );
		}

		/**
		 * Get inline styles for the meta boxes.
		 *
		 * @return string CSS styles.
		 */
		private function get_inline_styles(): string {
			return '
				.leancms-metabox-content {
					padding: 12px 0;
				}
				.leancms-field-group {
					margin-bottom: 16px;
				}
				.leancms-field-group:last-child {
					margin-bottom: 0;
				}
				.leancms-field-label {
					display: block;
					margin-bottom: 8px;
					font-weight: 600;
					font-size: 13px;
				}
				.leancms-field-description {
					margin: 8px 0 0;
					font-size: 12px;
					color: #646970;
					line-height: 1.5;
				}
				.leancms-code-editor {
					border: 1px solid #dcdcde;
					border-radius: 4px;
					overflow: hidden;
				}
				.leancms-code-editor .CodeMirror {
					height: auto;
					min-height: 200px;
					max-height: 70vh;
					font-size: 13px;
					line-height: 1.5;
					overflow-y: auto !important;
				}
				.leancms-code-editor .CodeMirror-scroll {
					min-height: 200px;
					max-height: 70vh;
					overflow-y: auto !important;
				}
				.leancms-code-editor textarea {
					width: 100%;
					min-height: 200px;
					font-family: Consolas, Monaco, monospace;
					font-size: 13px;
					line-height: 1.5;
					padding: 12px;
					border: none;
					resize: vertical;
				}
				.leancms-template-notice {
					padding: 12px 16px;
					background: #f0f6fc;
					border: 1px solid #c5d9ed;
					border-radius: 4px;
					margin-bottom: 16px;
				}
				.leancms-template-notice.notice-warning {
					background: #fcf9e8;
					border-color: #dba617;
				}
				.leancms-template-notice p {
					margin: 0;
					font-size: 13px;
				}
				.leancms-hidden {
					display: none !important;
				}
				.leancms-example-code {
					background: #f6f7f7;
					padding: 12px;
					border-radius: 4px;
					margin-top: 12px;
					font-size: 12px;
					overflow-x: auto;
				}
				.leancms-example-code pre {
					margin: 0;
					white-space: pre-wrap;
					font-family: Consolas, Monaco, monospace;
				}
				.leancms-import-section {
					background: #f9f9f9;
					border: 1px solid #e0e0e0;
					border-radius: 4px;
					padding: 16px;
					margin-bottom: 16px;
				}
				.leancms-import-section h4 {
					margin: 0 0 12px;
					font-size: 13px;
					font-weight: 600;
				}
				.leancms-import-row {
					display: flex;
					gap: 12px;
					align-items: flex-end;
					flex-wrap: wrap;
				}
				.leancms-import-field {
					flex: 1;
					min-width: 150px;
				}
				.leancms-import-field label {
					display: block;
					font-size: 12px;
					font-weight: 500;
					margin-bottom: 4px;
					color: #50575e;
				}
				.leancms-import-field select {
					width: 100%;
					padding: 6px 8px;
					border: 1px solid #8c8f94;
					border-radius: 4px;
					font-size: 13px;
				}
				.leancms-import-buttons {
					display: flex;
					gap: 8px;
				}
				.leancms-import-buttons .button {
					white-space: nowrap;
				}
				.leancms-import-status {
					margin-top: 12px;
					padding: 8px 12px;
					border-radius: 4px;
					font-size: 12px;
					display: none;
				}
				.leancms-import-status.success {
					background: #d1e7dd;
					border: 1px solid #badbcc;
					color: #0f5132;
					display: block;
				}
				.leancms-import-status.error {
					background: #f8d7da;
					border: 1px solid #f5c2c7;
					color: #842029;
					display: block;
				}
				.leancms-import-status.loading {
					background: #cfe2ff;
					border: 1px solid #b6d4fe;
					color: #084298;
					display: block;
				}
				/* Layout Mode Tabs */
				.leancms-mode-tabs {
					display: flex;
					gap: 0;
					margin-bottom: 0;
					border-bottom: 1px solid #c3c4c7;
				}
				.leancms-mode-tab {
					padding: 10px 16px;
					background: #f0f0f1;
					border: 1px solid #c3c4c7;
					border-bottom: none;
					border-radius: 4px 4px 0 0;
					cursor: pointer;
					font-size: 13px;
					font-weight: 500;
					color: #50575e;
					margin-right: -1px;
					position: relative;
					transition: background 0.15s, color 0.15s;
				}
				.leancms-mode-tab:hover {
					background: #fff;
					color: #1d2327;
				}
				.leancms-mode-tab.active {
					background: #fff;
					color: #1d2327;
					border-bottom-color: #fff;
					z-index: 1;
				}
				.leancms-mode-tab .dashicons {
					font-size: 16px;
					width: 16px;
					height: 16px;
					vertical-align: middle;
					margin-right: 4px;
				}
				.leancms-mode-content {
					display: none;
					border: 1px solid #c3c4c7;
					border-top: none;
					padding: 16px;
					background: #fff;
				}
				.leancms-mode-content.active {
					display: block;
				}
				.leancms-mode-content .leancms-code-editor {
					border: 1px solid #dcdcde;
				}
				.leancms-visual-placeholder {
					padding: 40px 20px;
					text-align: center;
					background: #f9f9f9;
					border: 2px dashed #c3c4c7;
					border-radius: 4px;
					color: #646970;
				}
				.leancms-visual-placeholder .dashicons {
					font-size: 48px;
					width: 48px;
					height: 48px;
					color: #c3c4c7;
					margin-bottom: 12px;
				}
				.leancms-visual-placeholder h3 {
					margin: 0 0 8px;
					color: #1d2327;
					font-size: 16px;
				}
				.leancms-visual-placeholder p {
					margin: 0;
					font-size: 13px;
				}
				/* Visual Block List */
				.leancms-block-list {
					display: flex;
					flex-direction: column;
					gap: 8px;
				}
				.leancms-block-item {
					background: #fff;
					border: 1px solid #c3c4c7;
					border-radius: 4px;
					display: flex;
					flex-direction: column;
					transition: border-color 0.15s, box-shadow 0.15s;
				}
				.leancms-block-item:hover {
					border-color: #2271b1;
					box-shadow: 0 0 0 1px #2271b1;
				}
				/* Block Header - Always visible summary */
				.leancms-block-header {
					display: flex;
					align-items: center;
					gap: 12px;
					padding: 12px 16px;
				}
				.leancms-block-header-info {
					flex: 1;
					display: flex;
					align-items: center;
					gap: 12px;
					min-width: 0;
				}
				.leancms-block-title {
					font-weight: 600;
					font-size: 13px;
					color: #1d2327;
					margin: 0;
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
				}
				.leancms-block-title-partial {
					font-weight: 400;
					font-size: 12px;
					color: #646970;
					margin-left: 4px;
				}
				/* Header Summary Badges */
				.leancms-block-summary {
					display: flex;
					align-items: center;
					gap: 8px;
					font-size: 12px;
					color: #646970;
				}
				.leancms-block-summary-item {
					display: inline-flex;
					align-items: center;
					gap: 4px;
					background: #f0f0f1;
					padding: 2px 8px;
					border-radius: 3px;
				}
				.leancms-block-summary-item .dashicons {
					font-size: 12px;
					width: 12px;
					height: 12px;
				}
				.leancms-block-summary-item code {
					background: transparent;
					font-size: 11px;
				}
				/* Wrapper Indicator Dot */
				.leancms-block-wrapper-dot {
					width: 8px;
					height: 8px;
					background: #2271b1;
					border-radius: 50%;
					flex-shrink: 0;
					title: "Has wrapper class";
				}
				/* Legacy meta for expanded view - kept for compatibility */
				.leancms-block-icon {
					flex-shrink: 0;
					width: 40px;
					height: 40px;
					background: #f0f0f1;
					border-radius: 4px;
					display: flex;
					align-items: center;
					justify-content: center;
				}
				.leancms-block-icon .dashicons {
					font-size: 20px;
					width: 20px;
					height: 20px;
					color: #50575e;
				}
				.leancms-block-info {
					flex: 1;
					min-width: 0;
				}
				.leancms-block-meta {
					font-size: 12px;
					color: #646970;
					display: flex;
					flex-wrap: wrap;
					gap: 8px;
				}
				.leancms-block-meta-item {
					display: inline-flex;
					align-items: center;
					gap: 4px;
				}
				.leancms-block-meta-item .dashicons {
					font-size: 14px;
					width: 14px;
					height: 14px;
				}
				.leancms-block-meta-item code {
					background: #f0f0f1;
					padding: 1px 5px;
					border-radius: 3px;
					font-size: 11px;
				}
				/* Collapsed State */
				.leancms-block-item.collapsed .leancms-block-body {
					display: none;
				}
				.leancms-block-item.collapsed .leancms-block-edit {
					display: none !important;
				}
				.leancms-block-action[data-action="toggle"] .dashicons-arrow-up-alt2 {
					display: inline-block;
				}
				.leancms-block-action[data-action="toggle"] .dashicons-arrow-down-alt2 {
					display: none;
				}
				.leancms-block-item.collapsed .leancms-block-action[data-action="toggle"] .dashicons-arrow-up-alt2 {
					display: none;
				}
				.leancms-block-item.collapsed .leancms-block-action[data-action="toggle"] .dashicons-arrow-down-alt2 {
					display: inline-block;
				}
				.leancms-block-empty {
					padding: 40px 20px;
					text-align: center;
					background: #f9f9f9;
					border: 2px dashed #c3c4c7;
					border-radius: 4px;
					color: #646970;
				}
				.leancms-block-empty .dashicons {
					font-size: 32px;
					width: 32px;
					height: 32px;
					color: #c3c4c7;
					margin-bottom: 8px;
				}
				/* Drag Handle */
				.leancms-block-drag {
					flex-shrink: 0;
					cursor: grab;
					padding: 4px;
					color: #c3c4c7;
					transition: color 0.15s;
				}
				.leancms-block-drag:hover {
					color: #50575e;
				}
				.leancms-block-drag .dashicons {
					font-size: 20px;
					width: 20px;
					height: 20px;
				}
				.leancms-block-item.ui-sortable-helper {
					box-shadow: 0 4px 12px rgba(0,0,0,0.15);
					cursor: grabbing;
				}
				.leancms-block-item.ui-sortable-placeholder {
					visibility: visible !important;
					background: #f0f6fc;
					border: 2px dashed #2271b1;
				}
				/* Block Actions */
				.leancms-block-actions {
					flex-shrink: 0;
					display: flex;
					gap: 4px;
				}
				.leancms-block-action {
					background: none;
					border: 1px solid transparent;
					border-radius: 4px;
					padding: 4px 6px;
					cursor: pointer;
					color: #646970;
					transition: color 0.15s, background 0.15s, border-color 0.15s;
				}
				.leancms-block-action:hover {
					background: #f0f0f1;
					border-color: #c3c4c7;
					color: #1d2327;
				}
				.leancms-block-action.delete:hover {
					background: #fcf0f1;
					border-color: #d63638;
					color: #d63638;
				}
				.leancms-block-action .dashicons {
					font-size: 16px;
					width: 16px;
					height: 16px;
				}
				/* Add Block Section */
				.leancms-add-block {
					margin-top: 12px;
					padding: 12px;
					background: #f9f9f9;
					border: 1px solid #c3c4c7;
					border-radius: 4px;
				}
				.leancms-add-block-row {
					display: flex;
					gap: 8px;
					align-items: flex-end;
					flex-wrap: wrap;
				}
				.leancms-add-block-field {
					flex: 1;
					min-width: 120px;
				}
				.leancms-add-block-field label {
					display: block;
					font-size: 12px;
					font-weight: 500;
					margin-bottom: 4px;
					color: #50575e;
				}
				.leancms-add-block-field input,
				.leancms-add-block-field select {
					width: 100%;
					padding: 6px 8px;
					border: 1px solid #8c8f94;
					border-radius: 4px;
					font-size: 13px;
				}
				/* Block Body (collapsible section) */
				.leancms-block-body {
					padding: 0 16px 0;
				}
				.leancms-block-item.editing .leancms-block-body {
					padding-bottom: 12px;
				}
				/* Block Edit Form */
				.leancms-block-edit {
					display: none;
					padding-top: 12px;
					border-top: 1px solid #e0e0e0;
				}
				.leancms-block-edit.active {
					display: block;
				}
				.leancms-block-edit-row {
					display: flex;
					gap: 12px;
					flex-wrap: wrap;
				}
				.leancms-block-edit-field {
					flex: 1;
					min-width: 150px;
				}
				.leancms-block-edit-field label {
					display: block;
					font-size: 11px;
					font-weight: 500;
					margin-bottom: 4px;
					color: #50575e;
				}
				.leancms-block-edit-field input {
					width: 100%;
					padding: 4px 8px;
					border: 1px solid #8c8f94;
					border-radius: 3px;
					font-size: 12px;
				}
				.leancms-block-item.editing {
					border-color: #2271b1;
				}
				/* Block Panel Tabs */
				.leancms-block-tabs {
					display: flex;
					gap: 0;
					margin-bottom: 12px;
					border-bottom: 1px solid #e0e0e0;
				}
				.leancms-block-tab {
					padding: 8px 16px;
					background: transparent;
					border: none;
					border-bottom: 2px solid transparent;
					cursor: pointer;
					font-size: 12px;
					font-weight: 500;
					color: #646970;
					transition: color 0.15s, border-color 0.15s;
				}
				.leancms-block-tab:hover {
					color: #1d2327;
				}
				.leancms-block-tab.active {
					color: #2271b1;
					border-bottom-color: #2271b1;
				}
				.leancms-block-tab .dashicons {
					font-size: 14px;
					width: 14px;
					height: 14px;
					vertical-align: middle;
					margin-right: 4px;
				}
				.leancms-block-tab-content {
					display: none;
				}
				.leancms-block-tab-content.active {
					display: block;
				}
				/* Content Tab Placeholder */
				.leancms-content-placeholder {
					padding: 24px 16px;
					text-align: center;
					background: #f9f9f9;
					border: 1px dashed #c3c4c7;
					border-radius: 4px;
					color: #646970;
				}
				.leancms-content-placeholder .dashicons {
					font-size: 24px;
					width: 24px;
					height: 24px;
					color: #c3c4c7;
					margin-bottom: 8px;
					display: block;
				}
				.leancms-content-placeholder p {
					margin: 0;
					font-size: 12px;
					line-height: 1.5;
				}
				/* Settings Grid */
				.leancms-settings-grid {
					display: grid;
					grid-template-columns: repeat(2, 1fr);
					gap: 12px;
				}
				@media (max-width: 782px) {
					.leancms-settings-grid {
						grid-template-columns: 1fr;
					}
				}
				.leancms-settings-section {
					display: flex;
					flex-direction: column;
					gap: 8px;
				}
				.leancms-settings-section-title {
					font-size: 11px;
					font-weight: 600;
					color: #1d2327;
					text-transform: uppercase;
					letter-spacing: 0.5px;
					margin: 0 0 4px;
					padding-bottom: 4px;
					border-bottom: 1px solid #e0e0e0;
				}
			';
		}

		/**
		 * Render the Data meta box.
		 *
		 * @param WP_Post $post Current post object.
		 */
		public function render_data_meta_box( $post ): void {
			wp_nonce_field( self::NONCE_ACTION, self::NONCE_NAME );

			$page_data    = LeanCMS_DB_Page_Renderer::get_page_data( $post->ID );
			$is_db_page   = LeanCMS_DB_Page_Renderer::is_db_page( $post->ID );
			$hidden_class = $is_db_page ? '' : 'leancms-hidden';

			// Convert array to PHP code for editing.
			$data_code = ! empty( $page_data ) ? $this->array_to_php_code( $page_data ) : $this->get_data_placeholder();

			?>
			<div class="leancms-metabox-content leancms-db-page-field <?php echo esc_attr( $hidden_class ); ?>">
				<div class="leancms-template-notice">
					<p>
						<strong><?php esc_html_e( 'Page Data', 'brandhub-client-cms' ); ?>:</strong>
						<?php esc_html_e( 'Define the $config array for this page. This data is merged with client and global configurations.', 'brandhub-client-cms' ); ?>
					</p>
				</div>

				<!-- Import Section -->
				<div class="leancms-import-section">
					<h4><?php esc_html_e( 'Import from Template', 'brandhub-client-cms' ); ?></h4>
					<div class="leancms-import-row">
						<div class="leancms-import-field">
							<label for="leancms_import_client"><?php esc_html_e( 'Client', 'brandhub-client-cms' ); ?></label>
							<select id="leancms_import_client">
								<option value=""><?php esc_html_e( '-- Select Client --', 'brandhub-client-cms' ); ?></option>
							</select>
						</div>
						<div class="leancms-import-field">
							<label for="leancms_import_template"><?php esc_html_e( 'Template', 'brandhub-client-cms' ); ?></label>
							<select id="leancms_import_template" disabled>
								<option value=""><?php esc_html_e( '-- Select Template --', 'brandhub-client-cms' ); ?></option>
							</select>
						</div>
						<div class="leancms-import-buttons">
							<button type="button" class="button" id="leancms_import_data_btn" disabled>
								<?php esc_html_e( 'Import Data', 'brandhub-client-cms' ); ?>
							</button>
							<button type="button" class="button" id="leancms_import_layout_btn" disabled>
								<?php esc_html_e( 'Import Layout', 'brandhub-client-cms' ); ?>
							</button>
							<button type="button" class="button button-primary" id="leancms_import_both_btn" disabled>
								<?php esc_html_e( 'Import Both', 'brandhub-client-cms' ); ?>
							</button>
						</div>
					</div>
					<div class="leancms-import-status" id="leancms_import_status"></div>
				</div>

				<div class="leancms-field-group">
					<label class="leancms-field-label" for="leancms_page_data_code">
						<?php esc_html_e( 'Page Data (PHP Array)', 'brandhub-client-cms' ); ?>
					</label>
					<div class="leancms-code-editor">
						<textarea
							id="leancms_page_data_code"
							name="leancms_page_data_code"
							rows="15"
							placeholder="<?php esc_attr_e( 'Enter PHP array code...', 'brandhub-client-cms' ); ?>"
						><?php echo esc_textarea( $data_code ); ?></textarea>
					</div>
					<p class="leancms-field-description">
						<?php esc_html_e( 'Enter a valid PHP array. This will be available as $config in your layout.', 'brandhub-client-cms' ); ?>
						<?php esc_html_e( 'Copy from your client config.php or define page-specific data.', 'brandhub-client-cms' ); ?>
					</p>
				</div>
			</div>

			<div class="leancms-template-notice notice-warning <?php echo $is_db_page ? 'leancms-hidden' : ''; ?>" id="leancms-data-template-notice">
				<p>
					<?php esc_html_e( 'Select the "LeanCMS DB Page" template to enable database-backed page data.', 'brandhub-client-cms' ); ?>
				</p>
			</div>
			<?php
		}

		/**
		 * Render the Layout meta box.
		 *
		 * @param WP_Post $post Current post object.
		 */
		public function render_layout_meta_box( $post ): void {
			$layout       = LeanCMS_DB_Page_Renderer::get_page_layout( $post->ID );
			$is_db_page   = LeanCMS_DB_Page_Renderer::is_db_page( $post->ID );
			$hidden_class = $is_db_page ? '' : 'leancms-hidden';

			$layout_mode      = $layout['mode'] ?? 'code';
			$layout_code      = $layout['code'] ?? '';
			$layout_structure = $layout['structure'] ?? array();

			if ( empty( $layout_code ) ) {
				$layout_code = $this->get_layout_placeholder();
			}

			$code_active   = 'code' === $layout_mode ? 'active' : '';
			$visual_active = 'visual' === $layout_mode ? 'active' : '';

			?>
			<div class="leancms-metabox-content leancms-db-page-field <?php echo esc_attr( $hidden_class ); ?>">
				<div class="leancms-template-notice">
					<p>
						<strong><?php esc_html_e( 'Page Layout', 'brandhub-client-cms' ); ?>:</strong>
						<?php esc_html_e( 'Define the partial structure for this page. Use Code mode for full PHP control or Visual mode for block-based editing.', 'brandhub-client-cms' ); ?>
					</p>
				</div>

				<!-- Hidden field to store the current mode -->
				<input type="hidden" id="leancms_layout_mode" name="leancms_layout_mode" value="<?php echo esc_attr( $layout_mode ); ?>">
				<!-- Hidden field to store visual mode structure as JSON -->
				<input type="hidden" id="leancms_layout_structure" name="leancms_layout_structure" value="<?php echo esc_attr( wp_json_encode( $layout_structure ) ); ?>">

				<div class="leancms-field-group">
					<!-- Mode Tabs -->
					<div class="leancms-mode-tabs">
						<button type="button" class="leancms-mode-tab <?php echo esc_attr( $code_active ); ?>" data-mode="code">
							<span class="dashicons dashicons-editor-code"></span>
							<?php esc_html_e( 'Code', 'brandhub-client-cms' ); ?>
						</button>
						<button type="button" class="leancms-mode-tab <?php echo esc_attr( $visual_active ); ?>" data-mode="visual">
							<span class="dashicons dashicons-layout"></span>
							<?php esc_html_e( 'Visual', 'brandhub-client-cms' ); ?>
						</button>
					</div>

					<!-- Code Mode Content -->
					<div class="leancms-mode-content <?php echo esc_attr( $code_active ); ?>" data-mode="code">
						<div class="leancms-code-editor">
							<textarea
								id="leancms_page_layout_code"
								name="leancms_page_layout_code"
								rows="20"
								placeholder="<?php esc_attr_e( 'Enter layout PHP code...', 'brandhub-client-cms' ); ?>"
							><?php echo esc_textarea( $layout_code ); ?></textarea>
						</div>
						<p class="leancms-field-description">
							<?php esc_html_e( 'Enter PHP code with partial() calls. The $config variable contains merged page data.', 'brandhub-client-cms' ); ?>
						</p>

						<div class="leancms-example-code">
							<strong><?php esc_html_e( 'Example:', 'brandhub-client-cms' ); ?></strong>
							<pre>&lt;main id="primary" class="site-main"&gt;
&lt;?php
// Hero section
partial('hero', $config['hero'] ?? [], 'top-section');
?&gt;

&lt;?php
// Color palette
partial('color-palette', $config['brand']['colors'] ?? [], 'brand-guide');
?&gt;

&lt;?php
// Call to action
partial('cta', $config['cta'] ?? [], 'bottom-section');
?&gt;
&lt;/main&gt;</pre>
						</div>
					</div>

					<!-- Visual Mode Content -->
					<div class="leancms-mode-content <?php echo esc_attr( $visual_active ); ?>" data-mode="visual">
						<div class="leancms-block-list" id="leancms_visual_blocks">
							<!-- Blocks will be rendered by JS -->
						</div>
						<div class="leancms-block-empty" id="leancms_blocks_empty" style="display: none;">
							<span class="dashicons dashicons-layout"></span>
							<p><?php esc_html_e( 'No blocks yet. Add blocks to build your layout.', 'brandhub-client-cms' ); ?></p>
						</div>

						<!-- Add Block Section -->
						<div class="leancms-add-block">
							<div class="leancms-add-block-row">
								<div class="leancms-add-block-field">
									<label for="leancms_new_partial"><?php esc_html_e( 'Partial', 'brandhub-client-cms' ); ?></label>
									<input type="text" id="leancms_new_partial" placeholder="e.g. hero, color-palette">
								</div>
								<div class="leancms-add-block-field">
									<label for="leancms_new_folder"><?php esc_html_e( 'Folder', 'brandhub-client-cms' ); ?></label>
									<input type="text" id="leancms_new_folder" placeholder="e.g. top-section">
								</div>
								<button type="button" class="button button-primary" id="leancms_add_block_btn">
									<span class="dashicons dashicons-plus-alt2" style="vertical-align: middle; margin-right: 4px;"></span>
									<?php esc_html_e( 'Add Block', 'brandhub-client-cms' ); ?>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="leancms-template-notice notice-warning <?php echo $is_db_page ? 'leancms-hidden' : ''; ?>" id="leancms-layout-template-notice">
				<p>
					<?php esc_html_e( 'Select the "LeanCMS DB Page" template to enable database-backed layouts.', 'brandhub-client-cms' ); ?>
				</p>
			</div>
			<?php
		}

		/**
		 * Render JavaScript for template toggle functionality.
		 */
		public function render_template_toggle_script(): void {
			$screen = get_current_screen();
			if ( ! $screen || 'page' !== $screen->post_type ) {
				return;
			}

			$db_template_slug = LeanCMS_DB_Page_Renderer::TEMPLATE_SLUG;
			?>
			<script type="text/javascript">
			(function($) {
				'use strict';

				var dbTemplateSlug = '<?php echo esc_js( $db_template_slug ); ?>';
				var ajaxNonce = '<?php echo wp_create_nonce( self::AJAX_NONCE_ACTION ); ?>';
				var dataEditor = null;
				var layoutEditor = null;

				// ==========================================
				// Visual Block List Rendering
				// ==========================================

				function getBlockStructure() {
					var json = $('#leancms_layout_structure').val();
					if (!json || json === '[]' || json === 'null') {
						return [];
					}
					try {
						return JSON.parse(json) || [];
					} catch (e) {
						return [];
					}
				}

				function setBlockStructure(structure) {
					$('#leancms_layout_structure').val(JSON.stringify(structure || []));
				}

				function renderBlockList() {
					var structure = getBlockStructure();
					var $container = $('#leancms_visual_blocks');
					var $empty = $('#leancms_blocks_empty');

					$container.empty();

					if (!structure || structure.length === 0) {
						$container.hide();
						$empty.show();
						return;
					}

					$container.show();
					$empty.hide();

					structure.forEach(function(block, index) {
						var partial = block.partial || 'unknown';
						var folder = block.folder || '';
						var configKey = block.config_key || '';
						var label = block.label || '';
						var wrapper = block.wrapper || {};
						var wrapperClass = wrapper.class || '';
						var isCollapsed = getBlockCollapsedState(index);
						var isExpanded = !isCollapsed;

						// Build block HTML with new header/body structure
						// When expanded: show editing panel. When collapsed: hide it.
						var blockClasses = 'leancms-block-item';
						if (isCollapsed) {
							blockClasses += ' collapsed';
						} else {
							blockClasses += ' editing';
						}
						var html = '<div class="' + blockClasses + '" data-index="' + index + '">';

						// === HEADER (always visible) ===
						html += '<div class="leancms-block-header">';
						html += '<div class="leancms-block-drag"><span class="dashicons dashicons-menu"></span></div>';

						// Header info: title + summary badges
						html += '<div class="leancms-block-header-info">';

						// Title: label (or partial as fallback)
						html += '<div class="leancms-block-title">';
						if (label) {
							html += escapeHtml(label);
							html += '<span class="leancms-block-title-partial">(' + escapeHtml(partial) + ')</span>';
						} else {
							html += escapeHtml(partial);
						}
						html += '</div>';

						// Summary badges
						html += '<div class="leancms-block-summary">';
						if (folder) {
							html += '<span class="leancms-block-summary-item" title="Folder">';
							html += '<span class="dashicons dashicons-category"></span> ';
							html += escapeHtml(folder);
							html += '</span>';
						}
						if (configKey) {
							html += '<span class="leancms-block-summary-item" title="Config Key">';
							html += '<span class="dashicons dashicons-admin-settings"></span> ';
							html += '<code>' + escapeHtml(configKey) + '</code>';
							html += '</span>';
						}
						if (wrapperClass) {
							html += '<span class="leancms-block-wrapper-dot" title="Has wrapper: .' + escapeHtml(wrapperClass) + '"></span>';
						}
						html += '</div>';

						html += '</div>'; // .leancms-block-header-info

						// Header actions
						html += '<div class="leancms-block-actions">';
						html += '<button type="button" class="leancms-block-action" data-action="toggle" title="Expand/Collapse">';
						html += '<span class="dashicons dashicons-arrow-up-alt2"></span>';
						html += '<span class="dashicons dashicons-arrow-down-alt2"></span>';
						html += '</button>';
						html += '<button type="button" class="leancms-block-action" data-action="duplicate" title="Duplicate block">';
						html += '<span class="dashicons dashicons-admin-page"></span>';
						html += '</button>';
						html += '<button type="button" class="leancms-block-action delete" data-action="remove" title="Remove block">';
						html += '<span class="dashicons dashicons-trash"></span>';
						html += '</button>';
						html += '</div>';

						html += '</div>'; // .leancms-block-header

						// === BODY (collapsible) ===
						html += '<div class="leancms-block-body">';

						// Edit panel (visible when expanded)
						html += '<div class="leancms-block-edit' + (isExpanded ? ' active' : '') + '">';

						// Tab navigation
						html += '<div class="leancms-block-tabs">';
						html += '<button type="button" class="leancms-block-tab" data-tab="content">';
						html += '<span class="dashicons dashicons-edit-page"></span>Content';
						html += '</button>';
						html += '<button type="button" class="leancms-block-tab active" data-tab="settings">';
						html += '<span class="dashicons dashicons-admin-generic"></span>Settings';
						html += '</button>';
						html += '</div>';

						// Content tab (placeholder for future)
						html += '<div class="leancms-block-tab-content" data-tab-content="content">';
						html += '<div class="leancms-content-placeholder">';
						html += '<span class="dashicons dashicons-edit-page"></span>';
						html += '<p>Content editing coming soon.<br>Currently using config-based content from <code>config.php</code></p>';
						html += '</div>';
						html += '</div>';

						// Settings tab (active by default)
						html += '<div class="leancms-block-tab-content active" data-tab-content="settings">';

						// Label field (full width, prominent)
						html += '<div class="leancms-block-edit-field" style="margin-bottom: 12px;">';
						html += '<label>Label <span style="font-weight: 400; color: #646970;">(Display name in editor)</span></label>';
						html += '<input type="text" class="leancms-edit-label" value="' + escapeHtml(label) + '" placeholder="e.g. Hero Banner, Meet the Team">';
						html += '</div>';

						html += '<div class="leancms-settings-grid">';

						// Left column: Block Identity
						html += '<div class="leancms-settings-section">';
						html += '<div class="leancms-settings-section-title">Block Identity</div>';
						html += '<div class="leancms-block-edit-field">';
						html += '<label>Partial</label>';
						html += '<input type="text" class="leancms-edit-partial" value="' + escapeHtml(partial) + '" placeholder="e.g. hero">';
						html += '</div>';
						html += '<div class="leancms-block-edit-field">';
						html += '<label>Folder</label>';
						html += '<input type="text" class="leancms-edit-folder" value="' + escapeHtml(folder) + '" placeholder="e.g. sections">';
						html += '</div>';
						html += '</div>';

						// Right column: Configuration
						html += '<div class="leancms-settings-section">';
						html += '<div class="leancms-settings-section-title">Configuration</div>';
						html += '<div class="leancms-block-edit-field">';
						html += '<label>Config Key</label>';
						html += '<input type="text" class="leancms-edit-config-key" value="' + escapeHtml(configKey) + '" placeholder="e.g. hero">';
						html += '</div>';
						html += '<div class="leancms-block-edit-field">';
						html += '<label>Wrapper Class</label>';
						html += '<input type="text" class="leancms-edit-wrapper-class" value="' + escapeHtml(wrapperClass) + '" placeholder="e.g. section-wrapper">';
						html += '</div>';
						html += '</div>';

						html += '</div>'; // .leancms-settings-grid
						html += '</div>'; // .leancms-block-tab-content[settings]

						html += '</div>'; // .leancms-block-edit

						html += '</div>'; // .leancms-block-body
						html += '</div>'; // .leancms-block-item

						$container.append(html);
					});

					// Initialize sortable after rendering
					initBlockSortable();
				}

				// Expanded state management (stored in localStorage)
				// Blocks default to COLLAPSED. We store which blocks are EXPANDED.
				function getBlockCollapsedState(index) {
					try {
						var pageId = $('#post_ID').val() || 'new';
						var key = 'leancms_expanded_' + pageId;
						var expandedStates = JSON.parse(localStorage.getItem(key) || '{}');
						// Return TRUE (collapsed) unless this block is marked as expanded
						return expandedStates[index] !== true;
					} catch (e) {
						return true; // Default to collapsed on error
					}
				}

				function setBlockCollapsedState(index, collapsed) {
					try {
						var pageId = $('#post_ID').val() || 'new';
						var key = 'leancms_expanded_' + pageId;
						var expandedStates = JSON.parse(localStorage.getItem(key) || '{}');
						if (collapsed) {
							// Remove from expanded list (return to default collapsed state)
							delete expandedStates[index];
						} else {
							// Add to expanded list
							expandedStates[index] = true;
						}
						localStorage.setItem(key, JSON.stringify(expandedStates));
					} catch (e) {
						// Ignore localStorage errors
					}
				}

				function escapeHtml(text) {
					var div = document.createElement('div');
					div.textContent = text;
					return div.innerHTML;
				}

				function initBlockSortable() {
					var $container = $('#leancms_visual_blocks');

					if ($container.hasClass('ui-sortable')) {
						$container.sortable('destroy');
					}

					$container.sortable({
						handle: '.leancms-block-drag',
						placeholder: 'leancms-block-item ui-sortable-placeholder',
						axis: 'y',
						tolerance: 'pointer',
						update: function(event, ui) {
							// Reorder the structure array based on new positions
							var structure = getBlockStructure();
							var newStructure = [];

							$container.find('.leancms-block-item').each(function() {
								var oldIndex = parseInt($(this).data('index'), 10);
								if (!isNaN(oldIndex) && structure[oldIndex]) {
									newStructure.push(structure[oldIndex]);
								}
							});

							// Update structure and re-render with new indices
							setBlockStructure(newStructure);
							renderBlockList();
						}
					});
				}

				function initCodeEditors() {
					if (typeof wp !== 'undefined' && wp.codeEditor) {
						var editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
						editorSettings.codemirror = _.extend({}, editorSettings.codemirror, {
							mode: 'application/x-httpd-php',
							lineNumbers: true,
							lineWrapping: true,
							indentUnit: 4,
							tabSize: 4,
							indentWithTabs: true,
							autoCloseBrackets: true,
							matchBrackets: true
						});

						var dataTextarea = document.getElementById('leancms_page_data_code');
						var layoutTextarea = document.getElementById('leancms_page_layout_code');

						if (dataTextarea && !dataEditor) {
							dataEditor = wp.codeEditor.initialize(dataTextarea, editorSettings);
							// Sync to textarea on every change for Gutenberg compatibility
							if (dataEditor.codemirror) {
								dataEditor.codemirror.on('change', function(cm) {
									cm.save();
								});
							}
						}
						if (layoutTextarea && !layoutEditor) {
							layoutEditor = wp.codeEditor.initialize(layoutTextarea, editorSettings);
							// Sync to textarea on every change for Gutenberg compatibility
							if (layoutEditor.codemirror) {
								layoutEditor.codemirror.on('change', function(cm) {
									cm.save();
								});
							}
						}
					}
				}

				function getSelectedTemplate() {
					// Try Gutenberg/Block editor first (wp.data API)
					if (typeof wp !== 'undefined' && wp.data && wp.data.select('core/editor')) {
						var editor = wp.data.select('core/editor');
						if (editor && typeof editor.getEditedPostAttribute === 'function') {
							var template = editor.getEditedPostAttribute('template');
							if (template) {
								return template;
							}
						}
					}

					// Fallback to classic editor dropdown
					var templateSelect = document.getElementById('page_template');
					if (templateSelect) {
						return templateSelect.value || '';
					}

					return '';
				}

				function isDbPageTemplate(template) {
					if (!template) return false;
					return template === dbTemplateSlug || template.endsWith(dbTemplateSlug);
				}

				function toggleDbPageFields() {
					var selectedTemplate = getSelectedTemplate();
					var isDbPage = isDbPageTemplate(selectedTemplate);

					// Toggle visibility
					$('.leancms-db-page-field').toggleClass('leancms-hidden', !isDbPage);
					$('#leancms-data-template-notice, #leancms-layout-template-notice').toggleClass('leancms-hidden', isDbPage);

					// Refresh CodeMirror when shown
					if (isDbPage) {
						setTimeout(function() {
							if (dataEditor && dataEditor.codemirror) {
								dataEditor.codemirror.refresh();
							}
							if (layoutEditor && layoutEditor.codemirror) {
								layoutEditor.codemirror.refresh();
							}
						}, 100);
					}
				}

				// ==========================================
				// Import Functionality
				// ==========================================

				function showImportStatus(message, type) {
					var $status = $('#leancms_import_status');
					$status.removeClass('success error loading').addClass(type).text(message);
				}

				function hideImportStatus() {
					$('#leancms_import_status').removeClass('success error loading');
				}

				function updateImportButtons() {
					var client = $('#leancms_import_client').val();
					var template = $('#leancms_import_template').val();
					var hasConfig = $('#leancms_import_client').find(':selected').data('has-config');

					$('#leancms_import_data_btn').prop('disabled', !client || !hasConfig);
					$('#leancms_import_layout_btn').prop('disabled', !template);
					$('#leancms_import_both_btn').prop('disabled', !template || !hasConfig);
				}

				function loadClients() {
					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: {
							action: 'leancms_get_clients',
							nonce: ajaxNonce
						},
						success: function(response) {
							if (response.success) {
								var $select = $('#leancms_import_client');
								$select.find('option:not(:first)').remove();

								response.data.clients.forEach(function(client) {
									$select.append(
										$('<option></option>')
											.val(client.code)
											.text(client.code.toUpperCase())
											.data('has-config', client.has_config)
											.data('has-templates', client.has_templates)
									);
								});
							}
						}
					});
				}

				function loadTemplates(client) {
					var $select = $('#leancms_import_template');
					$select.find('option:not(:first)').remove();
					$select.prop('disabled', true);

					if (!client) {
						updateImportButtons();
						return;
					}

					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: {
							action: 'leancms_get_templates',
							nonce: ajaxNonce,
							client: client
						},
						success: function(response) {
							if (response.success) {
								response.data.templates.forEach(function(tpl) {
									$select.append(
										$('<option></option>')
											.val(tpl.file)
											.text(tpl.name + ' (' + tpl.slug + ')')
									);
								});

								$select.prop('disabled', false);

								// Update client has_config data
								$('#leancms_import_client').find(':selected').data('has-config', response.data.has_config);
							}
							updateImportButtons();
						}
					});
				}

				function importConfig() {
					var client = $('#leancms_import_client').val();
					if (!client) return;

					showImportStatus('Importing config...', 'loading');

					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: {
							action: 'leancms_import_config',
							nonce: ajaxNonce,
							client: client
						},
						success: function(response) {
							if (response.success) {
								// Update the data editor
								if (dataEditor && dataEditor.codemirror) {
									dataEditor.codemirror.setValue(response.data.code);
								} else {
									$('#leancms_page_data_code').val(response.data.code);
								}
								showImportStatus('Config imported from ' + client + '/config.php', 'success');
							} else {
								showImportStatus(response.data.message || 'Import failed', 'error');
							}
						},
						error: function() {
							showImportStatus('Network error during import', 'error');
						}
					});
				}

				function importLayout() {
					var client = $('#leancms_import_client').val();
					var template = $('#leancms_import_template').val();
					if (!client || !template) return;

					showImportStatus('Importing layout...', 'loading');

					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: {
							action: 'leancms_import_layout',
							nonce: ajaxNonce,
							client: client,
							template: template
						},
						success: function(response) {
							if (response.success) {
								// Update the layout editor
								if (layoutEditor && layoutEditor.codemirror) {
									layoutEditor.codemirror.setValue(response.data.code);
								} else {
									$('#leancms_page_layout_code').val(response.data.code);
								}
								showImportStatus('Layout imported from ' + client + '/' + template, 'success');
							} else {
								showImportStatus(response.data.message || 'Import failed', 'error');
							}
						},
						error: function() {
							showImportStatus('Network error during import', 'error');
						}
					});
				}

				function importBoth() {
					var client = $('#leancms_import_client').val();
					var template = $('#leancms_import_template').val();
					if (!client || !template) return;

					showImportStatus('Importing data and layout...', 'loading');

					// Import config first, then layout
					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: {
							action: 'leancms_import_config',
							nonce: ajaxNonce,
							client: client
						},
						success: function(configResponse) {
							if (configResponse.success) {
								// Update the data editor
								if (dataEditor && dataEditor.codemirror) {
									dataEditor.codemirror.setValue(configResponse.data.code);
								} else {
									$('#leancms_page_data_code').val(configResponse.data.code);
								}

								// Now import layout
								$.ajax({
									url: ajaxurl,
									type: 'POST',
									data: {
										action: 'leancms_import_layout',
										nonce: ajaxNonce,
										client: client,
										template: template
									},
									success: function(layoutResponse) {
										if (layoutResponse.success) {
											// Update the layout editor
											if (layoutEditor && layoutEditor.codemirror) {
												layoutEditor.codemirror.setValue(layoutResponse.data.code);
											} else {
												$('#leancms_page_layout_code').val(layoutResponse.data.code);
											}
											showImportStatus('Imported config and layout from ' + client, 'success');
										} else {
											showImportStatus('Config imported, but layout failed: ' + (layoutResponse.data.message || 'Unknown error'), 'error');
										}
									},
									error: function() {
										showImportStatus('Config imported, but layout failed due to network error', 'error');
									}
								});
							} else {
								showImportStatus(configResponse.data.message || 'Config import failed', 'error');
							}
						},
						error: function() {
							showImportStatus('Network error during import', 'error');
						}
					});
				}

				$(document).ready(function() {
					initCodeEditors();

					// Initial toggle with delay to ensure editor is ready
					setTimeout(toggleDbPageFields, 500);

					// Classic editor template dropdown
					$('#page_template').on('change', toggleDbPageFields);

					// ==========================================
					// CodeMirror Sync for Form Submission
					// ==========================================

					// Sync CodeMirror to textarea before any form submit
					function syncCodeMirrorToTextarea() {
						if (dataEditor && dataEditor.codemirror) {
							dataEditor.codemirror.save();
						}
						if (layoutEditor && layoutEditor.codemirror) {
							layoutEditor.codemirror.save();
						}
					}

					// Classic editor - sync before form submit
					$('form#post').on('submit', syncCodeMirrorToTextarea);

					// Gutenberg - sync before save
					if (typeof wp !== 'undefined' && wp.data && wp.data.subscribe) {
						var wasSaving = false;
						var lastTemplate = '';

						wp.data.subscribe(function() {
							// Template change detection
							var currentTemplate = getSelectedTemplate();
							if (currentTemplate !== lastTemplate) {
								lastTemplate = currentTemplate;
								toggleDbPageFields();
							}

							// Save detection - sync CodeMirror before save completes
							var editor = wp.data.select('core/editor');
							if (editor) {
								var isSaving = editor.isSavingPost();
								var isAutosaving = editor.isAutosavingPost();

								// When save starts (not autosave), sync CodeMirror values
								if (isSaving && !isAutosaving && !wasSaving) {
									syncCodeMirrorToTextarea();
								}
								wasSaving = isSaving && !isAutosaving;
							}
						});

						// Also check after a longer delay for slow-loading editors
						setTimeout(toggleDbPageFields, 1000);
						setTimeout(toggleDbPageFields, 2000);
					}

					// ==========================================
					// Layout Mode Tab Switching
					// ==========================================

					$('.leancms-mode-tab').on('click', function() {
						var $tab = $(this);
						var mode = $tab.data('mode');

						// Update hidden field
						$('#leancms_layout_mode').val(mode);

						// Update active states
						$('.leancms-mode-tab').removeClass('active');
						$tab.addClass('active');

						$('.leancms-mode-content').removeClass('active');
						$('.leancms-mode-content[data-mode="' + mode + '"]').addClass('active');

						// Refresh CodeMirror if switching to code mode
						if (mode === 'code' && layoutEditor && layoutEditor.codemirror) {
							setTimeout(function() {
								layoutEditor.codemirror.refresh();
							}, 100);
						}

						// Render block list if switching to visual mode
						if (mode === 'visual') {
							renderBlockList();
						}
					});

					// Initial render of block list
					renderBlockList();

					// ==========================================
					// Add/Remove Block Event Handlers
					// ==========================================

					// Add block button
					$('#leancms_add_block_btn').on('click', function() {
						var partial = $('#leancms_new_partial').val().trim();
						var folder = $('#leancms_new_folder').val().trim();

						if (!partial) {
							alert('Please enter a partial name.');
							$('#leancms_new_partial').focus();
							return;
						}

						var structure = getBlockStructure();
						structure.push({
							partial: partial,
							folder: folder,
							config_key: '',
							wrapper: { enabled: false, class: '' }
						});

						setBlockStructure(structure);
						renderBlockList();

						// Clear inputs
						$('#leancms_new_partial').val('');
						$('#leancms_new_folder').val('');
					});

					// Remove block button (delegated)
					$('#leancms_visual_blocks').on('click', '.leancms-block-action[data-action="remove"]', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						structure.splice(index, 1);
						setBlockStructure(structure);
						renderBlockList();
					});

					// Duplicate block button (delegated)
					$('#leancms_visual_blocks').on('click', '.leancms-block-action[data-action="duplicate"]', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							// Deep clone the block object
							var clone = JSON.parse(JSON.stringify(structure[index]));

							// Append " (copy)" to label if it exists
							if (clone.label) {
								clone.label = clone.label + ' (copy)';
							}

							// Insert the clone right after the original
							structure.splice(index + 1, 0, clone);
							setBlockStructure(structure);
							renderBlockList();
						}
					});

					// Toggle expand/collapse (delegated) - unified handler for chevron
					$('#leancms_visual_blocks').on('click', '.leancms-block-action[data-action="toggle"]', function() {
						var $block = $(this).closest('.leancms-block-item');
						var $editForm = $block.find('.leancms-block-edit');
						var index = parseInt($block.data('index'), 10);

						if (isNaN(index)) return;

						var isCurrentlyCollapsed = $block.hasClass('collapsed');

						if (isCurrentlyCollapsed) {
							// Expand: show edit panel
							$block.removeClass('collapsed').addClass('editing');
							$editForm.addClass('active');
							setBlockCollapsedState(index, false);
						} else {
							// Collapse: hide edit panel
							$block.addClass('collapsed').removeClass('editing');
							$editForm.removeClass('active');
							setBlockCollapsedState(index, true);
						}
					});

					// Config key input change (delegated)
					$('#leancms_visual_blocks').on('change', '.leancms-edit-config-key', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);
						var value = $(this).val().trim();

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							structure[index].config_key = value;
							setBlockStructure(structure);
							// Re-render to update header config badge
							renderBlockList();
						}
					});

					// Wrapper class input change (delegated)
					$('#leancms_visual_blocks').on('change', '.leancms-edit-wrapper-class', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);
						var value = $(this).val().trim();

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							if (!structure[index].wrapper) {
								structure[index].wrapper = { enabled: false, class: '' };
							}
							structure[index].wrapper.class = value;
							structure[index].wrapper.enabled = !!value;
							setBlockStructure(structure);
							// Re-render to update header wrapper dot
							renderBlockList();
						}
					});

					// Partial input change (delegated)
					$('#leancms_visual_blocks').on('change', '.leancms-edit-partial', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);
						var value = $(this).val().trim();

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							structure[index].partial = value;
							setBlockStructure(structure);
							// Re-render to update header title
							renderBlockList();
						}
					});

					// Folder input change (delegated)
					$('#leancms_visual_blocks').on('change', '.leancms-edit-folder', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);
						var value = $(this).val().trim();

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							structure[index].folder = value;
							setBlockStructure(structure);
							// Re-render to update header folder badge
							renderBlockList();
						}
					});

					// Label input change (delegated)
					$('#leancms_visual_blocks').on('change', '.leancms-edit-label', function() {
						var $block = $(this).closest('.leancms-block-item');
						var index = parseInt($block.data('index'), 10);
						var value = $(this).val().trim();

						if (isNaN(index)) return;

						var structure = getBlockStructure();
						if (structure[index]) {
							structure[index].label = value;
							setBlockStructure(structure);
							// Re-render to update header title
							renderBlockList();
						}
					});

					// Tab switching within blocks (delegated)
					$('#leancms_visual_blocks').on('click', '.leancms-block-tab', function() {
						var $block = $(this).closest('.leancms-block-item');
						var tabName = $(this).data('tab');

						// Update active tab button
						$block.find('.leancms-block-tab').removeClass('active');
						$(this).addClass('active');

						// Update active tab content
						$block.find('.leancms-block-tab-content').removeClass('active');
						$block.find('.leancms-block-tab-content[data-tab-content="' + tabName + '"]').addClass('active');
					});

					// ==========================================
					// Import Event Handlers
					// ==========================================

					// Load clients on page load
					loadClients();

					// Client selection change
					$('#leancms_import_client').on('change', function() {
						hideImportStatus();
						loadTemplates($(this).val());
					});

					// Template selection change
					$('#leancms_import_template').on('change', function() {
						hideImportStatus();
						updateImportButtons();
					});

					// Import buttons
					$('#leancms_import_data_btn').on('click', importConfig);
					$('#leancms_import_layout_btn').on('click', importLayout);
					$('#leancms_import_both_btn').on('click', importBoth);
				});
			})(jQuery);
			</script>
			<?php
		}

		/**
		 * Save meta box data.
		 *
		 * @param int     $post_id Post ID.
		 * @param WP_Post $post    Post object.
		 */
		public function save_meta_boxes( int $post_id, $post ): void {
			// Verify nonce.
			if ( ! isset( $_POST[ self::NONCE_NAME ] ) ) {
				return;
			}

			if ( ! wp_verify_nonce( $_POST[ self::NONCE_NAME ], self::NONCE_ACTION ) ) {
				return;
			}

			// Check autosave.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			// Check permissions.
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

			// Note: We don't check is_db_page() here because in Gutenberg,
			// the template slug may be saved via REST API separately from meta boxes.
			// The rendering side handles the template check appropriately.

			// Save page data if present and not just placeholder.
			if ( isset( $_POST['leancms_page_data_code'] ) ) {
				$data_code  = wp_unslash( $_POST['leancms_page_data_code'] );
				$data_array = $this->php_code_to_array( $data_code );

				if ( ! empty( $data_array ) ) {
					LeanCMS_DB_Page_Renderer::save_page_data( $post_id, $data_array );
				} elseif ( $this->is_placeholder_data( $data_code ) ) {
					// Don't save placeholder content - keep existing data.
				} else {
					delete_post_meta( $post_id, LeanCMS_DB_Page_Renderer::META_KEY_DATA );
				}
			}

			// Save page layout if present and not just placeholder.
			if ( isset( $_POST['leancms_page_layout_code'] ) ) {
				$layout_code = wp_unslash( $_POST['leancms_page_layout_code'] );
				$layout_mode = isset( $_POST['leancms_layout_mode'] ) ? sanitize_text_field( $_POST['leancms_layout_mode'] ) : 'code';

				// Parse structure from JSON if present.
				$layout_structure = array();
				if ( isset( $_POST['leancms_layout_structure'] ) ) {
					$structure_json   = wp_unslash( $_POST['leancms_layout_structure'] );
					$decoded          = json_decode( $structure_json, true );
					$layout_structure = is_array( $decoded ) ? $decoded : array();
				}

				// Skip saving if this is the default placeholder (keep existing data).
				if ( ! $this->is_placeholder_layout( $layout_code ) ) {
					$layout_data = array(
						'mode'      => $layout_mode,
						'code'      => $layout_code,
						'structure' => $layout_structure,
					);

					if ( ! empty( trim( $layout_code ) ) ) {
						LeanCMS_DB_Page_Renderer::save_page_layout( $post_id, $layout_data );
					} else {
						delete_post_meta( $post_id, LeanCMS_DB_Page_Renderer::META_KEY_LAYOUT );
					}
				}
			}
		}

		/**
		 * Check if the data code is just the default placeholder.
		 *
		 * @param string $code Code to check.
		 *
		 * @return bool True if placeholder.
		 */
		private function is_placeholder_data( string $code ): bool {
			$placeholder = $this->get_data_placeholder();
			return trim( $code ) === trim( $placeholder );
		}

		/**
		 * Check if the layout code is just the default placeholder.
		 *
		 * @param string $code Code to check.
		 *
		 * @return bool True if placeholder.
		 */
		private function is_placeholder_layout( string $code ): bool {
			$placeholder = $this->get_layout_placeholder();
			return trim( $code ) === trim( $placeholder );
		}

		/**
		 * Convert a PHP array to formatted PHP code string.
		 *
		 * @param array $array Array to convert.
		 *
		 * @return string PHP code.
		 */
		private function array_to_php_code( array $array ): string {
			$export = var_export( $array, true );

			// Clean up var_export output for readability.
			$export = preg_replace( '/array \(/', 'array(', $export );
			$export = preg_replace( '/=> \n\s+array\(/', '=> array(', $export );

			return "<?php\nreturn " . $export . ";\n";
		}

		/**
		 * Parse PHP code string to array.
		 *
		 * @param string $code PHP code to parse.
		 *
		 * @return array Parsed array or empty array on failure.
		 */
		private function php_code_to_array( string $code ): array {
			$code = trim( $code );

			if ( empty( $code ) ) {
				return array();
			}

			// Remove opening PHP tag if present.
			$code = preg_replace( '/^<\?php\s*/i', '', $code );

			// Remove closing PHP tag if present.
			$code = preg_replace( '/\?>\s*$/', '', $code );

			// Handle 'return array(...)' format.
			if ( preg_match( '/^\s*return\s+/i', $code ) ) {
				$code = preg_replace( '/^\s*return\s+/i', '', $code );
				$code = rtrim( $code, ';' );
			}

			// Try to evaluate the array.
			try {
				// Use a closure to safely evaluate.
				$result = @eval( 'return ' . $code . ';' );

				if ( is_array( $result ) ) {
					return $result;
				}
			} catch ( \Throwable $e ) {
				// Log error for debugging.
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					error_log( 'LeanCMS: Failed to parse page data code: ' . $e->getMessage() );
				}
			}

			return array();
		}

		/**
		 * Get placeholder code for the data field.
		 *
		 * @return string Placeholder PHP code.
		 */
		private function get_data_placeholder(): string {
			return <<<'PHP'
<?php
return array(
    // Hero section configuration
    'hero' => array(
        'logo'     => '',
        'logo_alt' => '',
        'badge'    => 'Brand Guidelines',
        'title'    => 'Your Brand Name',
        'subtitle' => 'Your Tagline Here',
    ),

    // Brand colors
    'brand' => array(
        'colors' => array(
            'primary'   => '#000000',
            'secondary' => '#333333',
            'accent'    => '#0066cc',
        ),
    ),

    // Call to action
    'cta' => array(
        'title'       => 'Ready to Get Started?',
        'description' => 'Contact us to learn more.',
        'button_text' => 'Get in Touch',
        'button_url'  => '#contact',
    ),
);
PHP;
		}

		/**
		 * Get placeholder code for the layout field.
		 *
		 * @return string Placeholder PHP code.
		 */
		private function get_layout_placeholder(): string {
			return <<<'LAYOUT'
<main id="primary" class="site-main">
<?php
// Hero Section
$hero_settings = $config['hero'] ?? array();
partial('hero', $hero_settings, 'top-section');
?>

<?php
// Add your partial calls here...
// partial('color-palette', $config['brand']['colors'] ?? array(), 'brand-guide');
?>

<?php
// Call to Action
$cta_settings = $config['cta'] ?? array();
partial('cta', $cta_settings, 'bottom-section');
?>
</main>
LAYOUT;
		}

		/**
		 * AJAX handler: Get list of available clients.
		 */
		public function ajax_get_clients(): void {
			check_ajax_referer( self::AJAX_NONCE_ACTION, 'nonce' );

			if ( ! current_user_can( 'edit_pages' ) ) {
				wp_send_json_error( array( 'message' => 'Permission denied' ) );
			}

			$pages_dir = LEANCMS_PLUGIN_DIR . 'templates/pages/';
			$clients   = array();

			if ( is_dir( $pages_dir ) ) {
				$dirs = glob( $pages_dir . '*', GLOB_ONLYDIR );

				foreach ( $dirs as $dir ) {
					$folder = basename( $dir );

					// Skip special folders.
					if ( in_array( $folder, array( '_partials', '_shared' ), true ) ) {
						continue;
					}

					// Check if folder has templates or config.
					$has_templates = ! empty( glob( $dir . '/slug-*.php' ) );
					$has_config    = file_exists( $dir . '/config.php' );

					if ( $has_templates || $has_config ) {
						$clients[] = array(
							'code'          => $folder,
							'has_config'    => $has_config,
							'has_templates' => $has_templates,
						);
					}
				}
			}

			// Sort alphabetically.
			usort( $clients, function ( $a, $b ) {
				return strcasecmp( $a['code'], $b['code'] );
			} );

			wp_send_json_success( array( 'clients' => $clients ) );
		}

		/**
		 * AJAX handler: Get list of templates for a client.
		 */
		public function ajax_get_templates(): void {
			check_ajax_referer( self::AJAX_NONCE_ACTION, 'nonce' );

			if ( ! current_user_can( 'edit_pages' ) ) {
				wp_send_json_error( array( 'message' => 'Permission denied' ) );
			}

			$client = isset( $_POST['client'] ) ? sanitize_file_name( $_POST['client'] ) : '';

			if ( empty( $client ) ) {
				wp_send_json_error( array( 'message' => 'Client code required' ) );
			}

			$client_dir = LEANCMS_PLUGIN_DIR . 'templates/pages/' . $client . '/';
			$templates  = array();

			if ( is_dir( $client_dir ) ) {
				$files = glob( $client_dir . 'slug-*.php' );

				foreach ( $files as $file ) {
					$filename = basename( $file );

					// Skip noaccess variants.
					if ( strpos( $filename, '-noaccess.php' ) !== false ) {
						continue;
					}

					// Extract slug name.
					$slug = preg_replace( '/^slug-(.+)\.php$/', '$1', $filename );

					$templates[] = array(
						'file' => $filename,
						'slug' => $slug,
						'name' => ucwords( str_replace( '-', ' ', $slug ) ),
					);
				}
			}

			// Sort alphabetically by name.
			usort( $templates, function ( $a, $b ) {
				return strcasecmp( $a['name'], $b['name'] );
			} );

			wp_send_json_success( array(
				'templates'  => $templates,
				'has_config' => file_exists( $client_dir . 'config.php' ),
			) );
		}

		/**
		 * AJAX handler: Import config.php data.
		 */
		public function ajax_import_config(): void {
			check_ajax_referer( self::AJAX_NONCE_ACTION, 'nonce' );

			if ( ! current_user_can( 'edit_pages' ) ) {
				wp_send_json_error( array( 'message' => 'Permission denied' ) );
			}

			$client = isset( $_POST['client'] ) ? sanitize_file_name( $_POST['client'] ) : '';

			if ( empty( $client ) ) {
				wp_send_json_error( array( 'message' => 'Client code required' ) );
			}

			$config_file = LEANCMS_PLUGIN_DIR . 'templates/pages/' . $client . '/config.php';

			if ( ! file_exists( $config_file ) ) {
				wp_send_json_error( array( 'message' => 'Config file not found: ' . $client . '/config.php' ) );
			}

			// Read the config file content.
			$content = file_get_contents( $config_file );

			if ( false === $content ) {
				wp_send_json_error( array( 'message' => 'Failed to read config file' ) );
			}

			// Format the content for display.
			$formatted = $this->format_config_for_display( $content );

			wp_send_json_success( array(
				'code'   => $formatted,
				'client' => $client,
			) );
		}

		/**
		 * AJAX handler: Import layout from template file.
		 */
		public function ajax_import_layout(): void {
			check_ajax_referer( self::AJAX_NONCE_ACTION, 'nonce' );

			if ( ! current_user_can( 'edit_pages' ) ) {
				wp_send_json_error( array( 'message' => 'Permission denied' ) );
			}

			$client   = isset( $_POST['client'] ) ? sanitize_file_name( $_POST['client'] ) : '';
			$template = isset( $_POST['template'] ) ? sanitize_file_name( $_POST['template'] ) : '';

			if ( empty( $client ) || empty( $template ) ) {
				wp_send_json_error( array( 'message' => 'Client and template required' ) );
			}

			$template_file = LEANCMS_PLUGIN_DIR . 'templates/pages/' . $client . '/' . $template;

			if ( ! file_exists( $template_file ) ) {
				wp_send_json_error( array( 'message' => 'Template not found: ' . $client . '/' . $template ) );
			}

			// Read the template file.
			$content = file_get_contents( $template_file );

			if ( false === $content ) {
				wp_send_json_error( array( 'message' => 'Failed to read template file' ) );
			}

			// Extract layout code.
			$layout = $this->extract_layout_from_template( $content );

			if ( empty( $layout ) ) {
				wp_send_json_error( array( 'message' => 'No partial calls found in template' ) );
			}

			wp_send_json_success( array(
				'code'     => $layout,
				'client'   => $client,
				'template' => $template,
			) );
		}

		/**
		 * Format config.php content for display in the editor.
		 *
		 * @param string $content Raw file content.
		 *
		 * @return string Formatted content.
		 */
		private function format_config_for_display( string $content ): string {
			// The config file already starts with <?php and returns an array.
			// We'll keep it as-is for consistency with the expected format.
			$content = trim( $content );

			// Ensure it starts with <?php.
			if ( strpos( $content, '<?php' ) !== 0 ) {
				$content = "<?php\n" . $content;
			}

			return $content;
		}

		/**
		 * Extract layout code from a template file.
		 *
		 * Removes boilerplate (header, footer, config loading) and keeps only
		 * the partial calls and layout structure.
		 *
		 * @param string $content Raw template file content.
		 *
		 * @return string Extracted layout code.
		 */
		private function extract_layout_from_template( string $content ): string {
			// Remove PHP docblock at the start.
			$content = preg_replace( '/^<\?php\s*\/\*\*.*?\*\/\s*/s', '', $content );

			// Remove defined check.
			$content = preg_replace( '/defined\s*\(\s*[\'"]ABSPATH[\'"]\s*\)\s*\|\|\s*exit\s*;?\s*/', '', $content );

			// Remove get_header() call.
			$content = preg_replace( '/get_header\s*\(\s*\)\s*;?\s*/', '', $content );

			// Remove get_footer() call.
			$content = preg_replace( '/get_footer\s*\(\s*\)\s*;?\s*/', '', $content );

			// Remove config loading boilerplate.
			$patterns = array(
				// Remove: $global_config = include(...);
				'/\$global_config\s*=\s*include\s*\([^)]+\)\s*;?\s*/',
				// Remove: $client_config = include(...);
				'/\$client_config\s*=\s*include\s*\([^)]+\)\s*;?\s*/',
				// Remove: $config = include(...);
				'/\$config\s*=\s*(?:include|require)(?:_once)?\s*\([^)]+\)\s*;?\s*/',
				// Remove: CSS variable merging.
				'/\$css_vars\s*=\s*array_merge\s*\([^;]+;?\s*/',
				// Remove: load_client_resources calls.
				'/load_client_resources\s*\([^)]+\)\s*;?\s*/',
			);

			foreach ( $patterns as $pattern ) {
				$content = preg_replace( $pattern, '', $content );
			}

			// Keep inline <style> blocks - users can manually remove if not needed.

			// Remove link tags (stylesheets loaded via wp_enqueue).
			$content = preg_replace( '/<link[^>]+>/s', '', $content );

			// Remove HTML comments.
			$content = preg_replace( '/<!--.*?-->/s', '', $content );

			// Remove empty PHP blocks.
			$content = preg_replace( '/<\?php\s*\?>/s', '', $content );

			// Remove standalone PHP close tags on their own line (left over after removing get_header, etc.).
			$content = preg_replace( '/^\s*\?' . '>\s*$/m', '', $content );

			// Clean up multiple blank lines.
			$content = preg_replace( '/\n{3,}/', "\n\n", $content );

			// Trim whitespace.
			$content = trim( $content );

			// The layout code is inserted directly into the template in HTML/mixed mode,
			// so we don't prepend a PHP open tag - it would break HTML output.
			// Layout code typically starts with a main wrapper followed by PHP blocks.

			return $content;
		}
	}
}
