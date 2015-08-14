<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cursoworpressudp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '-pGaKs,p%>X/an7iK(XQ/g3Vhu^yX^_qg=&$fo>bzc}dBZNtP&{xkS)Tc[Aw~[>(');
define('SECURE_AUTH_KEY',  'Lh7D`5#Ss&!_p_Of)G> ?o2I/h]XWE:(>|2{/@DVP4LCG-A9IHlHdzZef`<(J)Xq');
define('LOGGED_IN_KEY',    '/0EdV[ps,EJ{4+yo,6gtUc`FSAK:YU)4!e$A/vuM].>)PG)wMTMNS{AZJVprdoq{');
define('NONCE_KEY',        'Zai>3,$%Fu;fY;/E&L%e)>UWQaha&#.M}>9m2f.X0k~);aq}-s{5G]zq%@NN&.Yx');
define('AUTH_SALT',        '`Xie~Icanm6Dc}<c*R7yNC-2Oa *Us<%o:2<:b%^Z9:jjMyx#Bt48%q%hrh[.Z}W');
define('SECURE_AUTH_SALT', 'Hmr0o}Nco.J{Y}h/yZ&myGM<)f`_Z=+2Sv>40xi!=Vz2V}D0@KQNo{k U=xArc,u');
define('LOGGED_IN_SALT',   's)A|H2nW6 8SfCg-r:~Kf[=IYF`rGr70qkP`tuw#>R@AOBCg_< H+XQ6}-nbJG{%');
define('NONCE_SALT',       '1pAuCUJY +=`}]!3MviVRW>1>I}=vk?QC53mGYzfMx7]0A;G7*#rxoQ+B4xETHd!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cwpudp_';

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
