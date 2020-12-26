<?php

namespace Controllers;

use Core\Base\Controller;
use Datas\LoginRepo;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class AuthController extends Controller
{

    /** @Inject @var LoginRepo $login */
    protected $login;

    public function auth(Request $request): Response
    {
        // Init Request Body
        $body = (object) $request->getParsedBody();
        $bUsername = $body->username;
        $bPassword = $body->password;

        // Get Candidate
        $candidate = $this->login->getCandidate($bUsername);

        // Check is candidate exist
        if (empty($candidate))
            return $this->failure("User not Found", 404);

        // Check is password match
        if ($this->criptor->decrypt($candidate) != $bPassword)
            return $this->failure("Password not Match", 400);

        // Get User
        $user = $this->login->getUser();
        if (empty($user))
            return $this->failure("User not Found", 404);

        $user = ["id" => $user->id];
        $user = $this->jwt->encode($user);
        $user = $this->criptor->encrypt($user);

        return $this->success(["token" => $user]);
    }
}
