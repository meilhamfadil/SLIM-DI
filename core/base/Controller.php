<?php

namespace Core\Base;

use Libs\Encryptor;
use Libs\JWT;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

class Controller
{
    /** @Inject @var Encryptor $criptor */
    protected $criptor;

    /** @Inject @var JWT $jwt */
    protected $jwt;

    /** @var ResponseInterface $output */
    public $output = null;

    public function success($array): ResponseInterface
    {
        if ($this->output == null)
            $this->output = new Response();

        $this->output->getBody()->write(json_encode($array));
        return $this->output->withStatus(200);
    }

    public function failure(string $message, int $code = 400, array $detail = array()): ResponseInterface
    {
        if ($this->output == null)
            $this->output = new Response();

        $mutableOutput = ["message" => $message];

        if (!empty($detail))
            $mutableOutput['detail'] = $detail;

        $this->output->getBody()->write(json_encode($mutableOutput));
        return $this->output->withStatus($code);
    }
}
