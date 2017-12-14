<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Collection\FilmCollection;
use Application\Entity\Film;
use Application\Exception\FilmNotFoundException;
use Application\Repository\FilmRepository;

final class ShowFilmController
{
    /**
     * @var FilmRepository
     */
    private $filmRepository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->filmRepository = $filmRepository;
    }

    public function indexAction() : string
    {
        try {
            $film = $this->filmRepository->get($_GET['name'] ?? '');

            ob_start();
            include __DIR__.'/../../../views/film-details.phtml';
            return ob_get_clean();
        } catch (FilmNotFoundException $exception) {
            return (new ErrorController($exception))->error404Action();
        }
    }
}
