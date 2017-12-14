<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Film;

final class FilmController
{
    public function indexAction() : string
    {
        $films = [
            new Film('Avengers'),
        ];

        ob_start();
        include __DIR__.'/../../views/film.phtml';
        return ob_get_clean();
    }
}
