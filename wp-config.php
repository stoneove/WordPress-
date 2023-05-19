<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'ibasilsaleem' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '(FlD6*C@InL/SC_?y^Q3-W0B,!jg9ZY+tP!>n$`o7p5H0zP/0pZpqU#)?{YQiejn' );
define( 'SECURE_AUTH_KEY',  'xbRcV&eqaVdQ?q7v[[/8~gQQ!(}nSOVgTzt`MgfcX:>pEA}hlO.w[R?.!HvoB1DZ' );
define( 'LOGGED_IN_KEY',    'L+X12/!5eVV~rcq:p}N3dw$J!-zZV=p|R@_81EF;qNktzE<[Tt@NMy4nDTJq|r a' );
define( 'NONCE_KEY',        'xxudLrtv~qY,@-|<H0BmOO;!:7xjpg>RdqW+lm9j2bx3iT,=8Bd6s%~bp{p+%ltY' );
define( 'AUTH_SALT',        'O{D>ID*DaYJ-Pz2McYqQbvVL}~-WX1:jGXFOU8Bc%^#a>L [EWb@2;^Zxs9YjZH4' );
define( 'SECURE_AUTH_SALT', '~p|zb8N&wxjjcgWXll(ydafZ}IG*~aL/y z9$8*%^XoISaFEL%Qfkqc[%0r/O?Wc' );
define( 'LOGGED_IN_SALT',   '.s3$6eQhP?[-^.O ,=hN.W7A_W<({~rKlHjKtI;d>OEp[mf^i}^=)(&&oO3$<G_y' );
define( 'NONCE_SALT',       'S#,:B#4!+Mw#D{0:rOUv]L]/R9<j^EUZ:|e[x+5.p:V>Q;V70Vcu/.qegb2rZ$L%' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
