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
define( 'DB_NAME', 'w5d3' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'WvlSfZ`TI{8pj5sn~Rr#ADZx?SoO_)Pk[Z=^bp3i-+$@ac?wE(Y=M>Q!G.PgFV<b' );
define( 'SECURE_AUTH_KEY',  '})vkI7:n;jyVCIjr~I_2c:/m>|A26Cf;(diplrxkU!j*)L 0_o(I,Wpts_#DkWe#' );
define( 'LOGGED_IN_KEY',    'rIwj:e!g=:C7e]p+Wm_sB[P?.Vj4<d>QDcUW@R9C)*(vn)vnnC8^D{xaP3S 0;qX' );
define( 'NONCE_KEY',        'mj{%XBwsTzZ?OpY#iyA56L0oLtF+K@>@|4C[t/@9VZ.!^%%CK39Z`^m3^?qL3Mf3' );
define( 'AUTH_SALT',        'iAt_=cRYTJF;2</g0_R!yG^4!8e&l!,c=}%q@.<.OThLz_<H=1Z}&GudjKadg^DB' );
define( 'SECURE_AUTH_SALT', 'r)x6W8->*4bDopI}?Gh4%NAv=Wpv~)k 1Z1310JaC7nP4hjhU>8GVKK}YA(kFv.Z' );
define( 'LOGGED_IN_SALT',   'G<:J/Lx|6w<l%)y<EiH|p:~xqt[)hm;{*`R?mna.&_wqYHL&^_-es+5h+XqxCxtR' );
define( 'NONCE_SALT',       'z$;:R2~Ut$YYBg_:D4FH`/:Q+0h(ty!G#`BWuI33M2:Eu,b*(O>h~}hg^48=9WbT' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
