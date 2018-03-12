<?php
/**
 * Examples from the Genesis Breadcrumb and Meta Boxes Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// NO CREATE IN THE META BOXES CLASS.
/**
 * Register meta boxes added to WordPress admin screens.
 */
class Genesis_Explained_Admin_Meta_Boxes extends Genesis_Admin_Meta_Boxes {

	/**
	 * Create a meta box handler.
	 */
	public function __construct() {

		// Use these for a child theme.
		$this->help_base  = get_stylesheet_directory() . '/lib/views/help/';
		$this->views_base = get_stylesheet_directory() . '/lib/views/';

		/*
		Use these for a plugin.
		$this->help_base  = MY_GENESIS_PLUGIN_DIR . '/lib/views/help/';
		$this->views_base = MY_GENESIS_PLUGIN_DIR . '/lib/views/';
		*/
	}

}

/**
 * Handle for Genesis_Explained_Admin_Meta_Boxes class.
 */
function genesis_explained_meta_boxes() {
	static $meta_boxes = null;

	if ( null === $meta_boxes ) {
		$meta_boxes = new Genesis_Explained_Admin_Meta_Boxes();
	}

	return $meta_boxes;
}
