<?php
/**
 * Examples from the How to change the content limit in Genesis bonus chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_filter( 'genesis_pre_get_option_content_archive_limit', 'genesis_explained_content_archive_limit' );
/**
 * Changes the content limit for a specific category.
 *
 * @param int $limit The current limit.
 *
 * @return int The new limit.
 */
function genesis_explained_content_archive_limit( $limit ) {
	if ( is_category( '219' ) ) {
		$limit = 1000;
	} elseif ( is_tag() ) {
		$limit = 750;
	} elseif ( is_archive() && 'genesis_explained_post_type' === get_post_type() ) {
		$limit = 500;
	}

	return $limit;
}
