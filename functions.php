<?php

require_once __DIR__ . '/includes/custom-meta.php';
require_once __DIR__ . '/includes/customizer.php';

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
	return '0.0.7';
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
	wp_enqueue_style( 'nunito', '//fonts.googleapis.com/css?family=Nunito:300,300i,400,600,800,900', array(), null );

	// Enqueue JCDREAM styles with theme version.
	wp_enqueue_style( 'jcdream-style', get_stylesheet_directory_uri() . '/style.css', array( 'twentyseventeen-style', 'nunito' ), jcdream_theme_version() );

	// Enqueue the JCDREAM navigation script.
	wp_enqueue_script( 'jcdream-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), jcdream_theme_version(), true );
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

/**
 * Prints HTML with meta information for the current post-date/time and author.
 * (Copied and modified from Twenty Seventeen.)
 */
function twentyseventeen_posted_on() {

	// Get the author name.
	$byline = sprintf(
		_x( 'by %s', 'post author', 'twentyseventeen' ),
		'<span class="author vcard">' . get_the_author() . '</span>'
	);

	// Finally, write all of this to the page.
	echo '<span class="posted-on">' . twentyseventeen_time_link() . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}

/**
 * Gets a nicely formatted string for the published date.
 * (Copied and modified from Twenty Seventeen.)
 */
function twentyseventeen_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);
	// Preface the time string with 'Posted on'.
	return '<span class="screen-reader-text">' . _x( 'Posted on', 'post date', 'twentyseventeen' ) . '</span> ' . $time_string;
}
