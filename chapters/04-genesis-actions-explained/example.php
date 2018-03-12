<?php
/**
 * Example action from the Genesis Featured Widget Amplified plugin.
 *
 * @package NickTheGeek\GenesisExplained
 */

add_action( 'gfwa_post_content', 'gfwa_do_post_content', 10, 1 );
/**
 * Outputs the selected content option if any
 *
 * @author Nick Croft
 * @since 0.1
 * @version 0.2
 * @param array $instance Values set in widget instance.
 */
function gfwa_do_post_content( $instance ) {
	if ( ! empty( $instance['show_content'] ) ) {
		if ( 'excerpt' === $instance['show_content'] ) {
			the_excerpt();
		} elseif ( 'content-limit' === $instance['show_content'] ) {
			the_content_limit( (int) $instance['content_limit'], esc_html( $instance['more_text'] ) );
		} else {
			the_content( esc_html( $instance['more_text'] ) );
		}
	}
}
