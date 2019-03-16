<?php
/**
 * Example layouts.php config file.
 *
 * Removes the 2 sidebar layouts and registers a custom "wide" layout.
 *
 * @package genesis-explained
 */

// Common path to default layout images.
// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
$url       = GENESIS_ADMIN_IMAGES_URL . '/layouts/';
$child_url = get_stylesheet_directory_uri() . '/assets/images/layouts/';

/**
 * The Layouts config. Sets the default layouts for use by Genesis.
 *
 * If child theme contains a `layouts.php` config, it will be used instead of this config.
 *
 * @since 2.8.0
 */
return array(
	'content-sidebar'    => array(
		'label'   => __( 'Content, Primary Sidebar', 'genesis-explained' ),
		'img'     => $url . 'cs.gif',
		'default' => is_rtl() ? false : true,
		'type'    => array( 'site' ),
	),
	'sidebar-content'    => array(
		'label'   => __( 'Primary Sidebar, Content', 'genesis-explained' ),
		'img'     => $url . 'sc.gif',
		'default' => is_rtl() ? true : false,
		'type'    => array( 'site' ),
	),
	'full-width-content' => array(
		'label' => __( 'Full Width Content', 'genesis-explained' ),
		'img'   => $url . 'c.gif',
		'type'  => array( 'site' ),
	),
	'full-width-wide'    => array(
		'label' => __( 'Full Width Wide', 'genesis-explained' ),
		'img'   => $child_url . 'wide.gif',
		'type'  => array( 'site' ),
	),
);
