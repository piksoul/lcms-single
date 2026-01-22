# WordPress Installer Pattern

## Purpose
Handle plugin installation, activation, deactivation, and uninstallation with proper setup of database structures, default options, version migrations, and cleanup.

## WordPress Standards
- Follow WordPress Coding Standards
- Use proper activation/deactivation/uninstall hooks
- Never run database queries on every page load
- Store version number for migration tracking
- Flush rewrite rules only when needed
- Use dbDelta() for database table creation
- Implement proper error handling
- Provide rollback capability for failed upgrades
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── class-installer.php         # Main installer class
uninstall.php                   # Uninstall handler (root level)
```

---

## 1. Main Installer Template

**File:** `includes/class-installer.php`

```php
<?php
/**
 * Installer Handler
 *
 * Manages plugin installation, activation, deactivation, and version upgrades.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Installer
 * @filepath   includes/class-installer.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Installer Class
 *
 * Handles plugin lifecycle events and database setup.
 */
class LeanCMS_Installer {

    /**
     * Current plugin version.
     *
     * @var string
     */
    private $version;

    /**
     * Option name for storing plugin version.
     *
     * @var string
     */
    private $version_option = '{plugin_prefix}_version';

    /**
     * Option name for plugin settings.
     *
     * @var string
     */
    private $settings_option = '{plugin_prefix}_settings';

    /**
     * Initialize the installer.
     *
     * @param string $version Plugin version.
     */
    public function __construct( $version ) {
        $this->version = $version;
    }

    /**
     * Run on plugin activation.
     *
     * This method is called when the plugin is activated.
     * Performs initial setup and configuration.
     */
    public function activate() {
        // Check WordPress version compatibility
        if ( ! $this->check_wp_version() ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die(
                esc_html__( 'This plugin requires WordPress 6.8 or higher.', 'leanos-plugin' ),
                esc_html__( 'Plugin Activation Error', 'leanos-plugin' ),
                array( 'back_link' => true )
            );
        }

        // Check PHP version compatibility
        if ( ! $this->check_php_version() ) {
            deactivate_plugins( plugin_basename( __FILE__ ) );
            wp_die(
                esc_html__( 'This plugin requires PHP 8.0 or higher.', 'leanos-plugin' ),
                esc_html__( 'Plugin Activation Error', 'leanos-plugin' ),
                array( 'back_link' => true )
            );
        }

        // Get installed version
        $installed_version = get_option( $this->version_option );

        if ( ! $installed_version ) {
            // Fresh installation
            $this->install();
        } elseif ( version_compare( $installed_version, $this->version, '<' ) ) {
            // Upgrade needed
            $this->upgrade( $installed_version );
        }

        // Create/update custom database tables
        $this->create_tables();

        // Set up default options
        $this->set_default_options();

        // Add custom capabilities
        $this->add_capabilities();

        // Flush rewrite rules
        flush_rewrite_rules();

        // Update version number
        update_option( $this->version_option, $this->version );

        // Set activation flag (for redirect or welcome screen)
        set_transient( '{plugin_prefix}_activated', true, 60 );
    }

    /**
     * Run on plugin deactivation.
     *
     * Cleanup temporary data but preserve user settings and database.
     */
    public function deactivate() {
        // Clear scheduled cron events
        $this->clear_cron_events();

        // Clear transients
        $this->clear_transients();

        // Flush rewrite rules
        flush_rewrite_rules();

        // DO NOT delete:
        // - Database tables (user data)
        // - Plugin options (settings)
        // - User capabilities (roles)
        // These should only be removed on uninstall
    }

    /**
     * Check WordPress version compatibility.
     *
     * @return bool True if compatible, false otherwise.
     */
    private function check_wp_version() {
        global $wp_version;
        return version_compare( $wp_version, '6.8', '>=' );
    }

    /**
     * Check PHP version compatibility.
     *
     * @return bool True if compatible, false otherwise.
     */
    private function check_php_version() {
        return version_compare( PHP_VERSION, '8.0', '>=' );
    }

