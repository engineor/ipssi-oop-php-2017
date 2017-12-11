<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Exception;

class Router
{

    /**
     * Dispatch a request to a controller and fetch the html view
     *
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function dispatch(string $requestUri) : string
    {
        $requestedClass = IndexController::class;
        if (strpos($requestUri, '.') !== false) {
            $requestedFile = substr(
                $requestUri,
                0,
                strpos($requestUri, '.')
            );
            if ($requestedFile[0] === '/') {
                $requestedFile = substr($requestedFile, 1);
            }

            $requestedFile = ucfirst($requestedFile);
            $requestedClass = "\Application\Controller\\{$requestedFile}Controller";
        }

        if (!class_exists($requestedClass)) {
            throw new Exception('Page not found', 404);
        }
        return (new $requestedClass())->indexAction();
    }
}
