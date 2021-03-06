<?php

define('ENVIRONMENT', isset($_SERVER['API_ENV']) ? $_SERVER['API_ENV'] : 'development');
switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

// Declare Folder
$appsFolder = __DIR__ . "/../apps";
$coreFolder =  __DIR__ . "/../core";
$vendorFolder =  __DIR__ . "/../vendor";

define('APPSPATH', $appsFolder);
define('COREPATH', $coreFolder);
define('VENDORPATH', $vendorFolder);

require COREPATH . "/app.php";
