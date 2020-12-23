<?php

namespace Apps\Config;

use Datas\UserRepo;
use DI\Data\UserRepoImpl;
use Libs\Database;

use function DI\create;
use function DI\get;

// Inject Dependencies
return [
    Database::class => create(Database::class)->constructor($database['default']),
    UserRepo::class => create(UserRepoImpl::class)->property("db", get(Database::class)),
];
