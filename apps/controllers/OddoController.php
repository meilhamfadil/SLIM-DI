<?php

namespace Apps\Controllers;

use Data\Repository\ServerRepo;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class OddoController
{

    /** @Inject @var ServerRepo */
    protected $repo;

    public function oddo(Response $response): Response
    {
        $this->repo->login();

        $response->getBody()->write("Hehe");
        return $response;
    }
}
