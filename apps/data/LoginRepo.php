<?php

namespace Datas;

interface LoginRepo
{

    public function getCandidate($username);

    public function getUser();
}
