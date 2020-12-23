<?php

namespace Core\Register;

use DI\Container;
use DI\ContainerBuilder;
use RuntimeException;
use Slim\App;

class System
{

    /** @var App $slim */
    private static $slim;

    /** @var ContainerBuilder $slim */
    private static $container;

    /**
     * @param App $app
     * @throws RuntimeException
     **/
    public static function register(App $app)
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
