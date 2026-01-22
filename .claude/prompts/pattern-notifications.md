# Pattern: Notifications

## Purpose
Standardized approach for handling email notifications, in-app alerts, admin notices, and user messaging systems in WordPress plugins.

## WordPress Standards
- **Email Headers:** Always set proper headers (From, Reply-To, Content-Type)
- **HTML Emails:** Use `wp_mail()` with proper HTML formatting
- **Admin Notices:** Use WordPress admin notice system
- **Transactional Emails:** Don't rely on WP-Cron for critical emails
- **Unsubscribe:** Provide opt-out for non-transactional emails
- **File Header:** Always include filepath in file header documentation block

## File Structure
```
includes/
└── notifications/
    ├── class-email-handler.php        # Email management
    ├── class-admin-notices.php        # WordPress admin notices
    ├── class-user-notifications.php   # In-app notifications
    └── templates/                     # Email templates
        ├── email-header.php
        ├── email-footer.php
        └── emails/
            ├── {notification-type}.php
            └── {notification-type}-plain.php
```

## Code Template

### Email Handler Class (`class-email-handler.php`)

```php
<?php
/**
 * Email Handler
 *
 * @package    LeanCMS_Plugin
 * @subpackage Notifications
 * @filepath   includes/notifications/class-email-handler.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Email_Handler {

    /**
     * From email address
     *
     * @var string
     */
    private $from_email;

    /**
     * From name
     *
     * @var string
     */
    private $from_name;

    /**
     * Constructor
     */
    public function __construct() {
        $this->from_email = get_option( 'leancms_from_email', get_option( 'admin_email' ) );
        $this->from_name  = get_option( 'leancms_from_name', get_bloginfo( 'name' ) );

        add_filter( 'wp_mail_from', array( $this, 'set_from_email' ) );
        add_filter( 'wp_mail_from_name', array( $this, 'set_from_name' ) );
    }

    /**
     * Send email
     *
     * @param string $to Email recipient
     * @param string $subject Email subject
     * @param string $template Template name
     * @param array $args Template variables
     * @return bool Success
     */
    public function send( $to, $subject, $template, $args = array() ) {
        // Validate email
        if ( ! is_email( $to ) ) {
            return false;
        }

        // Get email content
        $message = $this->get_email_content( $template, $args );

        // Set headers
        $headers = $this->get_headers();

        // Send email
        $sent = wp_mail( $to, $subject, $message, $headers );

        // Log email
        $this->log_email( $to, $subject, $template, $sent );

        return $sent;
    }

    /**
     * Get email content from template
     *
     * @param string $template Template name
     * @param array $args Template variables
     * @return string Email content
     */
    private function get_email_content( $template, $args = array() ) {
        // Extract variables for template
        extract( $args );

        // Start output buffering
        ob_start();

        // Load header
        include LEANCMS_PLUGIN_DIR . 'includes/notifications/templates/email-header.php';

        // Load email template
        $template_file = LEANCMS_PLUGIN_DIR . "includes/notifications/templates/emails/{$template}.php";
        if ( file_exists( $template_file ) ) {
            include $template_file;
        }

        // Load footer
        include LEANCMS_PLUGIN_DIR . 'includes/notifications/templates/email-footer.php';

        return ob_get_clean();
    }

    /**
     * Get email headers
     *
     * @return array Headers
     */
    private function get_headers() {
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            sprintf( 'From: %s <%s>', $this->from_name, $this->from_email ),
        );

        return apply_filters( 'leancms_email_headers', $headers );
    }

    /**
     * Set from email
     *
     * @param string $email Original from email
     * @return string Modified from email
     */
    public function set_from_email( $email ) {
        return $this->from_email;
    }

    /**
     * Set from name
     *
     * @param string $name Original from name
     * @return string Modified from name
     */
    public function set_from_name( $name ) {
        return $this->from_name;
    }

    /**
     * Log email
     *
     * @param string $to Recipient
     * @param string $subject Subject
     * @param string $template Template used
     * @param bool $sent Was email sent successfully
     * @return void
     */
    private function log_email( $to, $subject, $template, $sent ) {
        $log_entry = array(
            'to'        => $to,
            'subject'   => $subject,
            'template'  => $template,
            'sent'      => $sent,
            'timestamp' => current_time( 'mysql' ),
        );

        // Store in option (or custom table for production)
        $logs = get_option( 'leancms_email_logs', array() );
        $logs[] = $log_entry;

        // Keep only last 100 entries
        if ( count( $logs ) > 100 ) {
            $logs = array_slice( $logs, -100 );
        }

        update_option( 'leancms_email_logs', $logs );

        // Log to file if debug enabled
        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            error_log( sprintf(
                '[LeanCMS Email] %s to %s: %s',
                $sent ? 'Sent' : 'Failed',
                $to,
                $subject
            ));
        }
    }

    /**
     * Send test email
     *
     * @param string $to Recipient email
     * @return bool Success
     */
    public function send_test_email( $to ) {
        return $this->send(
            $to,
            __( 'Test Email from LeanCMS Plugin', 'leancms-plugin' ),
            'test-email',
            array(
                'test_message' => __( 'This is a test email.', 'leancms-plugin' ),
            )
        );
    }
}
```

