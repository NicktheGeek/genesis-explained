<?php
/**
 * Auxiliary code samples from the Genesis Widgetize and Layout Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// WordPress Function.
register_sidebar(
	array(
		'name'          => __( 'My Sidebar', 'genesis-explained' ),
		'id'            => 'my-sidebar',
		'before_widget' => genesis_markup(
			array(
				'open'    => '<section id="%%1$s" class="widget %%2$s"><div class="widget-wrap">',
				'context' => 'widget-wrap',
				'echo'    => false,
			)
		),
		'after_widget'  => genesis_markup(
			array(
				'close'   => '</div></section>' . "\n",
				'context' => 'widget-wrap',
				'echo'    => false,
			)
		),
		'before_title'  => '<h4 class="widget-title widgettitle">',
		'after_title'   => "</h4>\n",
	)
);

// Genesis Function.
genesis_register_widget_area(
	array(
		'name' => __( 'My Sidebar', 'genesis-explained' ),
		'id'   => 'my-sidebar',
	)
);

unregister_sidebar( 'sidebar-alt' );

genesis_widget_area( 'widget-area-id' );

if ( ! genesis_widget_area( 'widget-area-id' ) ) {
	// Do your default here.
	esc_html_e( 'Default', 'genesis-explained' );
}

genesis_add_type_to_layout( 'full-width-content', array( 'genesis_explained_cpt_type' ) );

genesis_unregister_layout( 'content-sidebar-sidebar' );
