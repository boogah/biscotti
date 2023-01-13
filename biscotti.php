<?php
/**
 * Biscotti
 *
 * Biscotti is a plugin that modifies the expiration of the logged in user
 * cookie in WordPress to three months, six months, or one year. Because
 * some people hate to have to keep entering their passwords.
 *
 * @package Biscotti
 * @author  Jason Cosper <boogah@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @link    https://github.com/boogah/biscotti
 *
 * @wordpress-plugin
 * Plugin Name:       Biscotti
 * Plugin URI:        https://github.com/boogah/biscotti
 * Description:       Biscotti makes your user's login cookie a little bit longer.
 * Version:           2.0.2
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Jason Cosper
 * Author URI:        https://jasoncosper.com/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (! defined('WPINC') ) {
    die;
}

// Add a dropdown menu to the user profile page that allows you to choose the login cookie's expiration date.
function biscotti_login_cookie_expiration_form_fields( $user )
{
    $expiration_options = array(
    '3 months' => '3 months',
    '6 months' => '6 months',
    '1 year' => '1 year',
    );
    $selected_expiration = get_the_author_meta('biscotti_login_cookie_expiration', $user->ID);
    ?>
  <h3>Login Cookie Expiration</h3>
  <table class="form-table">
    <tr>
      <th><label for="biscotti_login_cookie_expiration">Expiration</label></th>
      <td>
        <select name="biscotti_login_cookie_expiration" id="biscotti_login_cookie_expiration">
          <?php foreach ( $expiration_options as $value => $label ) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($selected_expiration, $value); ?>><?php echo esc_html($label); ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <span class="description">Choose your login cookie's expiration date.</span>
      </td>
    </tr>
  </table>
    <?php
}

// Add the form fields to the user profile page.
add_action('show_user_profile', 'biscotti_login_cookie_expiration_form_fields');
add_action('edit_user_profile', 'biscotti_login_cookie_expiration_form_fields');

// Update the user meta with the chosen login cookie expiration date.
function biscotti_login_cookie_expiration_form_fields_update( $user_id )
{
    if (! current_user_can('edit_user', $user_id) ) {
        return;
    }
    update_user_meta($user_id, 'biscotti_login_cookie_expiration', sanitize_text_field($_POST['biscotti_login_cookie_expiration']));
}

// Save the chosen login cookie expiration date when the user profile is updated.
add_action('personal_options_update', 'biscotti_login_cookie_expiration_form_fields_update');
add_action('edit_user_profile_update', 'biscotti_login_cookie_expiration_form_fields_update');

/**
 * Modify the expiration of the logged in user cookie.
 * @param int $expiration
 * @param int $user_id
 * @param bool $remember
 * @return int
 */
function biscotti_login_cookie_expiration_set_auth_cookie( $expiration, $user_id, $remember )
{
    $expiration_time = get_user_meta($user_id, 'biscotti_login_cookie_expiration', true);

    if (! empty($expiration_time) ) {
        if ($expiration_time == '3 months' ) {
            $expiration = 90 * DAY_IN_SECONDS; // Set expiration to 3 months.
        } elseif ($expiration_time == '6 months' ) {
            $expiration = 180 * DAY_IN_SECONDS; // Set expiration to 6 months
        } elseif ($expiration_time == '1 year' ) {
            $expiration = 365 * DAY_IN_SECONDS; // Set expiration to 1 year.
        } else {
            $expiration = ''; // Use default expiration of 14 days.
        }
    }
    return $expiration;
}

// Modify the expiration of the logged in user cookie when a user logs into the site.
add_filter('auth_cookie_expiration', 'biscotti_login_cookie_expiration_set_auth_cookie', 10, 3);
