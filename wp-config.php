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
define('DB_NAME', 'nikhilja_db');

/** MySQL database username */
define('DB_USER', 'nikhilja_user');

/** MySQL database password */
define('DB_PASSWORD', 'D6(X.,kS(~SS');

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
define('AUTH_KEY',         '/(s)n11=R:1D!fUDulg&ErN%EWz)2JM;hg!r|dArO$8`$Q>DO1i$#.q|NV)A]DM?');
define('SECURE_AUTH_KEY',  '( aC>MM6m)S]fLiXuqs?6nrTA].,+$c4(*Rg]]3iALh-z&--71LR*40>Z5z6P-2x');
define('LOGGED_IN_KEY',    '50LV~Uq(EfY2r!%F#vFDus[W</1jH!n|OZYq2JDacMdRT#j32c;N>qy1,imu5^H#');
define('NONCE_KEY',        '5|5~H}|{gG^Y,FI[{goFrZAx:P&p{jI*qrIDEM;qH#TbSEb,$Mj]Db{53{)P`&!v');
define('AUTH_SALT',        '` y8t%W_#qY_B~jSF`>Uj8[JiKc@G?q*RSPf4Ikh4_OSc><8#0%#P`2e2*n6#N$[');
define('SECURE_AUTH_SALT', '+0Ti6E`.b$_<gM:q>&rtAr`JxPx,mI]CD.+wMq&_KzA9/l`[_XrDBuaC|`wKl;|,');
define('LOGGED_IN_SALT',   'TS.u(Rs(q)/@uDY5}vEQe?;B?EMsU`<^3Tt?Yk:}E8;pS!o71~oQv&YNzb#p.F^=');
define('NONCE_SALT',       '0AT>++O+etcm#O7?N)_}+![#!VtjbpA:C5n-*<&Jv^D^YZOQ>8@c@;s*j1GLNxck');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jb_';

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
