<?php

use Application\Controller\IndexController;
use Application\Controller\LecturerController;
use Application\Factory\DateTimeImmutableFactory;
use Application\Factory\DbConfigProviderFactory;
use Application\Factory\IndexControllerFactory;
use Application\Factory\LecturerControllerFactory;
use Application\Factory\LecturerRepositoryFactory;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\PdoConnectionFactory;
use Application\Factory\RouterFactory;
use Application\Provider\DbConfigProvider;
use Application\Repository\LecturerRepository;
use Application\Router\ParseUriHelper;
use Application\Router\Router;
use Cinema\Controller\FilmController;
use Cinema\Controller\ShowFilmController;
use Cinema\Repository\FilmRepository;
use Psr\Container\ContainerInterface;

return [
    'factories' => [
        ParseUriHelper::class => ParseUriHelperFactory::class,
        Router::class => RouterFactory::class,
        DateTimeInterface::class => DateTimeImmutableFactory::class,
        LecturerController::class => LecturerControllerFactory::class,
        FilmController::class => function(ContainerInterface $container) {
            $conn = $container->get(FilmRepository::class);
            return new FilmController($conn);
        },
        FilmRepository::class => function(ContainerInterface $container) {
            $pdo = $container->get(PDO::class);
            return new FilmRepository($pdo);
        },
        ShowFilmController::class => function(ContainerInterface $container) {
            $filmRepository = $container->get(FilmRepository::class);
            return new ShowFilmController($filmRepository);
        },
        IndexController::class => IndexControllerFactory::class,
        LecturerRepository::class => LecturerRepositoryFactory::class,
        PDO::class => PdoConnectionFactory::class,
        DbConfigProvider::class => DbConfigProviderFactory::class,
    ],
];
