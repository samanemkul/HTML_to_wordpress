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
define( 'DB_NAME', 'landing_site' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'HMhek-g$OO>o0@ND#~c8&_q]rizNCPPs8chho4r0jhHM~? :fT_o)^4b,)S.)v[L' );
define( 'SECURE_AUTH_KEY',  '*G-U5@_rXB00QXdr<VB6]T=H=1h&P]x$7)r}A^j,q3Ula-yVI6aa-{bYiZ{isnzf' );
define( 'LOGGED_IN_KEY',    '(V6Hp%8K/Ngye`  p@v,EqO8]k*BB,j28F}2K6F9;3=,S&B/awG %LI<aE1t~}P7' );
define( 'NONCE_KEY',        'A@4Rw.;Mx>)<oF}We+*82G0}?&?t>}v)wMF)@oIn3HC/yh^yq-.&vKEGPIgsK[|%' );
define( 'AUTH_SALT',        'EBP2!OzGAtEja6$B2+$r>(>6!)}ExXg)(ae9]s=IOKfe?Ny9gEJ{{/3;lNLi:A?3' );
define( 'SECURE_AUTH_SALT', '>24n{Aa3my5nZaGA7!03h10}$Q-9#apJBKB7.Hi=66S4VJQnDsk3x_k^6O0@:_IM' );
define( 'LOGGED_IN_SALT',   '$SnxLAgOnU(A0>F_RKj~;?](r`*z//IoBxVq<&,<|]M&lOgok0eS=k=$|&y[>mC3' );
define( 'NONCE_SALT',       '.Mp^bzv,|;w5$M7<]9G2.%lO7y.d3.;fQNfMPj`~G]|B$b??<W|l>T<S/TYdPvsU' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
