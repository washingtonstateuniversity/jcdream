<?php

add_action( 'init', 'jcdream_menus' );

/**
 * Set up navigation menus.
 *
 * @since 0.0.1
 */
function jcdream_menus() {
	unregister_nav_menu( 'social' );
	register_nav_menu( 'footer', 'Footer Menu' );
}
