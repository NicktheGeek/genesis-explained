<?php
/**
 * Examples from the How to version you style sheet bonus chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'genesis_meta', 'genesis_explainedload_stylesheet' );
/**
 * Loads and Versions Style Sheet
 *
 * @uses wp_enqueue_style()
 * @author Nick the Geek
 */
function genesis_explainedload_stylesheet() {
	wp_enqueue_style(
		'genesis-explained-style',
		get_bloginfo( 'stylesheet_url' ),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' ),
		'screen'
	);
}
