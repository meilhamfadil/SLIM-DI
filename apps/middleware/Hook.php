<?php

namespace Middlewares;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class Hook
{

    public static function hook(Request $request, Response $response, callable $next)
    {
        $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Timestamp', date("Y-m-d H:i:s"));
        return  $next($request, $response);
    }
}
