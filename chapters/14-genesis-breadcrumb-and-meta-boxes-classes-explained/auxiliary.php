<?php
/**
 * Auxiliary code samples from the Genesis Breadcrumb and Meta Boxes Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// UNDERSTANDING CLASS STRUCTURE.
/**
 * Example Person class.
 */
class Private_Person {

	/**
	 * The first name.
	 *
	 * @var string
	 */
	private $first_name = '';

	/**
	 * The last name.
	 *
	 * @var string
	 */
	private $last_name = '';

	/**
	 * Private_Person constructor.
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

/**
 * Class Doctor
 *
 * Extends the Person class, not Private_Person
 * because the properties need to be public or protected
 * to access in the child class.
 */
class Doctor extends Person {

	/**
	 * Gets the specified property.
	 *
	 * @param string $property The property to get.
	 *
	 * @returns mixed|string|bool
	 */
	public function get( $property ) {
		switch ( $property ) {
			case 'name':
				$value = sprintf(
					// Translators: The placeholders are for the first and last name values respectively.
					__( 'Dr. %1$s %2$s', 'genesis-explained' ),
					$this->first_name,
					$this->last_name
				);
				break;
			case 'last_name':
				$value = sprintf(
					// Translators: The placeholder is for the last name.
					__( 'Dr. %s', 'genesis-explained' ),
					$this->last_name
				);
				break;
			default:
				$value = empty( $this->$property ) ? false : $this->$property;
		}

		return $value;
	}
}
