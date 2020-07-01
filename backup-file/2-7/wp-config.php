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

define( 'DB_NAME', "pddbmuxshosting_imus_dev" );


/** MySQL database username */

define( 'DB_USER', "pddbmuxshosting_imusdev" );


/** MySQL database password */

define( 'DB_PASSWORD', "O9fzcXY*u^Fs" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'Ttf<xPa|Wx3E[A M7Q)E1MO4X?;u+^ U3KW_@ZO](-Sz54VX40;E?%2l)f:|2D!`' );

define( 'SECURE_AUTH_KEY',  'LJXU0s>e|2k2LfXrG1wuzk!<id)H9O,pEFG%U9[v3FxB/h^<~NmSy8nf{I8/P#lU' );

define( 'LOGGED_IN_KEY',    'F0D=EIoWFQ)ihe6sD!@60AL!b9Q)u`8/1XF9%BpI9)YGUq*0CC|).^H#%%WXFn%>' );

define( 'NONCE_KEY',        '%DUrN81/Fe;K{D*ZI]=$H+s``1^7[A&g&ZbmG=`,%HolW Xk7(O W~d<|/@T7-q]' );

define( 'AUTH_SALT',        '6Rm6V:DK+T |=e_3}Un%c0mG>V907*hL;w+fNja[S|%mf&|7iHv7L9cH[2GqpFE!' );

define( 'SECURE_AUTH_SALT', 'F-y)y8nlb*-Azj|4~4[9=BL{8}ly[0Ns*0~nTyv3%#xM/]czC_N_cYjsI*7RZXPF' );

define( 'LOGGED_IN_SALT',   'i]^T:1izO|S}-uRn|lVyYTnuT?S8,r:]o|3~UmWGC>J#E}VF!7|c[NOgqD;m?=!I' );

define( 'NONCE_SALT',       'q3P?/c 7+%@ {sn@yehR;o~D_G6k7e<OgR@lS !!W|^ypY7548vz&&KX4Ik&;96B' );


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


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

