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
define('DB_NAME', 'mangga02_wp88');

/** MySQL database username */
define('DB_USER', 'mangga02_wp88');

/** MySQL database password */
define('DB_PASSWORD', 'p7.4W4!PSD');

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
define('AUTH_KEY',         'dcmgatp0fumssg89ansnbn09rykuz6l2qc2p73sybful45lapblrn0f5sgbyyklr');
define('SECURE_AUTH_KEY',  '37pibpwrb9fkugcsly6e2abs826ypu77qpxonhxru4diyp7vs6vsrabwmp6niavb');
define('LOGGED_IN_KEY',    'cpvifl9ikxjzmn2ruvhcqyd6ilqbrmcquxgaca9bsn0sbbwtvtfwsutlhazl43oa');
define('NONCE_KEY',        'wirvg0xza7esjxjbca1nblbfrdwgbsxlu8sp7raqtndwb5pkngz9akbumutbxh9z');
define('AUTH_SALT',        'sgde5os1cbuqwzj9j884blbe0mrihdbeqncfzs833qglv0dqv5mzpb3bly010183');
define('SECURE_AUTH_SALT', 'whdipa6ac0roy2ho3af9fomgunql40xcvx8b3qfmt5od40wgjadzgfaquoep5fem');
define('LOGGED_IN_SALT',   'mxrjz2jdf353qg74elhl4hgmnmkyubzchzzviuapse0dxnq6zphxkkhvmjxrcjil');
define('NONCE_SALT',       'vw28taof16y7kzdqeqcthmhdn5bvkcgocf5dmzkyljq9o8d9mc0xmqnt2nck9vxk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpfs_';

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
