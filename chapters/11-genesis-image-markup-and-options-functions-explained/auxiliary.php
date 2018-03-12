<?php
/**
 * Auxiliary code samples from the Genesis Images, Markup, and Options Functions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

$img = genesis_get_image(
	array(
		'format' => 'html',
		'size'   => 'thumbnail',
		'num'    => 1,
		'attr'   => array(
			'class' => 'alignleft',
		),
	)
);

$img = genesis_image(
	array(
		'size' => 'thumbnail',
	)
);

if ( false === $img ) {
	echo '<img src="http://example.com/default-image.jpg" />';
}

$image_sizes = genesis_get_image_sizes();

echo '<ul>';
foreach ( $image_sizes as $name => $size ) {
	printf(
		'<li>%s: ( w:%s h:%s )</li>',
		esc_html( $name ),
		esc_html( $size['width'] ),
		esc_html( $size['height'] )
	);
}
echo '</ul>';

$display_nav = genesis_get_option( 'nav' );

// Translators: The placeholder is for the custom field value.
genesis_custom_field( 'my-custom-field', __( 'Here is the value: %s', 'genesis-explained' ) );
