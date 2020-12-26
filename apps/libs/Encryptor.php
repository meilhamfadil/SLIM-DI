<?php

namespace Libs;

use Defuse\Crypto\Crypto;
use Exception;

class Encryptor
{

    private $key;

    public function encrypt($text)
    {
        return Crypto::encryptWithPassword($text, $this->key);
    }

    public function decrypt($text)
    {
        try {
            return Crypto::decryptWithPassword($text, $this->key);
        } catch (Exception $e) {
            return "";
        }
    }
}
