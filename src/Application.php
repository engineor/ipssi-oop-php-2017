<?php

declare(strict_types=1);

namespace Application;

use Application\Router\Router;

class Application
{
    private $container;
    private $router;

    public function __construct()
    {
        $config = require  __DIR__.'/../config/application.config.php';
        $this->container = new Container($config);

        $this->router = $this->container->get(Router::class);
    }
}
