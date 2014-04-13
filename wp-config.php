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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'cKPA>%)[LNtnX<zvX]I_`|tE|bR*/yY~3SSo2__qkHspLX&$Oso}5sr&=}|)*p[U');
define('SECURE_AUTH_KEY',  '6)JYm*t6i^i(DJYxurG=LWd&$jQN&&POO{&#(n >!LkrfYU(|#9^n}c9B({E4JV*');
define('LOGGED_IN_KEY',    '97F,K+qTorD5k;-Mx,f%|D|S_T-/dk+U)dCUkE*utaqC8c +DXf |:96ok@.FKAL');
define('NONCE_KEY',        'p32T!2HLzn-mp9#<?-5^[[|4_sA]LoZe@44-b&VgxM@5?9MTeZ}s-afJySmWyz}n');
define('AUTH_SALT',        'y+B;X~+!PL~]-7G{6M@Vk1Q7jd;?-+a=`8[>::s[iJ#2t=F*gp?V8:)./J`asN1^');
define('SECURE_AUTH_SALT', 'KO][-[Os-s$[CsR1soQBPB/kz{NSSh?ega--N1m`!5q|yb<):PN2d1W.QG!j2Sv`');
define('LOGGED_IN_SALT',   'Q$OA|)8/Dsg(KUnSREfk7gs*Qd!/c%!Z?NT8y^fYZoA8P|T %.iE`sD:obH3rM?+');
define('NONCE_SALT',       '!J{FrVDB7Fpq!tRr %3tM8sza*n%dOi)seAp6W$+zuHXKWF}ma,qJ+A3PW6 Z8N[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
