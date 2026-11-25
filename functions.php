<?php
/**
 * Gruenwerk Demo — theme setup.
 *
 * @package gruenwerk-demo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gruenwerk_demo_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => __( 'Primary menu', 'gruenwerk-demo' ) ) );
}
add_action( 'after_setup_theme', 'gruenwerk_demo_setup' );

function gruenwerk_demo_assets() {
	wp_enqueue_style( 'gruenwerk-demo', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'gruenwerk_demo_assets' );
