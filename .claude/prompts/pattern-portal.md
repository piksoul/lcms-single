# Pattern: Portal / Dashboard

## Purpose
Standardized approach for creating user portals, dashboards, account pages, and member areas in WordPress plugins.

## WordPress Standards
- **Page Templates:** Use custom page templates or shortcodes
- **User Roles:** Leverage WordPress roles and capabilities
- **Login/Logout:** Use WordPress authentication system
- **Permalinks:** Support custom permalink structures
- **Responsive Design:** Mobile-first approach
- **File Header:** Always include filepath in file header documentation block

## File Structure
```
includes/
└── portal/
    ├── class-portal.php              # Main portal handler
    ├── class-dashboard.php           # Dashboard widgets
    ├── class-user-profile.php        # Profile management
    ├── class-portal-shortcodes.php   # Portal shortcodes
    └── templates/                    # Portal templates
        ├── dashboard.php
        ├── profile.php
        ├── account.php
        └── widgets/
            ├── widget-stats.php
            └── widget-activity.php
```

## Code Template

### Portal Main Class (`class-portal.php`)

```php
<?php
/**
 * Portal Management
 *
 * @package    LeanCMS_Plugin
 * @subpackage Portal
 * @filepath   includes/portal/class-portal.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Portal {

    /**
     * Portal page slugs
     *
     * @var array
     */
    private $pages = array(
        'dashboard' => 'my-dashboard',
        'profile'   => 'my-profile',
        'account'   => 'my-account',
    );

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_pages' ) );
        add_action( 'template_redirect', array( $this, 'handle_portal_access' ) );
        add_filter( 'the_content', array( $this, 'render_portal_content' ) );
    }

    /**
     * Register portal pages
     *
     * @return void
     */
    public function register_pages() {
        // Add rewrite rules for portal pages
        foreach ( $this->pages as $key => $slug ) {
            add_rewrite_rule(
                "^{$slug}/?$",
                'index.php?leancms_portal_page=' . $key,
                'top'
            );
        }

        // Add query var
        add_filter( 'query_vars', function( $vars ) {
            $vars[] = 'leancms_portal_page';
            return $vars;
        });
    }

    /**
     * Handle portal access control
     *
     * @return void
     */
    public function handle_portal_access() {
        $page = get_query_var( 'leancms_portal_page' );

        if ( ! $page ) {
            return;
        }

        // Require login for all portal pages
        if ( ! is_user_logged_in() ) {
            wp_redirect( wp_login_url( $this->get_current_portal_url() ) );
            exit;
        }

        // Check user capabilities if needed
        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'You do not have permission to access this page.', 'leancms-plugin' ) );
        }
    }

    /**
     * Render portal content
     *
     * @param string $content Original content
     * @return string Modified content
     */
    public function render_portal_content( $content ) {
        $page = get_query_var( 'leancms_portal_page' );

        if ( ! $page || ! is_user_logged_in() ) {
            return $content;
        }

        // Start output buffering
        ob_start();

        // Load portal template
        $this->load_portal_template( $page );

        return ob_get_clean();
    }

    /**
     * Load portal template
     *
     * @param string $page Page type
     * @return void
     */
    private function load_portal_template( $page ) {
        $user = wp_get_current_user();

        // Check for theme override
        $theme_template = locate_template( array(
            "lean-portal/{$page}.php",
            "leancms/{$page}.php",
        ));

        if ( $theme_template ) {
            include $theme_template;
        } else {
            // Load plugin template
            $plugin_template = LEANCMS_PLUGIN_DIR . "includes/portal/templates/{$page}.php";
            if ( file_exists( $plugin_template ) ) {
                include $plugin_template;
            }
        }
    }

    /**
     * Get current portal URL
     *
     * @return string Current URL
     */
    private function get_current_portal_url() {
        return home_url( add_query_arg( array() ) );
    }

    /**
     * Get portal page URL
     *
     * @param string $page Page key
     * @return string URL
     */
    public function get_page_url( $page ) {
        if ( isset( $this->pages[ $page ] ) ) {
            return home_url( $this->pages[ $page ] );
        }
        return home_url();
    }
}

// Initialize
new LeanCMS_Portal();
```

### Dashboard Class (`class-dashboard.php`)

