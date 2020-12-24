<?php

namespace Apps;

use Controllers\UserController;
use Core\Register;
use Middlewares\Hook;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

// Get App
$app = Register::getInstance();

// Initial Route
$app->post('/getToken', [UserController::class, 'login']);

$app->group('/user', function (Group $group) {
    $group->get('/get', [UserController::class, 'get']);
});


$app->add(new Hook());
