<?php
/**
 * Example action from the Genesis Filters with Arrays chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// ADDING TO AN ARRAY.
add_filter( 'genesis_comment_form_args', 'genesis_explained_comment_form_args' );
/**
 * Changes the Submit Comment button copy.
 *
 * @param array $args The Genesis comment form arguments.
 *
 * @return array
 */
function genesis_explained_comment_form_args( $args ) {
	$args['label_submit'] = __( 'Publish Comment', 'genesis-explained' );

	return $args;
}

// REPLACING ARRAY VALUES.
add_filter( 'genesis_breadcrumb_args', 'genesis_explained_breadcrumb_args' );
/**
 * Changes the breadcrumb arguments.
 *
 * @param array $args The breadcrumb args.
 *
 * @returns array
 */
function genesis_explained_breadcrumb_args( $args ) {
	$args['sep']                = ' | ';
	$args['labels']['prefix']   = __( 'Path to here: ', 'genesis-explained' );
	$args['labels']['category'] = __( 'Category: ', 'genesis-explained' );

	return $args;
}

// CHANGING AN ARRAY.
add_filter( 'genesis_comment_form_args', 'genesis_explained_comment_form_remove_aria_required' );
/**
 * Remove aria in comments on XHTML themes.
 *
 * @param array $args The comment form args.
 *
 * @returns array
 */
function genesis_explained_comment_form_remove_aria_required( $args ) {
	$args           = str_replace( ' aria-required="true"', '', $args );
	$args['fields'] = str_replace( ' aria-required="true"', '', $args['fields'] );

	return $args;
}
