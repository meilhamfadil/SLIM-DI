<?php

namespace Apps;

use Apps\Controllers\OddoController;
use Apps\Controllers\TestController;
use Core\Register\System;

// Get App
$app = System::getInstance();

// Initial Route
$app->get('/test', [TestController::class, 'test']);
$app->get('/oddo', [OddoController::class, 'oddo']);
