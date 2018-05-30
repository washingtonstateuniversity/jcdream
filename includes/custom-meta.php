<?php

namespace JCDREAM\Custom_Meta;

add_action( 'add_meta_boxes_page', 'JCDREAM\Custom_Meta\add_body_class_meta_box' );
add_action( 'save_post_page', 'JCDREAM\Custom_Meta\save_body_classes', 10, 2 );
add_filter( 'body_class', 'JCDREAM\Custom_Meta\page_body_class' );

/**
 * Add a metabox to Pages for assigning an arbitrary body class.
 */
function add_body_class_meta_box() {
	add_meta_box(
		'jcdream-body-class-meta',
		'Body Classes',
		'JCDREAM\Custom_Meta\display_body_class_meta_box',
		'page',
		'side',
		'default'
	);
}

/**
 * Display the metabox used for assigning a body class.
 *
 * @param WP_Post $post Object for the post currently being edited.
 */
function display_body_class_meta_box( $post ) {
	$value = get_post_meta( $post->ID, '_jcdream_body_class', true );

	wp_nonce_field( 'save-jcdream-body-class', '_jcdream_body_class_nonce' );

	?>
	<input type="text" class="widefat" name="jcdream_body_class" value="<?php echo esc_attr( $value ); ?>" />
	<p class="howto">Separate classes with spaces</p>
	<?php
}

/**
 * Save the body class(es) assigned to a page.
 *
 * @param int     $post_id ID of the post being saved.
 * @param WP_Post $post    Post object of the post being saved.
 */
function save_body_classes( $post_id, $post ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( 'auto-draft' === $post->post_status ) {
		return;
	}

	if ( ! isset( $_POST['_jcdream_body_class_nonce'] ) || false === wp_verify_nonce( $_POST['_jcdream_body_class_nonce'], 'save-jcdream-body-class' ) ) {
		return;
	}

	if ( isset( $_POST['jcdream_body_class'] ) && ! empty( trim( $_POST['jcdream_body_class'] ) ) ) {
		update_post_meta( $post_id, '_jcdream_body_class', sanitize_text_field( $_POST['jcdream_body_class'] ) );
	} else {
		delete_post_meta( $post_id, '_jcdream_body_class' );
	}
}

/**
 * Add body classes added via the Body Classes metabox.
 *
 * @param array $classes Current list of body classes.
 *
 * @return array Modified list of body classes.
 */
function page_body_class( $classes ) {
	$_post = get_post();

	$body_classes = get_post_meta( $_post->ID, '_jcdream_body_class', true );

	if ( $body_classes ) {
		$classes[] = esc_attr( $body_classes );
	}

	return $classes;
}
