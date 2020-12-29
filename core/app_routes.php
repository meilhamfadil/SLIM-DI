<?php

namespace Apps\Config;

use Core\Register;
use Libs\HttpErrorHandler;
use Libs\ShutdownHandler;
use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface
};
use Psr\Log\LoggerInterface;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\Middleware\ContentLengthMiddleware;
use Throwable;

$app = Register::getInstance();

if (ENVIRONMENT == PRODUCTION)
    $app->add(new ContentLengthMiddleware());
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->setBasePath("/api/public");

// $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// $callableResolver = $app->getCallableResolver();
// $responseFactory = $app->getResponseFactory();

// $serverRequestCreator = ServerRequestCreatorFactory::create();
// $request = $serverRequestCreator->createServerRequestFromGlobals();

// $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);
// $shutdownHandler = new ShutdownHandler($request, $errorHandler, true);

// $customErrorHandler = function (
//     ServerRequestInterface $request,
//     Throwable $exception,
//     bool $displayErrorDetails,
//     bool $logErrors,
//     bool $logErrorDetails
// ) use ($app) {
//     $payload = ['error' => $exception->getMessage()];
//     $response = $app->getResponseFactory()->createResponse();
//     $response->getBody()->write(
//         json_encode($payload, JSON_UNESCAPED_UNICODE)
//     );
//     return $response;
// };
// $errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->get('/', function (Response $response) {
    $response->withStatus(403);
    $response->getBody()->write("403 Forbidden");
    return $response;
});

$app->get('/info', function () {
    phpinfo();
});

require APPSPATH . "/routes.php";