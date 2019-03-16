<?php
/**
 * Examples from the Genesis HOW TO CHANGE THE GALLERY POST FORMAT OUTPUT Bonus Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_action( 'genesis_before_entry', 'genesis_explained_remove_elements' );

/**
 * If post has post format, remove the title, post info, and post meta.
 * If post does not have post format, then it is a default post. Add
 * title, post info, and post meta back.
 *
 * @since 1.0
 */
function genesis_explained_remove_elements() {

	// Remove if post has format.
	if ( ( 'gallery' === get_post_format() || 'image' === get_post_format() ) && ! is_single() ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
		remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );

		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

		remove_action( 'genesis_entry_content', 'genesis_explained_post_format_content' );
		add_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_image' );
		add_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_content' );
	} elseif ( get_post_format() && ! is_single() ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
		remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
		remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );

		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

		add_action( 'genesis_entry_content', 'genesis_explained_post_format_content' );
		remove_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_image' );
		remove_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_content' );
	} // Add back, as post has no format
	else {
		add_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		add_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
		add_action( 'genesis_entry_header', 'genesis_do_post_title' );
		add_action( 'genesis_entry_header', 'genesis_post_info', 12 );

		add_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
		add_action( 'genesis_entry_content', 'genesis_do_post_content' );
		add_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
		add_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );

		add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		add_action( 'genesis_entry_footer', 'genesis_post_meta' );

		remove_action( 'genesis_entry_content', 'genesis_explained_post_format_content' );
		remove_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_image' );
		remove_action( 'genesis_entry_content', 'genesis_explained_do_gallery_post_content' );
	}

	if ( ! is_singular() ) {
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	}
}

/**
 *  Outputs Content for Single Images on archive pages
 *
 *  @author Nick_theGeek
 *  @link http://designsbynickthegeek.com/tutorials/changing-the-gallery-post-format-output
 */
function genesis_explained_do_gallery_post_image() {
	$media = get_attached_media( 'image' );

	$media = empty( $media ) ? array() : $media;

	$count  = 10;
	$images = array();

	foreach ( $media as $image ) {
		$images[] = wp_get_attachment_image( $image->ID, 'rectangle' );

		$count--;

		if ( empty( $count ) ) {
			break;
		}
	}

	if ( empty( $images ) ) {
		echo '<a href="' . esc_url( get_permalink() ) . '">';
		genesis_image(
			array(
				'size' => 'tumble image',
				'attr' => array( 'class' => 'tumble-image' ),
			)
		);
		echo '</a>';
	}

	printf(
		'<div class="gallery-preview"><a href="%s">%s</a></div>',
		esc_url( get_permalink() ),
		implode( '', $images )
	); // WPCS: xss ok.
}

/**
 *  Outputs Content for Galleries on archive pages
 *
 *  @author Nick_theGeek
 *  @link http://designsbynickthegeek.com/tutorials/changing-the-gallery-post-format-output
 */
function genesis_explained_do_gallery_post_content() {
	$attachments = get_children( array( 'post_parent' => get_the_ID() ) );
	$img_count   = count( $attachments );

	the_content_limit( 400, ' ' );

	echo '<p class="gallery-item-count">
		This album contains 
		<a href="' . esc_url( get_permalink() ) . '">' . esc_html( $img_count ) . ' items</a>
	</p>';
}

/**
 * Outputs the_content on other post formats.
 */
function genesis_explained_post_format_content() {
	the_content( '[Read more...]' );
}

