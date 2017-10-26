<?php
/**
 * Biscotti
 *
 * Biscotti is a plugin that changes the expiration of the logged in user
 * cookie in WordPress to one year. Because some people hate entering
 * their passwords.
 *
 * @link              https://github.com/boogah/biscotti
 * @package           Biscotti
 * @author            Jason Cosper <boogah@gmail.com>
 * @license           GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:       Biscotti
 * Plugin URI:        https://github.com/boogah/biscotti
 * Description:       Bakes your cookie for an extended period of time.
 * Version:           1.0.0
 * Author:            Jason Cosper
 * Author URI:        https://jasoncosper.com/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set the login cookie's expiration date to one year.
 *
 * @since 1.0.0
 * @param int $expirein Seconds.
 */
function biscotti_wp_cookie_logout( $expirein ) {
	return 31556926;
}
add_filter( 'auth_cookie_expiration', 'biscotti_wp_cookie_logout' );
