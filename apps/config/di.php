<?php

namespace Apps\Config;

use Core\Register\Database;
use Data\Repository\ServerRepo;
use Data\Repository\TestRepo;
use DI\Data\ServerRepoImpl;
use DI\Data\TestRepoImpl;

use function DI\create;

// Inject Dependencies
return [
    Database::class => create(Database::class)->constructor($database['default']),
    TestRepo::class => create(TestRepoImpl::class),
    ServerRepo::class => create(ServerRepoImpl::class)
];
