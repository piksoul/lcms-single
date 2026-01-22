# WordPress Admin Pattern

## Purpose
Create admin interface customizations including dashboard widgets, admin columns, custom admin views, meta boxes, and admin notices.

## WordPress Standards
- Follow WordPress Coding Standards
- Use proper escaping for all output (`esc_html()`, `esc_attr()`, `esc_url()`)
- Sanitize all user inputs
- Check user capabilities before displaying admin features
- Use WordPress admin UI components (WP_List_Table, Settings API)
- Nonce verification for all form submissions
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── admin/
    ├── class-admin-columns.php      # Custom admin columns
    ├── class-dashboard-widgets.php  # Dashboard widgets
    ├── class-admin-pages.php        # Custom admin pages
    └── class-meta-boxes.php         # Meta boxes
```

---

## 1. Admin Columns Template

**File:** `includes/admin/class-admin-columns.php`

```php
<?php
/**
 * Admin Columns Handler
 *
 * Manages custom columns in WordPress admin lists.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Admin
 * @filepath   includes/admin/class-admin-columns.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Admin Columns Class
 *
 * Handles custom columns for post types and taxonomies in admin.
 */
class LeanCMS_Admin_Columns {

    /**
     * Initialize the class.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks() {
        // Add columns for {post_type}
        add_filter( 'manage_{post_type}_posts_columns', array( $this, 'add_columns' ) );
        add_action( 'manage_{post_type}_posts_custom_column', array( $this, 'render_column' ), 10, 2 );
        add_filter( 'manage_edit-{post_type}_sortable_columns', array( $this, 'sortable_columns' ) );

        // Make columns sortable (if applicable)
        add_action( 'pre_get_posts', array( $this, 'sortable_orderby' ) );
    }

    /**
     * Add custom columns.
     *
     * @param array $columns Existing columns.
     * @return array Modified columns.
     */
    public function add_columns( $columns ) {
        // Insert custom columns after title
        $new_columns = array();

        foreach ( $columns as $key => $value ) {
            $new_columns[ $key ] = $value;

            if ( 'title' === $key ) {
                $new_columns['{column_key}'] = __( '{Column Label}', 'leanos-plugin' );
                $new_columns['{column_key_2}'] = __( '{Column Label 2}', 'leanos-plugin' );
            }
        }

        // Remove unwanted default columns (optional)
        // unset( $new_columns['date'] );

        return $new_columns;
    }

    /**
     * Render custom column content.
     *
     * @param string $column  Column key.
     * @param int    $post_id Post ID.
     */
    public function render_column( $column, $post_id ) {
        switch ( $column ) {
            case '{column_key}':
                $value = get_post_meta( $post_id, '{meta_key}', true );
                if ( $value ) {
                    echo esc_html( $value );
                } else {
                    echo '<span class="na">—</span>';
                }
                break;

            case '{column_key_2}':
                $status = get_post_meta( $post_id, '{status_key}', true );
                $class = sanitize_html_class( 'status-' . $status );
                printf(
                    '<span class="status-badge %s">%s</span>',
                    esc_attr( $class ),
                    esc_html( ucfirst( $status ) )
                );
                break;
        }
    }

    /**
     * Make columns sortable.
     *
     * @param array $columns Sortable columns.
     * @return array Modified sortable columns.
     */
    public function sortable_columns( $columns ) {
        $columns['{column_key}'] = '{meta_key}';
        return $columns;
    }

    /**
     * Handle sorting by custom column.
     *
     * @param WP_Query $query The query object.
     */
    public function sortable_orderby( $query ) {
        if ( ! is_admin() || ! $query->is_main_query() ) {
            return;
        }

        $orderby = $query->get( 'orderby' );

        if ( '{meta_key}' === $orderby ) {
            $query->set( 'meta_key', '{meta_key}' );
            $query->set( 'orderby', 'meta_value' );
        }
    }
}

// Initialize
new LeanCMS_Admin_Columns();
```

---

## 2. Dashboard Widgets Template

**File:** `includes/admin/class-dashboard-widgets.php`

```php
<?php
/**
 * Dashboard Widgets Handler
 *
 * Manages custom WordPress dashboard widgets.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Admin
 * @filepath   includes/admin/class-dashboard-widgets.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Dashboard Widgets Class
 *
 * Handles custom dashboard widgets for the plugin.
 */
