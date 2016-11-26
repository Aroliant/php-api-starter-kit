<?php

if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__.'/../vendor/autoload.php';

$settings = require 'settings.php';

//Settings will be retrived from the init file

$app = new \Slim\App($settings);

// Set up dependencies
require 'dependencies.php';

require 'middleware.php';