<?php

/**
 * tokoo functions and definitions
 *
 * @package Multimarket
 */

/* Define static constant */
define( 'MULTIMARKET_THEME_DIR', get_template_directory() );
define( 'MULTIMARKET_THEME_URI', get_template_directory_uri() );
define( 'MULTIMARKET_THEME_APP_DIR', MULTIMARKET_THEME_DIR . '/app' );
define( 'MULTIMARKET_THEME_APP_URI', MULTIMARKET_THEME_URI . '/app' );
define( 'MULTIMARKET_THEME_CORE_DIR', MULTIMARKET_THEME_DIR . '/bootstrap/core' );
define( 'MULTIMARKET_THEME_CORE_URI', MULTIMARKET_THEME_URI . '/bootstrap/core' );
define( 'MULTIMARKET_THEME_ASSETS_DIR', MULTIMARKET_THEME_URI . '/assets' );
define( 'MULTIMARKET_THEME_ASSETS_URI', MULTIMARKET_THEME_URI . '/assets' );
define( 'MULTIMARKET_THEME_VERSION', '1.0.13' );
define( 'MULTIMARKET_OPTIMIZE_MODE', true );


/**
 * Initial setup
 *
 * @return void
 * @author tokoo
 **/
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/class-tgm-plugin-activation.php' );
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/plugins.php' );
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/class-autoloaders.php' );
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/libraries/aqua-resize.php' );
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/libraries/media-grabber.php' );
require_once( MULTIMARKET_THEME_DIR . '/bootstrap/setup.php' );

// Setup oneclick demo importer
require_once( MULTIMARKET_THEME_DIR . '/importer/config.php' );
require_once( MULTIMARKET_THEME_DIR . '/importer/after-import.php' );