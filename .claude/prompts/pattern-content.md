# Pattern: Content Management

## Purpose
Standardized approach for managing dynamic content areas, shortcodes, widgets, and content filters in WordPress plugins.

## WordPress Standards
- **Shortcode Naming:** Use plugin prefix and descriptive names
- **Widget Naming:** Follow `WP_Widget` class conventions
- **Filter/Action Hooks:** Use plugin prefix to avoid conflicts
- **Content Sanitization:** Always sanitize user-generated content
- **Template Override:** Support theme overrides for templates
- **File Header:** Always include filepath in file header documentation block

## File Structure
```
includes/
└── content/
    ├── class-shortcodes.php           # All shortcode handlers
    ├── class-widgets.php              # Widget definitions
    ├── class-content-filters.php      # Content modification filters
    └── templates/                     # Template files
        ├── shortcode-{name}.php
        └── widget-{name}.php
```

## Code Template

### Shortcodes Class (`class-shortcodes.php`)

```php
<?php
/**
 * {Feature} Shortcodes
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-shortcodes.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Shortcodes {

    /**
     * Constructor
     */
    public function __construct() {
        add_shortcode( 'leancms_{shortcode_name}', array( $this, 'render_{shortcode_name}' ) );
    }

    /**
     * Render {shortcode_name} shortcode
     *
     * @param array  $atts    Shortcode attributes
     * @param string $content Shortcode content
     * @return string
     */
    public function render_{shortcode_name}( $atts, $content = null ) {
        // Parse attributes
        $atts = shortcode_atts( array(
            'type'    => 'default',
            'limit'   => 10,
            'class'   => '',
        ), $atts, 'leancms_{shortcode_name}' );

        // Sanitize attributes
        $type  = sanitize_text_field( $atts['type'] );
        $limit = absint( $atts['limit'] );
        $class = sanitize_html_class( $atts['class'] );

        // Start output buffering
        ob_start();

        // Load template
        $this->load_template( '{shortcode-name}', array(
            'type'    => $type,
            'limit'   => $limit,
            'class'   => $class,
            'content' => do_shortcode( $content ),
        ));

        return ob_get_clean();
    }

    /**
     * Load template file
     *
     * @param string $template Template name
     * @param array  $args     Template variables
     */
    private function load_template( $template, $args = array() ) {
        // Extract variables
        extract( $args );

        // Check theme override
        $theme_template = locate_template( array(
            "leancms/{$template}.php",
            "leancms-plugin/{$template}.php",
        ));

        if ( $theme_template ) {
            include $theme_template;
        } else {
            // Load plugin template
            $plugin_template = LEANCMS_PLUGIN_DIR . "includes/content/templates/shortcode-{$template}.php";
            if ( file_exists( $plugin_template ) ) {
                include $plugin_template;
            }
        }
    }
}

// Initialize
new LeanCMS_Shortcodes();
```

### Widget Class (`class-widgets.php`)

```php
<?php
/**
 * {Widget_Name} Widget
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-widgets.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_{Widget_Name}_Widget extends WP_Widget {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct(
            'leancms_{widget_slug}',
            __( '{Widget Title}', 'leancms-plugin' ),
            array(
                'description' => __( '{Widget description}', 'leancms-plugin' ),
                'classname'   => 'lean-{widget-slug}-widget',
            )
        );
    }

    /**
     * Front-end display of widget
     *
     * @param array $args     Display arguments
     * @param array $instance Widget settings
     */
    public function widget( $args, $instance ) {
        // Extract arguments
        $title = apply_filters( 'widget_title', $instance['title'] );
        $count = ! empty( $instance['count'] ) ? absint( $instance['count'] ) : 5;

        // Before widget
        echo $args['before_widget'];

        // Widget title
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
        }

        // Widget content
        $this->render_content( $instance );

        // After widget
        echo $args['after_widget'];
    }

    /**
     * Render widget content
     *
     * @param array $instance Widget settings
     */
    private function render_content( $instance ) {
        // Your widget content logic here
        ?>
        <div class="lean-widget-content">
            <?php
            // Example: Display items
            // Replace with your actual logic
            ?>
            <p><?php esc_html_e( 'Widget content goes here', 'leancms-plugin' ); ?></p>
        </div>
        <?php
    }

    /**
     * Back-end widget form
     *
     * @param array $instance Previously saved values
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $count = ! empty( $instance['count'] ) ? $instance['count'] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Title:', 'leancms-plugin' ); ?>
            </label>
            <input class="widefat"
                   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
                <?php esc_html_e( 'Number to show:', 'leancms-plugin' ); ?>
            </label>
            <input class="tiny-text"
                   id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"
                   type="number"
                   step="1"
                   min="1"
                   value="<?php echo esc_attr( $count ); ?>"
                   size="3">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved
     *
     * @param array $new_instance New settings
     * @param array $old_instance Previous settings
     * @return array Updated settings
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) )
            ? sanitize_text_field( $new_instance['title'] )
            : '';
        $instance['count'] = ( ! empty( $new_instance['count'] ) )
            ? absint( $new_instance['count'] )
            : 5;

        return $instance;
    }
}

// Register widget
function leancms_register_{widget_slug}_widget() {
    register_widget( 'LeanCMS_{Widget_Name}_Widget' );
}
add_action( 'widgets_init', 'leancms_register_{widget_slug}_widget' );
```