```php
<?php
/**
 * User Dashboard
 *
 * @package    LeanCMS_Plugin
 * @subpackage Portal
 * @filepath   includes/portal/class-dashboard.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Dashboard {

    /**
     * Dashboard widgets
     *
     * @var array
     */
    private $widgets = array();

    /**
     * Constructor
     */
    public function __construct() {
        $this->register_widgets();
    }

    /**
     * Register dashboard widgets
     *
     * @return void
     */
    private function register_widgets() {
        // Register default widgets
        $this->add_widget( 'stats', array(
            'title'    => __( 'Statistics', 'leancms-plugin' ),
            'callback' => array( $this, 'render_stats_widget' ),
            'order'    => 10,
        ));

        $this->add_widget( 'activity', array(
            'title'    => __( 'Recent Activity', 'leancms-plugin' ),
            'callback' => array( $this, 'render_activity_widget' ),
            'order'    => 20,
        ));

        // Allow other code to register widgets
        do_action( 'leancms_dashboard_register_widgets', $this );

        // Sort widgets by order
        uasort( $this->widgets, function( $a, $b ) {
            return $a['order'] - $b['order'];
        });
    }

    /**
     * Add dashboard widget
     *
     * @param string $id Widget ID
     * @param array $args Widget arguments
     * @return void
     */
    public function add_widget( $id, $args ) {
        $defaults = array(
            'title'    => '',
            'callback' => null,
            'order'    => 50,
            'class'    => '',
        );

        $this->widgets[ $id ] = wp_parse_args( $args, $defaults );
    }

    /**
     * Render dashboard
     *
     * @return void
     */
    public function render() {
        $user = wp_get_current_user();
        ?>
        <div class="lean-dashboard">
            <h1><?php printf( __( 'Welcome, %s', 'leancms-plugin' ), esc_html( $user->display_name ) ); ?></h1>

            <div class="lean-dashboard-widgets">
                <?php foreach ( $this->widgets as $id => $widget ) : ?>
                    <div class="lean-dashboard-widget lean-widget-<?php echo esc_attr( $id ); ?> <?php echo esc_attr( $widget['class'] ); ?>">
                        <?php if ( ! empty( $widget['title'] ) ) : ?>
                            <h3 class="widget-title"><?php echo esc_html( $widget['title'] ); ?></h3>
                        <?php endif; ?>

                        <div class="widget-content">
                            <?php
                            if ( is_callable( $widget['callback'] ) ) {
                                call_user_func( $widget['callback'], $user );
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }

    /**
     * Render stats widget
     *
     * @param WP_User $user Current user
     * @return void
     */
    public function render_stats_widget( $user ) {
        // Get user stats
        $stats = $this->get_user_stats( $user->ID );
        ?>
        <div class="lean-stats">
            <?php foreach ( $stats as $key => $value ) : ?>
                <div class="stat-item">
                    <span class="stat-label"><?php echo esc_html( $value['label'] ); ?>:</span>
                    <span class="stat-value"><?php echo esc_html( $value['value'] ); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    /**
     * Render activity widget
     *
     * @param WP_User $user Current user
     * @return void
     */
    public function render_activity_widget( $user ) {
        // Get user activity
        $activities = $this->get_user_activity( $user->ID );
        ?>
        <ul class="lean-activity-list">
            <?php if ( ! empty( $activities ) ) : ?>
                <?php foreach ( $activities as $activity ) : ?>
                    <li class="activity-item">
                        <span class="activity-icon"><?php echo esc_html( $activity['icon'] ); ?></span>
                        <span class="activity-text"><?php echo esc_html( $activity['text'] ); ?></span>
                        <span class="activity-date"><?php echo esc_html( $activity['date'] ); ?></span>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li><?php esc_html_e( 'No recent activity', 'leancms-plugin' ); ?></li>
            <?php endif; ?>
        </ul>
        <?php
    }

    /**
     * Get user statistics
     *
     * @param int $user_id User ID
     * @return array Statistics
     */
    private function get_user_stats( $user_id ) {
        // Example stats - replace with actual data
        return apply_filters( 'leancms_dashboard_stats', array(
            'total_orders' => array(
                'label' => __( 'Total Orders', 'leancms-plugin' ),
                'value' => 0,
            ),
            'total_spent' => array(
                'label' => __( 'Total Spent', 'leancms-plugin' ),
                'value' => '$0.00',
            ),
        ), $user_id );
    }

    /**
     * Get user activity
     *
     * @param int $user_id User ID
     * @return array Activity items
     */
    private function get_user_activity( $user_id ) {
        // Example activity - replace with actual data
        return apply_filters( 'leancms_dashboard_activity', array(), $user_id );
    }
}
```

