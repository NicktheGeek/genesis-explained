<?php
/**
 * Auxiliary code samples from the Genesis Formatting and General Functions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

echo genesis_truncate_phrase( get_the_title(), 100 ); // WPCS: xss ok.

printf(
	'<div class="post-teaser">%s</div>',
	get_the_content_limit( 300, '[Keep Reading]' )
); // WPCS: xss ok.

$link = '<a href="http://example.com" title="title">Anchor Text</a>';
echo genesis_strip_attr( $link, array( 'a' ), array( 'title' ) ); // WPCS: xss ok.
// outputs "<a href="http://example.com">Anchor Text</a>".
$args = array(
	'classes' => array(
		'Akismet_Widget',
	),
);

if ( genesis_detect_plugin( $args ) ) {
	echo 'Akismet is active!';
}
