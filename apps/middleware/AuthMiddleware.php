<?php

namespace Middlewares;

use Core\Base\Controller;
use Datas\LoginRepo;
use Datas\Models\Credential;
use Exception;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class AuthMiddleware extends Controller
{
    /** @Inject @var LoginRepo $login  */
    protected $login;

    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Check Token
        if (!$request->hasHeader(TOKEN))
            return $this->failure("Token Required", 403);

        // Check Token
        $token = $request->getHeader(TOKEN);
        $token = $this->criptor->decrypt(end($token));
        if (empty($token))
            return $this->failure("Invalid Token", 403);

        // Check JWT
        try {
            $payloadToken = $this->jwt->decode($token);
        } catch (Exception $e) {
            $message = $e->getCode() == 408 ? $e->getMessage() : "Invalid Token";
            return $this->failure($message, 403);
        }

        // Check Candidate
        $candidate = $this->login->getUser($payloadToken->id);
        if (empty($candidate))
            return $this->failure("Token Unregistered", 403);

        // Credential Attribute
        $credential = new Credential($candidate);
        $request = $request->withAttribute(CREDENTIAL, $credential);

        // Handle Request
        return $handler->handle($request);
    }
}
