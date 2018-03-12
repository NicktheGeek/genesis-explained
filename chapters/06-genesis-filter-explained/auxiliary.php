<?php
/**
 * Auxiliary code samples from the Genesis Filters Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// ADDING FILTERS.
/**
 * Generic function with a filter.
 */
function hook_function() {
	echo esc_html( apply_filters( 'hook_filter', 'foo', 'var 1', 'var 2', 'var 3' ) );
}

add_filter( 'hook_filter', 'filter_function', 10, 2 );
/**
 * Changes the value of hook_filter if $var1 === 'var 1'
 *
 * @param string $value The value that will be filtered.
 * @param string $var1  Argument being checked.
 *
 * @returns string
 */
function filter_function( $value, $var1 ) {
	if ( 'var 1' === $var1 ) {
		$value = 'bar';
	}

	return $value;
}

// REMOVING FILTERS.
add_filter( 'hook_filter', 'filter_function', 10, 2 );
remove_filter( 'hook_filter', 'filter_function', 10, 2 );
