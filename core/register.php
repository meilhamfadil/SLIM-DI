<?php

namespace Core;

use DI\ContainerBuilder;
use RuntimeException;
use Slim\App;

class Register
{

    /** @var App $slim */
    private static $slim;

    /** @var ContainerBuilder $slim */
    private static $container;

    /**
     * @param App $app
     * @throws RuntimeException
     **/
    public static function init(App $app)
    {
        self::$slim = $app;
    }

    /**
     * @return App
     * @throws RuntimeException
     **/
    public static function getInstance()
    {
        return self::$slim;
    }

    /**
     * @param ContainerBuilder $container
     * @throws RuntimeException
     **/
    public static function setContainer(ContainerBuilder $container)
    {
        self::$container = $container;
    }

    /**
     * @return ContainerBuilder
     * @throws RuntimeException
     **/
    public static function getContainer()
    {
        return self::$container;
    }
}
