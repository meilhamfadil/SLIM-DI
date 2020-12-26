<?php

namespace Controllers;

use Core\Base\Controller;
use Datas\Models\Credential;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class ProfileController extends Controller
{
    public function get(Credential $credential):Response
    {
        return $this->success($credential);
    }
}
