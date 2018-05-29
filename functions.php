<?php

add_action( 'after_setup_theme', 'jcdream_setup', 11 );
add_action( 'init', 'jcdream_menus' );

/**
 * Provides a theme version for use in cache busting.
 *
 * @since 0.0.1
 *
 * @return string
 */
function jcdream_theme_version() {
	return '0.0.1';
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
 * Set up navigation menus.
 *
 * @since 0.0.1
 */
function jcdream_menus() {
	unregister_nav_menu( 'social' );
	register_nav_menu( 'footer', 'Footer Menu' );
}
