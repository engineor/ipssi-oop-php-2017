<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Collection\FilmCollection;
use Application\Entity\Film;

final class FilmController
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function indexAction() : string
    {
        $result = $this->pdo->query('SELECT id, title FROM films');
        $films = [];
        while ($film = $result->fetch()) {
            $films[] = new Film($film['title']);
        }
        $films = new FilmCollection(...$films);

        ob_start();
        include __DIR__.'/../../views/film.phtml';
        return ob_get_clean();
    }
}
