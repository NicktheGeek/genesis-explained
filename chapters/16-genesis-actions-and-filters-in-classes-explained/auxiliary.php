<?php
/**
 * Auxiliary code samples from the Genesis Actions and Filters in Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// ADD_ACTION.
/**
 * Class Has_Callback
 */
class Static_Has_Callback {
	/**
	 * Generic static callback example
	 */
	public static function callback() {}
}
add_action( 'hook', array( 'Static_Has_Callback', 'callback' ) );

/**
 * Class Has_Callback
 */
class Has_Callback {
	/**
	 * Generic non-static callback example.
	 */
	public function callback() {
	}
}

$object = new Has_Callback();
add_action( 'hook', array( $object, 'callback' ) );

// REMOVE_ACTION.
add_action( 'hook', array( 'Static_Has_Callback', 'callback' ) );
remove_action( 'hook', array( 'Static_Has_Callback', 'callback' ) );