### User Profile Class (`class-user-profile.php`)

```php
<?php
/**
 * User Profile Management
 *
 * @package    LeanCMS_Plugin
 * @subpackage Portal
 * @filepath   includes/portal/class-user-profile.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_User_Profile {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'show_user_profile', array( $this, 'add_custom_fields' ) );
        add_action( 'edit_user_profile', array( $this, 'add_custom_fields' ) );
        add_action( 'personal_options_update', array( $this, 'save_custom_fields' ) );
        add_action( 'edit_user_profile_update', array( $this, 'save_custom_fields' ) );
    }

    /**
     * Add custom profile fields
     *
     * @param WP_User $user User object
     * @return void
     */
    public function add_custom_fields( $user ) {
        if ( ! current_user_can( 'edit_user', $user->ID ) ) {
            return;
        }
        ?>
        <h3><?php esc_html_e( 'Additional Information', 'leancms-plugin' ); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="leancms_phone"><?php esc_html_e( 'Phone Number', 'leancms-plugin' ); ?></label></th>
                <td>
                    <input type="text"
                           name="leancms_phone"
                           id="leancms_phone"
                           value="<?php echo esc_attr( get_user_meta( $user->ID, 'leancms_phone', true ) ); ?>"
                           class="regular-text">
                </td>
            </tr>
            <tr>
                <th><label for="leancms_company"><?php esc_html_e( 'Company', 'leancms-plugin' ); ?></label></th>
                <td>
                    <input type="text"
                           name="leancms_company"
                           id="leancms_company"
                           value="<?php echo esc_attr( get_user_meta( $user->ID, 'leancms_company', true ) ); ?>"
                           class="regular-text">
                </td>
            </tr>
        </table>
        <?php
    }

    /**
     * Save custom profile fields
     *
     * @param int $user_id User ID
     * @return void
     */
    public function save_custom_fields( $user_id ) {
        if ( ! current_user_can( 'edit_user', $user_id ) ) {
            return;
        }

        // Verify nonce (WordPress handles this in profile page)

        // Save phone
        if ( isset( $_POST['leancms_phone'] ) ) {
            update_user_meta( $user_id, 'leancms_phone', sanitize_text_field( $_POST['leancms_phone'] ) );
        }

        // Save company
        if ( isset( $_POST['leancms_company'] ) ) {
            update_user_meta( $user_id, 'leancms_company', sanitize_text_field( $_POST['leancms_company'] ) );
        }
    }

    /**
     * Render frontend profile form
     *
     * @return void
     */
    public function render_profile_form() {
        if ( ! is_user_logged_in() ) {
            return;
        }

        $user = wp_get_current_user();
        $nonce = wp_create_nonce( 'leancms_update_profile' );
        ?>
        <form method="post" action="" class="lean-profile-form">
            <?php wp_nonce_field( 'leancms_update_profile', 'leancms_profile_nonce' ); ?>

            <p>
                <label for="user_email"><?php esc_html_e( 'Email', 'leancms-plugin' ); ?></label>
                <input type="email" name="user_email" id="user_email" value="<?php echo esc_attr( $user->user_email ); ?>" required>
            </p>

            <p>
                <label for="first_name"><?php esc_html_e( 'First Name', 'leancms-plugin' ); ?></label>
                <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $user->first_name ); ?>">
            </p>

            <p>
                <label for="last_name"><?php esc_html_e( 'Last Name', 'leancms-plugin' ); ?></label>
                <input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $user->last_name ); ?>">
            </p>

            <p>
                <label for="leancms_phone"><?php esc_html_e( 'Phone', 'leancms-plugin' ); ?></label>
                <input type="text" name="leancms_phone" id="leancms_phone" value="<?php echo esc_attr( get_user_meta( $user->ID, 'leancms_phone', true ) ); ?>">
            </p>

            <p>
                <button type="submit" name="leancms_update_profile"><?php esc_html_e( 'Update Profile', 'leancms-plugin' ); ?></button>
            </p>
        </form>
        <?php
    }

    /**
     * Handle profile update submission
     *
     * @return void
     */
    public function handle_profile_update() {
        if ( ! isset( $_POST['leancms_update_profile'] ) ) {
            return;
        }

        // Verify nonce
        if ( ! isset( $_POST['leancms_profile_nonce'] ) || ! wp_verify_nonce( $_POST['leancms_profile_nonce'], 'leancms_update_profile' ) ) {
            return;
        }

        if ( ! is_user_logged_in() ) {
            return;
        }

        $user_id = get_current_user_id();

        // Update user data
        $user_data = array(
            'ID'         => $user_id,
            'user_email' => sanitize_email( $_POST['user_email'] ),
            'first_name' => sanitize_text_field( $_POST['first_name'] ),
            'last_name'  => sanitize_text_field( $_POST['last_name'] ),
        );

        wp_update_user( $user_data );

        // Update custom meta
        if ( isset( $_POST['leancms_phone'] ) ) {
            update_user_meta( $user_id, 'leancms_phone', sanitize_text_field( $_POST['leancms_phone'] ) );
        }

        // Redirect with success message
        wp_redirect( add_query_arg( 'profile_updated', '1', wp_get_referer() ) );
        exit;
    }
}

// Initialize
new LeanCMS_User_Profile();
```

