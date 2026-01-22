# WordPress Options Pattern

## Purpose
Create settings pages using WordPress Settings API for plugin configuration, options management, and user preferences.

## WordPress Standards
- Follow WordPress Coding Standards
- Use WordPress Settings API (recommended)
- Proper escaping for all output (`esc_html()`, `esc_attr()`, `esc_url()`)
- Sanitize all user inputs with sanitize callbacks
- Check user capabilities (`manage_options`)
- Use nonces for form submissions
- Organize settings into sections and fields
- **Text Domain:** Always use plugin text domain for translations
- **File Headers:** All files must include @filepath in header comments

## File Structure

```
includes/
└── settings/
    ├── class-settings-page.php       # Main settings page
    ├── class-settings-api.php        # Settings API handler
    └── class-settings-validator.php  # Settings validation
```

---

## 1. Settings Page Template (Settings API)

**File:** `includes/settings/class-settings-page.php`

```php
<?php
/**
 * Settings Page Handler
 *
 * Manages plugin settings page using WordPress Settings API.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Settings
 * @filepath   includes/settings/class-settings-page.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Settings Page Class
 *
 * Handles plugin settings page and options.
 */
class LeanCMS_Settings_Page {

    /**
     * Option group name.
     *
     * @var string
     */
    private $option_group = '{option_group}';

    /**
     * Option name for settings.
     *
     * @var string
     */
    private $option_name = '{option_name}';

    /**
     * Settings page slug.
     *
     * @var string
     */
    private $page_slug = '{settings_slug}';

    /**
     * Initialize the class.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
    }

    /**
     * Add settings page to admin menu.
     */
    public function add_settings_page() {
        add_options_page(
            __( '{Plugin Name} Settings', 'leanos-plugin' ),
            __( '{Menu Label}', 'leanos-plugin' ),
            'manage_options',
            $this->page_slug,
            array( $this, 'render_settings_page' )
        );
    }

    /**
     * Register settings, sections, and fields.
     */
    public function register_settings() {
        // Register setting
        register_setting(
            $this->option_group,
            $this->option_name,
            array(
                'type'              => 'array',
                'sanitize_callback' => array( $this, 'sanitize_settings' ),
                'default'           => $this->get_default_settings(),
            )
        );

        // Add settings section
        add_settings_section(
            '{section_id}',
            __( '{Section Title}', 'leanos-plugin' ),
            array( $this, 'render_{section_id}_description' ),
            $this->page_slug
        );

        // Add settings fields
        add_settings_field(
            '{field_id}',
            __( '{Field Label}', 'leanos-plugin' ),
            array( $this, 'render_{field_id}_field' ),
            $this->page_slug,
            '{section_id}',
            array( 'label_for' => '{field_id}' )
        );

        add_settings_field(
            '{field_id_2}',
            __( '{Field Label 2}', 'leanos-plugin' ),
            array( $this, 'render_{field_id_2}_field' ),
            $this->page_slug,
            '{section_id}',
            array( 'label_for' => '{field_id_2}' )
        );

        // Add another section
        add_settings_section(
            '{section_id_2}',
            __( '{Section Title 2}', 'leanos-plugin' ),
            array( $this, 'render_{section_id_2}_description' ),
            $this->page_slug
        );

        add_settings_field(
            '{field_id_3}',
            __( '{Field Label 3}', 'leanos-plugin' ),
            array( $this, 'render_{field_id_3}_field' ),
            $this->page_slug,
            '{section_id_2}',
            array( 'label_for' => '{field_id_3}' )
        );
    }

    /**
     * Enqueue settings page assets.
     *
     * @param string $hook Current admin page hook.
     */
    public function enqueue_assets( $hook ) {
        if ( 'settings_page_' . $this->page_slug !== $hook ) {
            return;
        }

        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_script(
            '{handle}-settings',
            LEANCMS_PLUGIN_URL . 'assets/js/settings.js',
            array( 'jquery', 'wp-color-picker' ),
            LEANCMS_VERSION,
            true
        );
    }

    /**
     * Render settings page.
     */
    public function render_settings_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'leanos-plugin' ) );
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                settings_fields( $this->option_group );
                do_settings_sections( $this->page_slug );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Render {section_id} section description.
     */
    public function render_{section_id}_description() {
        echo '<p>' . esc_html__( '{Section description}', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Render {section_id_2} section description.
     */
    public function render_{section_id_2}_description() {
        echo '<p>' . esc_html__( '{Section 2 description}', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Render {field_id} field.
     */
    public function render_{field_id}_field() {
        $options = get_option( $this->option_name, $this->get_default_settings() );
        $value   = isset( $options['{field_id}'] ) ? $options['{field_id}'] : '';

        printf(
            '<input type="text" id="%s" name="%s[%s]" value="%s" class="regular-text">',
            esc_attr( '{field_id}' ),
            esc_attr( $this->option_name ),
            esc_attr( '{field_id}' ),
            esc_attr( $value )
        );

        echo '<p class="description">' . esc_html__( '{Field description}', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Render {field_id_2} field (checkbox).
     */
    public function render_{field_id_2}_field() {
        $options = get_option( $this->option_name, $this->get_default_settings() );
        $checked = isset( $options['{field_id_2}'] ) && $options['{field_id_2}'];

        printf(
            '<label><input type="checkbox" id="%s" name="%s[%s]" value="1" %s> %s</label>',
            esc_attr( '{field_id_2}' ),
            esc_attr( $this->option_name ),
            esc_attr( '{field_id_2}' ),
            checked( $checked, true, false ),
            esc_html__( '{Checkbox label}', 'leanos-plugin' )
        );
    }

    /**
     * Render {field_id_3} field (select).
     */
    public function render_{field_id_3}_field() {
        $options = get_option( $this->option_name, $this->get_default_settings() );
        $value   = isset( $options['{field_id_3}'] ) ? $options['{field_id_3}'] : '';

        $choices = array(
            'option1' => __( 'Option 1', 'leanos-plugin' ),
            'option2' => __( 'Option 2', 'leanos-plugin' ),
            'option3' => __( 'Option 3', 'leanos-plugin' ),
        );

        printf(
            '<select id="%s" name="%s[%s]">',
            esc_attr( '{field_id_3}' ),
            esc_attr( $this->option_name ),
            esc_attr( '{field_id_3}' )
        );

        foreach ( $choices as $key => $label ) {
            printf(
                '<option value="%s" %s>%s</option>',
                esc_attr( $key ),
                selected( $value, $key, false ),
                esc_html( $label )
            );
        }

        echo '</select>';
        echo '<p class="description">' . esc_html__( '{Select description}', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Get default settings.
     *
     * @return array Default settings.
     */
    private function get_default_settings() {
        return array(
            '{field_id}'   => '',
            '{field_id_2}' => false,
            '{field_id_3}' => 'option1',
        );
    }

    /**
     * Sanitize settings.
     *
     * @param array $input Raw input values.
     * @return array Sanitized values.
     */
    public function sanitize_settings( $input ) {
        $sanitized = array();

        // Sanitize text field
        if ( isset( $input['{field_id}'] ) ) {
            $sanitized['{field_id}'] = sanitize_text_field( $input['{field_id}'] );
        }

        // Sanitize checkbox
        $sanitized['{field_id_2}'] = isset( $input['{field_id_2}'] ) && $input['{field_id_2}'];

        // Sanitize select
        if ( isset( $input['{field_id_3}'] ) ) {
            $allowed = array( 'option1', 'option2', 'option3' );
            $sanitized['{field_id_3}'] = in_array( $input['{field_id_3}'], $allowed, true )
                ? $input['{field_id_3}']
                : 'option1';
        }

        // Add success message
        add_settings_error(
            $this->option_name,
            'settings_updated',
            __( 'Settings saved successfully!', 'leanos-plugin' ),
            'success'
        );

        return $sanitized;
    }

    /**
     * Get option value.
     *
     * @param string $key     Option key.
     * @param mixed  $default Default value.
     * @return mixed Option value.
     */
    public static function get_option( $key, $default = null ) {
        $options = get_option( '{option_name}', array() );
        return isset( $options[ $key ] ) ? $options[ $key ] : $default;
    }
}

// Initialize
new LeanCMS_Settings_Page();
```