    /**
     * Fresh installation.
     *
     * Called when plugin is activated for the first time.
     */
    private function install() {
        // Create custom database tables
        $this->create_tables();

        // Set default options
        $this->set_default_options();

        // Add custom capabilities
        $this->add_capabilities();

        // Run installation-specific tasks
        $this->run_install_tasks();

        // Log installation
        if ( class_exists( 'LeanCMS_Debug_Logger' ) ) {
            $logger = new LeanCMS_Debug_Logger();
            $logger->info( 'Plugin installed successfully', array( 'version' => $this->version ) );
        }
    }

    /**
     * Upgrade from previous version.
     *
     * @param string $old_version Previous version number.
     */
    private function upgrade( $old_version ) {
        // Version-specific upgrades
        if ( version_compare( $old_version, '2.0.0', '<' ) ) {
            $this->upgrade_to_2_0_0();
        }

        if ( version_compare( $old_version, '2.1.0', '<' ) ) {
            $this->upgrade_to_2_1_0();
        }

        // Update database tables
        $this->create_tables();

        // Migrate options if needed
        $this->migrate_options( $old_version );

        // Log upgrade
        if ( class_exists( 'LeanCMS_Debug_Logger' ) ) {
            $logger = new LeanCMS_Debug_Logger();
            $logger->info(
                'Plugin upgraded',
                array(
                    'from' => $old_version,
                    'to'   => $this->version,
                )
            );
        }
    }

    /**
     * Create custom database tables.
     *
     * Uses dbDelta() for safe table creation/updates.
     */
    private function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        // Example table
        $table_name = $wpdb->prefix . '{table_name}';

