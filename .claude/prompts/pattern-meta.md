# WordPress Meta Pattern

## Purpose
Create meta/utility classes for assets management, caching, debugging, rendering, validation, and other supporting functionality.

## WordPress Standards
- Follow WordPress Coding Standards
- Use proper escaping for all output (`esc_html()`, `esc_attr()`, `esc_url()`)
- Sanitize all user inputs
- Use WordPress transients API for caching
- Use wp_enqueue_* functions for assets
- Implement proper error handling
- Use WordPress filesystem API when needed
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── meta/
    ├── class-assets-manager.php    # Enqueue scripts/styles
    ├── class-cache-manager.php     # Cache handling
    ├── class-debug-logger.php      # Debug/logging
    ├── class-manager.php           # Generic manager base
    ├── class-renderer.php          # Template rendering
    ├── class-summary.php           # Data summary/reports
    └── class-validator.php         # Data validation (extends utilities)
```

---

## 1. Assets Manager Template

**File:** `includes/meta/class-assets-manager.php`

```php
<?php
/**
 * Assets Manager
 *
 * Handles enqueuing of scripts and styles for the plugin.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-assets-manager.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Assets Manager Class
 *
 * Manages plugin assets (scripts and styles).
 */
class LeanCMS_Assets_Manager {

    /**
     * Asset version (for cache busting).
     *
     * @var string
     */
    private $version;

    /**
     * Initialize the class.
     */
    public function __construct() {
        $this->version = LEANCMS_VERSION;

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
    }

    /**
     * Enqueue frontend assets.
     */
    public function enqueue_frontend_assets() {
        // Styles
        wp_enqueue_style(
            '{handle}-frontend',
            LEANCMS_PLUGIN_URL . 'assets/css/frontend.css',
            array(),
            $this->version
        );

        // Scripts
        wp_enqueue_script(
            '{handle}-frontend',
            LEANCMS_PLUGIN_URL . 'assets/js/frontend.js',
            array( 'jquery' ),
            $this->version,
            true
        );

        // Localize script with data
        wp_localize_script(
            '{handle}-frontend',
            '{handle}Data',
            array(
                'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
                'nonce'     => wp_create_nonce( '{handle}_nonce' ),
                'pluginUrl' => LEANCMS_PLUGIN_URL,
                'strings'   => array(
                    'loading' => __( 'Loading...', 'leanos-plugin' ),
                    'error'   => __( 'An error occurred.', 'leanos-plugin' ),
                    'success' => __( 'Success!', 'leanos-plugin' ),
                ),
            )
        );
    }

    /**
     * Enqueue admin assets.
     *
     * @param string $hook Current admin page hook.
     */
    public function enqueue_admin_assets( $hook ) {
        // Only load on specific pages
        $allowed_pages = array(
            'toplevel_page_{page_slug}',
            '{post_type}',
            'edit-{post_type}',
        );

        if ( ! in_array( $hook, $allowed_pages, true ) ) {
            return;
        }

        // Admin styles
        wp_enqueue_style(
            '{handle}-admin',
            LEANCMS_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            $this->version
        );

        // Admin scripts
        wp_enqueue_script(
            '{handle}-admin',
            LEANCMS_PLUGIN_URL . 'assets/js/admin.js',
            array( 'jquery', 'jquery-ui-sortable' ),
            $this->version,
            true
        );

        // Localize admin script
        wp_localize_script(
            '{handle}-admin',
            '{handle}AdminData',
            array(
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( '{handle}_admin_nonce' ),
                'strings' => array(
                    'confirmDelete' => __( 'Are you sure you want to delete this?', 'leanos-plugin' ),
                    'saved'         => __( 'Saved successfully!', 'leanos-plugin' ),
                ),
            )
        );
    }

    /**
     * Conditionally enqueue assets for specific post types.
     *
     * @param string $post_type Post type slug.
     */
    public function enqueue_for_post_type( $post_type ) {
        global $post;

        if ( ! $post || $post->post_type !== $post_type ) {
            return;
        }

        wp_enqueue_script(
            '{handle}-{post_type}',
            LEANCMS_PLUGIN_URL . 'assets/js/{post_type}.js',
            array( 'jquery' ),
            $this->version,
            true
        );
    }

