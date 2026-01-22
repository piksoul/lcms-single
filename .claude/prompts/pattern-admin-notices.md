# WordPress Admin Notices Pattern

## Purpose
Create WordPress-native admin notice system for user feedback, validation errors, success messages, and warnings with support for transient-based notices that survive redirects.

## WordPress Standards
- Follow WordPress Coding Standards
- Use WordPress `admin_notices` hook
- Support dismissible notices
- Use proper WordPress notice classes
- Escape all output
- Use transients for redirect-persistent notices
- Provide accessibility-friendly markup
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── admin/
    └── class-admin-notices.php     # Admin notices handler
```

---

## 1. Admin Notices Handler Template

**File:** `includes/admin/class-admin-notices.php`

```php
<?php
/**
 * Admin Notices Handler
 *
 * Manages all admin notices including transient-based notices,
 * post update messages, and validation errors.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Admin
 * @filepath   includes/admin/class-admin-notices.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Admin Notices Class
 *
 * Handles admin notices throughout the plugin.
 */
class LeanCMS_Admin_Notices {

    /**
     * Transient prefix for notices.
     *
     * @var string
     */
    private $transient_prefix = '{plugin_prefix}_notice_';

    /**
     * Notice types.
     *
     * @var array
     */
    private $notice_types = array( 'success', 'error', 'warning', 'info' );

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'admin_notices', array( $this, 'display_notices' ) );
        add_action( 'post_updated_messages', array( $this, 'custom_post_update_messages' ) );
        add_action( 'admin_init', array( $this, 'maybe_dismiss_notice' ) );
    }

    /**
     * Add a notice.
     *
     * @param string $message  Notice message.
     * @param string $type     Notice type (success, error, warning, info).
     * @param bool   $dismissible Whether notice is dismissible.
     */
    public function add_notice( $message, $type = 'info', $dismissible = true ) {
        // Validate type
        if ( ! in_array( $type, $this->notice_types, true ) ) {
            $type = 'info';
        }

        $notices = get_option( '{plugin_prefix}_admin_notices', array() );

        $notices[] = array(
            'message'     => $message,
            'type'        => $type,
            'dismissible' => $dismissible,
        );

        update_option( '{plugin_prefix}_admin_notices', $notices );
    }

    /**
     * Add a transient notice (survives redirects).
     *
     * @param string $message     Notice message.
     * @param string $type        Notice type.
     * @param bool   $dismissible Whether notice is dismissible.
     * @param int    $expiration  Transient expiration time in seconds.
     */
    public function add_transient_notice( $message, $type = 'info', $dismissible = true, $expiration = 60 ) {
        // Validate type
        if ( ! in_array( $type, $this->notice_types, true ) ) {
            $type = 'info';
        }

        $transient_key = $this->transient_prefix . md5( $message . time() );

        set_transient(
            $transient_key,
            array(
                'message'     => $message,
                'type'        => $type,
                'dismissible' => $dismissible,
            ),
            $expiration
        );
    }

    /**
     * Add success notice.
     *
     * @param string $message Notice message.
     * @param bool   $dismissible Whether notice is dismissible.
     */
    public function success( $message, $dismissible = true ) {
        $this->add_notice( $message, 'success', $dismissible );
    }

    /**
     * Add error notice.
     *
     * @param string $message Notice message.
     * @param bool   $dismissible Whether notice is dismissible.
     */
    public function error( $message, $dismissible = true ) {
        $this->add_notice( $message, 'error', $dismissible );
    }

    /**
     * Add warning notice.
     *
     * @param string $message Notice message.
     * @param bool   $dismissible Whether notice is dismissible.
     */
    public function warning( $message, $dismissible = true ) {
        $this->add_notice( $message, 'warning', $dismissible );
    }

    /**
     * Add info notice.
     *
     * @param string $message Notice message.
     * @param bool   $dismissible Whether notice is dismissible.
     */
    public function info( $message, $dismissible = true ) {
        $this->add_notice( $message, 'info', $dismissible );
    }

    /**
     * Display all notices.
     */
    public function display_notices() {
        // Display regular notices
        $notices = get_option( '{plugin_prefix}_admin_notices', array() );

        if ( ! empty( $notices ) ) {
            foreach ( $notices as $notice ) {
                $this->render_notice( $notice );
            }

            // Clear notices after display
            delete_option( '{plugin_prefix}_admin_notices' );
        }

        // Display transient notices
        $this->display_transient_notices();
    }

    /**
     * Display transient-based notices.
     */
    private function display_transient_notices() {
        global $wpdb;

        // Get all transients for this plugin
        $transient_keys = $wpdb->get_col(
            $wpdb->prepare(
                "SELECT option_name FROM {$wpdb->options}
                WHERE option_name LIKE %s",
                $wpdb->esc_like( '_transient_' . $this->transient_prefix ) . '%'
            )
        );

        foreach ( $transient_keys as $key ) {
            // Remove _transient_ prefix
            $transient_key = str_replace( '_transient_', '', $key );

            $notice = get_transient( $transient_key );

            if ( $notice ) {
                $this->render_notice( $notice );

                // Delete transient after display
                delete_transient( $transient_key );
            }
        }
    }

    /**
     * Render a single notice.
     *
     * @param array $notice Notice data.
     */
    private function render_notice( $notice ) {
        $type = isset( $notice['type'] ) ? $notice['type'] : 'info';
        $message = isset( $notice['message'] ) ? $notice['message'] : '';
        $dismissible = isset( $notice['dismissible'] ) && $notice['dismissible'];

        if ( empty( $message ) ) {
            return;
        }

        $classes = array( 'notice', 'notice-' . $type );

        if ( $dismissible ) {
            $classes[] = 'is-dismissible';
        }

        printf(
            '<div class="%s"><p>%s</p></div>',
            esc_attr( implode( ' ', $classes ) ),
            wp_kses_post( $message )
        );
    }

    /**
     * Add WP_Error as notices.
     *
     * @param WP_Error $error Error object.
     */
    public function add_wp_error( $error ) {
        if ( ! is_wp_error( $error ) ) {
            return;
        }

        foreach ( $error->get_error_messages() as $message ) {
            $this->error( $message );
        }
    }

    /**
     * Custom post update messages.
     *
     * @param array $messages Existing messages.
     * @return array Modified messages.
     */
    public function custom_post_update_messages( $messages ) {
        global $post;

        $post_type = get_post_type( $post );

        // Only customize for our post types
        if ( '{post_type}' !== $post_type ) {
            return $messages;
        }

        $messages['{post_type}'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => __( '{Item} updated.', 'leanos-plugin' ),
            2  => __( 'Custom field updated.', 'leanos-plugin' ),
            3  => __( 'Custom field deleted.', 'leanos-plugin' ),
            4  => __( '{Item} updated.', 'leanos-plugin' ),
            5  => isset( $_GET['revision'] ) ? sprintf( __( '{Item} restored to revision from %s', 'leanos-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => __( '{Item} published.', 'leanos-plugin' ),
            7  => __( '{Item} saved.', 'leanos-plugin' ),
            8  => __( '{Item} submitted.', 'leanos-plugin' ),
            9  => sprintf(
                __( '{Item} scheduled for: <strong>%s</strong>.', 'leanos-plugin' ),
                date_i18n( __( 'M j, Y @ G:i', 'leanos-plugin' ), strtotime( $post->post_date ) )
            ),
            10 => __( '{Item} draft updated.', 'leanos-plugin' ),
        );

        return $messages;
    }

    /**
     * Display validation errors.
     *
     * @param WP_Error $errors Validation errors.
     */
    public function display_validation_errors( $errors ) {
        if ( ! is_wp_error( $errors ) || ! $errors->has_errors() ) {
            return;
        }

        echo '<div class="notice notice-error">';
        echo '<p><strong>' . esc_html__( 'Please correct the following errors:', 'leanos-plugin' ) . '</strong></p>';
        echo '<ul style="list-style: disc; margin-left: 20px;">';

        foreach ( $errors->get_error_messages() as $message ) {
            printf( '<li>%s</li>', wp_kses_post( $message ) );
        }

        echo '</ul>';
        echo '</div>';
    }

    /**
     * Add settings error as admin notice.
     *
     * @param string $code    Error code.
     * @param string $message Error message.
     * @param string $type    Error type (success, error, warning, info).
     */
    public function add_settings_error( $code, $message, $type = 'error' ) {
        add_settings_error(
            '{plugin_prefix}_notices',
            $code,
            $message,
            $type
        );
    }

    /**
     * Display settings errors.
     */
    public function display_settings_errors() {
        settings_errors( '{plugin_prefix}_notices' );
    }

    /**
     * Handle notice dismissal.
     */
    public function maybe_dismiss_notice() {
        if ( ! isset( $_GET['{plugin_prefix}_dismiss_notice'] ) ) {
            return;
        }

        $notice_id = sanitize_key( $_GET['{plugin_prefix}_dismiss_notice'] );

        // Verify nonce
        if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'dismiss_notice_' . $notice_id ) ) {
            return;
        }

        // Store dismissal
        update_user_meta(
            get_current_user_id(),
            '{plugin_prefix}_dismissed_notices',
            $notice_id
        );

        // Redirect back without query param
        wp_safe_redirect( remove_query_arg( array( '{plugin_prefix}_dismiss_notice', '_wpnonce' ) ) );
        exit;
    }

    /**
     * Check if user has dismissed a notice.
     *
     * @param string $notice_id Notice ID.
     * @return bool True if dismissed, false otherwise.
     */
    public function is_notice_dismissed( $notice_id ) {
        $dismissed = get_user_meta(
            get_current_user_id(),
            '{plugin_prefix}_dismissed_notices',
            true
        );

        return $notice_id === $dismissed;
    }

    /**
     * Display persistent admin notice.
     *
     * @param string $id      Notice ID.
     * @param string $message Notice message.
     * @param string $type    Notice type.
     */
    public function display_persistent_notice( $id, $message, $type = 'info' ) {
        // Don't show if dismissed
        if ( $this->is_notice_dismissed( $id ) ) {
            return;
        }

        $dismiss_url = add_query_arg(
            array(
                '{plugin_prefix}_dismiss_notice' => $id,
                '_wpnonce' => wp_create_nonce( 'dismiss_notice_' . $id ),
            )
        );

        ?>
        <div class="notice notice-<?php echo esc_attr( $type ); ?> is-dismissible">
            <p><?php echo wp_kses_post( $message ); ?></p>
            <a href="<?php echo esc_url( $dismiss_url ); ?>" class="notice-dismiss">
                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'leanos-plugin' ); ?></span>
            </a>
        </div>
        <?php
    }
}

