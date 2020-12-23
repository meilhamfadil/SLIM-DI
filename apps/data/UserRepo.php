<?php

namespace Datas;

interface UserRepo
{

    public function get(string $id = null);

    public function add(array $user);

    public function remove(string $id);

    public function change(string $id, array $user);
}
