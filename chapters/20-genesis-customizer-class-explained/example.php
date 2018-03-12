<?php
/**
 * Examples from the Genesis Customizer Class Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// ADDING A NEW PANEL, SECTIONS, SETTINGS, AND CONTROLS.
add_action( 'genesis_customizer', 'genesis_explained_customizer' );
/**
 * Adds my own custom panel, sections, settings, and controls to the customizer.
 *
 * @param Genesis_Customizer $genesis_customizer Genesis Customizer object.
 */
function genesis_explained_customizer( Genesis_Customizer $genesis_customizer ) {
	$config = array(
		'genesis_explained_panel' => array(
			'title'          => __( 'My Settings', 'genesis-explained' ),
			'description'    => __( 'Customize my settings.', 'genesis-explained' ),
			'theme_supports' => 'genesis-customizer-theme-settings',
			'settings_field' => 'genesis-settings',
			'control_prefix' => 'genesis-explained',
			'sections'       => array(
				'genesis_explained_first_section'  => array(
					'title'    => __( 'First Section', 'genesis-explained' ),
					'panel'    => 'genesis_explained_panel',
					'controls' => array(
						'option_1' => array(
							'label'       => __( 'Option 1', 'genesis-explained' ),
							'description' => __( 'This checkbox enables option 1.', 'genesis-explained' ),
							'section'     => 'genesis_explained_first_section',
							'type'        => 'checkbox',
							'settings'    => array(
								'default' => 0,
							),
						),
						'option_2' => array(
							'label'       => __( 'Option 2', 'genesis-explained' ),
							'description' => __( 'This is a text field.', 'genesis-explained' ),
							'section'     => 'genesis_explained_first_section',
							'type'        => 'text',
							'input_attrs' => array(
								'placeholder' => __( 'Holding the place', 'genesis-explained' ),
							),
							'settings'    => array(
								'default' => '',
							),
						),

					),
				),
				'genesis_explained_second_section' => array(
					'title'    => __( 'Second Section', 'genesis-explained' ),
					'panel'    => 'genesis_explained_panel',
					'controls' => array(
						'option_3' => array(
							'label'    => __( 'Selects an option:', 'genesis-explained' ),
							'section'  => 'genesis_explained_second_section',
							'type'     => 'select',
							'choices'  => array(
								'first'  => __( 'First', 'genesis-explained' ),
								'second' => __( 'Second', 'genesis-explained' ),
							),
							'settings' => array(
								'default' => 'first',
							),
						),
					),
				),
			),
		),
	);
	$genesis_customizer->register( $config );
}

// ADDING INDIVIDUAL SETTING AND CONTROL.
add_action( 'genesis_customizer', 'genesis_explained_customizer_title_tagline' );
/**
 * Adds settings, and controls to the customizer Site Identity section.
 *
 * @param Genesis_Customizer $genesis_customizer Genesis Customizer object.
 */
function genesis_explained_customizer_title_tagline( Genesis_Customizer $genesis_customizer ) {
	$panel = array(
		'settings_field' => 'genesis-settings',
	);

	$name = 'option_4';

	$settings = array(
		'default' => '',
	);

	$control = array(
		'label'       => __( 'Option 4', 'genesis-explained' ),
		'description' => __( 'This is another text field.', 'genesis-explained' ),
		'section'     => 'genesis_explained_first_section',
		'type'        => 'text',
		'input_attrs' => array(
			'placeholder' => __( 'Holding the place', 'genesis-explained' ),
		),
	);

	$genesis_customizer->register_setting( $name, $settings, $panel );
	$genesis_customizer->register_control( $name, $control, $panel );
}