        $sql = "CREATE TABLE $table_name (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            post_id bigint(20) unsigned NOT NULL,
            meta_key varchar(255) NOT NULL,
            meta_value longtext,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY post_id (post_id),
            KEY meta_key (meta_key)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );

        // Check if table was created successfully
        if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) !== $table_name ) {
            // Log error
            error_log( 'Failed to create table: ' . $table_name );
        }
    }

    /**
     * Set default plugin options.
     */
    private function set_default_options() {
        $defaults = array(
            'version'              => $this->version,
            'enable_feature_x'     => true,
            'items_per_page'       => 20,
            'date_format'          => 'Y-m-d',
            'enable_notifications' => true,
            'email_from_name'      => get_bloginfo( 'name' ),
            'email_from_address'   => get_bloginfo( 'admin_email' ),
        );

        // Only set if option doesn't exist
        if ( ! get_option( $this->settings_option ) ) {
            add_option( $this->settings_option, $defaults );
        } else {
            // Merge with existing options (add new defaults without overwriting)
            $existing = get_option( $this->settings_option, array() );
            $merged   = array_merge( $defaults, $existing );
            update_option( $this->settings_option, $merged );
        }
    }

    /**
     * Add custom capabilities to roles.
     */
    private function add_capabilities() {
        // Add capabilities to administrator role
        $admin = get_role( 'administrator' );

        if ( $admin ) {
            $admin->add_cap( 'manage_{capability_name}' );
            $admin->add_cap( 'edit_{capability_name}' );
            $admin->add_cap( 'delete_{capability_name}' );
        }

        // Optionally add capabilities to other roles
        $editor = get_role( 'editor' );

        if ( $editor ) {
            $editor->add_cap( 'edit_{capability_name}' );
        }
    }

    /**
     * Run installation-specific tasks.
     */
    private function run_install_tasks() {
        // Schedule cron events
        if ( ! wp_next_scheduled( '{plugin_prefix}_daily_task' ) ) {
            wp_schedule_event( time(), 'daily', '{plugin_prefix}_daily_task' );
        }

        // Create default pages (if needed)
        // $this->create_default_pages();

        // Import default data (if needed)
        // $this->import_default_data();
    }

    /**
     * Upgrade to version 2.0.0.
     */
    private function upgrade_to_2_0_0() {
        // Specific upgrade tasks for v2.0.0
        // Example: Migrate old data structure to new format

        $options = get_option( $this->settings_option, array() );

        // Add new option with default
        if ( ! isset( $options['new_feature_setting'] ) ) {
            $options['new_feature_setting'] = 'default_value';
        }

        update_option( $this->settings_option, $options );
    }

    /**
     * Upgrade to version 2.1.0.
     */
    private function upgrade_to_2_1_0() {
        // Specific upgrade tasks for v2.1.0
    }

    /**
     * Migrate options from old version.
     *
     * @param string $old_version Old version number.
     */
    private function migrate_options( $old_version ) {
        // Handle option migrations between versions
        $options = get_option( $this->settings_option, array() );

        // Example: Rename old option key
        if ( isset( $options['old_key'] ) ) {
            $options['new_key'] = $options['old_key'];
            unset( $options['old_key'] );
        }

        update_option( $this->settings_option, $options );
    }

    /**
     * Clear scheduled cron events.
     */
    private function clear_cron_events() {
        wp_clear_scheduled_hook( '{plugin_prefix}_daily_task' );
        wp_clear_scheduled_hook( '{plugin_prefix}_hourly_task' );
    }

    /**
     * Clear plugin transients.
     */
    private function clear_transients() {
        global $wpdb;

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $wpdb->esc_like( '_transient_{plugin_prefix}_' ) . '%'
            )
        );

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $wpdb->esc_like( '_transient_timeout_{plugin_prefix}_' ) . '%'
            )
        );
    }

    /**
     * Remove custom capabilities from roles.
     *
     * Called during uninstall.
     */
    public static function remove_capabilities() {
        $roles = array( 'administrator', 'editor' );

        foreach ( $roles as $role_name ) {
            $role = get_role( $role_name );

            if ( $role ) {
                $role->remove_cap( 'manage_{capability_name}' );
                $role->remove_cap( 'edit_{capability_name}' );
                $role->remove_cap( 'delete_{capability_name}' );
            }
        }
    }

    /**
     * Drop custom database tables.
     *
     * Called during uninstall.
     */
    public static function drop_tables() {
        global $wpdb;

        $table_name = $wpdb->prefix . '{table_name}';

        $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
    }

    /**
     * Delete all plugin options.
     *
     * Called during uninstall.
     */
    public static function delete_options() {
        delete_option( '{plugin_prefix}_version' );
        delete_option( '{plugin_prefix}_settings' );

        // Delete any other plugin-specific options
    }

    /**
     * Complete uninstall cleanup.
     *
     * Called from uninstall.php.
     */
    public static function uninstall() {
        // Remove capabilities
        self::remove_capabilities();

        // Clear cron events
        wp_clear_scheduled_hook( '{plugin_prefix}_daily_task' );
        wp_clear_scheduled_hook( '{plugin_prefix}_hourly_task' );

        // Drop custom tables
        self::drop_tables();

        // Delete options
        self::delete_options();

        // Clear transients
        global $wpdb;

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $wpdb->esc_like( '_transient_{plugin_prefix}_' ) . '%'
            )
        );

        // Delete user meta (if any)
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->usermeta} WHERE meta_key LIKE %s",
                $wpdb->esc_like( '{plugin_prefix}_' ) . '%'
            )
        );

        // Delete post meta (if any)
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE %s",
                $wpdb->esc_like( '{plugin_prefix}_' ) . '%'
            )
        );

        // Flush rewrite rules
        flush_rewrite_rules();
    }
}
```

---

## 2. Uninstall Handler Template

**File:** `uninstall.php` (in plugin root directory)

```php
<?php
/**
 * Uninstall Handler
 *
 * Fired when the plugin is uninstalled.
 * Cleans up all plugin data from the database.
 *
 * @package    LeanCMS_Plugin
 * @filepath   uninstall.php
 */

// If uninstall not called from WordPress, exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Load installer class
require_once plugin_dir_path( __FILE__ ) . 'includes/class-installer.php';

// Run uninstall
LeanCMS_Installer::uninstall();
```

---

## 3. Integration in Main Plugin File

**File:** `plugin-name.php`

```php
<?php
/**
 * Plugin Name: Plugin Name
 * Version: 1.0.0
 */

// Define version constant
define( 'PLUGIN_VERSION', '1.0.0' );

// Activation hook
register_activation_hook( __FILE__, 'plugin_activate' );

/**
 * Plugin activation handler.
 */
function plugin_activate() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-installer.php';

    $installer = new LeanCMS_Installer( PLUGIN_VERSION );
    $installer->activate();
}

// Deactivation hook
register_deactivation_hook( __FILE__, 'plugin_deactivate' );

/**
 * Plugin deactivation handler.
 */
