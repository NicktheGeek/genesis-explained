<?php
/**
 * Auxiliary code samples from the Genesis  Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

/**
 * Template Name: Video Blog
 */

/**
 * This removes the loop.
 * If you want to include the static page title and content,
 * remove or comment out this code.
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'child_do_video_blog_loop' );
/**
 * This builds the video blog loop.
 * The blog options in the Genesis Theme Settings are applied.
 * A custom field on the page with the name query_args can be used.
 * This will change the posts and videos pulled into the loop.
 * By default it will pull in all posts and videos.
 */
function child_do_video_blog_loop() {
	$include = genesis_get_option( 'blog_cat' );
	$exclude = genesis_get_option( 'blog_cat_exclude' ) ?
		explode(
			',',
			str_replace(
				' ',
				'',
				genesis_get_option( 'blog_cat_exclude' )
			)
		) :
		'';
	$paged   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	/** Easter Egg */
	$query_args = wp_parse_args(
		genesis_get_custom_field( 'query_args' ),
		array(
			'cat'              => $include,
			'category__not_in' => $exclude,
			'showposts'        => genesis_get_option( 'blog_cat_num' ),
			'paged'            => $paged,
			'post_type'        => array( 'post', 'video' ),
		)
	);

	genesis_custom_loop( $query_args );
}

// Loads the framework.
genesis();
