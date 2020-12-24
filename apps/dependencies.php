<?php

namespace Apps\Config;

use Datas\LoginRepo;
use Datas\UserRepo;
use DI\Data\LoginRepoImpl;
use DI\Data\UserRepoImpl;
use Libs\Database;
use Libs\Encryptor;

use function DI\create;
use function DI\get;

// Inject Dependencies
return [
    Encryptor::class => create(Encryptor::class)->property('key', $keys['app_key']),
    Database::class => create(Database::class)->constructor($database['default']),
    UserRepo::class => create(UserRepoImpl::class)->property('db', get(Database::class)),
    LoginRepo::class => create(LoginRepoImpl::class)->property('db', get(Database::class))
];
