<?php

declare(strict_types=1);

namespace Application\Controller;

final class FilmController
{
    public function indexAction() : string
    {
        ob_start();
        include __DIR__.'/../../views/film.phtml';
        return ob_get_clean();
    }
}
