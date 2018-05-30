<?php

require_once __DIR__ . '/includes/custom-meta.php';

add_action( 'after_setup_theme', 'jcdream_setup', 11 );
add_action( 'wp_enqueue_scripts', 'jcdream_scripts', 11 );
add_action( 'init', 'jcdream_menus' );

/**
 * Provides a theme version for use in cache busting.
 *
 * @since 0.0.1
 *
 * @return string
 */
function jcdream_theme_version() {
	return '0.0.2';
}

/**
 * Removes support for unneeded theme features.
 *
 * @since 0.0.1
 */
function jcdream_setup() {
	remove_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

	remove_theme_support( 'automatic-feed-links' );
	remove_theme_support( 'custom-background' );
	remove_theme_support( 'custom-header' );
	remove_theme_support( 'post-formats' );

	remove_image_size( 'twentyseventeen-featured-image' );
	remove_image_size( 'twentyseventeen-thumbnail-avatar' );
}

/**
 * Enqueues styles and scripts.
 *
 * @since 0.0.1
 */
function jcdream_scripts() {
	// Dequeue twentyseventeen fonts.
	wp_dequeue_style( 'twentyseventeen-fonts' );

	// Enqueue the actual twentyseventeen stylesheet.
	wp_dequeue_style( 'twentyseventeen-style' );
	wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );

	// Enqueue the Nunito font family stylesheet.
	wp_enqueue_style( 'nunito', '//fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,700i,800,900' );

	// Enqueue JCDREAM styles with theme version.
	wp_enqueue_style( 'jcdream-style', get_stylesheet_directory_uri() . '/style.css', array( 'twentyseventeen-style', 'nunito' ), jcdream_theme_version() );

	// Enqueue the twentyseventeen Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_template_directory_uri() . '/assets/css/ie8.css', array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Enqueue the twentyseventeen html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// Define some internationalization variables.
	$twentyseventeen_l10n = array(
		'quote' => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
		'has_navigation' => 'true',
		'expand' => __( 'Expand child menu', 'twentyseventeen' ),
		'collapse' => __( 'Collapse child menu', 'twentyseventeen' ),
		'icon' => twentyseventeen_get_svg( array( 'icon' => 'expand', 'fallback' => true ) ),
	);

	// Enqueue the twentyseventeen skip link focus fix.
	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );
	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	// Enqueue the twentyseventeen navigation script.
	wp_enqueue_script( 'twentyseventeen-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );
}

/**
 * Set up navigation menus.
 *
 * @since 0.0.1
 */
function jcdream_menus() {
	unregister_nav_menu( 'social' );
	register_nav_menu( 'footer', 'Footer Menu' );
}
