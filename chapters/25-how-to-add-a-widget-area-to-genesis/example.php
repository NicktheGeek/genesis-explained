<?php
/**
 * Examples from the How to add a widget area to Genesis bonus chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// REGISTER YOUR WIDGET AREA.
genesis_register_widget_area(
	array(
		'id'          => 'after-content-ad',
		'name'        => __( 'After Content Ad', 'genesis-explained' ),
		'description' => __( 'This is a sidebar that goes after the content.', 'genesis-explained' ),
	)
);

// DISPLAY YOUR WIDGET AREA.
add_action( 'genesis_after_content_sidebar_wrap', 'genesis_explained_after_content_ad_sidebar' );
/**
 * Loads a new sidebar after the content
 */
function genesis_explained_after_content_ad_sidebar() {
	if ( genesis_is_root_page() ) {
		return;
	}

	$id = 'after-content-ad';

	$before_markup_args = array(
		'open'    => '<aside class="widget-area after-content-ad">',
		'context' => 'widget-area-wrap',
		'echo'    => false,
		'params'  => array(
			'id' => $id,
		),
	);

	$widget_area_args = array(
		'before' => genesis_markup( $before_markup_args ),
	);

	genesis_widget_area( $id, $widget_area_args );
}

// Ad widget area above header.
genesis_register_widget_area(
	array(
		'id'          => 'before-header-ad',
		'name'        => __( 'Before Header Ad', 'genesis-explained' ),
		'description' => __( 'This is a sidebar that goes before the header.', 'genesis-explained' ),
	)
);

add_action( 'genesis_before', 'genesis_explained_before_header_ad_widget_area' );
/**
 * Loads a new widget area before the #wrap
 */
function genesis_explained_before_header_ad_widget_area() {
	$id = 'before-header-ad';

	$before_markup_args = array(
		'open'    => '<aside class="widget-area before-header-ad">',
		'context' => 'widget-area-wrap',
		'echo'    => false,
		'params'  => array(
			'id' => $id,
		),
	);

	$widget_area_args = array(
		'before' => genesis_markup( $before_markup_args ),
	);

	genesis_widget_area( $id, $widget_area_args );
}

// Widget Area Before Posts.
genesis_register_widget_area(
	array(
		'id'          => 'before-posts-sidebar',
		'name'        => __( 'Before Posts', 'genesis-explained' ),
		'description' => __( 'This is a sidebar that goes before the posts in the #content.', 'genesis-explained' ),
	)
);

add_action( 'genesis_before_loop', 'genesis_explained_before_posts_sidebar' );
/**
 * Loads a new sidebar before the posts in the #content
 */
function genesis_explained_before_posts_sidebar() {
	$id = 'before-posts-sidebar';

	$before_markup_args = array(
		'open'    => '<aside class="widget-area before-posts-sidebar">',
		'context' => 'widget-area-wrap',
		'echo'    => false,
		'params'  => array(
			'id' => $id,
		),
	);

	$widget_area_args = array(
		'before' => genesis_markup( $before_markup_args ),
	);

	genesis_widget_area( $id, $widget_area_args );
}

// After Post Subscribe Box.
genesis_register_sidebar(
	array(
		'id'          => 'after-post-box',
		'name'        => __( 'After Post Box', 'genesis-explained' ),
		'description' => __( 'This is a sidebar that goes after the posts for a subscribe box.', 'genesis-explained' ),
	)
);

add_action( 'genesis_after_entry_content', 'genesis_explained_after_post_box' );
/**
 * Loads a new sidebar after the post on single pages
 */
function genesis_explained_after_post_box() {
	if ( ! is_single() ) {
		return;
	}

	$id = 'after-post-box';

	$before_markup_args = array(
		'open'    => '<aside class="widget-area after-post-box">',
		'context' => 'widget-area-wrap',
		'echo'    => false,
		'params'  => array(
			'id' => $id,
		),
	);

	$widget_area_args = array(
		'before' => genesis_markup( $before_markup_args ),
	);

	genesis_widget_area( $id, $widget_area_args );
}