### Admin Notices Class (`class-admin-notices.php`)

```php
<?php
/**
 * Admin Notices
 *
 * @package    LeanCMS_Plugin
 * @subpackage Notifications
 * @filepath   includes/notifications/class-admin-notices.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Admin_Notices {

    /**
     * Notice types
     */
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR   = 'error';
    const TYPE_WARNING = 'warning';
    const TYPE_INFO    = 'info';

    /**
     * Stored notices
     *
     * @var array
     */
    private $notices = array();

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'admin_notices', array( $this, 'display_notices' ) );
        add_action( 'admin_init', array( $this, 'load_notices' ) );
    }

    /**
     * Add notice
     *
     * @param string $message Notice message
     * @param string $type Notice type (success, error, warning, info)
     * @param bool $dismissible Is dismissible
     * @return void
     */
    public function add( $message, $type = self::TYPE_INFO, $dismissible = true ) {
        $this->notices[] = array(
            'message'     => $message,
            'type'        => $type,
            'dismissible' => $dismissible,
        );

        // Save to transient for persistence across redirects
        set_transient( 'leancms_admin_notices_' . get_current_user_id(), $this->notices, 60 );
    }

    /**
     * Load notices from transient
     *
     * @return void
     */
    public function load_notices() {
        $stored = get_transient( 'leancms_admin_notices_' . get_current_user_id() );
        if ( $stored ) {
            $this->notices = $stored;
            delete_transient( 'leancms_admin_notices_' . get_current_user_id() );
        }
    }

    /**
     * Display admin notices
     *
     * @return void
     */
    public function display_notices() {
        foreach ( $this->notices as $notice ) {
            $this->render_notice( $notice );
        }

        // Clear notices after display
        $this->notices = array();
    }

    /**
     * Render individual notice
     *
     * @param array $notice Notice data
     * @return void
     */
    private function render_notice( $notice ) {
        $classes = array( 'notice', 'notice-' . $notice['type'] );

        if ( $notice['dismissible'] ) {
            $classes[] = 'is-dismissible';
        }

        printf(
            '<div class="%s"><p>%s</p></div>',
            esc_attr( implode( ' ', $classes ) ),
            wp_kses_post( $notice['message'] )
        );
    }

    /**
     * Add success notice
     *
     * @param string $message Message
     * @return void
     */
    public function success( $message ) {
        $this->add( $message, self::TYPE_SUCCESS );
    }

    /**
     * Add error notice
     *
     * @param string $message Message
     * @return void
     */
    public function error( $message ) {
        $this->add( $message, self::TYPE_ERROR );
    }

    /**
     * Add warning notice
     *
     * @param string $message Message
     * @return void
     */
    public function warning( $message ) {
        $this->add( $message, self::TYPE_WARNING );
    }

    /**
     * Add info notice
     *
     * @param string $message Message
     * @return void
     */
    public function info( $message ) {
        $this->add( $message, self::TYPE_INFO );
    }
}

// Initialize
global $leancms_admin_notices;
$leancms_admin_notices = new LeanCMS_Admin_Notices();
```

