<?php

namespace Controllers;

use Datas\LoginRepo;
use Datas\UserRepo;
use Libs\Encryptor;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response,
    StreamInterface
};

class UserController
{

    /** @Inject @var UserRepo $userRepo */
    protected $userRepo;

    /** @Inject @var LoginRepo $loginRepo */
    protected $loginRepo;

    /** @Inject @var Encryptor $enc  */
    protected $enc;

    public function login(Request $request, Response $response): Response
    {
        $rBody = (object) $request->getParsedBody();
        $bUsername = $rBody->username;
        $bPassword = $rBody->password;

        $candidate = $this->loginRepo->getCandidate($bUsername);

        if (empty($candidate)) {
            $response->getBody()->write(json_encode(["message" => "User not Found"]));
        } else {
            $dcrPassword = $this->enc->decrypt($candidate->password);
            if ($dcrPassword != $bPassword) {
                $response->getBody()->write(json_encode(["message" => "Password not Match"]));
            } else {
                $user = $this->loginRepo->getUser();
                $response->getBody()->write(json_encode($user));
            }
        }

        return $response;
    }

    public function get(Response $response): Response
    {
        $payload = $this->userRepo->get();

        $response->getBody()->write(json_encode($payload));
        return $response;
    }
}
