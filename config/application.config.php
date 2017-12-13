<?php

use Application\Controller\IndexController;
use Application\Controller\LecturerController;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\RouterFactory;
use Application\Repository\LecturerRepository;
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
        LecturerController::class => function(ContainerInterface $container) {
            $databaseConnection = $container->get(PDO::class);
            return new LecturerController($databaseConnection);
        },
        LecturerRepository::class => function(ContainerInterface $container) {
            $databaseConnection = $container->get(PDO::class);
            return new LecturerRepository($databaseConnection);
        },
        IndexController::class => function(ContainerInterface $container) {
            $lecturerRepository = $container->get(LecturerRepository::class);
            return new IndexController($lecturerRepository);
        },
        PDO::class => function(ContainerInterface $container) {
            $dbConn = new \PDO(
                'mysql:host=database;dbname=demo',
                'demo',
                'demo'
            );

            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConn;
        }
    ],
];
