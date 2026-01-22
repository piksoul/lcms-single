<?php
/**
 * LeanCMS Starter Theme Functions
 *
 * Minimal theme setup - intentionally bare-bones.
 * All heavy lifting is done by the LeanCMS plugin.
 *
 * @package LeanCMS_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup.
 */
function lcms_starter_setup() {
    // Add theme support for title tag
    add_theme_support( 'title-tag' );

    // Add theme support for HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register nav menus (optional - LeanCMS templates often handle their own nav)
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'lcms-starter' ),
        'footer'  => __( 'Footer Menu', 'lcms-starter' ),
    ) );
}
add_action( 'after_setup_theme', 'lcms_starter_setup' );

/**
 * Enqueue theme styles/scripts.
 *
 * Note: Tailwind CSS is loaded by the LeanCMS plugin or individual templates.
 * This theme intentionally loads nothing to avoid conflicts.
 */
function lcms_starter_scripts() {
    // Intentionally empty - LeanCMS plugin handles all styles
    // Uncomment below if you want the theme to load Tailwind globally:
    // wp_enqueue_style( 'lcms-tailwind', get_template_directory_uri() . '/assets/tailwind.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'lcms_starter_scripts' );

/**
 * Remove WordPress emoji scripts (cleaner output).
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove unnecessary WordPress head items.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

/**
 * Remove block library CSS on frontend (if not using Gutenberg blocks).
 * Comment this out if you use Gutenberg blocks.
 */
function lcms_starter_remove_block_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'lcms_starter_remove_block_css', 100 );

/**
 * Clean up body classes.
 */
function lcms_starter_body_classes( $classes ) {
    // Add a class if LeanCMS plugin is active
    if ( defined( 'LEANCMS_VERSION' ) ) {
        $classes[] = 'lcms-active';
    }
    return $classes;
}
add_filter( 'body_class', 'lcms_starter_body_classes' );
