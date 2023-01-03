# Biscotti

## Description

Biscotti is a plugin that modifies the expiration of the logged in user cookie in WordPress to three months, six months, or one year. Because some folks hate to have to keep entering their passwords.

## Installation

To install this plugin, drop `biscotti.php` into your site's `wp-content/plugins` directory and activate it.

## Usage

Once the plugin has been activated, a new option will be available in the WordPress dashboard under "User -> Profile" called "Login Cookie Expiration". There, you can select the cookie expiration date of 3 months, 6 months, or 1 year on a per-account basis.

After updating this setting, you *will* need to log out and back into WordPress for your new cookie expiration value to take effect.

Enjoy your long cookie!

## Changelog

### 2.0.0

Rewrite! Now, instead of forcing *everyone* to use the same login cookie expiration, Biscotti allows users to individually select their login cookie expiration on their profile page.

### 1.0.0

Initial release. Simple plugin that forced login cookie expiration for every user to 1 year.

## Credits

All plugin code is (currently) Jason Cosper's fault.
Plugin header image courtesy of Terri Bateman.
Plugin icon courtesy of Toora Khan from Noun Project.