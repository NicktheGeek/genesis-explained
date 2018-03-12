<?php
/**
 * Examples from the Genesis Admin Boxes, Form, and Basic Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

/**
 * Registers a new admin page, providing content and corresponding menu item for the Genesis Explained Theme Settings page.
 *
 * Although this class was added in 1.8.0, some of the methods were originally standalone functions added in previous
 * versions of Genesis.
 *
 * @package Genesis\Admin
 *
 * @since 1.8.0
 */
class Genesis_Explained_Admin_Form_Settings extends Genesis_Admin_Form {

	/**
	 * Create an admin menu item and settings page.
	 *
	 * @since 1.8.0
	 */
	public function __construct() {
		$page_id = 'genesis-explained-settings';

		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Genesis Explained Settings', 'genesis-explained' ),
				'menu_title'  => __( 'Genesis Explained Settings', 'genesis-explained' ),
			),
		);

		$page_ops = array(
			'save_button_text'  => __( 'Save Changes', 'genesis-explained' ),
			'reset_button_text' => __( 'Reset Settings', 'genesis-explained' ),
			'saved_notice_text' => __( 'Settings saved.', 'genesis-explained' ),
			'reset_notice_text' => __( 'Settings reset.', 'genesis-explained' ),
			'error_notice_text' => __( 'Error saving settings.', 'genesis-explained' ),
		);

		$settings_field = 'genesis-explained-theme-settings';

		$default_settings = array(
			'text_field'   => '',
			'checkbox'     => '',
			'select_field' => '',
		);

		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitizer_filters' ) );
	}

	/**
	 * Register each of the settings with a sanitization filter type.
	 *
	 * @since 1.7.0
	 *
	 * @see \Genesis_Settings_Sanitizer::add_filter() Add sanitization filters to options.
	 */
	public function sanitizer_filters() {
		genesis_add_option_filter(
			'one_zero',
			$this->settings_field,
			array(
				'checkbox',
			)
		);

		genesis_add_option_filter(
			'no_html',
			$this->settings_field,
			array(
				'text_field',
				'select_field',
			)
		);
	}


	/**
	 * Output Form Fields on page.
	 *
	 * @since 1.0.0
	 */
	public function form() {
	?>
<table class="form-table">
	<tbody>
	<tr valign="top">
		<th scope="row">
			<label for="<?php $this->field_id( 'text_field' ); ?>">
				<?php esc_html_e( 'Text Field Label', 'genesis-explained' ); ?>
			</label>
		</th>
		<td>
			<input
				name="<?php $this->field_name( 'text_field' ); ?>"
				type="text"
				id="<?php $this->field_id( 'text_field' ); ?>"
				value="<?php $this->field_value( 'text_field' ); ?>"
				class="regular-text"
			/>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			<label for="<?php $this->field_id( 'checkbox' ); ?>">
				<?php esc_html_e( 'Label for checkbox', 'genesis-explained' ); ?>
			</label>
		</th>
		<td>
			<input
				name="<?php $this->field_name( 'checkbox' ); ?>"
				type="checkbox"
				id="<?php $this->field_id( 'checkbox' ); ?>"
				value="1"
				<?php checked( 1, $this->get_field_value( 'checkbox' ), true ); ?>
			/>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">
			<label for="<?php $this->field_id( 'select_field' ); ?>">
				<?php esc_html_e( 'Label for select box', 'genesis-explained' ); ?>
			</label>
		</th>
		<td>
			<select
				name="<?php $this->field_name( 'select_field' ); ?>"
				type="checkbox"
				id="<?php $this->field_id( 'select_field' ); ?>"
			>
				<option
					value="one"
					<?php selected( 'one', $this->get_field_value( 'select_field' ), true ); ?>
				>
				<option
					value="two"
					<?php selected( 'two', $this->get_field_value( 'select_field' ), true ); ?>
				>
			</select>
		</td>
	</tr>
	</tbody>
</table>
?>
<?php
	}
}
