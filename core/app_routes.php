<?php

namespace Apps\Config;

use Core\Register;
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface
};
use Psr\Log\LoggerInterface;
use Slim\Middleware\ContentLengthMiddleware;
use Throwable;

$app = Register::getInstance();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

if (ENVIRONMENT == PRODUCTION)
    $app->add(new ContentLengthMiddleware());

$app->get('/', function (Response $response) {
    $response->withStatus(403);
    $response->getBody()->write("403 Forbidden");
    return $response;
});

$customErrorHandler = function (
    ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $payload = ['error' => $exception->getMessage()];
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write(
        json_encode($payload, JSON_UNESCAPED_UNICODE)
    );
    return $response;
};
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

require APPSPATH . "/routes.php";
