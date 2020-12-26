<?php

namespace Middlewares;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Hook
{

    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response  = $handler->handle($request);

        if (!$response->hasHeader("Content-Type"))
            $response = $response->withHeader("Content-Type", "application/json");

        return $response
            ->withHeader("Timestamp", date("Y-m-d H:i:s"));
    }
}
