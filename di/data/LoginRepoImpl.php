<?php

namespace DI\Data;

use Datas\LoginRepo;
use Libs\Database;

class LoginRepoImpl implements LoginRepo
{

    private $candidate = null;

    /** @var Database $db  */
    protected $db;

    public function getCandidate($username)
    {
        $this->candidate = $this->db->table("user")
            ->select("id, password")
            ->where("username", $username)
            ->get();

        return $this->candidate;
    }

    public function getUser()
    {
        return $this->db->table("user")
            ->select("id, username, detail")
            ->where("id", $this->candidate->id)
            ->get();
    }
}
