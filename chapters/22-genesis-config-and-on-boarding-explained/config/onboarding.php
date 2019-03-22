<?php
/**
 * Genesis Example
 *
 * Onboarding config to load plugins and content on theme activation.
 *
 * @package genesis-example
 * @author  Nick Croft
 * @license GPL-2.0-or-later
 */

return array(
	'dependencies'     => array(
		'plugins' => array(
			array(
				'name'       => __( 'Atomic Blocks', 'genesis-explained' ),
				'slug'       => 'atomic-blocks/atomicblocks.php',
				'public_url' => 'https://atomicblocks.com/',
			),
			array(
				'name'       => __( 'Simple Social Icons', 'genesis-explained' ),
				'slug'       => 'simple-social-icons/simple-social-icons.php',
				'public_url' => 'https://wordpress.org/plugins/simple-social-icons/',
			),
		),
	),
	'content'          => array(
		'homepage' => array(
			'post_title'     => __( 'Homepage', 'genesis-explained' ),
			'post_content'   => genesis_get_config( 'import/content/homepage.php' ),
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/blocks.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'landing'  => array(
			'post_title'     => __( 'Landing Page', 'genesis-explained' ),
			'post_content'   => genesis_get_config( 'import/landing-page.php' ),
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/landing.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
	),
	'navigation_menus' => array(
		'primary' => array(
			'homepage' => array(
				'title' => __( 'Home', 'genesis-explained' ),
			),
			'about'    => array(
				'title' => __( 'About Us', 'genesis-explained' ),
			),
			'contact'  => array(
				'title' => __( 'Contact Us', 'genesis-explained' ),
			),
			'blocks'   => array(
				'title' => __( 'Block Examples', 'genesis-explained' ),
			),
			'landing'  => array(
				'title' => __( 'Landing Page', 'genesis-explained' ),
			),
		),
	),
);
