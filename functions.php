<?php
/**
 * Musterhausen Bürgerservice (Demo) — theme setup.
 *
 * FICTIONAL: "Stadt Musterhausen" does not exist. See README.md.
 *
 * @package musterhausen-demo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function musterhausen_demo_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => __( 'Hauptnavigation', 'musterhausen-demo' ) ) );
}
add_action( 'after_setup_theme', 'musterhausen_demo_setup' );

function musterhausen_demo_assets() {
	wp_enqueue_style( 'musterhausen-demo', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'musterhausen_demo_assets' );

/**
 * Navigation shown until a menu is assigned under Design → Menüs.
 */
function musterhausen_demo_menu_fallback() {
	$items = array(
		'/'                   => __( 'Startseite', 'musterhausen-demo' ),
		'/buergerbuero/'      => __( 'Bürgerbüro', 'musterhausen-demo' ),
		'/termin-buchen/'     => __( 'Termin buchen', 'musterhausen-demo' ),
		'/formulare/'         => __( 'Formulare & Anträge', 'musterhausen-demo' ),
		'/abfallkalender/'    => __( 'Abfallkalender', 'musterhausen-demo' ),
		'/aktuelles/'         => __( 'Aktuelles', 'musterhausen-demo' ),
	);
	echo '<ul>';
	foreach ( $items as $path => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( $path ) ), esc_html( $label ) );
	}
	echo '</ul>';
}
