<?php
/**
 * Examples from the Genesis Functions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// HOW TO CREATE A FUNCTION.
/**
 * Outputs HTML that will highlight the text provided.
 *
 * This will require some CSS like .highlight { background: yellow; }
 *
 * @param string $text The text that will be highlighted.
 */
function genesis_explained_highlighter( $text = '' ) {
	printf( '<div class="highlight">%s</div>', esc_html( $text ) );
}

// WORKING WITH EXISTING FUNCTIONS.
add_action( 'genesis_after_post_content', 'genesis_explained_do_add_to_any' );
/**
 * Add the add to any function after post content if the function exists
 */
function genesis_explained_do_add_to_any() {
	if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
		ADDTOANY_SHARE_SAVE_KIT();
	}
}

if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
	add_action( 'genesis_after_post_content', 'ADDTOANY_SHARE_SAVE_KIT' );
}
