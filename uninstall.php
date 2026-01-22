<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package LeanCMS
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-installer.php';

LeanCMS_Installer::uninstall();
