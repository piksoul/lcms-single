# Pattern: Custom Post Type (CPT)

## Purpose
Standardized approach for creating custom post types in WordPress with proper registration, meta boxes, admin columns, and taxonomies.

## WordPress Standards
- **Naming Convention:** Use singular names (e.g., `product`, `license`, `order`)
- **Text Domain:** Always use plugin text domain for translations
- **Hook Priority:** Default (10) unless specific ordering needed
- **Capabilities:** Use built-in `post` capabilities or define custom
- **Slug Length:** Max 20 characters (database limitation)
- **File Header:** Always include filepath in file header documentation block

## File Structure
```
includes/
└── cpt/
    ├── class-{cpt-name}.php          # Main CPT class
    └── class-{cpt-name}-meta.php     # Meta boxes and fields (optional)
```

## Code Template

### Main CPT Class (`class-{cpt-name}.php`)

```php
<?php
/**
 * {CPT_LABEL} Custom Post Type
 *
 * @package    LeanCMS_Plugin
 * @subpackage CPT
 * @filepath   includes/cpt/class-{cpt-name}.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_{CPT_Name}_CPT {

    /**
     * Constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_filter( 'manage_{cpt_slug}_posts_columns', array( $this, 'set_custom_columns' ) );
        add_action( 'manage_{cpt_slug}_posts_custom_column', array( $this, 'custom_column_content' ), 10, 2 );
    }

    /**
     * Register the custom post type
     */
    public function register_post_type() {
        $labels = array(
            'name'                  => _x( '{CPT_LABELS}', 'Post type general name', 'leancms-plugin' ),
            'singular_name'         => _x( '{CPT_LABEL}', 'Post type singular name', 'leancms-plugin' ),
            'menu_name'             => _x( '{CPT_LABELS}', 'Admin Menu text', 'leancms-plugin' ),
            'add_new'               => __( 'Add New', 'leancms-plugin' ),
            'add_new_item'          => __( 'Add New {CPT_LABEL}', 'leancms-plugin' ),
            'edit_item'             => __( 'Edit {CPT_LABEL}', 'leancms-plugin' ),
            'new_item'              => __( 'New {CPT_LABEL}', 'leancms-plugin' ),
            'view_item'             => __( 'View {CPT_LABEL}', 'leancms-plugin' ),
            'search_items'          => __( 'Search {CPT_LABELS}', 'leancms-plugin' ),
            'not_found'             => __( 'No {cpt_labels} found', 'leancms-plugin' ),
            'not_found_in_trash'    => __( 'No {cpt_labels} found in Trash', 'leancms-plugin' ),
            'all_items'             => __( 'All {CPT_LABELS}', 'leancms-plugin' ),
        );

        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => '{cpt-slug}' ),
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => false,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-{icon-name}',
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'show_in_rest'          => true, // Enable Gutenberg editor
        );

        register_post_type( '{cpt_slug}', $args );
    }

    /**
     * Register taxonomies for this CPT
     */
    public function register_taxonomies() {
        // Example taxonomy registration
        // Uncomment and modify as needed
        /*
        $labels = array(
            'name'              => _x( '{Taxonomy_Labels}', 'taxonomy general name', 'leancms-plugin' ),
            'singular_name'     => _x( '{Taxonomy_Label}', 'taxonomy singular name', 'leancms-plugin' ),
            // ... more labels
        );

        register_taxonomy( '{taxonomy_slug}', '{cpt_slug}', array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => '{taxonomy-slug}' ),
        ));
        */
    }

    /**
     * Set custom admin columns
     */
    public function set_custom_columns( $columns ) {
        // Remove date column
        unset( $columns['date'] );

        // Add custom columns
        $columns['{custom_field}'] = __( '{Custom Field Label}', 'leancms-plugin' );
        $columns['date'] = __( 'Date', 'leancms-plugin' );

        return $columns;
    }

    /**
     * Custom column content
     */
    public function custom_column_content( $column, $post_id ) {
        switch ( $column ) {
            case '{custom_field}':
                $value = get_post_meta( $post_id, '_{custom_field}', true );
                echo $value ? esc_html( $value ) : '—';
                break;
        }
    }
}

// Initialize
new LeanCMS_{CPT_Name}_CPT();
```

## Required Functions

### Minimum Requirements
- [x] `register_post_type()` - Register the CPT
- [ ] `register_taxonomies()` - Register related taxonomies (if needed)
- [ ] `set_custom_columns()` - Define admin list columns
- [ ] `custom_column_content()` - Populate custom columns

### Optional Enhancements
- [ ] Meta boxes for custom fields
- [ ] Custom bulk actions
- [ ] Custom row actions
- [ ] Query modifications
- [ ] Custom templates

## Security Checklist

- [ ] **Capability Checks:** Verify user permissions before saving data
- [ ] **Nonce Verification:** Use nonces for all forms
- [ ] **Data Sanitization:** Sanitize all input data
- [ ] **Output Escaping:** Escape all output (use `esc_html()`, `esc_attr()`, etc.)
- [ ] **SQL Injection Prevention:** Use `$wpdb->prepare()` for direct queries
- [ ] **CSRF Protection:** Implement nonces for AJAX requests

## Common Variations

### Hierarchical CPT (like Pages)
```php
'hierarchical' => true,
'supports'     => array( 'title', 'editor', 'page-attributes' ),
```

### Hidden from Front-End
```php
'public'              => false,
'publicly_queryable'  => false,
'show_ui'             => true,
'show_in_menu'        => true,
```

### Custom Capabilities
```php
'capability_type' => '{cpt_slug}',
'map_meta_cap'    => true,
```

## Testing Checklist

- [ ] CPT appears in admin menu at correct position
- [ ] Can create new posts
- [ ] Can edit existing posts
- [ ] Can delete posts (and they go to trash)
- [ ] Custom columns display correctly
- [ ] Taxonomies work properly (if applicable)
- [ ] Meta boxes save/load correctly (if applicable)
- [ ] Permalinks work (may need to flush rewrite rules)
- [ ] Archive page displays correctly
- [ ] Single post page displays correctly
- [ ] Capabilities work as expected
- [ ] Gutenberg editor works (if enabled)

## Integration Points

### Main Plugin File
```php
// In leancms-plugin.php, after Plugin Update Checker
require_once LEANCMS_PLUGIN_DIR . 'includes/cpt/class-{cpt-name}.php';
```

### Activation Hook
```php
// Flush rewrite rules on activation
function leancms_{cpt_name}_activation() {
    // Trigger CPT registration
    new LeanCMS_{CPT_Name}_CPT();
    // Flush rewrite rules
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'leancms_{cpt_name}_activation' );
```

## Placeholders to Replace

- `{CPT_Name}` - PascalCase name (e.g., `Product`, `License`)
- `{CPT_LABEL}` - Singular label (e.g., `Product`, `License`)
- `{CPT_LABELS}` - Plural label (e.g., `Products`, `Licenses`)
- `{cpt_slug}` - Lowercase slug (e.g., `product`, `license`)
- `{cpt_labels}` - Lowercase plural (e.g., `products`, `licenses`)
- `{cpt-slug}` - Hyphenated slug (e.g., `product`, `license`)
- `{icon-name}` - Dashicon name (e.g., `cart`, `admin-network`)
- `{custom_field}` - Custom field key
- `{Custom Field Label}` - Custom field display label

## Notes

- Always flush rewrite rules after adding/modifying CPTs (during development)
- Use `show_in_rest => true` to enable Gutenberg editor
- Consider using custom capabilities for fine-grained permission control
- Keep CPT slugs short and descriptive
- Test archive and single templates with your theme
