<?php
/**
 * Auxiliary code samples from the Genesis Actions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_action( 'hook', 'callback_function', 10, 1 );
/**
 * Example of a callback function.
 */
function callback_function() {

	// do something really cool.
}

// The Priority.
add_action( 'hook', 'function_1' ); // Loads second.
add_action( 'hook', 'function_2', 15 ); // Loads last.
add_action( 'hook', 'function_3', 5 ); // Loads first.

// Duplicate Actions.
add_action( 'hook', 'function_1' );
add_action( 'hook', 'function_1' ); // This is ignored since that instruction already exists.
add_action( 'hook', 'function_1', 5 ); // This will load before the first instance of function_1() on "hook".
add_action( 'hook_2', 'function_1' ); // This will load the code in function_1() onto "hook_2".

// REMOVE ACTION.
add_action( 'hook', 'function_1' );
add_action( 'hook', 'function_1', 5 );

remove_action( 'hook', 'function_1' );
remove_action( 'hook', 'function_2' );

// ACTIONS IN LOOPS.
if ( $foo === $bar ) {
	add_action( 'hook', 'function_1' );
	remove_action( 'hook_2', 'function_1' );
} else {
	add_action( 'hook_2', 'function_1' );
	remove_action( 'hook', 'function_1' );
}
