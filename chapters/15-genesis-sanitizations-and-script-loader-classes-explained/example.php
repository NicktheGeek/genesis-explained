<?php
/**
 * Examples from the Genesis Sanitization and Script Loader Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// THE SANITIZER CLASS.
add_action( 'genesis_settings_sanitizer_init', 'genesis_explained_register_social_sanitization_filters' );
/**
 * Register additional Sensitization options.
 */
function genesis_explained_register_social_sanitization_filters() {
	// These are URLs so should be sanitized as URLs.
	genesis_add_option_filter(
		'url',
		GENESIS_SETTINGS_FIELD,
		array(
			'twitter_url',
			'facebook_url',
		)
	);

	// This is a string that will never have HTML so should be sanitized with no HTML.
	genesis_add_option_filter(
		'no_html',
		GENESIS_SETTINGS_FIELD,
		array(
			'twitter_handle',
		)
	);
}

/**
 * Class Genesis_Explained_Save_Post
 */
class Genesis_Explained_Save_Post {

	/**
	 * Registers the save post callback.
	 */
	public function __construct() {
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Save post callback saves the post meta.
	 *
	 * @param int $post_id The post ID.
	 */
	public function save_post( $post_id ) {
		/**
		 * Do some conditional checks to verify
		 * the post type, nonce, post status,
		 * and anything else that matters for this action.
		 */

		$sanitize = array(
			'no_html'  => array(
				'option_1',
				'option_2',
			),
			'one_zero' => array(
				'option_3',
			),
		);

		foreach ( $sanitize as $method => $options ) {
			foreach ( $options as $option ) {
				$value = isset( $_GET[ $option ] ) ? $_GET[ $option ] : ''; // WPCS: csrf ok.
				update_post_meta( $post_id, $option, Genesis_Settings_Sanitizer::$instance->$method( $value ) );
			}
		}
	}
}
new Genesis_Explained_Save_Post();
