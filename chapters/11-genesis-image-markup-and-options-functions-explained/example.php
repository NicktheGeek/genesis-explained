<?php
/**
 * Examples from the Genesis Images, Markup, and Options Functions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_filter( 'genesis_attr_child-context', 'genesis_attributes_empty_class' );
add_filter( 'genesis_attr_child-context', 'genesis_attributes_screen_reader_class' );

add_filter( 'genesis_pre_get_option_nav', 'genesis_explained_get_option_nav' );
/**
 * Enable the nav all the time.
 *
 * @return int
 */
function genesis_explained_get_option_nav() {
	return 1;
}

add_action( 'genesis_post_content', 'genesis_explained_custom_field' );
/**
 * Outputs the "field_name" custom field after the post content.
 */
function genesis_explained_custom_field() {
	genesis_custom_field( 'field_name' );
}

add_action( 'save_post', 'genesis_explained_save_post', 10, 2 );
/**
 * My save post action.
 *
 * @param int     $post_id Post ID of the post being saved.
 * @param WP_Post $post    The post object being saved.
 */
function genesis_explained_save_post( $post_id, $post ) {
	if ( empty( $post_id ) ) {
		return;
	}

	if ( 'my_post_type' !== $post->post_type ) {
		return;
	}

	$custom_fields = array(
		'my_custom_field' => empty( $_POST['my_custom_field'] ) ? '' : $_POST['my_custom_field'], // WPCS: csrf ok.
	);

	genesis_save_custom_fields( $custom_fields, 'my_nonce_action', 'my_nonce_name', $post );
}
