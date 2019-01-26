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
define('DB_NAME', 'stpaulsj_wp200');

/** MySQL database username */
define('DB_USER', 'stpaulsj_wp200');

/** MySQL database password */
define('DB_PASSWORD', '37[p!So3pV');

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
define('AUTH_KEY',         'pydois31nmztecce0diba3iypujuttvkumpfqctpb2i0usvlubaspcfl9h8duttd');
define('SECURE_AUTH_KEY',  'sm67qksi4bhklfvze5l1hibtdfu5ortoyfo4dbdirblalgxchxe4sin5n7vkscun');
define('LOGGED_IN_KEY',    'dugp0f8d7ifrieumqabohnemih42ibb6hnc4afjslwnkbthxqwhqwpkoipwljk56');
define('NONCE_KEY',        '709b3gi4b8i62wmopy51ad2wn0kcnp9vsakuhnmbocevuehe9klwkykz1ulry2gl');
define('AUTH_SALT',        'xmbd34v8mh46faeglseis9ck5qmpdkpwcgpeirmvzqcr1ot5hhauw6zpsjansyd0');
define('SECURE_AUTH_SALT', 'honl1nry3rshedvuy62nmfioig4wzmt6kejvxyt2lcwnxbggxkhv7mixxhz3zdyg');
define('LOGGED_IN_SALT',   'akbgqygplyslaq7c7jswrmzosdnwrey0s4ogh2x1byjkmbs9dvah2tlbbklz52vr');
define('NONCE_SALT',       'kzb4jtlx9qjwlb8jy0hv3xjupvzpf84cluwee0mvfle5qhiqwy3appeqy2oz8zr7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'stpaulsjaxbeach.diocesanweb.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
