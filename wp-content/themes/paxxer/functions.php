<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Paxxer
 * @since 1.0.0
 */

/**
 * Enqueue the style.css file.
 *
 * @since 1.0
 */
function paxxer_styles() {
	wp_enqueue_style(
		'paxxer-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'paxxer_styles' );

if ( ! function_exists( 'paxxer_setup' ) ) {
	function paxxer_setup() {

		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'block-nav-menus' );

	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'paxxer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'paxxer_setup' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
//load Welcome Notice
require get_template_directory() . '/inc/admin/admin-notice.php';
//load Theme Info
require get_template_directory() . '/inc/admin/theme-info.php';

// Theme Activation Notice
add_action( 'admin_notices', 'paxxer_activation' );

// Theme Ignore
add_action( 'admin_init', 'paxxer_ignore' );
function paxxer_ignore() {
  global $current_user;
  $user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();

  if ( isset( $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) && '0' == $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) {
    add_user_meta( $user_id, sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore', 'true', true );
  }
}

function paxxer_admin_css (){

  wp_enqueue_style( 'paxxer-admin-css', get_template_directory_uri() . '/inc/admin/admin.css' );

}

add_action( 'admin_enqueue_scripts', 'paxxer_admin_css' );

/**
 * Theme Functions
 */
require get_template_directory() . '/inc/functions.php';