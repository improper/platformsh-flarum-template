<?php

$routes = json_decode(base64_decode($_ENV['PLATFORM_ROUTES']), true);
$database = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), true)['database'][0];
$flarumRoute = array_filter($routes, function ($route) {
    return $route['id'] === 'flarum-main-url';
});
$route = array_key_first($flarumRoute);

return [
    'debug' => false, // enables or disables debug mode, used to troubleshoot issues
    'offline' => false, // enables or disables site maintenance mode. This makes your site inaccessible to all users (including admins).
    'database' =>
        [
            'driver' => 'mysql', // the database driver, i.e. MySQL, MariaDB...
            'host' => $database['host'], // the host of the connection, localhost in most cases unless using an external service
            'database' => $database['path'], // the name of the database in the instance
            'username' => $database['username'], // database username
            'password' => $database['password'], // database password
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => 'flarum__', // the prefix for the tables, useful if you are sharing the same database with another service
            'port' => (int)$database['port'], // the port of the connection, defaults to 3306 with MySQL
            'strict' => false,
        ],
    'url' => $route, // the URL installation, you will want to change this if you change domains
    'paths' =>
        [
            'api' => 'api', // /api goes to the API
            'admin' => 'admin', // /admin goes to the admin
        ],
];

