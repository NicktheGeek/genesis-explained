<?php
/**
 * Examples from the Genesis Framework Actions Explained Chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// Removing Actions.
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

// Moving Actions.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

// Modifying Actions.
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'genesis_explained_do_loop' );
/**
 * Custom loop excludes category ID 1 and changes the order.
 *
 * This is not the best way to modify the query. A better approach is to the the pre_get_posts hook.
 *
 * @global string $query_string The query string for the request.
 */
function genesis_explained_do_loop() {
	global $query_string;

	$args = array(
		'cat'   => -1,
		'order' => 'ASC',
	);
	$args = wp_parse_args( $query_string, $args );

	genesis_custom_loop( $args );
}

// ADDING DUPLICATE CONTENT.
add_action( 'genesis_before_entry_content', 'genesis_explained_content_duplicate_adsense', 15 );
add_action( 'genesis_after_entry_content', 'genesis_explained_content_duplicate_adsense', 5 );
/**
 * Inserts an adsense ad above and below the content.
 */
function genesis_explained_content_duplicate_adsense() {
?>
<div class="adsense">
	<!--insert adsense code-->
</div>
<?php
}

add_action( 'genesis_before_post_content', 'genesis_explained_content_conditional_adsense', 15 );
add_action( 'genesis_after_post_content', 'genesis_explained_content_conditional_adsense', 5 );
/**
 * Inserts an adsense ad above and below the content with a conditional class.
 */
function genesis_explained_content_conditional_adsense() {
?>
<div class="adsense <?php echo 'genesis_before_post_content' === current_filter() ? 'before' : 'after'; ?>">
	<!--insert adsense code-->
</div>
<?php
}

