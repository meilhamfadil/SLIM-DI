<?php

namespace Apps\Config;

use Core\Register\System;
use Psr\Http\Message\{
    ResponseInterface as Response
};
use Slim\Middleware\ContentLengthMiddleware;

$app = System::getInstance();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);
// $app->add(new ContentLengthMiddleware());

$app->get('/', function (Response $response) {
    $response->withStatus(403);
    $response->getBody()->write("403 Forbidden");
    return $response;
});

require APPSPATH . "/config/routes.php";