class LeanCMS_Dashboard_Widgets {

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ) );
    }

    /**
     * Add dashboard widgets.
     */
    public function add_widgets() {
        // Check user capability
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        wp_add_dashboard_widget(
            '{widget_id}',
            __( '{Widget Title}', 'leanos-plugin' ),
            array( $this, 'render_{widget_id}' ),
            array( $this, 'config_{widget_id}' ) // Optional: Config callback
        );

        // Add more widgets as needed
        wp_add_dashboard_widget(
            '{widget_id_2}',
            __( '{Widget Title 2}', 'leanos-plugin' ),
            array( $this, 'render_{widget_id_2}' )
        );
    }

    /**
     * Render {widget_id} widget.
     */
    public function render_{widget_id}() {
        // Get data for widget
        $data = $this->get_{widget_id}_data();

        ?>
        <div class="lean-dashboard-widget">
            <div class="widget-stats">
                <div class="stat-box">
                    <span class="stat-label"><?php esc_html_e( 'Total {Items}', 'leanos-plugin' ); ?></span>
                    <span class="stat-value"><?php echo esc_html( $data['total'] ); ?></span>
                </div>
                <div class="stat-box">
                    <span class="stat-label"><?php esc_html_e( 'Active', 'leanos-plugin' ); ?></span>
                    <span class="stat-value"><?php echo esc_html( $data['active'] ); ?></span>
                </div>
                <div class="stat-box">
                    <span class="stat-label"><?php esc_html_e( 'Pending', 'leanos-plugin' ); ?></span>
                    <span class="stat-value"><?php echo esc_html( $data['pending'] ); ?></span>
                </div>
            </div>

            <div class="widget-actions">
                <a href="<?php echo esc_url( admin_url( 'admin.php?page={page_slug}' ) ); ?>" class="button button-primary">
                    <?php esc_html_e( 'View All', 'leanos-plugin' ); ?>
                </a>
            </div>
        </div>
        <?php
    }

    /**
     * Render {widget_id_2} widget.
     */
    public function render_{widget_id_2}() {
        $items = $this->get_recent_{items}( 5 );

        if ( empty( $items ) ) {
            echo '<p>' . esc_html__( 'No {items} found.', 'leanos-plugin' ) . '</p>';
            return;
        }

        echo '<ul class="lean-recent-items">';
        foreach ( $items as $item ) {
            printf(
                '<li><a href="%s">%s</a> <span class="item-date">%s</span></li>',
                esc_url( get_edit_post_link( $item->ID ) ),
                esc_html( $item->post_title ),
                esc_html( human_time_diff( strtotime( $item->post_date ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'leanos-plugin' ) )
            );
        }
        echo '</ul>';
    }

    /**
     * Widget configuration (optional).
     */
    public function config_{widget_id}() {
        if ( isset( $_POST['{widget_id}_submit'] ) ) {
            check_admin_referer( '{widget_id}_config' );

            $display_count = absint( $_POST['{widget_id}_count'] );
            update_user_meta( get_current_user_id(), '{widget_id}_count', $display_count );
        }

        $display_count = get_user_meta( get_current_user_id(), '{widget_id}_count', true );
        $display_count = ! empty( $display_count ) ? $display_count : 5;

        ?>
        <label for="{widget_id}_count">
            <?php esc_html_e( 'Number of items to display:', 'leanos-plugin' ); ?>
        </label>
        <input type="number" id="{widget_id}_count" name="{widget_id}_count" value="<?php echo esc_attr( $display_count ); ?>" min="1" max="20">
        <input type="hidden" name="{widget_id}_submit" value="1">
        <?php wp_nonce_field( '{widget_id}_config' ); ?>
        <?php
    }

    /**
     * Get data for {widget_id}.
     *
     * @return array Widget data.
     */
    private function get_{widget_id}_data() {
        // Example: Get post counts
        $counts = wp_count_posts( '{post_type}' );

        return array(
            'total'   => $counts->publish + $counts->pending + $counts->draft,
            'active'  => $counts->publish,
            'pending' => $counts->pending,
        );
    }

    /**
     * Get recent {items}.
     *
     * @param int $limit Number of items to retrieve.
     * @return array Recent items.
     */
    private function get_recent_{items}( $limit = 5 ) {
        $args = array(
            'post_type'      => '{post_type}',
            'posts_per_page' => $limit,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $query = new WP_Query( $args );
        return $query->posts;
    }
}

// Initialize
new LeanCMS_Dashboard_Widgets();
```

---

## 3. Admin Pages Template

**File:** `includes/admin/class-admin-pages.php`

```php
<?php
/**
 * Admin Pages Handler
 *
 * Manages custom admin pages and menu items.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Admin
 * @filepath   includes/admin/class-admin-pages.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Admin Pages Class
 *
 * Handles custom admin pages for the plugin.
 */
class LeanCMS_Admin_Pages {

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
    }

    /**
     * Add admin menu pages.
     */
    public function add_menu_pages() {
        // Main menu page
        add_menu_page(
            __( '{Plugin Name}', 'leanos-plugin' ),
            __( '{Menu Label}', 'leanos-plugin' ),
            'manage_options',
            '{page_slug}',
            array( $this, 'render_main_page' ),
            'dashicons-admin-generic',
            30
        );

        // Submenu pages
        add_submenu_page(
            '{page_slug}',
            __( '{Submenu Title}', 'leanos-plugin' ),
            __( '{Submenu Label}', 'leanos-plugin' ),
            'manage_options',
            '{submenu_slug}',
            array( $this, 'render_{submenu_slug}' )
        );

        // Hidden admin page (no menu item)
        add_submenu_page(
            null, // Parent slug is null for hidden pages
            __( '{Hidden Page Title}', 'leanos-plugin' ),
            __( '{Hidden Page Title}', 'leanos-plugin' ),
            'manage_options',
            '{hidden_slug}',
            array( $this, 'render_{hidden_slug}' )
        );
    }

    /**
     * Enqueue admin assets.
     *
     * @param string $hook Current admin page hook.
     */
    public function enqueue_admin_assets( $hook ) {
        // Only load on our admin pages
        if ( strpos( $hook, '{page_slug}' ) === false ) {
            return;
        }

        wp_enqueue_style(
            '{handle}-admin',
            LEANCMS_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            LEANCMS_VERSION
        );

        wp_enqueue_script(
            '{handle}-admin',
            LEANCMS_PLUGIN_URL . 'assets/js/admin.js',
            array( 'jquery' ),
            LEANCMS_VERSION,
            true
        );

        wp_localize_script(
            '{handle}-admin',
            '{handle}AdminData',
            array(
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( '{handle}_admin_nonce' ),
                'strings' => array(
                    'confirm' => __( 'Are you sure?', 'leanos-plugin' ),
                    'error'   => __( 'An error occurred.', 'leanos-plugin' ),
                ),
            )
        );
    }

    /**
     * Render main admin page.
     */
    public function render_main_page() {
        // Check user capabilities
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'leanos-plugin' ) );
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <div class="lean-admin-header">
                <p class="description">
                    <?php esc_html_e( '{Page description}', 'leanos-plugin' ); ?>
                </p>
            </div>

            <div class="lean-admin-content">
                <div class="lean-card">
                    <h2><?php esc_html_e( '{Section Title}', 'leanos-plugin' ); ?></h2>

                    <?php $this->render_{section}(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Render {submenu_slug} page.
     */
    public function render_{submenu_slug}() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'leanos-plugin' ) );
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e( '{Column 1}', 'leanos-plugin' ); ?></th>
                        <th><?php esc_html_e( '{Column 2}', 'leanos-plugin' ); ?></th>
                        <th><?php esc_html_e( 'Actions', 'leanos-plugin' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $this->render_{items}_table(); ?>
                </tbody>
            </table>
        </div>
        <?php
    }

    /**
     * Render {hidden_slug} page.
     */
    public function render_{hidden_slug}() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'leanos-plugin' ) );
        }

        // Get item ID from URL
        $item_id = isset( $_GET['item'] ) ? absint( $_GET['item'] ) : 0;

        if ( ! $item_id ) {
            wp_die( esc_html__( 'Invalid item ID.', 'leanos-plugin' ) );
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <a href="<?php echo esc_url( admin_url( 'admin.php?page={page_slug}' ) ); ?>" class="button">
                &larr; <?php esc_html_e( 'Back', 'leanos-plugin' ); ?>
            </a>

            <div class="lean-item-details">
                <?php $this->render_item_details( $item_id ); ?>
            </div>
        </div>
        <?php
    }

    /**
     * Render {section} section.
     */
    private function render_{section}() {
        // Section content
        echo '<p>' . esc_html__( '{Section content}', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Render {items} table rows.
     */
    private function render_{items}_table() {
        // Get items (example)
        $items = array(); // Your data source

        if ( empty( $items ) ) {
            echo '<tr><td colspan="3">' . esc_html__( 'No items found.', 'leanos-plugin' ) . '</td></tr>';
            return;
        }

        foreach ( $items as $item ) {
            printf(
                '<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>
                        <a href="%s" class="button button-small">%s</a>
                    </td>
                </tr>',
                esc_html( $item->name ),
                esc_html( $item->status ),
                esc_url( admin_url( 'admin.php?page={hidden_slug}&item=' . $item->id ) ),
                esc_html__( 'View', 'leanos-plugin' )
            );
        }
    }

    /**
     * Render item details.
     *
     * @param int $item_id Item ID.
     */
    private function render_item_details( $item_id ) {
        // Get item details
        echo '<p>' . esc_html__( 'Item details for ID:', 'leanos-plugin' ) . ' ' . esc_html( $item_id ) . '</p>';
    }
}

// Initialize
new LeanCMS_Admin_Pages();
```

---

## 4. Meta Boxes Template

**File:** `includes/admin/class-meta-boxes.php`

```php
<?php
/**
 * Meta Boxes Handler
 *
 * Manages custom meta boxes for post types.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Admin
 * @filepath   includes/admin/class-meta-boxes.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Meta Boxes Class
 *
 * Handles custom meta boxes for the plugin.
 */
class LeanCMS_Meta_Boxes {

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_meta_box_data' ) );
    }

    /**
     * Add meta boxes.
     */
    public function add_meta_boxes() {
        add_meta_box(
            '{meta_box_id}',
            __( '{Meta Box Title}', 'leanos-plugin' ),
            array( $this, 'render_{meta_box_id}' ),
            array( 'post', '{post_type}' ), // Post types
            'normal', // Context: normal, side, advanced
            'high'    // Priority: high, low, default
        );

        add_meta_box(
            '{meta_box_id_2}',
            __( '{Meta Box Title 2}', 'leanos-plugin' ),
            array( $this, 'render_{meta_box_id_2}' ),
            '{post_type}',
            'side',
            'default'
        );
    }

    /**
     * Render {meta_box_id} meta box.
     *
     * @param WP_Post $post Current post object.
     */
    public function render_{meta_box_id}( $post ) {
        // Add nonce for security
        wp_nonce_field( '{meta_box_id}_save', '{meta_box_id}_nonce' );

        // Get existing values
        $field_value = get_post_meta( $post->ID, '{meta_key}', true );
        $field_value_2 = get_post_meta( $post->ID, '{meta_key_2}', true );

        ?>
        <div class="lean-meta-box">
            <p>
                <label for="{meta_key}">
                    <strong><?php esc_html_e( '{Field Label}', 'leanos-plugin' ); ?></strong>
                </label>
            </p>
            <p>
                <input
                    type="text"
                    id="{meta_key}"
                    name="{meta_key}"
                    value="<?php echo esc_attr( $field_value ); ?>"
                    class="widefat"
                >
            </p>

            <p>
                <label for="{meta_key_2}">
                    <strong><?php esc_html_e( '{Field Label 2}', 'leanos-plugin' ); ?></strong>
                </label>
            </p>
            <p>
                <select id="{meta_key_2}" name="{meta_key_2}" class="widefat">
                    <option value=""><?php esc_html_e( 'Select...', 'leanos-plugin' ); ?></option>
                    <option value="option1" <?php selected( $field_value_2, 'option1' ); ?>>
                        <?php esc_html_e( 'Option 1', 'leanos-plugin' ); ?>
                    </option>
                    <option value="option2" <?php selected( $field_value_2, 'option2' ); ?>>
                        <?php esc_html_e( 'Option 2', 'leanos-plugin' ); ?>
                    </option>
                </select>
            </p>
        </div>
        <?php
    }

    /**
     * Render {meta_box_id_2} meta box.
     *
     * @param WP_Post $post Current post object.
     */
    public function render_{meta_box_id_2}( $post ) {
        wp_nonce_field( '{meta_box_id_2}_save', '{meta_box_id_2}_nonce' );

        $checkbox_value = get_post_meta( $post->ID, '{checkbox_key}', true );

        ?>
        <div class="lean-meta-box">
            <p>
                <label>
                    <input
                        type="checkbox"
                        name="{checkbox_key}"
                        value="1"
                        <?php checked( $checkbox_value, '1' ); ?>
                    >
                    <?php esc_html_e( '{Checkbox Label}', 'leanos-plugin' ); ?>
                </label>
            </p>
        </div>
        <?php
    }

    /**
     * Save meta box data.
     *
     * @param int $post_id Post ID.
     */
    public function save_meta_box_data( $post_id ) {
        // Check if nonce is set
        if ( ! isset( $_POST['{meta_box_id}_nonce'] ) && ! isset( $_POST['{meta_box_id_2}_nonce'] ) ) {
            return;
        }

        // Verify nonce
        if ( isset( $_POST['{meta_box_id}_nonce'] ) ) {
            if ( ! wp_verify_nonce( $_POST['{meta_box_id}_nonce'], '{meta_box_id}_save' ) ) {
                return;
            }
        }

        // Check autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check user permissions
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Save {meta_key}
        if ( isset( $_POST['{meta_key}'] ) ) {
            $value = sanitize_text_field( $_POST['{meta_key}'] );
            update_post_meta( $post_id, '{meta_key}', $value );
        }

        // Save {meta_key_2}
        if ( isset( $_POST['{meta_key_2}'] ) ) {
            $value = sanitize_text_field( $_POST['{meta_key_2}'] );
            update_post_meta( $post_id, '{meta_key_2}', $value );
        }

        // Save checkbox
        if ( isset( $_POST['{checkbox_key}'] ) ) {
            update_post_meta( $post_id, '{checkbox_key}', '1' );
        } else {
            delete_post_meta( $post_id, '{checkbox_key}' );
        }
    }
}

