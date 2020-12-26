<?php

namespace Controllers;

use Core\Base\Controller;
use Datas\UserRepo;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class UserController extends Controller
{
    /** @Inject @var UserRepo $userRepo */
    protected $userRepo;

    public function get($credential, Response $response): Response
    {
        $payload = $this->userRepo->get();
        return $this->success([
            'credential' => $credential,
            'data' => $payload
        ]);
    }
}
