<?php

namespace Datas\Models;

class Credential
{
    public $id;
    public $name;
    public $detail;

    public function __construct($user)
    {
        $this->id = $user->id;
        $this->name = $user->username;
        $this->detail = $user->detail;
    }
}
