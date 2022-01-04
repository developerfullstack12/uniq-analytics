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
define( 'DB_NAME', 'i7418498_wp13' );

/** MySQL database username */
define( 'DB_USER', 'i7418498_wp13' );

/** MySQL database password */
define( 'DB_PASSWORD', 'J.HKCTLKev9Rui43jss38' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'aB3GI9YHTKpbTbMoKJ9y4BsMea5X1CLGxl5a6MCh5BPx6h72fZ3yOBauSINDXZ5E');
define('SECURE_AUTH_KEY',  '2LKH5ew5PfF3RmRBs6SlQDZupEynE0r1qnLWEp6I0com69VIqcVjtGGg5U2yxbuf');
define('LOGGED_IN_KEY',    'qwAmdykWQoBGsRBfDTlsYISba6cA36lhqgLcpafu3SPEGcZkPXC3a21FtKAkdMNF');
define('NONCE_KEY',        'habhmqeKY0onn6WWqc8CNrME0qco8EmLJqWfW33Z7ESug8CyKR8liVI5cwt2GkH4');
define('AUTH_SALT',        'gp4RHO3rbSl8FGObVsjtfMLEsk90EnEVVO7soM8tfQO5LJp1ZJZLKqVKM0DcuDFI');
define('SECURE_AUTH_SALT', '6mT71bP9xu5NpiAyukOeYARFdfigksBsdKdmGqzZ4srTNLO9p9rrfRMlGVEtw0ZE');
define('LOGGED_IN_SALT',   'IIaNWZ0Z0cEJG7HO34dHGTVQK1rUrwDu5X35HBf6oMpXtCl7SxQB1AFNl6vvMkUH');
define('NONCE_SALT',       '4dFjx0So3mQPArDMEBP1fTEuWPb3C2LQNTvbU9mKpFqBsm9JSZRJIuasDoeKolPM');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
