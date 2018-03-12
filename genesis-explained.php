<?php
/**
 * Genesis Explained
 *
 * @package     NickTheGeek\GenesisExplained
 * @author      Nick Croft
 * @copyright   2018 Nick Croft
 * @license     GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Explained
 * Plugin URI:        https://github.com/NicktheGeek/genesis-explained
 * Description:       Code examples from the Genesis Explained book.
 * Version:           1.2
 * Author:            Nick_theGeek
 * Author URI:        https://designsbynickthegeek.com/
 * Text Domain:       gfwa
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * GitHub Plugin URI: https://github.com/NicktheGeek/genesis-explained
 * Requires PHP:      5.2
 * Requires WP:       3.3
 */

add_action( 'genesis_init', 'genesis_explained_init' );
/**
 * Includes the example files automatically.
 *
 * Callback is on genesis_init so we know the files will only be loaded
 * if and only if Genesis is active.
 */
function genesis_explained_init() {
	$genesis_explained_directories = glob( dirname( __FILE__ ) . '/*', GLOB_ONLYDIR );

	foreach ( $genesis_explained_directories as $chapter ) {
		$file = sprintf( '%sexample.php', trailingslashit( $chapter ) );

		if ( file_exists( $file ) ) {
			include $file;
		}
	}
}
