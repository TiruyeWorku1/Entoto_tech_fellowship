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
define( 'DB_NAME', 'abera1_photo' );

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
define( 'AUTH_KEY',         ')<;svtFCc.1bqJ-oA.YpI]oGB~!;}wrWV``G:y8oy=gHxP^_lpmc(_x!d3  j~9S' );
define( 'SECURE_AUTH_KEY',  '^>EjthBl^/f$|Tmv/b<3`I{-Co0%_QitMaJ81;kK9f1R{{De2byuRDgH-ft&}nV}' );
define( 'LOGGED_IN_KEY',    'gv6ah{<~|nJ cb-10m*Bs<]1jA:~k0(DAP}{Z~V{L 0]7H1&,W}~k]N_SHMVwbZ<' );
define( 'NONCE_KEY',        'uM>-+Gpo-V2w-^H^<b.~tFgQvYYmQr8G|:OIFUeU$y@k^E,eP?yzMyy~}MCc#H8m' );
define( 'AUTH_SALT',        'Pyi|,WN,AUxDk4xu-/i{uS+!GfYBbKPJ?y1(BY9ib)9eH8?0L7_oW}PkBXpo>!Vu' );
define( 'SECURE_AUTH_SALT', 'LX9Z19A,R^Q?%&LG1qY(o3A$</+vox5a0nwjoJ0Yyt,:l_tq)XaV!M~]-m=|AAId' );
define( 'LOGGED_IN_SALT',   '?Fk-6C4$#jOP]^.g+avut4eF&iTd{T[~EhLGIfl!ii^N+2tSq7m~X3!;35#5o~g~' );
define( 'NONCE_SALT',       'SMu~GyV[)hCbu+~Y2x6F9-^HOq^we{+A0MvyXS;.NAaG7rzc`H!s# srGZ ab3Dw' );

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