### Content Filters Class (`class-content-filters.php`)

```php
<?php
/**
 * Content Filters
 *
 * @package    LeanCMS_Plugin
 * @subpackage Content
 * @filepath   includes/content/class-content-filters.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class LeanCMS_Content_Filters {

    /**
     * Constructor
     */
    public function __construct() {
        add_filter( 'the_content', array( $this, 'filter_content' ), 20 );
        add_filter( 'the_excerpt', array( $this, 'filter_excerpt' ), 20 );
    }

    /**
     * Filter the main content
     *
     * @param string $content Post content
     * @return string Modified content
     */
    public function filter_content( $content ) {
        // Only filter specific post types
        if ( ! is_singular( '{cpt_slug}' ) ) {
            return $content;
        }

        // Add content before
        $before = $this->get_before_content();

        // Add content after
        $after = $this->get_after_content();

        return $before . $content . $after;
    }

    /**
     * Filter the excerpt
     *
     * @param string $excerpt Post excerpt
     * @return string Modified excerpt
     */
    public function filter_excerpt( $excerpt ) {
        // Modify excerpt if needed
        return $excerpt;
    }

    /**
     * Get content to display before main content
     *
     * @return string
     */
    private function get_before_content() {
        ob_start();
        ?>
        <div class="lean-before-content">
            <!-- Your before content HTML -->
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Get content to display after main content
     *
     * @return string
     */
    private function get_after_content() {
        ob_start();
        ?>
        <div class="lean-after-content">
            <!-- Your after content HTML -->
        </div>
        <?php
        return ob_get_clean();
    }
}

// Initialize
new LeanCMS_Content_Filters();
```

## Required Functions

### Shortcodes
- [x] Register shortcode with `add_shortcode()`
- [x] Parse and sanitize attributes
- [x] Support theme template overrides
- [ ] Handle nested shortcodes with `do_shortcode()`
- [ ] Proper escaping in output

### Widgets
- [x] Extend `WP_Widget` class
- [x] Implement `widget()` method (front-end display)
- [x] Implement `form()` method (admin form)
- [x] Implement `update()` method (save settings)
- [x] Register with `widgets_init` hook

### Content Filters
- [x] Hook into appropriate filters
- [x] Check context before modifying
- [x] Return original content when not applicable
- [ ] Proper escaping in output

## Security Checklist

- [ ] **Shortcode Attributes:** Sanitize all shortcode attributes
- [ ] **Widget Data:** Sanitize all widget form data in `update()`
- [ ] **Output Escaping:** Escape all output using appropriate functions
- [ ] **Template Security:** Validate template file paths
- [ ] **Nonce Fields:** Add nonces for any forms
- [ ] **User Capabilities:** Check user permissions where applicable

## Common Variations

### AJAX-Loaded Content
```php
add_action( 'wp_ajax_leancms_{action}', array( $this, 'ajax_handler' ) );
add_action( 'wp_ajax_nopriv_leancms_{action}', array( $this, 'ajax_handler' ) );
```

### Gutenberg Block (instead of shortcode)
```php
// Register block in separate file
register_block_type( 'leancms/{block-name}', array(
    'render_callback' => array( $this, 'render_block' ),
));
```

### Custom Excerpt Length
```php
add_filter( 'excerpt_length', array( $this, 'custom_excerpt_length' ), 999 );
```

## Testing Checklist

### Shortcodes
- [ ] Shortcode renders without errors
- [ ] Attributes work as expected
- [ ] Default values apply correctly
- [ ] Nested shortcodes work (if applicable)
- [ ] Theme template override works
- [ ] Output is properly escaped

### Widgets
- [ ] Widget appears in widgets panel
- [ ] Form saves correctly
- [ ] Front-end displays correctly
- [ ] Settings persist after save
- [ ] Multiple instances work independently

### Content Filters
- [ ] Filters apply to correct post types
- [ ] Original content preserved when not applicable
- [ ] No conflicts with other plugins
- [ ] Performance impact is minimal

## Integration Points

### Main Plugin File
```php
// In leancms-plugin.php
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-shortcodes.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-widgets.php';
require_once LEANCMS_PLUGIN_DIR . 'includes/content/class-content-filters.php';
```

## Placeholders to Replace

- `{Feature}` - Feature name (e.g., `License Display`)
- `{Widget_Name}` - PascalCase widget name (e.g., `Recent_Licenses`)
- `{Widget Title}` - Display title (e.g., `Recent Licenses`)
- `{widget_slug}` - Lowercase slug (e.g., `recent_licenses`)
- `{widget-slug}` - Hyphenated slug (e.g., `recent-licenses`)
- `{shortcode_name}` - Shortcode function name (e.g., `license_list`)
- `{shortcode-name}` - Template file name (e.g., `license-list`)
- `{cpt_slug}` - Custom post type slug
- `{action}` - AJAX action name

## Notes

- Use output buffering for complex template rendering
- Always support theme template overrides
- Keep shortcode attribute names short and descriptive
- Widget class names should be unique
- Test content filters with popular page builders
- Consider Gutenberg blocks as modern alternative to shortcodes
