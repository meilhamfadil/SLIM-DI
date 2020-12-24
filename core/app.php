<?php

use Core\Register;
use DI\Bridge\Slim\Bridge;

// Require Autoload
require_once VENDORPATH . "/autoload.php";

// Require Constant
require_once APPSPATH . "/config/constants.php";

// Require Database
require_once APPSPATH . "/config/database.php";

// Require Keys
require_once APPSPATH . "/config/keys.php";

// Require Loader
require_once APPSPATH . "/config/loader.php";

// Require Dependencies
require_once COREPATH . "/app_dependencies.php";

// Init Apps
$containerBuilder = Register::getContainer();
$container = $containerBuilder->build();
$app = Bridge::create($container);
Register::init($app);

// Require Routes
require_once COREPATH . "/app_routes.php";

$app->run();
