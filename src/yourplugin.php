<?php

/**
 * Plugin Name: Your Plugin
 * Author: Your Company
 * Author URI: https://www.yourcompany.com
 * Description: This is a description of your plugin.
 * Version: 1.0.0
 * Requires PHP: 8.2
 */

declare(strict_types=1);

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
$dotenv = Dotenv::createUnsafeImmutable(__DIR__, '.env', false);
if (file_exists(__DIR__.'/.env')) {
    $dotenv->load();
}

/**
 * Set up configuration
 */
Config::define('WP_ENV', env('APP_ENV', 'production'));
Config::define('YOUR_PLUGIN_FILE', __FILE__);
Config::define('YOUR_PLUGIN_URL', plugin_dir_url(__FILE__));
Config::apply();

/**
 * Boot Acorns
 */
$instance = Bootloader::getInstance();
$instance->boot();