    /**
     * Register and enqueue block editor assets.
     */
    public function enqueue_block_editor_assets() {
        wp_enqueue_script(
            '{handle}-editor',
            LEANCMS_PLUGIN_URL . 'assets/js/editor.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            $this->version,
            true
        );

        wp_enqueue_style(
            '{handle}-editor',
            LEANCMS_PLUGIN_URL . 'assets/css/editor.css',
            array( 'wp-edit-blocks' ),
            $this->version
        );
    }
}

// Initialize
new LeanCMS_Assets_Manager();
```

---

## 2. Cache Manager Template

**File:** `includes/meta/class-cache-manager.php`

```php
<?php
/**
 * Cache Manager
 *
 * Handles caching using WordPress Transients API.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-cache-manager.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Cache Manager Class
 *
 * Manages plugin caching with WordPress transients.
 */
class LeanCMS_Cache_Manager {

    /**
     * Cache prefix.
     *
     * @var string
     */
    private $prefix = 'leancms_cache_';

    /**
     * Default cache expiration (in seconds).
     *
     * @var int
     */
    private $default_expiration = HOUR_IN_SECONDS;

    /**
     * Get cached data.
     *
     * @param string $key Cache key.
     * @return mixed|false Cached data or false if not found.
     */
    public function get( $key ) {
        return get_transient( $this->get_cache_key( $key ) );
    }

    /**
     * Set cached data.
     *
     * @param string $key        Cache key.
     * @param mixed  $data       Data to cache.
     * @param int    $expiration Expiration time in seconds (optional).
     * @return bool True on success, false on failure.
     */
    public function set( $key, $data, $expiration = null ) {
        if ( null === $expiration ) {
            $expiration = $this->default_expiration;
        }

        return set_transient( $this->get_cache_key( $key ), $data, $expiration );
    }

    /**
     * Delete cached data.
     *
     * @param string $key Cache key.
     * @return bool True on success, false on failure.
     */
    public function delete( $key ) {
        return delete_transient( $this->get_cache_key( $key ) );
    }

    /**
     * Get or set cache (convenience method).
     *
     * @param string   $key        Cache key.
     * @param callable $callback   Callback to generate data if cache miss.
     * @param int      $expiration Expiration time in seconds (optional).
     * @return mixed Cached or generated data.
     */
    public function remember( $key, $callback, $expiration = null ) {
        $data = $this->get( $key );

        if ( false === $data ) {
            $data = call_user_func( $callback );
            $this->set( $key, $data, $expiration );
        }

        return $data;
    }

    /**
     * Flush all plugin caches.
     *
     * @return int Number of caches flushed.
     */
    public function flush_all() {
        global $wpdb;

        $count = 0;
        $like  = $wpdb->esc_like( '_transient_' . $this->prefix ) . '%';

        // Delete transients
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $like
            )
        );

        // Delete transient timeouts
        $like_timeout = $wpdb->esc_like( '_transient_timeout_' . $this->prefix ) . '%';
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $like_timeout
            )
        );

        return $count;
    }

    /**
     * Flush cache by pattern.
     *
     * @param string $pattern Pattern to match (e.g., 'user_*').
     */
    public function flush_pattern( $pattern ) {
        global $wpdb;

        $search_pattern = str_replace( '*', '%', $pattern );
        $like = $wpdb->esc_like( '_transient_' . $this->prefix . $search_pattern ) . '%';

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $like
            )
        );
    }

    /**
     * Get full cache key with prefix.
     *
     * @param string $key Original key.
     * @return string Prefixed cache key.
     */
    private function get_cache_key( $key ) {
        return $this->prefix . $key;
    }

    /**
     * Get cache statistics.
     *
     * @return array Cache statistics.
     */
    public function get_stats() {
        global $wpdb;

        $like = $wpdb->esc_like( '_transient_' . $this->prefix ) . '%';

        $count = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->options} WHERE option_name LIKE %s",
                $like
            )
        );

        return array(
            'total_cached' => intval( $count ),
            'prefix'       => $this->prefix,
        );
    }
}
```

---

## 3. Debug Logger Template

**File:** `includes/meta/class-debug-logger.php`

```php
<?php
/**
 * Debug Logger
 *
 * Handles debug logging for the plugin.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-debug-logger.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Debug Logger Class
 *
 * Provides logging functionality for debugging.
 */
