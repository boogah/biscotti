# Biscotti

## Description

Biscotti is a plugin that modifies the expiration of the logged in user cookie in WordPress to three months, six months, or one year. Because some folks hate to have to keep entering their passwords.

## Installation

To install this plugin, drop `biscotti.php` into your site's `wp-content/plugins` directory and activate it.

## Usage

Once the plugin has been activated, a new option will be available in the WordPress dashboard under "User -> Profile" called "Login Cookie Expiration". There, you can select the cookie expiration date of 3 months, 6 months, or 1 year on a per-account basis.

After updating this setting, you *will* need to log out and back into WordPress for your new cookie expiration value to take effect.

Enjoy your long cookie!

## WP-CLI Command

As of version 2.1.0, Biscotti includes WP-CLI commands for managing a user's logged in session cookie expiration.

### `biscotti get`

This command returns the previously defined cookie expiration of a user.

#### Options

`<user_id>` — The ID of the user. 

#### Examples

To get the logged in session cookie expiration of a user with the ID of 123, you would use:

```bash
wp biscotti get 123
```

### `biscotti set`

This command sets the logged in session cookie expiration of a user.

#### Options

`<user_id>` — ID of the user.

`<expiration>` — New expiration duration. It must be one of the following values:
* `'3 months'`
* `'6 months'`
* `'1 year'`

#### Examples

To set a logged in session cookie expiration of the user with ID 123 to '1 year', you would use:

```bash
wp biscotti set 123 '1 year'
```

### Note

Please remember to replace the `user_id` and `expiration` placeholders with the actual user ID and desired expiration duration when running either of these commands.

## Changelog

### 2.1.0

Added WP-CLI command. Bumped required PHP version to 8.0.

### 2.0.3

@webaware has decided to help make this code less awful and submitted a pull request. This release implements their improvements.

### 2.0.2

Sanitize. Not escape. Ack!

### 2.0.1

Forgot to escape the lone `$_POST` in my code. Feel dumb about it. Fixed now tho.

### 2.0.0

Rewrite! Now, instead of forcing *everyone* to use the same login cookie expiration, Biscotti allows users to individually select their login cookie expiration on their profile page.

### 1.0.0

Initial release. Simple plugin that forced login cookie expiration for every user to 1 year.

## Credits

All plugin code is (currently) Jason Cosper's fault.
Plugin header image courtesy of Terri Bateman.
Plugin icon courtesy of Toora Khan from Noun Project.
