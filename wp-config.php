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
define( 'DB_NAME', 'blogPromo' );

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
define( 'AUTH_KEY',         'mKR33ois6`2UZIC-_J[Q8c!;sdlOJa_s;RgN~1)`W=WjyboIxfsB+}<(QS>6hn=7' );
define( 'SECURE_AUTH_KEY',  'mylB3uyu)igFW?(_+ks5ed`qD!LxXjo*oWJ_hyvq$fG~yt}n.V&{(8O ~8B$U:E;' );
define( 'LOGGED_IN_KEY',    'l<xp1:n42yL25he:*#YcHCGR{<o>+8$6N,2EAe4IKL0T$QAj/(9lW>O=.$8n!`Z&' );
define( 'NONCE_KEY',        'RXJi4=q}5%~A{aO(XL/O5b}YD@sG,iP4lbBW#8 ZS-;55VR/w!aJ1UIxO.Y=WF4 ' );
define( 'AUTH_SALT',        '.[@j3,Uy>^E3fq@th, 8=NEBqSbrep!tXdF4L;hgBF^vdM?p^3,UhywG!i(VL]`>' );
define( 'SECURE_AUTH_SALT', 'q5cE>BcIN8|y2]F.vbci@vJy.^0HSCU/s)g:VAvSq#fH@}|}/mw!4U?XYq+t]*<N' );
define( 'LOGGED_IN_SALT',   'y*UR}TUj.%oJx3Z&D!=RJQxLK4)0qY2aL9}J/Qu4aD![`BT=DJeyUM_+V,Sk2#95' );
define( 'NONCE_SALT',       ':3oR9 Phty39o-%I{5pV,IW+#du[5:[zXnHukYWL!Mc=?~jFOSZwK>_y$-o1@&uY' );

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