class LeanCMS_Debug_Logger {

    /**
     * Log file path.
     *
     * @var string
     */
    private $log_file;

    /**
     * Whether debugging is enabled.
     *
     * @var bool
     */
    private $enabled;

    /**
     * Initialize the class.
     */
    public function __construct() {
        $upload_dir     = wp_upload_dir();
        $this->log_file = $upload_dir['basedir'] . '/leancms-debug.log';
        $this->enabled  = defined( 'WP_DEBUG' ) && WP_DEBUG;
    }

    /**
     * Log an info message.
     *
     * @param string $message Log message.
     * @param array  $context Additional context (optional).
     */
    public function info( $message, $context = array() ) {
        $this->log( 'INFO', $message, $context );
    }

    /**
     * Log an error message.
     *
     * @param string $message Log message.
     * @param array  $context Additional context (optional).
     */
    public function error( $message, $context = array() ) {
        $this->log( 'ERROR', $message, $context );
    }

    /**
     * Log a warning message.
     *
     * @param string $message Log message.
     * @param array  $context Additional context (optional).
     */
    public function warning( $message, $context = array() ) {
        $this->log( 'WARNING', $message, $context );
    }

    /**
     * Log a debug message.
     *
     * @param string $message Log message.
     * @param array  $context Additional context (optional).
     */
    public function debug( $message, $context = array() ) {
        $this->log( 'DEBUG', $message, $context );
    }

