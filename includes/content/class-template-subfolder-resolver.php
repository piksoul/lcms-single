<?php
/**
 * LeanCMS Template Subfolder Resolver
 *
 * Extends template resolution to support client-organized subfolders
 * while maintaining backwards compatibility with flat structure.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-template-subfolder-resolver.php
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'LeanCMS_Template_Subfolder_Resolver' ) ) {

    /**
     * Adds support for organizing templates in client-specific subfolders.
     *
     * New Structure:
     * templates/pages/
     *   ├── refr/                     (client folder)
     *   │   ├── slug-brand-guide.php
     *   │   ├── slug-web-review.php
     *   │   └── _archive/             (archived templates)
     *   ├── brhu/                     (another client)
     *   ├── BICWA/                    (another client)
     *   ├── _shared/                  (shared templates)
     *   ├── _partials/                (reusable components)
     *   └── slug-old-template.php    (legacy flat structure - still works)
     *
     * Client Code Resolution Priority:
     * 1. Check _leancms_client_code meta field (set via meta box)
     * 2. Extract from page slug (e.g., 'refr-brand-guide' → 'refr')
     * 3. Fall back to flat structure
     *
     * Template resolution checks client subfolder FIRST, then falls back to flat structure.
     */
    final class LeanCMS_Template_Subfolder_Resolver {

        /**
         * Known client codes (4-letter prefixes).
         * Add new clients here as they're onboarded.
         *
         * @var string[]
         */
        private static $client_codes = array(
            'refr',  // Reframe WA
            'brhu',  // BrandHub
            'test',  // Test pages
        );

        /**
         * Bootstrap the resolver.
         */
        public static function boot(): void {
            add_filter( 'leancms_candidate_pages', array( __CLASS__, 'add_subfolder_candidates' ), 10, 3 );
        }

        /**
         * Add client subfolder paths to template candidates list.
         *
         * This filter runs before file resolution, allowing us to check
         * client subfolders first while maintaining backwards compatibility.
         *
         * Resolution Priority:
         * 1. Check _leancms_client_code meta field (manual override)
         * 2. Extract from page slug (auto-detection)
         * 3. Fall back to flat structure
         *
         * @param string[] $tries   Original candidate filenames.
         * @param int      $page_id Current page ID.
         * @param string   $slug    Current page slug.
         *
         * @return string[] Extended candidate list.
         */
        public static function add_subfolder_candidates( array $tries, int $page_id, string $slug ): array {
            $new_candidates = array();

            // Get client code (checks meta field first, then slug)
            $client_code = self::get_client_code( $page_id, $slug );

            if ( $client_code ) {
                // For each original candidate, add a client subfolder version
                foreach ( $tries as $filename ) {
                    // Remove redundant client code from filename if present
                    $clean_filename = self::remove_client_prefix( $filename, $client_code );

                    // Add client subfolder path (checked FIRST)
                    $new_candidates[] = $client_code . '/' . $clean_filename;
                }
            }

            // Add original flat structure paths as fallback (checked LAST)
            $new_candidates = array_merge( $new_candidates, $tries );

            return $new_candidates;
        }

        /**
         * Get client code for a page.
         *
         * Checks multiple sources in priority order:
         * 1. _leancms_client_code meta field (manual override)
         * 2. Auto-detect from page slug
         *
         * @param int         $page_id Page ID.
         * @param string|null $slug    Page slug.
         *
         * @return string|null Client code or null if not found.
         */
        private static function get_client_code( int $page_id, ?string $slug ): ?string {
            // Priority 1: Check meta field (manual override).
            $meta_code = get_post_meta( $page_id, '_leancms_client_code', true );
            if ( ! empty( $meta_code ) ) {
                return $meta_code;
            }

            // Priority 2: Auto-detect from slug.
            return self::extract_client_code_from_slug( $slug );
        }

        /**
         * Extract client code from page slug.
         *
         * Looks for known 4-letter client codes at the start of the slug.
         * Falls back to extracting any 4-letter prefix if not in known list.
         *
         * @param string|null $slug Page slug.
         *
         * @return string|null Client code or null if not found.
         */
        private static function extract_client_code_from_slug( ?string $slug ): ?string {
            if ( empty( $slug ) ) {
                return null;
            }

            // Check if slug starts with a known client code
            foreach ( self::$client_codes as $code ) {
                if ( strpos( $slug, $code . '-' ) === 0 ) {
                    return $code;
                }
            }

            // Fallback: Extract any 4-letter code at the start
            // This allows flexibility without requiring registration
            if ( preg_match( '/^([a-z]{4})-/', $slug, $matches ) ) {
                return $matches[1];
            }

            return null;
        }

        /**
         * Remove redundant client prefix from filename.
         *
         * Transforms 'slug-refr-brand-guide.php' → 'slug-brand-guide.php'
         * when client code is known.
         *
         * @param string $filename    Original filename.
         * @param string $client_code Client code to remove.
         *
         * @return string Cleaned filename.
         */
        private static function remove_client_prefix( string $filename, string $client_code ): string {
            // Pattern: slug-{client}-{rest}.php → slug-{rest}.php
            $pattern = '/^(slug|id)-' . preg_quote( $client_code, '/' ) . '-/';
            return preg_replace( $pattern, '$1-', $filename );
        }

        /**
         * Register a new client code.
         *
         * Call this when onboarding a new client to enable their subfolder.
         *
         * @param string $code 4-letter client code (lowercase).
         *
         * @return bool True if added, false if already exists.
         */
        public static function register_client_code( string $code ): bool {
            $code = strtolower( trim( $code ) );

            if ( in_array( $code, self::$client_codes, true ) ) {
                return false;
            }

            self::$client_codes[] = $code;
            return true;
        }

        /**
         * Get list of registered client codes.
         *
         * @return string[]
         */
        public static function get_client_codes(): array {
            return self::$client_codes;
        }
    }
}
