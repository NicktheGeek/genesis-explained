<?php
/**
 * Examples from the Genesis Actions and Filters in Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// REMOVE_ACTION.
remove_action( 'wp_enqueue_scripts', array( genesis_scripts(), 'enqueue_front_scripts' ) );

add_filter( 'sanitize_option_my_option', array( Genesis_Settings_Sanitizer::$instance, 'sanitize' ), 10, 2 );
