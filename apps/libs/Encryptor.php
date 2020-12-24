<?php

namespace Libs;

use Defuse\Crypto\Crypto;

class Encryptor
{

    private $key;

    public function encrypt($text)
    {
        return Crypto::encryptWithPassword($text, $this->key);
    }

    public function decrypt($text)
    {
        return Crypto::decryptWithPassword($text, $this->key);
    }
}
