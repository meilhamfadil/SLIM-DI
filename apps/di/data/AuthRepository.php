<?php

namespace Features\Auth\Data;

use Core\Register\Database;

class AuthRepository
{

    /** @Inject @var Database */
    private $db;

    public function getCandidate($username)
    {
        return $this->db->table("user")
            ->select("password")
            ->where("username", $username)
            ->get();
    }
}
