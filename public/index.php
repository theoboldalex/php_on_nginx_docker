<?php

declare(strict_types=1);

use willitscale\Streetlamp\Builders\RouterConfigBuilder;
use willitscale\Streetlamp\RouteBuilder;
use willitscale\Streetlamp\RouteCacheHandlers\NullRouteCacheHandler;
use willitscale\Streetlamp\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$config = (new RouterConfigBuilder())
    ->setRootDirectory(__DIR__ . '/../')
    ->setComposerFile(__DIR__ . '/../composer.json')
    ->setCached(false)
    ->setRethrowExceptions(true)
    ->setExcludedDirectories(['tests'])
    ->setRouteCacheHandler(new NullRouteCacheHandler())
    ->build();

$builder = new RouteBuilder($config);

(new Router($builder))->route();
