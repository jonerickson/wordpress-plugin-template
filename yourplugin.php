<?php
/**
 * Plugin Name: Your Plugin
 * Author: Your Company
 * Author URI: https://www.yourcompany.com
 * Description: This is a description of your plugin.
 * Version: 1.0.0
 * Requires PHP: 8.1
 */

use Roots\Acorn\Bootloader;

/**
 * Set constants
 */
\define('WP_ENV', 'local');
\define('ACORN_BASEPATH', rtrim(plugin_dir_path(__FILE__).'src', '/'));
\define('YOUR_PLUGIN_VERSION', '1.0.0');
\define('YOUR_PLUGIN_FILE', __FILE__);
\define('YOUR_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Experimental features
 */
putenv('ACORN_ENABLE_EXPIRIMENTAL_ROUTER=true');

/**
 * Require dependencies
 */
require_once plugin_dir_path(__FILE__).'vendor/autoload.php';

/**
 * Boot Acorns
 */
$instance = Bootloader::getInstance();
$instance->boot();