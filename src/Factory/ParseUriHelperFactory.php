<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Router\ParseUriHelper;
use Application\Router\ParseUriSlashNotationHelper;
use Application\Router\ParseUriStaticNameHelper;
use Psr\Container\ContainerInterface;

class ParseUriHelperFactory
{
    public function __invoke(ContainerInterface $container) : ParseUriHelper
    {
        return new ParseUriStaticNameHelper();
    }
}
