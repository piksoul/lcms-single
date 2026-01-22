<?php
/**
 * LeanCMS Client Code Meta Box
 *
 * Provides a simple text field for specifying which client subfolder
 * to use when resolving page templates.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-client-code-meta-box.php
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'LeanCMS_Client_Code_Meta_Box' ) ) {

	/**
	 * Handles the Client Code meta box for page template routing.
	 */
	final class LeanCMS_Client_Code_Meta_Box {

		/**
		 * Meta key for storing client code.
		 *
		 * @var string
		 */
		const META_KEY = '_leancms_client_code';

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
			add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
			add_action( 'save_post', array( $this, 'save_meta_box' ) );
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
		 * Register the meta box for pages.
		 */
		public function register_meta_box(): void {
			add_meta_box(
				'leancms_client_code',
				__( 'LeanCMS Template Settings', 'brandhub-client-cms' ),
				array( $this, 'render_meta_box' ),
				'page',
				'side',
				'default'
			);
		}

		/**
		 * Render the meta box content.
		 *
		 * @param WP_Post $post Current post object.
		 */
		public function render_meta_box( $post ): void {
			// Add nonce for security.
			wp_nonce_field( 'leancms_client_code_nonce', 'leancms_client_code_nonce' );

			// Get current value.
			$client_code = get_post_meta( $post->ID, self::META_KEY, true );

			?>
			<div style="margin: 12px 0;">
				<label for="leancms_client_code" style="display: block; margin-bottom: 8px; font-weight: 600;">
					<?php esc_html_e( 'Client Code', 'brandhub-client-cms' ); ?>
					<span style="font-weight: 400; color: #757575; font-size: 12px;"><?php esc_html_e( '(optional)', 'brandhub-client-cms' ); ?></span>
				</label>

				<input
					type="text"
					id="leancms_client_code"
					name="leancms_client_code"
					value="<?php echo esc_attr( $client_code ); ?>"
					class="widefat"
					placeholder="<?php esc_attr_e( 'e.g., refr, brhu, BICWA', 'brandhub-client-cms' ); ?>"
					style="margin-bottom: 8px;"
				/>

				<p class="description" style="margin: 0; font-size: 12px; line-height: 1.5;">
					<?php esc_html_e( 'Specify the subfolder in templates/pages/ to use for this page.', 'brandhub-client-cms' ); ?>
					<br>
					<?php esc_html_e( 'Leave blank to auto-detect from page slug.', 'brandhub-client-cms' ); ?>
				</p>
			</div>

			<?php
			// Show current template path if available.
			$this->show_template_info( $post->ID, $client_code );
		}

		/**
		 * Display helpful template path information.
		 *
		 * @param int    $post_id     Post ID.
		 * @param string $client_code Current client code.
		 */
		private function show_template_info( int $post_id, string $client_code ): void {
			$slug = get_post_field( 'post_name', $post_id );

			if ( empty( $slug ) ) {
				return;
			}

			$template_path = '';

			if ( ! empty( $client_code ) ) {
				$template_path = sprintf( '%s/slug-%s.php', $client_code, $slug );
			} else {
				// Show auto-detected path if available.
				$auto_code = $this->extract_client_code_from_slug( $slug );
				if ( $auto_code ) {
					$clean_slug = preg_replace( '/^' . preg_quote( $auto_code, '/' ) . '-/', '', $slug );
					$template_path = sprintf( '%s/slug-%s.php', $auto_code, $clean_slug );
				} else {
					$template_path = sprintf( 'slug-%s.php', $slug );
				}
			}

			if ( $template_path ) {
				?>
				<div style="margin-top: 12px; padding: 8px; background: #f0f0f1; border-radius: 4px;">
					<p style="margin: 0; font-size: 11px; color: #646970;">
						<strong><?php esc_html_e( 'Template path:', 'brandhub-client-cms' ); ?></strong><br>
						<code style="font-size: 11px;">templates/pages/<?php echo esc_html( $template_path ); ?></code>
					</p>
				</div>
				<?php
			}
		}

		/**
		 * Extract client code from slug (for preview purposes).
		 *
		 * @param string $slug Page slug.
		 *
		 * @return string|null
		 */
		private function extract_client_code_from_slug( string $slug ): ?string {
			// Match 4-letter code at start of slug.
			if ( preg_match( '/^([a-z]{4})-/', $slug, $matches ) ) {
				return $matches[1];
			}

			return null;
		}

		/**
		 * Save the meta box data.
		 *
		 * @param int $post_id Post ID.
		 */
		public function save_meta_box( int $post_id ): void {
			// Verify nonce.
			if ( ! isset( $_POST['leancms_client_code_nonce'] ) ) {
				return;
			}

			if ( ! wp_verify_nonce( $_POST['leancms_client_code_nonce'], 'leancms_client_code_nonce' ) ) {
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

			// Check if our field is set.
			if ( ! isset( $_POST['leancms_client_code'] ) ) {
				return;
			}

			// Sanitize and save.
			$client_code = $this->sanitize_client_code( $_POST['leancms_client_code'] );

			if ( empty( $client_code ) ) {
				// Delete meta if empty (allows auto-detection to work).
				delete_post_meta( $post_id, self::META_KEY );
			} else {
				// Update meta with sanitized value.
				update_post_meta( $post_id, self::META_KEY, $client_code );
			}
		}

		/**
		 * Sanitize client code input.
		 *
		 * @param string $code Raw input.
		 *
		 * @return string Sanitized code.
		 */
		private function sanitize_client_code( string $code ): string {
			// Remove whitespace.
			$code = trim( $code );

			// Convert to lowercase.
			$code = strtolower( $code );

			// Keep only alphanumeric and hyphens.
			$code = preg_replace( '/[^a-z0-9-]/', '', $code );

			// Remove multiple consecutive hyphens.
			$code = preg_replace( '/-+/', '-', $code );

			// Remove leading/trailing hyphens.
			$code = trim( $code, '-' );

			return $code;
		}

		/**
		 * Get client code for a specific page.
		 *
		 * @param int $post_id Post ID.
		 *
		 * @return string|null Client code or null if not set.
		 */
		public static function get_client_code( int $post_id ): ?string {
			$code = get_post_meta( $post_id, self::META_KEY, true );

			return ! empty( $code ) ? $code : null;
		}
	}
}
