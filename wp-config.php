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
define( 'DB_NAME', 'firm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         '(a;ita$^U W46xEMY%f?)tNSIld`8PO*ZD>h[,![FckVLi&w,yC5qySv78ORrJe^' );
define( 'SECURE_AUTH_KEY',  'wI`rPSZ?+H5VGK$!C2c(|P+}UPilzUSEL]~i2%+Q#1]7NCNF^YD7|d&Vwuvyj~5w' );
define( 'LOGGED_IN_KEY',    'w;=]VS(g3;BWPT<ae>{,pY/wRG^<}R[qZ`lA`_O]]07F~bG$PKi0/6@dt0Tt#tGU' );
define( 'NONCE_KEY',        ',b3>)K&^+A_ioPP2N#(p)8vga|tSr.YYF3+Kt?`IE lE&-8c ,-SZ>5QVIb,xIS>' );
define( 'AUTH_SALT',        '5.cxr;20kk>*>R=Kk$K_()as;`_N}m$)-X|G4KC{_7rl8@G+>bCR]}VwS(6O;&vn' );
define( 'SECURE_AUTH_SALT', 'lc^gLQui{^=tO-m&!0vKW]z:2POO5 isVawfo9hBE!=^iZA*>e|Yk6d/z]B@]2&J' );
define( 'LOGGED_IN_SALT',   'S2_X(cJ`e[(Z=l/LRyxnMbXM{Jl6l8GZ&5rC[O-R N#fa.u-n|`xk5.@1tG5)<%A' );
define( 'NONCE_SALT',       'f?SAU-z<@$r$$M y p+7F:5:iFH+iJr7V#)EaFdWa}Xh6gGW6RY{Kqm|JPsyAV=f' );

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
