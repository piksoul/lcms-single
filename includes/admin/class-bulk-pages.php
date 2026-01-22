<?php
/**
 * Bulk Page Creation Admin Interface
 *
 * Provides an admin interface for creating multiple WordPress pages at once
 * using JSON/Array template definitions with support for parent-child relationships
 * and client code metadata.
 *
 * @package LeanCMS
 * @since 1.3.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class LeanCMS_Bulk_Pages
 *
 * Handles bulk page creation with JSON templates, preset configurations,
 * and integration with the LeanCMS template system.
 */
class LeanCMS_Bulk_Pages {
	/**
	 * Singleton instance
	 *
	 * @var LeanCMS_Bulk_Pages|null
	 */
	private static $instance = null;

	/**
	 * Nonce action for security
	 */
	const NONCE_ACTION = 'leancms_bulk_pages_create';

	/**
	 * Nonce field name
	 */
	const NONCE_NAME = 'leancms_bulk_pages_nonce';

	/**
	 * Results from last bulk creation
	 *
	 * @var array
	 */
	private $last_results = array();

	/**
	 * Boot the class and return singleton instance
	 *
	 * @return LeanCMS_Bulk_Pages
	 */
	public static function boot(): self {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Private constructor - singleton pattern
	 */
	private function __construct() {
		add_action( 'admin_menu', array( $this, 'register_submenu' ) );
		add_action( 'admin_init', array( $this, 'handle_bulk_creation' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	/**
	 * Prevent cloning
	 */
	private function __clone() {}

	/**
	 * Prevent unserialization
	 */
	public function __wakeup() {
		throw new \RuntimeException( 'Cannot unserialize singleton' );
	}

	/**
	 * Register admin submenu page
	 */
	public function register_submenu(): void {
		add_submenu_page(
			'options-general.php',
			'Bulk Create Pages - Lean CMS',
			'Bulk Pages',
			'manage_options',
			'leancms-bulk-pages',
			array( $this, 'render_admin_page' )
		);
	}

	/**
	 * Handle bulk page creation form submission
	 */
	public function handle_bulk_creation(): void {
		// Check if this is our form submission
		if ( ! isset( $_POST[ self::NONCE_NAME ] ) ) {
			return;
		}

		// Verify nonce
		if ( ! wp_verify_nonce( $_POST[ self::NONCE_NAME ], self::NONCE_ACTION ) ) {
			wp_die( 'Security check failed', 'Security Error', array( 'response' => 403 ) );
		}

		// Check permissions
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Insufficient permissions', 'Permission Error', array( 'response' => 403 ) );
		}

		// Get and parse JSON
		$json = isset( $_POST['pages_json'] ) ? wp_unslash( $_POST['pages_json'] ) : '';

		if ( empty( $json ) ) {
			add_settings_error(
				'leancms_bulk_pages',
				'empty_json',
				'Please provide page data in JSON format.',
				'error'
			);
			return;
		}

		// Parse JSON
		$pages_data = json_decode( $json, true );

		if ( json_last_error() !== JSON_ERROR_NONE ) {
			add_settings_error(
				'leancms_bulk_pages',
				'json_error',
				'Invalid JSON: ' . json_last_error_msg(),
				'error'
			);
			return;
		}

		if ( ! is_array( $pages_data ) ) {
			add_settings_error(
				'leancms_bulk_pages',
				'json_not_array',
				'JSON must be an array of page objects.',
				'error'
			);
			return;
		}

		// Create pages
		$this->last_results = $this->create_pages_from_data( $pages_data );

		// Display results
		if ( ! empty( $this->last_results['success'] ) ) {
			add_settings_error(
				'leancms_bulk_pages',
				'success',
				sprintf(
					'Successfully created %d page(s).',
					count( $this->last_results['success'] )
				),
				'success'
			);
		}

		if ( ! empty( $this->last_results['errors'] ) ) {
			foreach ( $this->last_results['errors'] as $error ) {
				add_settings_error(
					'leancms_bulk_pages',
					'creation_error',
					$error,
					'error'
				);
			}
		}

		if ( ! empty( $this->last_results['warnings'] ) ) {
			foreach ( $this->last_results['warnings'] as $warning ) {
				add_settings_error(
					'leancms_bulk_pages',
					'creation_warning',
					$warning,
					'warning'
				);
			}
		}
	}

	/**
	 * Create pages from parsed JSON data
	 *
	 * @param array $pages_data Array of page definitions
	 * @return array Results array with success, errors, and warnings
	 */
	private function create_pages_from_data( array $pages_data ): array {
		$results = array(
			'success'  => array(),
			'errors'   => array(),
			'warnings' => array(),
		);

		// Map of created slugs to IDs for parent resolution
		$created_map = array();

		foreach ( $pages_data as $index => $page_data ) {
			$page_num = $index + 1;

			// Validate required fields
			if ( empty( $page_data['page-title'] ) ) {
				$results['errors'][] = "Page #{$page_num}: Missing required field 'page-title'";
				continue;
			}

			// Generate slug if not provided
			if ( ! empty( $page_data['slug'] ) ) {
				// Use provided slug
				$slug = sanitize_title( $page_data['slug'] );
			} elseif ( empty( $page_data['parent'] ) || $page_data['parent'] === 0 || $page_data['parent'] === '0' ) {
				// Top-level page: use client-code prefix if available
				if ( ! empty( $page_data['client-code'] ) ) {
					$slug = sanitize_title( $page_data['client-code'] . '-' . $page_data['page-title'] );
				} else {
					$slug = sanitize_title( $page_data['page-title'] );
				}
			} else {
				// Child page: just use page-title (inherits parent's namespace in URL)
				$slug = sanitize_title( $page_data['page-title'] );
			}

			// Check if page with this slug already exists
			$existing = get_page_by_path( $slug, OBJECT, 'page' );
			if ( $existing ) {
				$results['warnings'][] = sprintf(
					'Page "%s" with slug "%s" already exists (ID: %d), skipped',
					esc_html( $page_data['page-title'] ),
					esc_html( $slug ),
					$existing->ID
				);
				// Add to created map so children can reference it
				$created_map[ $slug ] = $existing->ID;
				continue;
			}

			// Resolve parent ID
			$parent_id = $this->resolve_parent_id(
				$page_data['parent'] ?? 0,
				$created_map,
				$results
			);

			// Prepare post data
			$post_data = array(
				'post_type'    => 'page',
				'post_title'   => sanitize_text_field( $page_data['page-title'] ),
				'post_name'    => $slug,
				'post_parent'  => $parent_id,
				'post_status'  => 'publish',
				'meta_input'   => array(
					'_wp_page_template' => LEANCMS_PAGE_TEMPLATE_SLUG,
				),
			);

			// Create the page
			$post_id = wp_insert_post( $post_data, true );

			if ( is_wp_error( $post_id ) ) {
				$results['errors'][] = sprintf(
					'Page #%d "%s": %s',
					$page_num,
					esc_html( $page_data['page-title'] ),
					$post_id->get_error_message()
				);
				continue;
			}

			// Store client code if provided
			if ( ! empty( $page_data['client-code'] ) ) {
				$client_code = $this->sanitize_client_code( $page_data['client-code'] );
				update_post_meta( $post_id, '_leancms_client_code', $client_code );
			}

			// Store dynamic template if provided
			if ( ! empty( $page_data['dynamic-template'] ) ) {
				update_post_meta( $post_id, '_leancms_dynamic_template', $page_data['dynamic-template'] );
			}

			// Add to created map for parent resolution
			$created_map[ $slug ] = $post_id;

			// Record success
			$results['success'][] = array(
				'id'          => $post_id,
				'title'       => $page_data['page-title'],
				'slug'        => $slug,
				'client_code' => $page_data['client-code'] ?? '',
				'edit_url'    => get_edit_post_link( $post_id ),
				'view_url'    => get_permalink( $post_id ),
			);
		}

		return $results;
	}

	/**
	 * Resolve parent page ID from reference
	 *
	 * @param mixed $parent_ref Parent reference (ID, slug, or 0)
	 * @param array $created_map Map of slugs to IDs created in this batch
	 * @param array &$results Results array to add warnings to
	 * @return int Parent page ID or 0
	 */
	private function resolve_parent_id( $parent_ref, array $created_map, array &$results ): int {
		// No parent
		if ( empty( $parent_ref ) || $parent_ref === 0 || $parent_ref === '0' ) {
			return 0;
		}

		// Numeric ID
		if ( is_numeric( $parent_ref ) ) {
			$parent_id = (int) $parent_ref;
			// Verify it exists
			if ( get_post( $parent_id ) ) {
				return $parent_id;
			} else {
				$results['warnings'][] = sprintf(
					'Parent page ID %d not found, creating as top-level page',
					$parent_id
				);
				return 0;
			}
		}

		// Slug reference - check if just created in this batch
		if ( isset( $created_map[ $parent_ref ] ) ) {
			return $created_map[ $parent_ref ];
		}

		// Lookup existing page by slug
		$parent = get_page_by_path( $parent_ref, OBJECT, 'page' );
		if ( $parent ) {
			return $parent->ID;
		}

		// Parent not found
		$results['warnings'][] = sprintf(
			'Parent page "%s" not found, creating as top-level page (ensure parent appears before child in JSON)',
			esc_html( $parent_ref )
		);
		return 0;
	}

	/**
	 * Sanitize client code
	 *
	 * @param string $client_code Raw client code
	 * @return string Sanitized client code
	 */
	private function sanitize_client_code( string $client_code ): string {
		// Convert to lowercase
		$client_code = strtolower( $client_code );
		// Remove any characters that aren't alphanumeric or hyphens
		$client_code = preg_replace( '/[^a-z0-9\-]/', '', $client_code );
		return $client_code;
	}

	/**
	 * Get preset templates
	 *
	 * @return array Preset templates with name and JSON data
	 */
	public function get_preset_templates(): array {
		return array(
			'standard-client-project' => array(
				'name'        => 'Standard Client Project',
				'description' => 'Homepage with Brand Guide and Resources sub-pages',
				'template'    => array(
					array(
						'page-title'  => '{{CLIENT_NAME}} - Home',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}',
					),
					array(
						'page-title'  => 'Brand Guide',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'brand-guide',
					),
					array(
						'page-title'  => 'Resources',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'resources',
					),
				),
			),
			'brand-guide-full'        => array(
				'name'        => 'Brand Guide with Sub-pages',
				'description' => 'Complete brand guide structure with Colors, Typography, Logos, Voice & Tone',
				'template'    => array(
					array(
						'page-title'  => '{{CLIENT_NAME}} - Brand Guide',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}',
					),
					array(
						'page-title'  => 'Colors',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'colors',
					),
					array(
						'page-title'  => 'Typography',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'typography',
					),
					array(
						'page-title'  => 'Logos',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'logos',
					),
					array(
						'page-title'  => 'Voice & Tone',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'voice-tone',
					),
				),
			),
			'pro-sites-layout'        => array(
				'name'        => 'Pro-Sites Landing Pages',
				'description' => 'Standard website structure: Landing, About, Services, Contact',
				'template'    => array(
					array(
						'page-title'  => '{{CLIENT_NAME}} - Landing',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}',
					),
					array(
						'page-title'  => 'About',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}-about',
					),
					array(
						'page-title'  => 'Services',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}-services',
					),
					array(
						'page-title'  => 'Contact',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}-contact',
					),
				),
			),
			'website-redesign-project' => array(
				'name'        => 'Website Redesign Project',
				'description' => 'Complete website redesign project structure with all 9 phases',
				'template'    => array(
					array(
						'page-title'  => '{{CLIENT_NAME}} - Project Overview',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}',
					),
					array(
						'page-title'  => 'Discovery & Planning',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'discovery-planning',
					),
					array(
						'page-title'  => 'Strategy & Information Architecture',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'strategy-ia',
					),
					array(
						'page-title'  => 'Design',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'design',
					),
					array(
						'page-title'  => 'Development',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'development',
					),
					array(
						'page-title'  => 'Content & SEO',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'content-seo',
					),
					array(
						'page-title'  => 'Testing & QA',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'testing-qa',
					),
					array(
						'page-title'  => 'Launch Preparation',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'launch-prep',
					),
					array(
						'page-title'  => 'Go-Live & Launch',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'go-live',
					),
					array(
						'page-title'  => 'Post-Launch Support',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'post-launch',
					),
				),
			),
			'project-with-phases'      => array(
				'name'        => 'Project with Phases',
				'description' => 'Project structure with Overview and four phases: Idea, Evaluation, Execution, Handover',
				'template'    => array(
					array(
						'page-title'  => '{{CLIENT_NAME}}',
						'parent'      => 0,
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => '{{PARENT_SLUG}}',
					),
					array(
						'page-title'  => 'Overview',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'project-overview',
					),
					array(
						'page-title'  => 'Idea',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'project-idea',
					),
					array(
						'page-title'  => 'Evaluation',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'project-evaluation',
					),
					array(
						'page-title'  => 'Execution',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'project-execution',
					),
					array(
						'page-title'  => 'Handover',
						'parent'      => '{{PARENT_SLUG}}',
						'client-code' => '{{CLIENT_CODE}}',
						'slug'        => 'project-handover',
					),
				),
			),
		);
	}

	/**
	 * Replace template variables in JSON
	 *
	 * @param string $json JSON string with variables
	 * @param string $client_code Client code to replace
	 * @param string $client_name Client name to replace
	 * @return string JSON with replaced variables
	 */
	public function replace_template_variables( string $json, string $client_code, string $client_name ): string {
		// Generate parent slug from client name
		$parent_slug = sanitize_title( $client_name );

		$replacements = array(
			'{{CLIENT_CODE}}'  => $client_code,
			'{{CLIENT_NAME}}'  => $client_name,
			'{{PARENT_SLUG}}' => $parent_slug,
		);
		return str_replace( array_keys( $replacements ), array_values( $replacements ), $json );
	}

	/**
	 * Render the admin page
	 */
	public function render_admin_page(): void {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Insufficient permissions' );
		}

		include LEANCMS_PLUGIN_DIR . 'includes/admin/views/bulk-pages-form.php';
	}

	/**
	 * Enqueue admin assets
	 *
	 * @param string $hook Current admin page hook
	 */
	public function enqueue_admin_assets( string $hook ): void {
		// Only load on our admin page
		if ( $hook !== 'settings_page_leancms-bulk-pages' ) {
			return;
		}

		// Enqueue admin styles
		wp_enqueue_style(
			'leancms-bulk-pages',
			plugins_url( 'assets/admin/bulk-pages.css', LEANCMS_PLUGIN_FILE ),
			array(),
			LEANCMS_VERSION
		);

		// Enqueue admin scripts
		wp_enqueue_script(
			'leancms-bulk-pages',
			plugins_url( 'assets/admin/bulk-pages.js', LEANCMS_PLUGIN_FILE ),
			array( 'jquery' ),
			LEANCMS_VERSION,
			true
		);

		// Pass presets to JavaScript
		wp_localize_script(
			'leancms-bulk-pages',
			'leancmsBulkPages',
			array(
				'presets' => $this->get_preset_templates(),
			)
		);
	}

	/**
	 * Get results from last bulk creation
	 *
	 * @return array Results array
	 */
	public function get_last_results(): array {
		return $this->last_results;
	}
}
