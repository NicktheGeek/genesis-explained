<?php
/**
 * Examples from the Genesis Framework Filters Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// REPLACING A STRING.
add_filter( 'genesis_noposts_text', 'genesis_explained_noposts_text' );
/**
 * Changes the No Posts text for search pages.
 *
 * @param string $text The no posts text.
 *
 * @returns string
 */
function genesis_explained_noposts_text( $text ) {
	if ( ! is_search() ) {
		return $text;
	}

	return '<span class="no-posts">' . esc_html__( 'Sorry, no posts were found for your search.', 'genesis-explained' ) . '</span>';
}

// CHANGING STRINGS.
add_filter( 'genesis_footer_output', 'genesis_explained_footer_output', 10, 3 );
/**
 * Modifies the footer text.
 *
 * @param string $output         The footer output.
 * @param string $backtotop_text The back to top portion of the footer.
 * @param string $creds_text     The credits portion of the footer.
 *
 * @returns string
 */
function genesis_explained_footer_output( $output, $backtotop_text, $creds_text ) {
	$child_creds_text = 'Copyright 2007 - ' . date( 'Y' ) . '<a href="http://designsbynickthegeek.com">Nick the Geek</a>';

	$output = str_replace( $creds_text, $child_creds_text, $output );

	return $output;
}
