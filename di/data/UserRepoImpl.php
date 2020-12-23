<?php

namespace DI\Data;

use Datas\UserRepo;
use Libs\Database;

class UserRepoImpl implements UserRepo
{
    /** @var Database $db */
    public $db;

    public function get(string $id = null)
    {
        if (is_null($id))
            return $this->db->table("user")->getAll();
        return $this->db->table("user")->where("id", $id)->get();
    }

    public function add(array $user)
    {
    }

    public function remove(string $id)
    {
    }

    public function change(string $id, array $user)
    {
    }
}