function plugin_deactivate() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-installer.php';

    $installer = new LeanCMS_Installer( PLUGIN_VERSION );
    $installer->deactivate();
}

// Plugin loaded
add_action( 'plugins_loaded', 'plugin_init' );

/**
 * Initialize plugin.
 */
function plugin_init() {
    // Check for activation redirect
    if ( get_transient( '{plugin_prefix}_activated' ) ) {
        delete_transient( '{plugin_prefix}_activated' );

        // Redirect to welcome page (optional)
        if ( ! isset( $_GET['activate-multi'] ) ) {
            wp_safe_redirect( admin_url( 'admin.php?page={plugin_prefix}_welcome' ) );
            exit;
        }
    }
}
```

---

## Best Practices

### Version Tracking
- Always store version number in database
- Use semantic versioning (Major.Minor.Patch)
- Check version on activation for upgrades
- Keep upgrade history for debugging

### Database Operations
- Use `dbDelta()` for table creation (handles updates)
- Always check table creation success
- Use prepared statements for custom queries
- Never run expensive queries on every page load
- Index frequently queried columns

### Options Management
- Set defaults only if option doesn't exist
- Merge defaults with existing options on upgrade
- Use descriptive option names with prefix
- Group related options in arrays

### Cleanup Strategy
- **Activation:** Setup everything needed
- **Deactivation:** Clear temporary data only
- **Uninstall:** Remove everything (user choice)

### Error Handling
- Check WordPress/PHP version compatibility
- Provide clear error messages
- Log errors for debugging
- Provide rollback on failed upgrades

### Multisite Considerations
```php
// Network activation
if ( is_multisite() ) {
    // Loop through sites
    $sites = get_sites();
    foreach ( $sites as $site ) {
        switch_to_blog( $site->blog_id );
        $this->activate();
        restore_current_blog();
    }
} else {
    $this->activate();
}
```

## Security Checklist

- [ ] Version checks before activation
- [ ] No direct file access (check WPINC/WP_UNINSTALL_PLUGIN)
- [ ] Capability checks before operations
- [ ] Prepared statements for database queries
- [ ] Input validation for imported data
- [ ] Proper error handling
- [ ] Secure option defaults

## Common Variations

### Create Default Pages
```php
private function create_default_pages() {
    $page_definitions = array(
        'portal' => array(
            'title'   => __( 'User Portal', 'leanos-plugin' ),
            'content' => '[portal_shortcode]',
            'option'  => '{plugin_prefix}_portal_page_id',
        ),
    );

    foreach ( $page_definitions as $page ) {
        if ( ! get_option( $page['option'] ) ) {
            $page_id = wp_insert_post(
                array(
                    'post_title'   => $page['title'],
                    'post_content' => $page['content'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                )
            );

            if ( $page_id ) {
                update_option( $page['option'], $page_id );
            }
        }
    }
}
```

### Import Default Data
```php
private function import_default_data() {
    $data_file = plugin_dir_path( __FILE__ ) . 'data/default-data.json';

    if ( file_exists( $data_file ) ) {
        $json = file_get_contents( $data_file );
        $data = json_decode( $json, true );

        foreach ( $data as $item ) {
            // Import each item
        }
    }
}
```

## Testing Checklist

- [ ] Fresh activation works correctly
- [ ] Deactivation preserves user data
- [ ] Uninstall removes all data
- [ ] Upgrade from previous version works
- [ ] Database tables created successfully
- [ ] Default options set correctly
- [ ] Capabilities added to roles
- [ ] Cron events scheduled properly
- [ ] Rewrite rules flushed
- [ ] Version number stored correctly
- [ ] Multisite compatibility (if applicable)
- [ ] Error messages display properly

## Integration Points

Main plugin file activation/deactivation:

```php
register_activation_hook( __FILE__, array( $installer, 'activate' ) );
register_deactivation_hook( __FILE__, array( $installer, 'deactivate' ) );
```

Uninstall file in plugin root:

```php
// uninstall.php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

require_once 'includes/class-installer.php';
LeanCMS_Installer::uninstall();
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{plugin_prefix}` | Plugin prefix for options/crons | `leancms` |
| `{table_name}` | Database table name | `leancms_licenses` |
| `{capability_name}` | Custom capability name | `licenses` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
