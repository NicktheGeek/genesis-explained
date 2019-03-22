<?php
/**
 * Genesis Boiler Plate
 *
 * @package     NickTheGeek\Boilerplate
 * @author      Nick Croft
 * @copyright   2018 Nick Croft
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Boiler Plate
 * Plugin URI:        https://github.com/NicktheGeek/genesis-boilerplate
 * Description:       A Simple plugin template used for building other plugins.
 * Version:           0.1
 * Author:            Nick_theGeek
 * Author URI:        https://designsbynickthegeek.com/
 * Text Domain:       genesis-boilerplate
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI: https://github.com/NicktheGeek/genesis-boilerplate
 * Requires PHP:      5.2
 * Requires WP:       3.3
 */

/**
 * The previous section is what defines the plugin.
 * The Plugin Name line defines the name.
 * The Plugin URI line is a link to where the plugin details can be found online
 * Since this plugin isn't released I'm just linking to root domain
 * The Description line is the short description that will show in the WordPress dashboard.
 * The Version line defines the version of the plugin file
 * The Author line defines the author. This should match your WordPress user name if uploading to the WordPress repo
 * The Author URI provides a link to your Web site
 * The text domain line allow you to hint at the domain that is used for internationalizing your text strings
 * The domain path defines where WordPress should look for translation files.
 */

// Prevent direct access to the plugin.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Sorry, you are not allowed to access this page directly.' );
}

// I like to define a constant for the /lib/ and other directories so I don't have to call dirname() all the time.
define( 'GENESIS_BOILERPLATE_LIB', dirname( __FILE__ ) . '/lib/' );

/**
 * One thing I'm skipping in this plugin is an activation hook action. This type of action loads when your plugin
 * is activated. That is when you would want to check to see what version of Genesis is being used.
 * I'm only using the genesis_get_option and genesis_get_image functions in this plugin.
 * Those functions have been available for all public releases of Genesis so I'm just using the genesis_init hook.
 * It's a bit of a cheat but it works and I hate loading code that I don't absolutely need.
 * If I were doing something with functions that were added in 2.0 or something I'd run an activation hook or
 * I'd do a "function exists" before continuing.
 */

/**
 * Notice that this is loaded on genesis_init.
 * If this was not a Genesis specific plugin I could just load on init.
 * Since I loaded on genesis_init,
 * I know certain Genesis functions like genesis_get_option will be available.
 * Also note that I have prefixed the function I created
 * with "genesis_boilerplate" so I don't conflict with other plugins.
 */
add_action( 'genesis_init', 'genesis_boilerplate_init', 99 );
/**
 * Loads plugin text domain and required files. Uses genesis_init to ensure Genesis functions are available
 *
 * @since 0.1.0
 *
 * @uses GENESIS_BOILERPLATE_LIB
 */
function genesis_boilerplate_init() {

	/** Load textdomain for translation */
	load_plugin_textdomain( 'genesis-explained', false, basename( dirname( __FILE__ ) ) . '/languages/' );

	/**
	 * Checks to see if this is an admin screen and
	 * if the Genesis_Admin_Boxes class is available.
	 * Since the admin class is not part of Genesis 1.0
	 * I do a check here to make sure it is there.
	 * I could have done the activation check
	 * to make sure Genesis 1.8 or higher was running but
	 * I went with this class_exists() check instead.
	 */
	if ( is_admin() && class_exists( 'Genesis_Admin_Boxes' ) ) {
		// Load the admin files here.
		require_once GENESIS_BOILERPLATE_LIB . 'admin.php';
	} else {
		// Load files that are not admin here.
		require_once GENESIS_BOILERPLATE_LIB . 'front-end.php';
	}

	// Load files that are admin AND front end here.
	require_once GENESIS_BOILERPLATE_LIB . 'functions.php';
}