---

## 2. Advanced Settings Template (Tabbed Interface)

**File:** `includes/settings/class-settings-api.php`

```php
<?php
/**
 * Advanced Settings Handler
 *
 * Manages tabbed settings interface with multiple setting groups.
 *
 * @package    LeanCMS_Plugin
 * @subpackage Settings
 * @filepath   includes/settings/class-settings-api.php
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Advanced Settings API Class
 *
 * Handles tabbed settings page with multiple sections.
 */
class LeanCMS_Settings_API {

    /**
     * Settings tabs.
     *
     * @var array
     */
    private $tabs = array();

    /**
     * Current tab.
     *
     * @var string
     */
    private $current_tab = '';

    /**
     * Initialize the class.
     */
    public function __construct() {
        $this->setup_tabs();

        add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
        add_action( 'admin_init', array( $this, 'register_all_settings' ) );
    }

    /**
     * Setup settings tabs.
     */
    private function setup_tabs() {
        $this->tabs = array(
            'general'      => __( 'General', 'leanos-plugin' ),
            'display'      => __( 'Display', 'leanos-plugin' ),
            'integrations' => __( 'Integrations', 'leanos-plugin' ),
            'advanced'     => __( 'Advanced', 'leanos-plugin' ),
        );

        $this->current_tab = isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], $this->tabs )
            ? sanitize_key( $_GET['tab'] )
            : 'general';
    }

    /**
     * Add settings page.
     */
    public function add_settings_page() {
        add_options_page(
            __( '{Plugin Name} Settings', 'leanos-plugin' ),
            __( '{Menu Label}', 'leanos-plugin' ),
            'manage_options',
            '{settings_slug}',
            array( $this, 'render_settings_page' )
        );
    }

    /**
     * Register all settings for all tabs.
     */
    public function register_all_settings() {
        // Register settings for each tab
        $this->register_general_settings();
        $this->register_display_settings();
        $this->register_integrations_settings();
        $this->register_advanced_settings();
    }

    /**
     * Register general tab settings.
     */
    private function register_general_settings() {
        $page = '{settings_slug}_general';

        register_setting(
            $page,
            '{option_name}_general',
            array( 'sanitize_callback' => array( $this, 'sanitize_general_settings' ) )
        );

        add_settings_section(
            'general_section',
            __( 'General Settings', 'leanos-plugin' ),
            '__return_false',
            $page
        );

        add_settings_field(
            'enable_feature',
            __( 'Enable Feature', 'leanos-plugin' ),
            array( $this, 'render_checkbox_field' ),
            $page,
            'general_section',
            array(
                'option_name' => '{option_name}_general',
                'field_id'    => 'enable_feature',
                'label'       => __( 'Enable this feature', 'leanos-plugin' ),
            )
        );
    }

    /**
     * Register display tab settings.
     */
    private function register_display_settings() {
        $page = '{settings_slug}_display';

        register_setting(
            $page,
            '{option_name}_display',
            array( 'sanitize_callback' => array( $this, 'sanitize_display_settings' ) )
        );

        add_settings_section(
            'display_section',
            __( 'Display Options', 'leanos-plugin' ),
            '__return_false',
            $page
        );

        add_settings_field(
            'items_per_page',
            __( 'Items Per Page', 'leanos-plugin' ),
            array( $this, 'render_number_field' ),
            $page,
            'display_section',
            array(
                'option_name' => '{option_name}_display',
                'field_id'    => 'items_per_page',
                'min'         => 1,
                'max'         => 100,
            )
        );
    }

    /**
     * Register integrations tab settings.
     */
    private function register_integrations_settings() {
        $page = '{settings_slug}_integrations';

        register_setting(
            $page,
            '{option_name}_integrations',
            array( 'sanitize_callback' => array( $this, 'sanitize_integrations_settings' ) )
        );

        add_settings_section(
            'api_section',
            __( 'API Configuration', 'leanos-plugin' ),
            array( $this, 'render_api_section_description' ),
            $page
        );

        add_settings_field(
            'api_key',
            __( 'API Key', 'leanos-plugin' ),
            array( $this, 'render_password_field' ),
            $page,
            'api_section',
            array(
                'option_name' => '{option_name}_integrations',
                'field_id'    => 'api_key',
                'description' => __( 'Enter your API key', 'leanos-plugin' ),
            )
        );
    }

    /**
     * Register advanced tab settings.
     */
    private function register_advanced_settings() {
        $page = '{settings_slug}_advanced';

        register_setting(
            $page,
            '{option_name}_advanced',
            array( 'sanitize_callback' => array( $this, 'sanitize_advanced_settings' ) )
        );

        add_settings_section(
            'advanced_section',
            __( 'Advanced Options', 'leanos-plugin' ),
            '__return_false',
            $page
        );

        add_settings_field(
            'debug_mode',
            __( 'Debug Mode', 'leanos-plugin' ),
            array( $this, 'render_checkbox_field' ),
            $page,
            'advanced_section',
            array(
                'option_name' => '{option_name}_advanced',
                'field_id'    => 'debug_mode',
                'label'       => __( 'Enable debug logging', 'leanos-plugin' ),
            )
        );
    }

    /**
     * Render settings page with tabs.
     */
    public function render_settings_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'leanos-plugin' ) );
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

            <nav class="nav-tab-wrapper">
                <?php foreach ( $this->tabs as $tab_key => $tab_label ) : ?>
                    <a
                        href="<?php echo esc_url( admin_url( 'options-general.php?page={settings_slug}&tab=' . $tab_key ) ); ?>"
                        class="nav-tab <?php echo $this->current_tab === $tab_key ? 'nav-tab-active' : ''; ?>"
                    >
                        <?php echo esc_html( $tab_label ); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <form method="post" action="options.php">
                <?php
                $page_slug = '{settings_slug}_' . $this->current_tab;
                settings_fields( $page_slug );
                do_settings_sections( $page_slug );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Render API section description.
     */
    public function render_api_section_description() {
        echo '<p>' . esc_html__( 'Configure third-party API integrations.', 'leanos-plugin' ) . '</p>';
    }

    /**
     * Render checkbox field.
     *
     * @param array $args Field arguments.
     */
    public function render_checkbox_field( $args ) {
        $options = get_option( $args['option_name'], array() );
        $checked = isset( $options[ $args['field_id'] ] ) && $options[ $args['field_id'] ];

        printf(
            '<label><input type="checkbox" name="%s[%s]" value="1" %s> %s</label>',
            esc_attr( $args['option_name'] ),
            esc_attr( $args['field_id'] ),
            checked( $checked, true, false ),
            esc_html( $args['label'] )
        );
    }

    /**
     * Render number field.
     *
     * @param array $args Field arguments.
     */
    public function render_number_field( $args ) {
        $options = get_option( $args['option_name'], array() );
        $value   = isset( $options[ $args['field_id'] ] ) ? $options[ $args['field_id'] ] : '';

        printf(
            '<input type="number" name="%s[%s]" value="%s" min="%d" max="%d" class="small-text">',
            esc_attr( $args['option_name'] ),
            esc_attr( $args['field_id'] ),
            esc_attr( $value ),
            isset( $args['min'] ) ? intval( $args['min'] ) : 0,
            isset( $args['max'] ) ? intval( $args['max'] ) : 999999
        );
    }

    /**
     * Render password field.
     *
     * @param array $args Field arguments.
     */
    public function render_password_field( $args ) {
        $options = get_option( $args['option_name'], array() );
        $value   = isset( $options[ $args['field_id'] ] ) ? $options[ $args['field_id'] ] : '';

        printf(
            '<input type="password" name="%s[%s]" value="%s" class="regular-text">',
            esc_attr( $args['option_name'] ),
            esc_attr( $args['field_id'] ),
            esc_attr( $value )
        );

        if ( isset( $args['description'] ) ) {
            echo '<p class="description">' . esc_html( $args['description'] ) . '</p>';
        }
    }

    /**
     * Sanitize general settings.
     *
     * @param array $input Raw input.
     * @return array Sanitized input.
     */
    public function sanitize_general_settings( $input ) {
        $sanitized = array();
        $sanitized['enable_feature'] = isset( $input['enable_feature'] ) && $input['enable_feature'];
        return $sanitized;
    }

    /**
     * Sanitize display settings.
     *
     * @param array $input Raw input.
     * @return array Sanitized input.
     */
    public function sanitize_display_settings( $input ) {
        $sanitized = array();

        if ( isset( $input['items_per_page'] ) ) {
            $sanitized['items_per_page'] = absint( $input['items_per_page'] );
            $sanitized['items_per_page'] = max( 1, min( 100, $sanitized['items_per_page'] ) );
        }

        return $sanitized;
    }

    /**
     * Sanitize integrations settings.
     *
     * @param array $input Raw input.
     * @return array Sanitized input.
     */
    public function sanitize_integrations_settings( $input ) {
        $sanitized = array();

        if ( isset( $input['api_key'] ) ) {
            $sanitized['api_key'] = sanitize_text_field( $input['api_key'] );
        }

        return $sanitized;
    }

    /**
     * Sanitize advanced settings.
     *
     * @param array $input Raw input.
     * @return array Sanitized input.
     */
    public function sanitize_advanced_settings( $input ) {
        $sanitized = array();
        $sanitized['debug_mode'] = isset( $input['debug_mode'] ) && $input['debug_mode'];
        return $sanitized;
    }
}

// Initialize
new LeanCMS_Settings_API();
```

