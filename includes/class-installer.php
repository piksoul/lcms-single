<?php
/**
 * Installer routines for LeanCMS.
 *
 * @package LeanCMS
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handles plugin installation and cleanup tasks.
 */
class LeanCMS_Installer {

    /**
     * Run on plugin activation.
     */
    public static function activate(): void {
        self::seed_default_options();
        flush_rewrite_rules();
    }

    /**
     * Run on plugin deactivation.
     */
    public static function deactivate(): void {
        flush_rewrite_rules();
    }

    /**
     * Run on plugin uninstall.
     */
    public static function uninstall(): void {
        delete_option( 'leancms_settings' );
    }

    /**
     * Seed baseline options so settings pages have defaults to read.
     */
    protected static function seed_default_options(): void {
        if ( false === get_option( 'leancms_settings' ) ) {
            $defaults = array(
                'welcome_message' => __( 'Welcome to Lean CMS settings!', 'brandhub-client-cms' ),
            );

            add_option( 'leancms_settings', $defaults );
        }
    }
}
