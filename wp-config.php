<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dragonfood');

/** MySQL database username */
define('DB_USER', 'dragonfood');

/** MySQL database password */
define('DB_PASSWORD', 'dragonfood');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Q,)B#CmsU%w$Gnqj,lN,C-8GZbeX ^= Sm=8{2>w|/Io>{hs6r@}/>kpHEL]#Dw2');
define('SECURE_AUTH_KEY',  'Hm(E%Hy`>2#@TE:Ai7gW;08WY6`[|,)&8^3z?>koO5#JZg9,&*$ A46Kmq!tNPt?');
define('LOGGED_IN_KEY',    'hoQz$Qip(Wk{Pkhd-y2`<bX6wh<zi;Y?EuXP$HafDZLNJ*;L]I{ef>*DHs5,^Mj[');
define('NONCE_KEY',        '=qG@,sZA vu> u[0a13+4.k,42XQK#{fYK !1Lab2;x$8phh,I+Kg&wf_JQa5A4-');
define('AUTH_SALT',        'jvQy^5Do/-TZf8-IZW>DzSn8vb{E m*S8@2?}b6z:P;CsP16vtZ9?7H7U:mroWA4');
define('SECURE_AUTH_SALT', '^x^BJ^hMO!;wk2W].Wo]sAW,t}@M3xXup0yOu9nN6DS<aA+`$cVh3**;&w)UT[X3');
define('LOGGED_IN_SALT',   '42UGda6r@z/hRBKOk#2[ed#&Ka)7jLl1NeTDl>j<zTOi~P;4Oc HzIPe?]{kl3 L');
define('NONCE_SALT',       '{?=fE7$yYI4$M9k`J^OJ}t<=e#+A[bRef!oqWU$ay!GNR,j($9!r+5*IjE&]~ylT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'df_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

@ini_set('display_errors','Off');