    /**
     * Write log entry.
     *
     * @param string $level   Log level.
     * @param string $message Log message.
     * @param array  $context Additional context.
     */
    private function log( $level, $message, $context = array() ) {
        if ( ! $this->enabled ) {
            return;
        }

        $timestamp = current_time( 'Y-m-d H:i:s' );
        $context_str = ! empty( $context ) ? ' | Context: ' . wp_json_encode( $context ) : '';

        $log_entry = sprintf(
            "[%s] [%s] %s%s\n",
            $timestamp,
            $level,
            $message,
            $context_str
        );

        // Use WordPress filesystem API
        global $wp_filesystem;

        if ( empty( $wp_filesystem ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
            WP_Filesystem();
        }

        if ( $wp_filesystem ) {
            $existing = $wp_filesystem->exists( $this->log_file ) ? $wp_filesystem->get_contents( $this->log_file ) : '';
            $wp_filesystem->put_contents( $this->log_file, $existing . $log_entry, FS_CHMOD_FILE );
        } else {
            // Fallback to error_log if filesystem API not available
            error_log( $log_entry );
        }
    }

    /**
     * Clear log file.
     *
     * @return bool True on success, false on failure.
     */
    public function clear() {
        global $wp_filesystem;

        if ( empty( $wp_filesystem ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
            WP_Filesystem();
        }

        if ( $wp_filesystem && $wp_filesystem->exists( $this->log_file ) ) {
            return $wp_filesystem->delete( $this->log_file );
        }

        return false;
    }

    /**
     * Get log contents.
     *
     * @param int $lines Number of lines to retrieve (from end).
     * @return string Log contents.
     */
    public function get_log( $lines = 100 ) {
        if ( ! file_exists( $this->log_file ) ) {
            return '';
        }

        $file = new SplFileObject( $this->log_file, 'r' );
        $file->seek( PHP_INT_MAX );
        $total_lines = $file->key() + 1;

        $start_line = max( 0, $total_lines - $lines );
        $log_lines  = array();

        $file->seek( $start_line );

        while ( ! $file->eof() ) {
            $log_lines[] = $file->current();
            $file->next();
        }

        return implode( '', $log_lines );
    }

    /**
     * Get log file size.
     *
     * @return string Formatted file size.
     */
    public function get_log_size() {
        if ( ! file_exists( $this->log_file ) ) {
            return '0 KB';
        }

        $size = filesize( $this->log_file );
        return size_format( $size );
    }
}
```

---

## 4. Manager Base Class Template

**File:** `includes/meta/class-manager.php`

```php
<?php
/**
 * Base Manager Class
 *
 * Abstract base class for managers (e.g., User Manager, Product Manager).
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-manager.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Abstract Manager Class
 *
 * Base class for managing entities.
 */
abstract class LeanCMS_Manager {

    /**
     * Cache manager instance.
     *
     * @var LeanCMS_Cache_Manager
     */
    protected $cache;

    /**
     * Logger instance.
     *
     * @var LeanCMS_Debug_Logger
     */
    protected $logger;

    /**
     * Entity type (post type, taxonomy, etc.).
     *
     * @var string
     */
    protected $entity_type;

    /**
     * Initialize the manager.
     */
    public function __construct() {
        $this->cache  = new LeanCMS_Cache_Manager();
        $this->logger = new LeanCMS_Debug_Logger();
    }

    /**
     * Get entity by ID.
     *
     * @param int $id Entity ID.
     * @return mixed Entity object or null.
     */
    abstract public function get( $id );

    /**
     * Create new entity.
     *
     * @param array $data Entity data.
     * @return int|WP_Error Entity ID or error.
     */
    abstract public function create( $data );

    /**
     * Update entity.
     *
     * @param int   $id   Entity ID.
     * @param array $data Updated data.
     * @return bool|WP_Error True on success, error on failure.
     */
    abstract public function update( $id, $data );

    /**
     * Delete entity.
     *
     * @param int $id Entity ID.
     * @return bool|WP_Error True on success, error on failure.
     */
    abstract public function delete( $id );

    /**
     * Get all entities.
     *
     * @param array $args Query arguments.
     * @return array Array of entities.
     */
    abstract public function get_all( $args = array() );

    /**
     * Validate entity data.
     *
     * @param array $data Data to validate.
     * @return true|WP_Error True if valid, WP_Error if invalid.
     */
    protected function validate( $data ) {
        return true; // Override in child classes
    }

    /**
     * Sanitize entity data.
     *
     * @param array $data Data to sanitize.
     * @return array Sanitized data.
     */
    protected function sanitize( $data ) {
        return $data; // Override in child classes
    }

    /**
     * Clear entity cache.
     *
     * @param int $id Entity ID (optional).
     */
    protected function clear_cache( $id = null ) {
        if ( $id ) {
            $this->cache->delete( $this->entity_type . '_' . $id );
        } else {
            $this->cache->flush_pattern( $this->entity_type . '_*' );
        }
    }

    /**
     * Log activity.
     *
     * @param string $action  Action performed.
     * @param int    $id      Entity ID.
     * @param array  $context Additional context.
     */
    protected function log_activity( $action, $id, $context = array() ) {
        $this->logger->info(
            sprintf( '%s %s: %d', $action, $this->entity_type, $id ),
            $context
        );
    }
}
```

---

## 5. Template Renderer Template

**File:** `includes/meta/class-renderer.php`

```php
<?php
/**
 * Template Renderer
 *
 * Handles template loading and rendering.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-renderer.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Renderer Class
 *
 * Manages template rendering with theme overrides.
 */
class LeanCMS_Renderer {

    /**
     * Template directory in plugin.
     *
     * @var string
     */
    private $template_dir;

    /**
     * Theme template directory.
     *
     * @var string
     */
    private $theme_template_dir;

    /**
     * Initialize the class.
     */
    public function __construct() {
        $this->template_dir       = LEANCMS_PLUGIN_DIR . 'templates/';
        $this->theme_template_dir = 'leancms/';
    }

    /**
     * Render a template.
     *
     * @param string $template_name Template file name.
     * @param array  $data          Data to pass to template.
     * @param bool   $echo          Whether to echo or return output.
     * @return string|void Template output if $echo is false.
     */
    public function render( $template_name, $data = array(), $echo = true ) {
        $template = $this->locate_template( $template_name );

        if ( ! $template ) {
            return '';
        }

        // Extract data into variables
        if ( ! empty( $data ) ) {
            extract( $data, EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
        }

        ob_start();
        include $template;
        $output = ob_get_clean();

        if ( $echo ) {
            echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } else {
            return $output;
        }
    }

    /**
     * Locate template file.
     *
     * Checks theme first, then plugin templates directory.
     *
     * @param string $template_name Template file name.
     * @return string|false Template path or false if not found.
     */
    public function locate_template( $template_name ) {
        // Check if theme has template override
        $theme_template = locate_template(
            array(
                $this->theme_template_dir . $template_name,
                $template_name,
            )
        );

        if ( $theme_template ) {
            return $theme_template;
        }

        // Check plugin templates directory
        $plugin_template = $this->template_dir . $template_name;

        if ( file_exists( $plugin_template ) ) {
            return $plugin_template;
        }

        return false;
    }

    /**
     * Get template part.
     *
     * @param string $slug Template slug.
     * @param string $name Template name (optional).
     * @param array  $data Data to pass to template.
     */
    public function get_template_part( $slug, $name = null, $data = array() ) {
        $templates = array();

        if ( $name ) {
            $templates[] = "{$slug}-{$name}.php";
        }

        $templates[] = "{$slug}.php";

        foreach ( $templates as $template_name ) {
            $template = $this->locate_template( $template_name );

            if ( $template ) {
                $this->render( basename( $template ), $data, true );
                return;
            }
        }
    }

    /**
     * Include template with data.
     *
     * @param string $template_name Template file name.
     * @param array  $data          Data for template.
     * @return bool True if included, false if not found.
     */
    public function include_template( $template_name, $data = array() ) {
        $template = $this->locate_template( $template_name );

        if ( ! $template ) {
            return false;
        }

        if ( ! empty( $data ) ) {
            extract( $data, EXTR_SKIP ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
        }

        include $template;
        return true;
    }
}
```

---

## 6. Summary Generator Template

**File:** `includes/meta/class-summary.php`

```php
<?php
/**
 * Summary Generator
 *
 * Generates summary reports and statistics.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Meta
 * @filepath   includes/meta/class-summary.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Summary Class
 *
 * Generates summaries and reports.
 */
class LeanCMS_Summary {

    /**
     * Cache manager instance.
     *
     * @var LeanCMS_Cache_Manager
     */
    private $cache;

    /**
     * Initialize the class.
     */
    public function __construct() {
        $this->cache = new LeanCMS_Cache_Manager();
    }

    /**
     * Get overview summary.
     *
     * @return array Summary data.
     */
    public function get_overview() {
        return $this->cache->remember(
            'overview_summary',
            function() {
                return array(
                    'total_{items}'    => $this->get_total_{items}(),
                    'active_{items}'   => $this->get_active_{items}(),
                    'pending_{items}'  => $this->get_pending_{items}(),
                    'revenue'          => $this->get_total_revenue(),
                    'last_updated'     => current_time( 'mysql' ),
                );
            },
            HOUR_IN_SECONDS
        );
    }

    /**
     * Get detailed statistics.
     *
     * @param array $args Arguments for filtering.
     * @return array Detailed statistics.
     */
    public function get_statistics( $args = array() ) {
        $defaults = array(
            'period' => 'month',
            'type'   => 'all',
        );

        $args = wp_parse_args( $args, $defaults );

        $cache_key = 'stats_' . md5( serialize( $args ) );

        return $this->cache->remember(
            $cache_key,
            function() use ( $args ) {
                return $this->calculate_statistics( $args );
            },
            HOUR_IN_SECONDS
        );
    }

    /**
     * Get performance metrics.
     *
     * @return array Performance data.
     */
    public function get_performance_metrics() {
        return array(
            'database_queries' => get_num_queries(),
            'memory_usage'     => size_format( memory_get_usage() ),
            'peak_memory'      => size_format( memory_get_peak_usage() ),
            'cache_hits'       => $this->cache->get_stats(),
        );
    }

    /**
     * Get total {items}.
     *
     * @return int Total count.
     */
    private function get_total_{items}() {
        $counts = wp_count_posts( '{post_type}' );
        return array_sum( (array) $counts );
    }

    /**
     * Get active {items}.
     *
     * @return int Active count.
     */
    private function get_active_{items}() {
        $counts = wp_count_posts( '{post_type}' );
        return isset( $counts->publish ) ? $counts->publish : 0;
    }

    /**
     * Get pending {items}.
     *
     * @return int Pending count.
     */
    private function get_pending_{items}() {
        $counts = wp_count_posts( '{post_type}' );
        return isset( $counts->pending ) ? $counts->pending : 0;
    }

    /**
     * Get total revenue.
     *
     * @return float Total revenue.
     */
    private function get_total_revenue() {
        global $wpdb;

        $total = $wpdb->get_var(
            "SELECT SUM(meta_value)
            FROM {$wpdb->postmeta}
            WHERE meta_key = '_order_total'"
        );

        return floatval( $total );
    }

    /**
     * Calculate detailed statistics.
     *
     * @param array $args Arguments.
     * @return array Calculated statistics.
     */
    private function calculate_statistics( $args ) {
        // Implement your statistics calculation logic
        return array(
            'period'      => $args['period'],
            'total'       => 0,
            'average'     => 0,
            'growth_rate' => 0,
        );
    }

    /**
     * Export summary to CSV.
     *
     * @param array $data Data to export.
     * @return string CSV content.
     */
    public function export_to_csv( $data ) {
        $csv = fopen( 'php://temp/maxmemory:' . ( 5 * 1024 * 1024 ), 'r+' );

        // Add headers
        if ( ! empty( $data ) ) {
            fputcsv( $csv, array_keys( $data[0] ) );

            foreach ( $data as $row ) {
                fputcsv( $csv, $row );
            }
        }

        rewind( $csv );
        $output = stream_get_contents( $csv );
        fclose( $csv );

        return $output;
    }
}
```

---

## Security Checklist

- [ ] All file paths validated before file operations
- [ ] WordPress filesystem API used for file operations
- [ ] Asset URLs properly escaped
- [ ] Cache keys sanitized
- [ ] Log files stored securely (outside web root if possible)
- [ ] Sensitive data not logged
- [ ] No direct file access (check for `WPINC`)
- [ ] CSV exports sanitized

## Common Variations

### AJAX Handler Registration
```php
add_action( 'wp_ajax_{action}', array( $this, 'handle_ajax_{action}' ) );
add_action( 'wp_ajax_nopriv_{action}', array( $this, 'handle_ajax_{action}' ) );

public function handle_ajax_{action}() {
    check_ajax_referer( '{handle}_nonce', 'nonce' );

    // Process AJAX request
    wp_send_json_success( array( 'message' => 'Success' ) );
}
```

### Object Cache (Alternative to Transients)
```php
wp_cache_set( $key, $data, $group, $expiration );
$data = wp_cache_get( $key, $group );
wp_cache_delete( $key, $group );
```

## Testing Checklist

- [ ] Assets load correctly on frontend/admin
- [ ] No 404 errors for assets
- [ ] Cache reads/writes work correctly
- [ ] Cache expiration works as expected
- [ ] Log files created successfully
- [ ] Log rotation works (if implemented)
- [ ] Templates render correctly
- [ ] Theme overrides work
- [ ] Summary data is accurate
- [ ] Export functionality works

## Integration Points

Add to main plugin file:

```php
// Meta functionality
require_once LEANCMS_PLUGIN_DIR . 'includes/meta/class-assets-manager.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/meta/class-cache-manager.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/meta/class-debug-logger.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/meta/class-renderer.php';
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{handle}` | Asset handle | `lean-frontend`, `lean-admin` |
| `{page_slug}` | Admin page slug | `lean-products` |
| `{post_type}` | Post type slug | `product`, `license` |
| `{items}` | Plural item name | `products`, `orders` |
| `{action}` | AJAX action name | `load_products` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