// Initialize
$GLOBALS['{plugin_prefix}_notices'] = new LeanCMS_Admin_Notices();

/**
 * Helper function to get notices instance.
 *
 * @return LeanCMS_Admin_Notices
 */
function {plugin_prefix}_notices() {
    return $GLOBALS['{plugin_prefix}_notices'];
}
```

---

## Usage Examples

### Add Simple Notice

```php
// Success
{plugin_prefix}_notices()->success( 'Settings saved successfully!' );

// Error
{plugin_prefix}_notices()->error( 'Failed to save settings.' );

// Warning
{plugin_prefix}_notices()->warning( 'Some features are disabled.' );

// Info
{plugin_prefix}_notices()->info( 'Check out our new feature!' );
```

### Add Transient Notice (Survives Redirect)

```php
// After saving, before redirect
{plugin_prefix}_notices()->add_transient_notice(
    'License renewed successfully!',
    'success',
    true,
    60 // 60 seconds
);

wp_safe_redirect( admin_url( 'admin.php?page=licenses' ) );
exit;
```

### Display WP_Error

```php
$validation = validate_license_data( $data );

if ( is_wp_error( $validation ) ) {
    {plugin_prefix}_notices()->add_wp_error( $validation );
}
```

### Display Validation Errors in Meta Box

```php
public function render_meta_box( $post ) {
    $errors = get_transient( '{plugin_prefix}_validation_errors_' . $post->ID );

    if ( $errors ) {
        {plugin_prefix}_notices()->display_validation_errors( $errors );
        delete_transient( '{plugin_prefix}_validation_errors_' . $post->ID );
    }

    // Meta box content...
}
```

### Persistent Notice Example

```php
add_action( 'admin_notices', function() {
    {plugin_prefix}_notices()->display_persistent_notice(
        'welcome_notice',
        'Welcome to the plugin! <a href="' . admin_url( 'admin.php?page=getting-started' ) . '">Get started</a>',
        'info'
    );
} );
```

### Settings Page Integration

```php
public function save_settings() {
    // Save settings...

    if ( $success ) {
        {plugin_prefix}_notices()->add_settings_error(
            'settings_saved',
            'Settings saved successfully!',
            'success'
        );
    } else {
        {plugin_prefix}_notices()->add_settings_error(
            'settings_error',
            'Failed to save settings.',
            'error'
        );
    }
}

