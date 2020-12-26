<?php

namespace Libs;

use DateTime;
use Exception;
use Firebase\JWT\JWT as FJWT;

class JWT
{

    private $key, $timeout;

    public function encode($payload): String
    {
        $payload = (object) $payload;
        $payload->timeout = date('YmdHis', strtotime($this->timeout));
        return FJWT::encode($payload, $this->key);
    }

    public  function decode($token): object
    {
        $payload = FJWT::decode($token, $this->key, array('HS256'));
        $now = new DateTime();
        $expired = new DateTime($payload->timeout);
        if ($now > $expired)
            throw new Exception("Token Expired", 408);
        return $payload;
    }
}
