<?php
/**
 * Plugin Name: Your Plugin
 * Author: Your Company
 * Author URI: https://www.yourcompany.com
 * Description: This is a description of your plugin.
 * Version: 1.0.0
 * Requires PHP: 8.1
 */

use Dotenv\Dotenv;
use Roots\Acorn\Bootloader;
use Roots\WPConfig\Config;

/**
 * Require dependencies
 */
require_once plugin_dir_path(__FILE__).'vendor/autoload.php';

/**
 * Load env vars
 */
$dotenv = Dotenv::createUnsafeImmutable(__DIR__.'/src', '.env', false);
if (file_exists(__DIR__ . '/src/.env')) {
    $dotenv->load();
}

/**
 * Set up configuration
 */
Config::define('ACORN_BASEPATH', rtrim(plugin_dir_path(__FILE__).'src', '/'));
Config::define('WP_ENV', env('APP_ENV', 'production'));
Config::define('YOUR_PLUGIN_FILE', __FILE__);
Config::define('YOUR_PLUGIN_URL', plugin_dir_url(__FILE__));
Config::apply();

/**
 * Acorn config
 */
//putenv('APP_RUNNING_IN_CONSOLE=false'); // Uncomment to disable console mode in production. When console mode is enabled, the WP-Cron will not work.
putenv('ACORN_ENABLE_EXPIRIMENTAL_ROUTER=true');

/**
 * Boot Acorns
 */
$instance = Bootloader::getInstance();
$instance->boot();