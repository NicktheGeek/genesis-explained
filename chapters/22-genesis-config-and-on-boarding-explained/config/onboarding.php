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
	'dependencies' => array(
		'plugins' => array(
			array(
				'name' => __( 'Atomic Blocks', 'genesis-explained' ),
				'slug' => 'atomic-blocks/atomicblocks.php',
			),
			array(
				'name' => __( 'WooCommerce', 'genesis-explained' ),
				'slug' => 'woocommerce/woocommerce.php',
			),
		),
	),
	'content'      => array(
		'homepage' => array(
			'post_title'     => __( 'Homepage', 'genesis-explained' ),
			'post_name'      => 'homepage-blocks',
			'post_content'   => genesis_get_config( 'pages/homepage.php' ),
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'template-blocks.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
	),
);
