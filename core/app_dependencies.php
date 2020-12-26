<?php

use Core\Register;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAnnotations(true);
$containerBuilder->useAutowiring(true);
$containerBuilder->addDefinitions(require_once APPSPATH . "/dependencies.php");
Register::setContainer($containerBuilder);