---

## Security Checklist

- [ ] All user inputs sanitized with appropriate callbacks
- [ ] All outputs escaped (`esc_html()`, `esc_attr()`, `esc_url()`)
- [ ] Settings API nonces handled automatically
- [ ] Capability checks on settings page (`manage_options`)
- [ ] No direct file access (check for `WPINC`)
- [ ] Sensitive data (API keys) stored securely
- [ ] Default values provided for all options
- [ ] Validation for allowed values (selects, etc.)

## Common Field Types

### Textarea
```php
printf(
    '<textarea name="%s[%s]" rows="5" class="large-text">%s</textarea>',
    esc_attr( $option_name ),
    esc_attr( $field_id ),
    esc_textarea( $value )
);
```

### Radio Buttons
```php
$choices = array( 'opt1' => 'Option 1', 'opt2' => 'Option 2' );
foreach ( $choices as $key => $label ) {
    printf(
        '<label><input type="radio" name="%s[%s]" value="%s" %s> %s</label><br>',
        esc_attr( $option_name ),
        esc_attr( $field_id ),
        esc_attr( $key ),
        checked( $value, $key, false ),
        esc_html( $label )
    );
}
```

### Color Picker
```php
printf(
    '<input type="text" name="%s[%s]" value="%s" class="color-picker">',
    esc_attr( $option_name ),
    esc_attr( $field_id ),
    esc_attr( $value )
);
// Requires wp_enqueue_style( 'wp-color-picker' )
```

