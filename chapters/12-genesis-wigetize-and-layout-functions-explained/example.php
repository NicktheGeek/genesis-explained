<?php
/**
 * Examples from the Genesis Widgetize and Layout Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_filter( 'genesis_initial_layouts', 'genesis_explained_initial_layouts' );
/**
 * Filter to remove the default layouts not used in this theme.
 *
 * @param array $default_layouts The default layouts.
 *
 * @return array
 */
function genesis_explained_initial_layouts( $default_layouts ) {
	unset( $default_layouts['content-sidebar-sidebar'] );
	unset( $default_layouts['sidebar-sidebar-content'] );
	unset( $default_layouts['sidebar-content-sidebar'] );

	return $default_layouts;
}

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