### User Notifications Class (`class-user-notifications.php`)

```php
<?php
/**
 * User Notifications (In-App)
 *
 * @package    LeanCMS_Plugin
 * @subpackage Notifications
 * @filepath   includes/notifications/class-user-notifications.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_User_Notifications {

    /**
     * Create notification for user
     *
     * @param int $user_id User ID
     * @param string $title Notification title
     * @param string $message Notification message
     * @param string $type Notification type
     * @return int|WP_Error Notification ID or error
     */
    public function create( $user_id, $title, $message, $type = 'info' ) {
        // Create notification as custom post type
        $notification_id = wp_insert_post( array(
            'post_type'   => 'leancms_notification',
            'post_title'  => $title,
            'post_content' => $message,
            'post_status' => 'publish',
            'post_author' => $user_id,
        ));

        if ( is_wp_error( $notification_id ) ) {
            return $notification_id;
        }

        // Save meta data
        update_post_meta( $notification_id, '_user_id', $user_id );
        update_post_meta( $notification_id, '_type', $type );
        update_post_meta( $notification_id, '_read', 0 );
        update_post_meta( $notification_id, '_created_at', current_time( 'mysql' ) );

        // Fire action
        do_action( 'leancms_notification_created', $notification_id, $user_id );

        return $notification_id;
    }

    /**
     * Get user notifications
     *
     * @param int $user_id User ID
     * @param bool $unread_only Get only unread notifications
     * @return array Notifications
     */
    public function get_user_notifications( $user_id, $unread_only = false ) {
        $args = array(
            'post_type'      => 'leancms_notification',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'author'         => $user_id,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        if ( $unread_only ) {
            $args['meta_query'] = array(
                array(
                    'key'   => '_read',
                    'value' => '0',
                ),
            );
        }

        return get_posts( $args );
    }

    /**
     * Mark notification as read
     *
     * @param int $notification_id Notification ID
     * @return bool Success
     */
    public function mark_as_read( $notification_id ) {
        update_post_meta( $notification_id, '_read', 1 );
        update_post_meta( $notification_id, '_read_at', current_time( 'mysql' ) );

        do_action( 'leancms_notification_read', $notification_id );

        return true;
    }

    /**
     * Get unread count for user
     *
     * @param int $user_id User ID
     * @return int Count
     */
    public function get_unread_count( $user_id ) {
        $notifications = $this->get_user_notifications( $user_id, true );
        return count( $notifications );
    }

    /**
     * Delete notification
     *
     * @param int $notification_id Notification ID
     * @return bool Success
     */
    public function delete( $notification_id ) {
        $result = wp_delete_post( $notification_id, true );
        return ! empty( $result );
    }

    /**
     * Delete old notifications (cleanup)
     *
     * @param int $days Delete notifications older than X days
     * @return int Number deleted
     */
    public function cleanup_old_notifications( $days = 30 ) {
        $args = array(
            'post_type'      => 'leancms_notification',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'date_query'     => array(
                array(
                    'before' => date( 'Y-m-d', strtotime( "-{$days} days" ) ),
                ),
            ),
        );

        $old_notifications = get_posts( $args );
        $deleted = 0;

        foreach ( $old_notifications as $notification ) {
            if ( wp_delete_post( $notification->ID, true ) ) {
                $deleted++;
            }
        }

        return $deleted;
    }
}
```

## Required Functions

### Email Handler
- [x] Send email via `wp_mail()`
- [x] Load email templates
- [x] Set proper headers
- [x] Log sent emails
- [ ] Support plain text alternative
- [ ] Handle email failures

### Admin Notices
- [x] Add notices (success, error, warning, info)
- [x] Display notices in admin
- [x] Persist across redirects
- [x] Support dismissible notices
- [ ] AJAX dismiss functionality

