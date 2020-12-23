<?php

namespace DI\Data;

use Data\Repository\ServerRepo;
use PhpXmlRpc\Client;
use Ripcord\Ripcord;

class ServerRepoImpl implements ServerRepo
{

    private $url = "improve.pqm.co.id";
    private $prefix = "/xmlrpc/2/common";
    private $database = "db_klms";
    private $username = "admin@pqm.co.id";
    private $password = "Klms123#";

    public function login()
    {
        $ripcord = Ripcord::client("{$this->url}{$this->prefix}");
        var_dump($ripcord->_url);
        $common = new Client("{$this->url}{$this->prefix}");
        var_dump($common->verifyhost);
    }
}