public function render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Settings</h1>

        <?php {plugin_prefix}_notices()->display_settings_errors(); ?>

        <form method="post">
            <!-- Settings form -->
        </form>
    </div>
    <?php
}
```

---

## WordPress Notice Types

### Success Notice
```php
<div class="notice notice-success is-dismissible">
    <p>Operation completed successfully!</p>
</div>
```

### Error Notice
```php
<div class="notice notice-error">
    <p>An error occurred.</p>
</div>
```

### Warning Notice
```php
<div class="notice notice-warning is-dismissible">
    <p>Warning: This action cannot be undone.</p>
</div>
```

### Info Notice
```php
<div class="notice notice-info is-dismissible">
    <p>Did you know about this feature?</p>
</div>
```

---

## Best Practices

### DO ✅
- **Use transient notices for redirects** (survives wp_safe_redirect)
- **Clear notices after display** (prevent duplicate notices)
- **Make notices dismissible** when appropriate
- **Use WP_Error for validation** (structured error handling)
- **Escape all output** (wp_kses_post for message content)
- **Provide clear, actionable messages**
- **Use appropriate notice types** (success, error, warning, info)
- **Track dismissed notices** per user
- **Add links to help** when appropriate

### DON'T ❌
- **Don't use JavaScript alerts** (not WordPress standard)
- **Don't hardcode HTML** (use WordPress notice markup)
- **Don't show the same notice repeatedly**
- **Don't make critical errors dismissible**
- **Don't use vague messages** ("Something went wrong")
- **Don't forget nonce verification** for dismissals
- **Don't display notices on every page**
- **Don't use notices for debugging** (use logger instead)

---

## Common Variations

### Bulk Action Results

```php
add_action( 'admin_notices', function() {
    if ( ! isset( $_GET['bulk_action_result'] ) ) {
        return;
    }

    $result = sanitize_key( $_GET['bulk_action_result'] );
    $count = isset( $_GET['count'] ) ? absint( $_GET['count'] ) : 0;

    if ( 'deleted' === $result ) {
        {plugin_prefix}_notices()->success(
            sprintf(
                _n( '%d item deleted.', '%d items deleted.', $count, 'leanos-plugin' ),
                $count
            )
        );
    }
} );
```

### AJAX Notice Response

```php
add_action( 'wp_ajax_{action}', function() {
    check_ajax_referer( '{handle}_nonce', 'nonce' );

    // Process action...

    if ( $success ) {
        {plugin_prefix}_notices()->add_transient_notice(
            'Action completed successfully!',
            'success'
        );

        wp_send_json_success( array(
            'message' => 'Action completed successfully!',
        ) );
    } else {
        wp_send_json_error( array(
            'message' => 'Action failed.',
        ) );
    }
} );
```

### Import/Export Notices

```php
// After import
if ( $import_success ) {
    {plugin_prefix}_notices()->success(
        sprintf(
            __( 'Successfully imported %d items.', 'leanos-plugin' ),
            $imported_count
        )
    );

    if ( $skipped_count > 0 ) {
        {plugin_prefix}_notices()->warning(
            sprintf(
                __( '%d items were skipped due to errors.', 'leanos-plugin' ),
                $skipped_count
            )
        );
    }
}
```

---

## Security Checklist

- [ ] All output escaped (wp_kses_post)
- [ ] Nonce verification for dismissals
- [ ] Capability checks before displaying admin-only notices
- [ ] Sanitize notice IDs
- [ ] Validate notice types
- [ ] Secure transient keys
- [ ] Prevent XSS in messages

## Testing Checklist

- [ ] Success notices display correctly
- [ ] Error notices display correctly
- [ ] Warning notices display correctly
- [ ] Info notices display correctly
- [ ] Dismissible notices can be dismissed
- [ ] Transient notices survive redirects
- [ ] Notices clear after display
- [ ] Multiple notices display correctly
- [ ] WP_Error integration works
- [ ] Settings errors display
- [ ] Validation errors display in lists
- [ ] Persistent notices can be dismissed
- [ ] Dismissed state persists per user
- [ ] Custom post messages work

## Integration Points

Initialize in main plugin file:

```php
// Admin notices
if ( is_admin() ) {
    require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-admin-notices.php';
}
```

Use throughout plugin:

```php
// After save operation
{plugin_prefix}_notices()->success( 'Saved!' );

// After validation error
{plugin_prefix}_notices()->add_wp_error( $validation_errors );

// Before redirect
{plugin_prefix}_notices()->add_transient_notice( 'Success!', 'success' );
wp_safe_redirect( $url );
exit;
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{plugin_prefix}` | Plugin prefix | `leancms` |
| `{post_type}` | Post type slug | `license` |
| `{Item}` | Singular item name | `License` |
| `{handle}` | Script handle | `lean-admin` |
| `{action}` | AJAX action name | `save_settings` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
