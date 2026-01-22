<?php
/**
 * Settings page implementation for LeanCMS.
 *
 * @package LeanCMS\Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once LEANCMS_PLUGIN_DIR . 'includes/utilities/class-helpers.php';

/**
 * Registers the plugin settings page and Settings API bindings.
 */
class LeanCMS_Settings_Page {

    /**
     * Wire hooks.
     */
    public static function boot(): void {
        add_action( 'admin_menu', array( __CLASS__, 'register_menu' ) );
        add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
    }

    /**
     * Register the options page in the Settings menu.
     */
    public static function register_menu(): void {
        add_options_page(
            __( 'Lean CMS', 'brandhub-client-cms' ),
            __( 'Lean CMS', 'brandhub-client-cms' ),
            'manage_options',
            'leancms-settings',
            array( __CLASS__, 'render_page' )
        );
    }

    /**
     * Register plugin settings and fields.
     */
    public static function register_settings(): void {
        register_setting(
            'leancms_settings_group',
            'leancms_settings',
            array(
                'type'              => 'array',
                'sanitize_callback' => array( __CLASS__, 'sanitize_settings' ),
                'default'           => array(),
            )
        );

        add_settings_section(
            'leancms_settings_main',
            __( 'General', 'brandhub-client-cms' ),
            '__return_false',
            'leancms-settings'
        );

        add_settings_field(
            'leancms_settings_welcome_message',
            __( 'Welcome Message', 'brandhub-client-cms' ),
            array( __CLASS__, 'render_welcome_message_field' ),
            'leancms-settings',
            'leancms_settings_main'
        );
    }

    /**
     * Sanitize and normalize settings before saving.
     *
     * @param array $settings Settings array submitted by the form.
     */
    public static function sanitize_settings( $settings ): array {
        $sanitized = array();

        if ( isset( $settings['welcome_message'] ) ) {
            $sanitized['welcome_message'] = sanitize_text_field( $settings['welcome_message'] );
        }

        return $sanitized;
    }

    /**
     * Render the settings page content.
     */
    public static function render_page(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $welcome_message = LeanCMS_Helpers::get_setting(
            'welcome_message',
            __( 'Welcome to Lean CMS settings!', 'brandhub-client-cms' )
        );
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields( 'leancms_settings_group' );
                do_settings_sections( 'leancms-settings' );
                submit_button();
                ?>
            </form>
            <p><?php printf( esc_html__( 'Version: %s', 'brandhub-client-cms' ), esc_html( LeanCMS_Helpers::version() ) ); ?></p>
            <p><?php echo esc_html( $welcome_message ); ?></p>
        </div>
        <?php
    }

    /**
     * Render the welcome message input field.
     */
    public static function render_welcome_message_field(): void {
        $value = LeanCMS_Helpers::get_setting(
            'welcome_message',
            __( 'Welcome to Lean CMS settings!', 'brandhub-client-cms' )
        );
        ?>
        <input type="text" class="regular-text" name="leancms_settings[welcome_message]" value="<?php echo esc_attr( $value ); ?>" />
        <?php
    }
}
