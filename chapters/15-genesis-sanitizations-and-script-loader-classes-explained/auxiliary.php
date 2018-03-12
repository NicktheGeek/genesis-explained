<?php
/**
 * Auxiliary code samples from the Genesis Sanitization and Script Loader Classes Explained chapter.
 *
 * @package NickTheGeek\GenesisExplained
 */

// WHAT IS STATIC?.
/**
 * Example Static Person class.
 */
class Static_Person {

	/**
	 * The first name.
	 *
	 * @var string
	 */
	protected $first_name = '';

	/**
	 * The last name.
	 *
	 * @var string
	 */
	protected $last_name = '';

	/**
	 * Prefix used to identify the Person.
	 *
	 * @var string
	 */
	public static $prefix = '';

	/**
	 * Static_Person constructor.
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
		switch ( $property ) {
			case 'name':
				$value = sprintf(
					// Translators: The placeholders are for the prefix, first name, and last name values respectively.
					__( '%1$s%2$s %3$s', 'genesis-explained' ),
					static::get_prefix(),
					$this->first_name,
					$this->last_name
				);
				break;
			case 'last_name':
				$value = sprintf(
					// Translators: The placeholder is for the prefix and last name.
					__( '%1$%2$s', 'genesis-explained' ),
					$this->last_name
				);
				break;
			default:
				$value = empty( $this->$property ) ? false : $this->$property;
		}

		return $value;
	}

	/**
	 * Gets the static $prefix property.
	 *
	 * Because this is using `static` instead of `self`
	 * it will use the property of the class that was invoked when instantiating the object.
	 * This is very helpful for extending the class but it still doesn't have access to the object.
	 *
	 * @returns string
	 */
	public static function get_prefix() {
		return static::$prefix;
	}
}

/**
 * Class Static_Doctor.
 */
class Static_Doctor extends Static_Person {
	/**
	 * Prefix used to identify the Person.
	 *
	 * @var string
	 */
	public static $prefix = 'Dr. ';
}

/**
 * Class Man.
 */
class Man extends Static_Person {
	/**
	 * Prefix used to identify the Person.
	 *
	 * @var string
	 */
	public static $prefix = 'Mr. ';
}

/**
 * Class Unmarried_Woman.
 */
class Unmarried_Woman extends Static_Person {
	/**
	 * Prefix used to identify the Person.
	 *
	 * @var string
	 */
	public static $prefix = 'Miss ';
}

/**
 * Class Married_Woman.
 */
class Married_Woman extends Static_Person {
	/**
	 * Prefix used to identify the Person.
	 *
	 * @var string
	 */
	public static $prefix = 'Mrs. ';
}

// USING GENESIS SCRIPTS.
wp_register_script(
	'genesis_explained_admin_js',
	'{path-to-js-directory}/genesis-explained-admin.js',
	array( 'jquery', 'genesis_admin_js' ),
	'0.0.1',
	true
);
