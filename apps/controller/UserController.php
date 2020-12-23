<?php

namespace Controllers;

use Datas\UserRepo;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class UserController
{

    /** @Inject @var UserRepo $repo */
    protected $repo;

    public function get(Response $response): Response
    {
        $payload = $this->repo->get();

        $response->getBody()->write(json_encode($payload));
        return $response;
    }
}
