<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Hotelflix
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hotelflix_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'hotelflix_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hotelflix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'hotelflix_pingback_header' );

/**
 * Custom styles. See customizer-typography for typography styles.
 */
function hotelflix_custom_styles() {
	echo '<style type="text/css">';

	if ( get_theme_mod( 'container_width', 100 ) !== 100 ) {
		echo '@media screen and (min-width: 600px) {';
		echo '.site { width:' . esc_attr( get_theme_mod( 'container_width', 100 ) ) . '%; margin: 0 auto; }';
		echo '}';
	}

	if ( get_theme_mod( 'enable_mobile_logo', false ) !== false && ! empty( get_theme_mod( 'mobile_logo' ) ) ) {
		echo '@media screen and (max-width: 767px) {';
		echo '.custom-logo-link{ display: none; }';
		echo '}';
		echo '@media screen and (min-width: 767px) {';
		echo '.mobile-custom-logo-link{ display: none; }';
		echo '}';
	}

	echo '</style>';

}
add_action( 'wp_head', 'hotelflix_custom_styles' );

/***
 * Basic support for a custom mobile logo.
 */
function hotelflix_logo() {

	if ( has_custom_logo() ) {
		the_custom_logo();
	}

	if ( get_theme_mod( 'enable_mobile_logo', false ) !== false && ! empty( get_theme_mod( 'mobile_logo' ) ) ) {
		echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="mobile-custom-logo-link" rel="home">';
		echo '<img src ="' . esc_url( get_theme_mod( 'mobile_logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="custom-logo"';
		echo '</a>';
	}

}

/**
 * Reset tag cloud
 * Note: These values are pt, not px.
 */
function hotelflix_tag_cloud( array $args ) {
	$args['smallest'] = '12';
	$args['largest']  = '12';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'hotelflix_tag_cloud' );