## Required Functions

### Portal
- [x] Register custom pages/endpoints
- [x] Handle access control
- [x] Load templates
- [x] Support theme overrides
- [ ] Handle navigation menu
- [ ] Breadcrumb navigation

### Dashboard
- [x] Register dashboard widgets
- [x] Render dashboard
- [x] Display user stats
- [x] Show activity feed
- [ ] AJAX widget refresh
- [ ] Customizable widget layout

### User Profile
- [x] Add custom profile fields
- [x] Save profile data
- [x] Frontend profile form
- [x] Handle form submission
- [ ] Avatar upload
- [ ] Password change

## Security Checklist

- [ ] **Login Required:** Verify user is logged in for all portal pages
- [ ] **Capability Checks:** Verify user permissions
- [ ] **Nonce Verification:** Use nonces for all forms
- [ ] **Data Sanitization:** Sanitize all user inputs
- [ ] **Output Escaping:** Escape all output
- [ ] **CSRF Protection:** Protect against cross-site request forgery
- [ ] **User Verification:** Verify user owns the data they're accessing

## Common Variations

### Custom Login Page
```php
add_action( 'login_form_middle', 'leancms_custom_login_form' );
function leancms_custom_login_form() {
    // Add custom fields to login form
}
```

### Redirect After Login
```php
add_filter( 'login_redirect', 'leancms_login_redirect', 10, 3 );
function leancms_login_redirect( $redirect_to, $request, $user ) {
    return home_url( '/my-dashboard' );
}
```

### Custom User Roles
```php
add_role( 'portal_user', __( 'Portal User', 'leancms-plugin' ), array(
    'read' => true,
));
```

## Testing Checklist

### Portal Access
- [ ] Portal pages load correctly
- [ ] Redirects to login when not authenticated
- [ ] Logged-in users can access all pages
- [ ] Permalinks work correctly
- [ ] Theme templates override plugin templates

### Dashboard
- [ ] Dashboard displays for logged-in users
- [ ] All widgets render correctly
- [ ] Stats are accurate
- [ ] Activity feed shows recent items
- [ ] Widgets can be added/removed

### Profile
- [ ] Profile form displays correctly
- [ ] Data saves successfully
- [ ] Validation works
- [ ] Error messages display
- [ ] Success messages show
- [ ] Custom fields appear in admin

## Integration Points

### Main Plugin File
```php
// In leancms-plugin.php
require_once LEANCMS_PLUGIN_DIR . 'includes/portal/class-portal.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/portal/class-dashboard.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/portal/class-user-profile.php';
```

### Activation Hook
```php
// Flush rewrite rules when activating
register_activation_hook( __FILE__, 'leancms_portal_activation' );
function leancms_portal_activation() {
    // Trigger portal registration
    $portal = new LeanCMS_Portal();
    // Flush rewrite rules
    flush_rewrite_rules();
}
```

## Placeholders to Replace

- `{page_slug}` - Portal page slug (e.g., `my-dashboard`)
- `{widget_id}` - Dashboard widget ID
- `{field_name}` - Custom field name
- `{user_capability}` - Required user capability

## Notes

- Always flush rewrite rules after adding portal pages
- Support theme template overrides for customization
- Use WordPress authentication system (don't reinvent)
- Consider page builders for portal page layouts
- Implement AJAX for better user experience
- Use WordPress REST API for dynamic content
- Consider multi-level navigation for complex portals
- Test with different user roles
- Ensure mobile responsiveness
- Implement caching for better performance
