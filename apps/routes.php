<?php

namespace Apps;

use Controllers\AuthController;
use Controllers\ProfileController;
use Controllers\UserController;
use Core\Register;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Middlewares\AuthMiddleware;
use Middlewares\Hook;
use Psr\Http\Message\ResponseInterface;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

// Get App
$app = Register::getInstance();

// Initial Route
$app->post('/auth', [AuthController::class, 'auth']);

$app->get('/registerFile', function (ResponseInterface $response) {
    sleep(1);
    fopen('file-' . date('YmdHis') . '.temp', 'w');
    $response->getBody()->write("OK");
    return $response;
});

$app->get('/profile', [ProfileController::class, 'get'])
    ->add(AuthMiddleware::class);

$app->group('/user', function (Group $group) {
    $group->get('/get', [UserController::class, 'get']);
})->add(AuthMiddleware::class);


$app->add(new Hook());

register_shutdown_function(function () {
    $response = ob_get_contents();
    $guzzle = new Client([
        'base_uri' => 'http://localhost/api/public/'
    ]);

    if ($response != "OK") {
        $promise = $guzzle->getAsync('registerFile');
        $promise->then(
            function (ResponseInterface $response) {
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        // $promise->wait();
    }
});