// Initialize
new LeanCMS_Meta_Boxes();
```

---

## Security Checklist

- [ ] All user inputs are sanitized (`sanitize_text_field()`, `absint()`, etc.)
- [ ] All outputs are escaped (`esc_html()`, `esc_attr()`, `esc_url()`)
- [ ] Nonce verification implemented for all forms
- [ ] Capability checks on all admin functions (`current_user_can()`)
- [ ] No direct file access (check for `WPINC`)
- [ ] AJAX handlers verify nonce and capabilities
- [ ] No SQL injection vulnerabilities (use prepared statements)

## Common Variations

### Admin Notices
```php
add_action( 'admin_notices', function() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Settings saved!', 'leanos-plugin' ); ?></p>
    </div>
    <?php
});
```

### Bulk Actions
```php
add_filter( 'bulk_actions-edit-{post_type}', function( $actions ) {
    $actions['{custom_action}'] = __( '{Action Label}', 'leanos-plugin' );
    return $actions;
});

add_filter( 'handle_bulk_actions-edit-{post_type}', function( $redirect_to, $action, $post_ids ) {
    if ( $action !== '{custom_action}' ) {
        return $redirect_to;
    }

    foreach ( $post_ids as $post_id ) {
        // Perform action
    }

    return add_query_arg( '{custom_action}_count', count( $post_ids ), $redirect_to );
}, 10, 3 );
```

## Testing Checklist

- [ ] Admin columns display correctly
- [ ] Columns are sortable (if applicable)
- [ ] Dashboard widgets show correct data
- [ ] Widget configuration saves properly
- [ ] Admin pages load without errors
- [ ] Admin menu items appear correctly
- [ ] Meta boxes display on correct post types
- [ ] Meta box data saves correctly
- [ ] All admin assets load properly
- [ ] No JavaScript console errors
- [ ] Capability checks prevent unauthorized access
- [ ] Nonces prevent CSRF attacks

## Integration Points

Add to main plugin file:

```php
// Admin functionality
if ( is_admin() ) {
    require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-admin-columns.php';
    require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-dashboard-widgets.php';
    require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-admin-pages.php';
    require_once LEANCMS_PLUGIN_DIR . 'includes/admin/class-meta-boxes.php';
}
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{post_type}` | Post type slug | `product`, `license` |
| `{column_key}` | Column identifier | `product_price` |
| `{Column Label}` | Column display name | `Price` |
| `{meta_key}` | Meta field key | `_product_sku` |
| `{widget_id}` | Widget unique ID | `leancms_stats_widget` |
| `{Widget Title}` | Widget display title | `Statistics` |
| `{page_slug}` | Admin page slug | `lean-products` |
| `{Menu Label}` | Menu item text | `Products` |
| `{submenu_slug}` | Submenu page slug | `lean-products-list` |
| `{meta_box_id}` | Meta box ID | `product_details` |
| `{Meta Box Title}` | Meta box title | `Product Details` |
| `{handle}` | Script/style handle | `lean-admin` |
| `{items}` | Plural item name | `products`, `orders` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
