<?php
/**
 * Global Panels Orchestrator
 *
 * Manages global UI panels that appear across all pages based on configuration.
 * Designed to be extensible for multiple panel types (ads, notifications, banners, etc.)
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-global-panels-orchestrator.php
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'LeanCMS_Global_Panels_Orchestrator' ) ) {

	/**
	 * Orchestrates loading of global panels based on configuration.
	 *
	 * This class acts as a centralized controller for global UI elements that should
	 * appear across all pages. It's designed to be extensible - new panel types can
	 * be added by simply adding configuration and creating the corresponding partial.
	 */
	final class LeanCMS_Global_Panels_Orchestrator {

		/**
		 * Singleton instance.
		 *
		 * @var self|null
		 */
		private static $instance = null;

		/**
		 * Cached global configuration.
		 *
		 * @var array|null
		 */
		private $config = null;

		/**
		 * Bootstraps the orchestrator singleton.
		 */
		public static function boot(): self {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register WordPress hooks.
		 */
		private function __construct() {
			// Hook into wp_footer to render global panels after main content
			add_action( 'wp_footer', array( $this, 'render_global_panels' ), 5 );
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
		 * Load and cache the global configuration.
		 *
		 * @return array Configuration array.
		 */
		private function load_config(): array {
			if ( null !== $this->config ) {
				return $this->config;
			}

			$global_config_path = trailingslashit( LEANCMS_PLUGIN_DIR ) . 'templates/assets/global/config.php';

			if ( ! is_readable( $global_config_path ) ) {
				$this->config = array();
				return $this->config;
			}

			$this->config = include $global_config_path;

			// Allow client-specific config overrides
			if ( is_page() ) {
				$page_id = get_queried_object_id();
				if ( $page_id ) {
					$client_code = get_post_meta( $page_id, '_leancms_client_code', true );
					if ( $client_code ) {
						$client_config_path = trailingslashit( LEANCMS_PLUGIN_DIR ) .
							'templates/pages/' . $client_code . '/config.php';

						if ( is_readable( $client_config_path ) ) {
							$client_config = include $client_config_path;
							// Merge client config over global config
							$this->config = array_replace_recursive( $this->config, $client_config );
						}
					}
				}
			}

			return $this->config;
		}

		/**
		 * Render all enabled global panels.
		 *
		 * This is the main orchestration method that determines which panels to load
		 * based on configuration. Extensible for multiple panel types.
		 */
		public function render_global_panels(): void {
			// Only render on LeanCMS pages
			if ( ! $this->should_render_panels() ) {
				return;
			}

			$config = $this->load_config();

			// Panel types registry - add new panel types here
			$panel_types = array(
				'site_footer' => array(
					'partial'         => 'global-panels/site-footer/site-footer',
					'folder'          => '',
					'config_key'      => 'site_footer',
					'default_enabled' => true,
				),
				// Future panel types can be added here:
				// 'notification_bar' => array(
				//     'partial'         => 'global-panels/notification-bar/notification-bar',
				//     'folder'          => '',
				//     'config_key'      => 'notification_bar',
				//     'default_enabled' => false,
				// ),
			);

			/**
			 * Filter the panel types registry.
			 *
			 * Allows plugins/themes to add custom panel types.
			 *
			 * @param array $panel_types Panel type definitions.
			 */
			$panel_types = apply_filters( 'leancms_global_panel_types', $panel_types );

			// Render each enabled panel
			foreach ( $panel_types as $panel_id => $panel_def ) {
				$this->render_panel( $panel_id, $panel_def, $config );
			}
		}

		/**
		 * Render a single panel if enabled.
		 *
		 * @param string $panel_id  Panel identifier.
		 * @param array  $panel_def Panel definition with partial, folder, config_key.
		 * @param array  $config    Full configuration array.
		 */
		private function render_panel( string $panel_id, array $panel_def, array $config ): void {
			$config_key = $panel_def['config_key'] ?? $panel_id;
			$default_enabled = $panel_def['default_enabled'] ?? true;

			// Check if panel is enabled
			$panel_config = $config[ $config_key ] ?? array();
			$is_enabled = $panel_config['enabled'] ?? $default_enabled;

			/**
			 * Filter whether a specific panel should render.
			 *
			 * @param bool   $is_enabled Whether the panel is enabled.
			 * @param string $panel_id   Panel identifier.
			 * @param array  $panel_def  Panel definition.
			 * @param array  $config     Full configuration.
			 */
			$is_enabled = apply_filters(
				'leancms_global_panel_enabled',
				$is_enabled,
				$panel_id,
				$panel_def,
				$config
			);

			$is_enabled = apply_filters(
				"leancms_global_panel_{$panel_id}_enabled",
				$is_enabled,
				$panel_def,
				$config
			);

			if ( ! $is_enabled ) {
				return;
			}

			// Extract content/settings for the partial
			$partial_config = $panel_config['content'] ?? $panel_config;

			// Remove 'enabled' key from partial config if it exists
			if ( isset( $partial_config['enabled'] ) ) {
				unset( $partial_config['enabled'] );
			}

			/**
			 * Filter the panel configuration before rendering.
			 *
			 * @param array  $partial_config Configuration passed to the partial.
			 * @param string $panel_id       Panel identifier.
			 * @param array  $panel_def      Panel definition.
			 */
			$partial_config = apply_filters(
				'leancms_global_panel_config',
				$partial_config,
				$panel_id,
				$panel_def
			);

			$partial_config = apply_filters(
				"leancms_global_panel_{$panel_id}_config",
				$partial_config,
				$panel_def
			);

			// Render the partial if the helper function exists
			if ( function_exists( 'partial' ) ) {
				$partial_name = $panel_def['partial'] ?? $panel_id;
				$partial_folder = $panel_def['folder'] ?? '';

				/**
				 * Action hook before rendering a global panel.
				 *
				 * @param string $panel_id       Panel identifier.
				 * @param array  $partial_config Configuration being passed to partial.
				 */
				do_action( 'leancms_before_global_panel', $panel_id, $partial_config );
				do_action( "leancms_before_global_panel_{$panel_id}", $partial_config );

				partial( $partial_name, $partial_config, $partial_folder );

				/**
				 * Action hook after rendering a global panel.
				 *
				 * @param string $panel_id       Panel identifier.
				 * @param array  $partial_config Configuration that was passed to partial.
				 */
				do_action( 'leancms_after_global_panel', $panel_id, $partial_config );
				do_action( "leancms_after_global_panel_{$panel_id}", $partial_config );
			}
		}

		/**
		 * Determine if global panels should render on current page.
		 *
		 * @return bool True if panels should render.
		 */
		private function should_render_panels(): bool {
			// Only render on pages
			if ( ! is_page() ) {
				return false;
			}

			$page_id = get_queried_object_id();
			if ( ! $page_id ) {
				return false;
			}

			// Only render on LeanCMS template pages
			$chosen = get_page_template_slug( $page_id );
			$matches_plugin_template = ( $chosen === LEANCMS_PAGE_TEMPLATE_SLUG )
				|| ( is_string( $chosen ) && preg_match( '#'. preg_quote( LEANCMS_PAGE_TEMPLATE_SLUG, '#' ) . '$#', $chosen ) );

			/**
			 * Filter whether global panels should render.
			 *
			 * @param bool $should_render Whether panels should render.
			 * @param int  $page_id       Current page ID.
			 */
			return apply_filters( 'leancms_should_render_global_panels', $matches_plugin_template, $page_id );
		}
	}
}
