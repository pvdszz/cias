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
define( 'DB_NAME', 'cias_dev' );

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
define( 'AUTH_KEY',         'plyKN,v*#zTPQ]EkrZc!>s;3Du2Q*@0~3Jij` d-1@$|~V #p8IGdmBW&Z^Sfj2(' );
define( 'SECURE_AUTH_KEY',  'n3U3qXbohP>c.gK>qR3P;hnd<:_Yp$)a5x#h)fQa-WFqDjgW5W9]HD=/A>nzbW]u' );
define( 'LOGGED_IN_KEY',    'ewfTl1p0WXhk&8H{+vc=XW7~xED&NZ!~zu?e!o=-l{d2GGVMK};+`kIM>Y~@Rk(8' );
define( 'NONCE_KEY',        '{@@wPhy.QHlFSM`vlO<C.9:.#<]`Vj[2_fDWX@NIc?ao+rb0<fFIC- {+d|AS1|a' );
define( 'AUTH_SALT',        '.g<_<.EuCB-dMIR-#_f 0AFyD6REuK+XIe7H{Vg0$vEMCBS;)ttefQ)EKfYg7hfi' );
define( 'SECURE_AUTH_SALT', 'y3`cu|{%!3$?j#0(5{3-NKDyv5H+jFwwwE3{+U) xlbaX9!x}lx#$=qj&>xfC_ J' );
define( 'LOGGED_IN_SALT',   '}huU]E#{?#tnGV3gX w|VJ#$%Z~fnNm[E-V=9z(8CY>9P%.fHaj[JxLDJ19<6Y.m' );
define( 'NONCE_SALT',       '=D&E;($cejm N3#zfYqjhu5&z,:I*}35-Kn=Xui{$8ao|;*sXR;vo}AST:YAy~uu' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cias_';

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
define( 'WP_DEBUG_LOG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
