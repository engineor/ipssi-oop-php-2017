<?php

declare(strict_types=1);

namespace Application\Controller;

class ErrorController
{
    /**
     * @var \Exception
     */
    private $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    public function error404Action() : string
    {
        ob_start();
        include __DIR__.'/../../views/error404.phtml';
        return ob_get_clean();
    }

    public function error500Action()
    {
        ob_start();
        include __DIR__.'/../../views/error500.phtml';
        return ob_get_clean();
    }
}
