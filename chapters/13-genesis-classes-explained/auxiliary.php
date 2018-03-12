<?php
/**
 * Auxiliary code samples from the Genesis Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// WHAT ARE CLASSES?
/**
 * Example Person class.
 */
class Person {

	/**
	 * The first name.
	 *
	 * @var string
	 */
	public $first_name = '';

	/**
	 * The last name.
	 *
	 * @var string
	 */
	public $last_name = '';

	/**
	 * Person constructor.
	 *
	 * @param string $first_name The first name.
	 * @param string $last_name  The last name.
	 */
	public function __construct( $first_name, $last_name ) {
		$this->first_name = $first_name;
		$this->last_name  = $last_name;
	}

	/**
	 * Gets the specified property.
	 *
	 * @param string $property The property to get.
	 *
	 * @returns mixed|string|bool
	 */
	public function get( $property ) {
		return empty( $this->$property ) ? false : $this->$property;
	}
}

$person_1 = new Person( 'Nick', 'Croft' );
$person_2 = new Person( 'John', 'Smith' );
$person_3 = new Person( 'Jane', 'Doe' );

?>
<table>
	<thead>
	<tr>
		<th><?php esc_html_e( 'First Name', 'genesis-explained' ); ?></th>
		<th><?php esc_html_e( 'Last Name', 'genesis-explained' ); ?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><?php echo esc_html( $person_1->get( 'first_name' ) ); ?></td>
		<td><?php echo esc_html( $person_1->get( 'last_name' ) ); ?></td>
	</tr>
	<tr>
		<td><?php echo esc_html( $person_2->get( 'first_name' ) ); ?></td>
		<td><?php echo esc_html( $person_2->get( 'last_name' ) ); ?></td>
	</tr>
	<tr>
		<td><?php echo esc_html( $person_3->get( 'first_name' ) ); ?></td>
		<td><?php echo esc_html( $person_3->get( 'last_name' ) ); ?></td>
	</tr>
	</tbody>
</table>
<?php
