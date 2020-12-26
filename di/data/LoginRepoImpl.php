<?php

namespace DI\Data;

use Datas\LoginRepo;
use Libs\Database;

class LoginRepoImpl implements LoginRepo
{

    private $candidateID = "";
    private $candidatePassword = "";

    /** @var Database $db  */
    protected $db;

    public function getCandidate($username)
    {
        $candidate = $this->db->table("user")
            ->select("id, password")
            ->where("username", $username)
            ->get();

        if (!empty($candidate)) {
            $this->candidateID = $candidate->id;
            $this->candidatePassword = $candidate->password;
        }

        return $this->candidatePassword;
    }

    public function getUser($id = null)
    {
        return $this->db->table("user")
            ->select("id, username, detail")
            ->where("id", is_null($id) ? $this->candidateID : $id)
            ->get();
    }
}
