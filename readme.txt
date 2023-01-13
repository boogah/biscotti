=== Biscotti ===
Contributors: boogah, webaware
Donate link: http://paypal.me/boogah
Tags: login, cookies, profile
Requires at least: 6.0
Tested up to: 6.1
Stable tag: 2.0.3
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Biscotti makes your user's login cookie a little bit longer.

== Description ==

Biscotti is a plugin that modifies the expiration of the logged in user cookie in WordPress to three months, six months, or one year. Because some people hate to have to keep entering their passwords.

== Installation ==

To install this plugin, drop `biscotti.php` into your site\'s `wp-content/plugins` directory and activate it.

== Frequently Asked Questions ==

= How do I work this thing? =

Once the plugin has been activated, a new option will be available in the WordPress dashboard under "User -> Profile" called "Login Cookie Expiration". There, you can select the cookie expiration date of 3 months, 6 months, or 1 year on a per-account basis.

After updating this setting, you *will* need to log out and back into WordPress for your new cookie expiration value to take effect.

Enjoy your long cookie!

== Changelog ==

= 2.0.2 =

@webaware has decided to help make this code less awful and submitted a pull request on GitHub. This release implements their improvements.

= 2.0.2 =

Sanitize. Not escape. Ack!

= 2.0.1 =

Forgot to escape the lone `$_POST` in my code. Feel dumb about it. Fixed now tho.

= 2.0.0 =

Rewrite! Now, instead of forcing *everyone* to use the same login cookie expiration, Biscotti allows users to individually select their login cookie expiration on their profile page.

= 1.0.0 =

Initial release. Simple plugin that forced login cookie expiration for every user to 1 year.
