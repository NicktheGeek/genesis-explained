<?php
/**
 * Creates the plugin admin page.
 *
 * @category Genesis Boilerplate
 * @package Admin
 * @author copyblogger
 * @license http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 */

/* Prevent direct access to the plugin */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Sorry, you are not allowed to access this page directly.' );
}

/**
 * Registers a new admin page, providing content and corresponding menu items
 *
 * @category Genesis Boilerplate
 * @package Admin
 *
 * @since 0.1.0
 */
class Genesis_Boilerplate_Boxes extends Genesis_Admin_Boxes {

	/**
	 * Create an admin menu item and settings page.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		/*
		 * Defines the setting value.
		 * You will use genesis_get_option( 'option', 'genesis_boilerplate' );
		 * to retrieve "option" from this field later
		 */
		$settings_field = 'genesis_boilerplate';

		/*
		 * If themes or other plugins should be able to change your defaults use a filter here.
		 * Otherwise just use the array without the filter
		 */
		$default_settings = apply_filters(
			'genesis_boilerplate_defaults',
			array(
				'general_size'      => 'medium',
				'general_position'  => 'before_content',
				'general_post'      => 1,
				'advanced_checkbox' => 0,
				// If you define default text internationalize it.
				'advanced_text'     => __( 'Default Text', 'genesis-boilerplate' ),
			)
		);

		// Define where your page can be found.
		$menu_ops = array(
			'submenu' => array(
				/** Do not use without 'main_menu' */
				'parent_slug' => 'genesis', // Loads under "genesis" menu.
				'page_title'  => __( 'Genesis Boilerplate Settings', 'genesis-boilerplate' ), // Shows on page.
				'menu_title'  => __( 'Boilerplate', 'genesis-boilerplate' ), // Shows in the menu.
			),
		);

		// Just use the defaults most of the time other tutorials can show you how to get advanced here.
		$page_ops = array();

		// Creates the page.
		$this->create( 'genesis_boilerplate_settings', $menu_ops, $page_ops, $settings_field, $default_settings );

