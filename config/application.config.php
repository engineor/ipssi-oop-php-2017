<?php

use Application\Router\ParseUriHelper;
use Application\Router\ParseUriSlashNotationHelper;
use Application\Router\Router;

return [
    ParseUriHelper::class => new ParseUriSlashNotationHelper(),
    Router::class => new Router(new ParseUriSlashNotationHelper()),
];
