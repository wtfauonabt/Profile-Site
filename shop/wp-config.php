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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u523696449_uvet' );

/** MySQL database username */
define( 'DB_USER', 'u523696449_uvet' );

/** MySQL database password */
define( 'DB_PASSWORD', 'uNaQyNyhas' );

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
define( 'AUTH_KEY',         '#vTR//m=vW2zh0PC{^hkbv6|Wp/Z-b/jk|8S0`Z+v{ bC8fP4fb2tRj5-u31u@[@' );
define( 'SECURE_AUTH_KEY',  '#:f@t)vbY2glHe@2~}3O9wD-BW47/ANACUie-1}kwV=C*uCIFdX>4@mfr -4xlzM' );
define( 'LOGGED_IN_KEY',    'p@f+JUBR?dp+%2|=^*344+?%WK95jDZ@U@(B]@v,ONFfdGV/NzT@{w@C`G%n)JFu' );
define( 'NONCE_KEY',        'aBM=LCww(z0Cv3t.;3So%#|UNu`]x._[ R-61.b_oET&S7U>K:0dkDxAX)j@^Y 1' );
define( 'AUTH_SALT',        'Em|!Wv;4D8gz:o-2KSO5N7rdbMp|2wA]KCp/HWoRI:!VX2v6k<wU[sg>_9}X&$Yd' );
define( 'SECURE_AUTH_SALT', 'L%AXS21-=Y5.?4-EWWOl<9-JT[*h,.g1/&W_dRdIr(N|gq>LL1.A&*?|Ei|-O:.9' );
define( 'LOGGED_IN_SALT',   'nv3xcaW7Dp/_:1+.iBnSgpw_g<#@m^wW>Y4((86ONTIsU3d`kup//jU_tm/UBC^i' );
define( 'NONCE_SALT',       ')5@OF>k4VU}s.>nlj1p@`S9V%Upmf6vvCvd^wF+M_9HdCZvyY-|dQ/y {Mg|<<QE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_shop_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