		// loads the sanitizer. Look for details below.
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitizer_filters' ) );
	}

	/**
	 * Register each of the settings with a sanitization filter type.
	 *
	 * @since 0.9.0
	 *
	 * @uses genesis_add_option_filter() Assign filter to array of settings.
	 * @see \Genesis_Settings_Sanitizer::add_filter() Add sanitization filters to options.
	 */
	public function sanitizer_filters() {
		// Since I'm building some checkboxes programmatically,
		// I have to add validation programmatically.
		$one_zero = array(
			'general_post',
			'advanced_checkbox',
		);

		// This gets the post type list.
		$post_types = get_post_types( array( 'public' => true ) );

		// I add the post types to the hard coded options so they can all be filtered.
		foreach ( $post_types as $post_type ) {
			$one_zero[] = 'general_' . $post_type;
		}

		// Use for checkboxes.
		genesis_add_option_filter(
			'one_zero',
			$this->settings_field,
			$one_zero
		);

		// Only allows integers. Great for text fields that are just for numbers.
		genesis_add_option_filter(
			'absint',
			$this->settings_field,
			array()
		);

		// Used to validate a URL.
		genesis_add_option_filter(
			'url',
			$this->settings_field,
			array()
		);

		// If you don't NEED html in your text field use this option for text.
		genesis_add_option_filter(
			'no_html',
			$this->settings_field,
			array(
				'general_size',
				'general_position',
			)
		);

		// Uses wp_kses to allow some HTML but nothing easily exploitable.
		genesis_add_option_filter(
			'safe_html',
			$this->settings_field,
			array(
				'advanced_text',
			)
		);

		// Allows full HTML but only for users with unfiltered HTML privilege.
		genesis_add_option_filter(
			'requires_unfiltered_html',
			$this->settings_field,
			array()
		);
	}


	/**
	 * Loads required scripts.
	 *
	 * @since 0.1.0
	 */
	public function scripts() {

		// Adding some common scripts here. You may or may not need them.
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );

		// Use wp_enqueue_script() and wp_enqueue_style() to load scripts and styles.
		wp_enqueue_script(
			'genesis-boilerplate-admin-js',
			plugins_url( 'js/admin.js', __FILE__ ),
			array( 'jquery' ),
			'0.1.0'
		);

		// This is enqueueing the style.
		// It is very similar to the script function above but geared for styles.
		wp_enqueue_style(
			'genesis-boilerplate-admin-css',
			plugins_url( 'css/admin.css', __FILE__ ),
			array(),
			'0.1.0'
		);
	}

	/**
	 * Register meta boxes.
	 *
	 * @since 0.1.0
	 */
	public function metaboxes() {
		/*
		 * This loads the functions that display the boxes on the admin page.
		 * Make sure you use names that are unique and descriptive.
		 */
		add_meta_box(
			'genesis_boilerplate_general_settings',
			__( 'General', 'genesis-boilerplate' ),
			array( $this, 'general' ),
			$this->pagehook,
			'main'
		);
		add_meta_box(
			'genesis_boilerplate_advanced_settings',
			__( 'Advanced', 'genesis-boilerplate' ),
			array( $this, 'advanced' ),
			$this->pagehook,
			'main'
		);
	}

	/**
	 * Create General settings metabox output
	 *
	 * @since 0.1.0
	 */
	public function general() {
		// I use an ID to link common options together.
		$id = 'general';

		?>

		<div class="wrap gb-clear">

			<br />

			<table class="form-table">
				<!--this is using table markup to build out the relationship for labels and options-->
				<tbody>

				<?php

				// I created a method for building a select field. It is clean and easy to use. Feel free to steal and adapt it.
				$this->select_field(
					$id . '_size', __( 'Size', 'genesis-boilerplate' ), array(
						'small'  => __( 'Small', 'genesis-boilerplate' ),
						'medium' => __( 'Medium', 'genesis-boilerplate' ),
						'tall'   => __( 'Box', 'genesis-boilerplate' ),
					)
				);

				// I used a wrapper method here. There were a lot of options in the full file this plugin was for so this saved space.
				$this->position( $id );
				// I also have another wrapper method that automatically builds a multicheck from all post types. Another handy thing to steal.
				$this->post_type_checkbox( $id );

				?>
				</tbody>
			</table>
		</div>

		<?php
	}

	/**
	 * Create Advanced settings metabox output
	 *
	 * @since 0.1.0
	 */
	public function advanced() {
		$id = 'advanced';

		// This method builds a checkbox.
		$this->checkbox( $id . '_checkbox', __( 'Enable This Option?', 'genesis-boilerplate' ) );

		// Here is an example of adding a text field directly to the screen without a method.
		?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( $id . '_text' ) ); ?>"
			>
				<?php esc_html_e( 'Enter text here:', 'genesis-boilerplate' ); ?>
			</label>
			<input
				type="text"
				name="<?php echo esc_attr( $this->get_field_name( $id . '_text' ) ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( $id . '_text' ) ); ?>"
				value="<?php echo esc_attr( $this->get_field_value( $id . '_text' ) ); ?>"
				size="27"
			/>
		</p>
		<?php

		// An alternate solution to the above would be a text_field() method.
		$this->text_field( $id . '_text', __( 'Enter text here:', 'genesis-boilerplate' ) );
	}

	/**
	 * Outputs select field to select position for the icon
	 *
	 * @since 0.1.0
	 *
	 * @param string $id ID base to use when building select box.
	 */
	public function position( $id ) {
		$this->select_field(
			$id . '_position', __( 'Display Position', 'genesis-boilerplate' ), array(
				'off'            => __( 'Select display position to enable.', 'genesis-boilerplate' ),
				'before_content' => __( 'Before the Content', 'genesis-boilerplate' ),
				'after_content'  => __( 'After the Content', 'genesis-boilerplate' ),
				'both'           => __( 'Before and After the Content', 'genesis-boilerplate' ),
			)
		);
	}

	/**
	 * Outputs text field
	 *
	 * @since 0.1.0
	 *
	 * @param string $id    ID to use when building select box.
	 * @param string $label Label text for the select field.
	 */
	public function text_field( $id, $label ) {
		printf(
			'<label for="%s">%s</label><input type="text" name="%s" id="%s" value="%s" size="27" />',
			esc_attr( $this->get_field_id( $id ) ),
			esc_html( $label ),
			esc_attr( $this->get_field_name( $id ) ),
			esc_attr( $this->get_field_id( $id ) ),
			esc_attr( $this->get_field_value( $id ) )
		);
	}

	/**
	 * Outputs select field
	 *
	 * @since 0.1.0
	 *
	 * @param string $id      ID to use when building select box.
	 * @param string $label   Label text for the select field.
	 * @param array  $options Array key $option=>$title used to build select options.
	 */
	public function select_field( $id, $label, $options = array() ) {
		if ( empty( $options ) ) {
			return;
		}

		$current = $this->get_field_value( $id );
		?>
		<tr valign="top">
		<th scope="row">
			<label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>">
				<?php echo esc_html( $label ); ?>
			</label>
		</th>
		<td>
			<select
				name="<?php echo esc_attr( $this->get_field_name( $id ) ); ?>"
				class="<?php echo esc_attr( 'genesis_boilerplate_' . $id ); ?>"
				id="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>"
			>
				<?php
				foreach ( (array) $options as $option => $title ) {
					printf(
						'<option value="%s"%s>%s</option>',
						esc_attr( $option ),
						selected( $current, $option, false ),
						esc_html( $title )
					);
				}
				?>
			</select></td>
		</tr>
		<?php
	}

	/**
	 * Outputs checkbox fields for public post types.
	 *
	 * @since 0.1.0
	 *
	 * @param string $id ID base to use when building checkbox.
	 */
	public function post_type_checkbox( $id ) {
		$post_types = get_post_types( array( 'public' => true ) );

		printf(
			'<tr valign="top"><th scope="row">%s</th>',
			esc_html__( 'Enable on:', 'genesis-boilerplate' )
		);

		echo '<td>';

		foreach ( $post_types as $post_type ) {
			$this->checkbox( $id . '_' . $post_type, $post_type );
		}

		$this->checkbox(
			$id . '_show_archive',
			__( 'Show on Archive Pages', 'genesis-boilerplate' )
		);

		echo '</td></tr>';
	}

	/**
	 * Outputs checkbox field.
	 *
	 * @since 0.1.0
	 *
	 * @param string $id ID to use when building checkbox.
	 * @param string $label Label text for the checkbox.
	 */
	public function checkbox( $id, $label ) {
		printf(
			'<label for="%s"><input type="checkbox" name="%s" id="%s" value="1" %s/> %s </label> ',
			esc_attr( $this->get_field_id( $id ) ),
			esc_attr( $this->get_field_name( $id ) ),
			esc_attr( $this->get_field_id( $id ) ),
			checked( $this->get_field_value( $id ), 1, false ),
			esc_html( $label )
		);

		echo '<br />';
	}


}

new Genesis_Boilerplate_Boxes();
