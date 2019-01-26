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
define('DB_NAME', 'olqmdioc_wp864');

/** MySQL database username */
define('DB_USER', 'olqmdioc_wp864');

/** MySQL database password */
define('DB_PASSWORD', '6])p2H2mSf');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

// allow rss feeds to cache
define('ENABLE_CACHE', TRUE);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hnkrifo6hr5bpqxf1mylcrbyrkjnwmwkwmm9k0xbm9pl7xzcaxkmdukva6d3vkui');
define('SECURE_AUTH_KEY',  'fuoy37uppcrxvdyvt0upecoakwdcbloydgvvob80x3su0xdtahrnqm0cgkomne3a');
define('LOGGED_IN_KEY',    'k59fhrqpi5hs53fpht7gbrbo7w6gtb0whkbgyz0vskefrqq8odxjkfmqceh2her4');
define('NONCE_KEY',        'qc7ksqijnxvpqukvpqbusiccjd5yjiil9yq3ynpzpta4rwcabflunohh9kkswyki');
define('AUTH_SALT',        'usbddfklzlihq6cpekl8ujo7i8hxcgup1vsxe7tcf1aomy4k03mr9idqwrozcluv');
define('SECURE_AUTH_SALT', 'nstw0zanzyqymagygokuxheicgn5ao8nspj7a6hoc3nblbshiop3iohoh9r5p4zs');
define('LOGGED_IN_SALT',   'k5qmefbyfrcleab703qmtsbdwtdvtwlb3merpuyqg2fstlgeeebukbudbzktb03t');
define('NONCE_SALT',       'dscf0fxbzfqwbd9zvcbb8yfwxbmwrltdk83yhbhttdu6gphenw7mkgfgiokvimcg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpdf_';

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
