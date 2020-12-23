<?php

use Core\Register\System;
use DI\Bridge\Slim\Bridge;

// Require Autoload
require_once VENDORPATH . "/autoload.php";

// Require Constant
require_once APPSPATH . "/config/constants.php";

// Require Database
require_once APPSPATH . "/config/database.php";

// Require Dependencies
require_once BASEPATH . "/dependencies.php";

// Init Apps
$containerBuilder = System::getContainer();
$container = $containerBuilder->build();
$app = Bridge::create($container);
System::register($app);

// Require Routes
require_once BASEPATH . "/routes.php";

$app->run();
