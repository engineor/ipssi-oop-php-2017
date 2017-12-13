<?php

declare(strict_types=1);

namespace Application\Factory;

use PDO;
use Psr\Container\ContainerInterface;

final class PdoConnectionFactory
{
    public function __invoke(ContainerInterface $container) : PDO
    {
        $dbConn = new PDO(
            'mysql:host=database;dbname=demo',
            'demo',
            'demo'
        );
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $dbConn;
    }
}
