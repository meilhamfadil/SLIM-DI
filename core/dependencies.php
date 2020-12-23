<?php

use Core\Register\System;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAnnotations(true);
$containerBuilder->addDefinitions(require_once APPSPATH . "/config/di.php");
System::setContainer($containerBuilder);