### User Notifications
- [x] Create notifications
- [x] Get user notifications
- [x] Mark as read
- [x] Get unread count
- [x] Delete notifications
- [x] Cleanup old notifications

## Security Checklist

- [ ] **Email Validation:** Validate all email addresses
- [ ] **Content Sanitization:** Sanitize email content
- [ ] **User Verification:** Verify user permissions for notifications
- [ ] **XSS Prevention:** Escape all output in notices
- [ ] **Rate Limiting:** Prevent email spam/flooding
- [ ] **Unsubscribe Links:** Provide opt-out for marketing emails
- [ ] **No Sensitive Data:** Don't include passwords or sensitive data in emails

## Common Variations

### Scheduled Email (via WP-Cron)
```php
// Schedule email
wp_schedule_single_event( time() + 3600, 'leancms_send_scheduled_email', array(
    'to'       => $email,
    'subject'  => $subject,
    'template' => $template,
));

// Hook handler
add_action( 'leancms_send_scheduled_email', function( $to, $subject, $template ) {
    $email_handler = new LeanCMS_Email_Handler();
    $email_handler->send( $to, $subject, $template );
}, 10, 3 );
```

### AJAX Admin Notices
```php
add_action( 'wp_ajax_leancms_dismiss_notice', 'leancms_ajax_dismiss_notice' );
function leancms_ajax_dismiss_notice() {
    check_ajax_referer( 'leancms_dismiss_notice' );

    $notice_id = sanitize_text_field( $_POST['notice_id'] );
    update_user_meta( get_current_user_id(), "leancms_dismissed_{$notice_id}", 1 );

    wp_send_json_success();
}
```

### SMS Notifications (with Twilio)
```php
public function send_sms( $to, $message ) {
    // Integrate with SMS provider API
    // Example: Twilio, Nexmo, etc.
}
```

## Testing Checklist

### Email
- [ ] Emails send successfully
- [ ] Templates render correctly (HTML)
- [ ] Variables replace properly
- [ ] Headers are correct
- [ ] From address/name displays correctly
- [ ] Emails logged properly
- [ ] Test email feature works
- [ ] Email appears in spam folders (test deliverability)

### Admin Notices
- [ ] Notices display in admin
- [ ] Different types show correctly (colors)
- [ ] Dismissible notices work
- [ ] Notices persist across redirects
- [ ] No duplicate notices
- [ ] Proper escaping (no XSS)

### User Notifications
- [ ] Notifications created successfully
- [ ] Unread count is accurate
- [ ] Mark as read works
- [ ] Notifications display correctly
- [ ] Delete works
- [ ] Cleanup removes old notifications
- [ ] User can only see their own notifications

## Integration Points

### Main Plugin File
```php
// In leancms-plugin.php
require_once LEANCMS_PLUGIN_DIR . 'includes/notifications/class-email-handler.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/notifications/class-admin-notices.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/notifications/class-user-notifications.php';
```

### Usage Examples
```php
// Send email
$email = new LeanCMS_Email_Handler();
$email->send( 'user@example.com', 'Subject', 'template-name', array( 'key' => 'value' ) );

// Add admin notice
global $leancms_admin_notices;
$leancms_admin_notices->success( 'Settings saved successfully!' );

// Create user notification
$notif = new LeanCMS_User_Notifications();
$notif->create( $user_id, 'Title', 'Message', 'info' );
```

## Placeholders to Replace

- `{notification-type}` - Email template name (e.g., `welcome`, `invoice`)
- `{from_email}` - Sender email address
- `{from_name}` - Sender name
- `{user_id}` - Recipient user ID
- `{template}` - Template file name

## Notes

- Use transactional email service (SendGrid, Mailgun) for reliability
- Don't rely on `wp_mail()` for critical notifications in production
- Always provide plain text alternative for emails
- Log all email attempts for debugging
- Consider implementing email queue for bulk sending
- Use action scheduler instead of WP-Cron for reliability
- Test email deliverability with different providers
- Provide unsubscribe mechanism for marketing emails
- Consider GDPR compliance for email storage
