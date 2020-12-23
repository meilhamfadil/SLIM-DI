<?php

namespace Apps\Controllers;

use Data\Repository\TestRepo;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class TestController
{

    /** @Inject @var TestRepo */
    protected $repo;

    public function test(Response $response): Response
    {
        $payload = $this->repo->hello('Ilham Fadil');

        $response->getBody()->write(json_encode([$payload]));
        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}
