<?php

/* Load database info and local development parameters
----------------------------------------- */
if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
    include( __DIR__ . '/wp-config-local.php' );
}
if(!defined('WP_LOCAL_DEV')) define( 'WP_LOCAL_DEV', false );
if(!defined('DB_NAME')) define( 'DB_NAME', basename(__DIR__) );
if(!defined('DB_USER')) define( 'DB_USER', 'root' );
if(!defined('DB_PASSWORD')) define( 'DB_PASSWORD', '' );
if(!defined('DB_HOST')) define( 'DB_HOST', 'localhost' );

if(!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8');
if(!defined('DB_COLLATE')) define('DB_COLLATE', '');
$table_prefix  = 'wp_';

define( 'DISALLOW_FILE_MODS', true ); // disable updates on live site

/* overrides when no local config exists
----------------------------------------- */
if ( !defined( 'WP_LOCAL_DEV' ) )
{
	if(!defined('WP_DEBUG')) define('WP_DEBUG', true);
	if(!defined('WP_DEBUG_LOG')) define('WP_DEBUG_LOG', true);
	if(!defined('WP_DEBUG_DISPLAY')) define('WP_DEBUG_DISPLAY', true);
}

/* Authentication Unique Keys and Salts. Generate new from: https://api.wordpress.org/secret-key/1.1/salt/
----------------------------------------- */
if(!defined('AUTH_KEY')) define('AUTH_KEY', '');
if(!defined('SECURE_AUTH_KEY')) define('SECURE_AUTH_KEY', '');
if(!defined('LOGGED_IN_KEY')) define('LOGGED_IN_KEY', '');
if(!defined('NONCE_KEY')) define('NONCE_KEY', '');
if(!defined('AUTH_SALT')) define('AUTH_SALT', '');
if(!defined('SECURE_AUTH_SALT')) define('SECURE_AUTH_SALT', '');
if(!defined('LOGGED_IN_SALT')) define('LOGGED_IN_SALT', '');
if(!defined('NONCE_SALT')) define('NONCE_SALT', '');

/* Define home and site url's
----------------------------------------- */
if(!defined('WP_SITEURL')) define('WP_SITEURL', 'https://' . $_SERVER['SERVER_NAME'] . '/wp');
if(!defined('WP_HOME')) define('WP_HOME',    'https://' . $_SERVER['SERVER_NAME']);

/* Define home and site url's
----------------------------------------- */
if(!defined('WP_MEMORY_LIMIT')) define('WP_MEMORY_LIMIT', '32M');
@ini_set('post_max_size', '32M');
@ini_set('upload_max_filesize', '32M');

/* Custom Content Directory
----------------------------------------- */
if(!defined('WP_CONTENT_DIR')) define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
if(!defined('WP_CONTENT_URL')) define( 'WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/content' );

/* Uploads
----------------------------------------- */
//if(!defined('UPLOADS')) define('UPLOADS', __DIR__ . '/u');
//if(!defined('UPLOADS_URL')) define('UPLOADS_URL', '/u');

/* Bootstrap WordPress
----------------------------------------- */
if ( !defined( 'ABSPATH' ) )
    define( 'ABSPATH', __DIR__ . '/wp/' );
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
