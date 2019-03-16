<?php
/**
 * Examples from the How to load a new section on specific pages bonus chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_action( 'genesis_before_loop', 'genesis_explained_before_home_loop' );
/**
 * Adds "Hello World" before the loop on the home page.
 */
function genesis_explained_before_home_loop() {
	if ( is_home() ) {
		?>
		<h3>Hello World</h3>
		<?php
	}
}
add_action( 'genesis_before_loop', 'genesis_explained_before_page_and_category_loop' );
/**
 * Adds "Hello World" before the loop on any page or posts in category "foo".
 */
function genesis_explained_before_page_and_category_loop() {
	if ( is_page() || in_category( 'foo' ) ) {
		?>
		<h3>Hello World</h3>
		<?php
	}
}

add_action( 'genesis_before_entry_content', 'genesis_explained_before_entry_content' );
/**
 * Adds "Hello World" before the entry content on any posts in category "foo" that is also tagged with "bar".
 */
function genesis_explained_before_entry_content() {
	if ( in_category( 'foo' ) && has_tag( 'bar' ) ) {
		?>
		<h3>Hello World</h3>
		<?php
	}
}

add_action( 'genesis_before_loop', 'genesis_explained_before_not_home_loop' );
/**
 * Adds "Hello World" before the loop on any page, post, or archive that is not the home page.
 */
function genesis_explained_before_not_home_loop() {
	if ( ! is_home() ) {
		?>
		<h3>Hello World</h3>
		<?php
	}
}
