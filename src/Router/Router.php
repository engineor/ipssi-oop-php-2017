<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\ErrorController;
use Application\Controller\IndexController;
use Application\Exception\InvalidControllerException;
use Exception;

class Router
{
    private $controllerClass = IndexController::class;

    /**
     * Dispatch a request to a controller and fetch the html view
     *
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function dispatch(string $requestUri) : string
    {
        try {
            $this->controllerClass = $this->parseRequestUri($requestUri);
        } catch (Exception $exception) {

        }

        try {
            $this->validateController($this->controllerClass);
        } catch (InvalidControllerException $exception) {
            return (new ErrorController($exception))->error404Action();
        } catch (Exception $exception) {
            return (new ErrorController($exception))->error500Action();
        }

        return (new $this->controllerClass())->indexAction();
    }

    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    private function parseRequestUri(string $requestUri) : string
    {
        if (strpos($requestUri, '.') === false) {
            throw new Exception('L\'URL fournie ne reponds pas au pattern défini');
        }

        $requestedFile = substr(
            $requestUri,
            0,
            strpos($requestUri, '.')
        );

        if ($requestedFile[0] === '/') {
            $requestedFile = substr($requestedFile, 1);
        }

        $requestedFile = ucfirst($requestedFile);

        return "\Application\Controller\\{$requestedFile}Controller";
    }

    /**
     * @param string $controllerClass
     * @throws Exception
     */
    private function validateController(string $controllerClass) : void
    {

        if (!class_exists($controllerClass)) {
            throw new \Application\Exception\InvalidControllerException('Invalid controller specified');
        }
    }
}
