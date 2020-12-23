<?php

namespace Data\Repository;

use RuntimeException;

interface TestRepo
{
    /**
     * @param string $var Description
     * @return string
     * @throws RuntimeException
     **/
    public function hello(string $username);
}
