<?php

namespace DI\Data;

use Data\Repository\TestRepo;

class TestRepoImpl implements TestRepo
{

    public function hello(string $username)
    {
        return "Hello $username";
    }
}
