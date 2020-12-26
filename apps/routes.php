<?php

namespace Apps;

use Controllers\AuthController;
use Controllers\ProfileController;
use Controllers\UserController;
use Core\Register;
use Middlewares\AuthMiddleware;
use Middlewares\Hook;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

// Get App
$app = Register::getInstance();

// Initial Route
$app->post('/auth', [AuthController::class, 'auth']);

$app->get('/profile', [ProfileController::class, 'get'])
    ->add(AuthMiddleware::class);

$app->group('/user', function (Group $group) {
    $group->get('/get', [UserController::class, 'get']);
})->add(AuthMiddleware::class);


$app->add(new Hook());
