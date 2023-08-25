<?php

global $wpdb;
$wpdb = new \wpdb( '', '', '', '' );

\define('WP_DEBUG_DISPLAY', true);
\define('DB_HOST', 'mysql');
\define('DB_NAME', 'wordpress');
\define('DB_USER', 'wordpress');
\define('DB_PASSWORD', 'wordpress');
\define('DB_CHARSET', 'utf8');
\define('WP_CONTENT_DIR', __DIR__.'/wordpress/wp-content');

require_once __DIR__ . '/yourplugin.php';