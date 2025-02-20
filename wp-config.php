<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'teqzkfaa_wp784' );

/** Database username */
define( 'DB_USER', 'teqzkfaa_wp784' );

/** Database password */
define( 'DB_PASSWORD', 'PPjlKS@)]2f2].6(3[pD' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xwfx02jfcdjjr5z4j5cxjkrvv4fr1qmvwpcpqb5aactcwncuy4w0xfzmazgqhxkx' );
define( 'SECURE_AUTH_KEY',  '2dnujo9ubvwv04yxukbiqeobwnppzruo55bj3hyf3aygeygul5rvwnewaxrtilpk' );
define( 'LOGGED_IN_KEY',    '7wcqyrdypa22idynoigf2mfvpwgoeysg7hdrkqddyb74xnlpx7sr6oearauzqfsk' );
define( 'NONCE_KEY',        'fur92vlswznmzb1vyvrlzbds2fpkt1vwukh5bs2mjqs5fnasl93tgvliuxocafbp' );
define( 'AUTH_SALT',        'cenkkmlsjnn5qabo6duhjggxcg7jwkjvrkzfin3afgtuj1t8xgsyysa1o31keeas' );
define( 'SECURE_AUTH_SALT', 'tkkcrxjhdtkdtzvwezbegsrpozunpluaor4y86cvqygf41rmhvbw44a8dfac9xct' );
define( 'LOGGED_IN_SALT',   'x8lkrnvaeiybiplfx53t0gejxzi5lhgvkh0qqy70czdxmxjr0uh9qmbxoehg8lkh' );
define( 'NONCE_SALT',       'lrd7b4digfgbt5xupvkgj9rfmmg5h0kj0a1ocxaskk70mx7xdtrggtcvrulpbb2e' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wpbd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