## Testing Checklist

- [ ] Settings page loads without errors
- [ ] All fields display correctly
- [ ] Settings save successfully
- [ ] Settings persist after save
- [ ] Default values work correctly
- [ ] Validation prevents invalid data
- [ ] Success/error messages display
- [ ] Tabs navigation works (if applicable)
- [ ] Capability checks prevent unauthorized access
- [ ] Sanitization prevents XSS/injection

## Integration Points

Add to main plugin file:

```php
// Settings page
if ( is_admin() ) {
    require_once LEANCMS_PLUGIN_DIR . 'includes/settings/class-settings-page.php';
}
```

## Placeholders to Replace

| Placeholder | Description | Example |
|-------------|-------------|---------|
| `{option_group}` | Settings option group | `leancms_settings_group` |
| `{option_name}` | Option name in database | `leancms_settings` |
| `{settings_slug}` | Settings page slug | `lean-settings` |
| `{section_id}` | Settings section ID | `general_section` |
| `{Section Title}` | Section display title | `General Settings` |
| `{field_id}` | Field identifier | `api_key`, `enable_feature` |
| `{Field Label}` | Field display label | `API Key`, `Enable Feature` |
| `{handle}` | Script/style handle | `lean-settings` |

---

**Last Updated:** 2025-10-26
**Pattern Version:** 1.0
