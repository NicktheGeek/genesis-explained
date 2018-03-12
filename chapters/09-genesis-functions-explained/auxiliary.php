<?php
/**
 * Auxiliary code samples from the Genesis Functions Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// THE SIX PARTS OF A FUNCTION.
/**
 * Example of a generic function.
 *
 * @param string $arg The function argument.
 */
function generic( $arg = 'foo' ) {
	echo esc_html( $arg );
}

// USING HTML IN FUNCTIONS.
/**
 * Example of a generic function with HTML.
 */
function generic_html() {
	?>
	Now I'm in HTML, this will print out using whatever <strong>HTML</strong> markup I give it.
	<?php
}

/**
 * Example of a generic function with HTML and PHP.
 */
function generic_html_php() {
	?>
	<p>See, still in HTML, no need for any fancy PHP, unless I need something dynamic, like the date <?php echo esc_html( date( 'Y' ) ); ?>.</p>

	<p>Pretty easy, and that date function loads inline just like it would in a template file</p>
	<?php
}

// USING YOUR OWN ACTIONS.
add_action( 'genesis_before_header', 'generic' );
