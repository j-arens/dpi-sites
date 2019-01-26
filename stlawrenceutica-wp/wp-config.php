<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lawrence_wp646');

/** MySQL database username */
define('DB_USER', 'lawrence_wp646');

/** MySQL database password */
define('DB_PASSWORD', 'p7![fh3S9M');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zsfvzzgmkhcpg9a2uz45td9fk7craxgwctd3d2g7i6byaat3ksbfbw2hq1r3azua');
define('SECURE_AUTH_KEY',  'pbtjctaq4sf0jjuhqneiibztytdw5u0mhmnlax0dobed1wyhfu6st1oqq1u3o3kw');
define('LOGGED_IN_KEY',    'nua8axkvsgfqqoh1xhmmagqwlvky65izxew75pn1d3picqugkqmyjs5acetpw2sb');
define('NONCE_KEY',        'ozyy4wigknfimj9oa8c1nfncjeudiczfxicfxjp7nb9jed1hg6162pu3klitfa5u');
define('AUTH_SALT',        'drkn4lnmzlcbt7ic5gank3jguqjdgjz0wqtejqs8g7681uxndxvdjhvxfbhkblk4');
define('SECURE_AUTH_SALT', 'hhqzomtdxolhtjcewarvg4zvvrluchcawmjfohmaprlabfi8snom2vg6gtvzqdj0');
define('LOGGED_IN_SALT',   'k0ocomjd3uujiotuxcbb5wpdh9g0wqze0cyfvsmbweyrc73jghnielsodw3zuxkz');
define('NONCE_SALT',       '3c6kf5irscggujabrf82atq7jvmadi0kl5lmkcsmfyrz4s3uc09qfjryxodp0iw1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpzs_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
