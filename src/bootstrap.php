<?php

declare(strict_types=1);

global $wpdb;
$wpdb = new wpdb('', '', '', '');

\define('DB_HOST', 'mysql');
\define('DB_NAME', 'wordpress');
\define('DB_USER', 'wordpress');
\define('DB_PASSWORD', 'wordpress');
\define('DB_CHARSET', 'utf8');

require_once __DIR__.'/yourplugin.php';
