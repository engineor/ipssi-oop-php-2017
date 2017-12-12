<?php

use Application\Controller;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\RouterFactory;
use Application\Router\ParseUriHelper;
use Application\Router\Router;
use Psr\Container\ContainerInterface;

return [
    'factories' => [
        ParseUriHelper::class => ParseUriHelperFactory::class,
        Router::class => RouterFactory::class,
        DateTimeInterface::class => function(ContainerInterface $container) {
            return new DateTimeImmutable();
        },
        Controller\LecturerController::class => function() {
            return new Controller\LecturerController();
        },
        Controller\IndexController::class => function() {
            return new Controller\IndexController();
        },
    ],
];
