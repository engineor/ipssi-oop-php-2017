<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\FilmCollection;
use Application\Entity\Film;

final class FilmRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll() : FilmCollection
    {
        $result = $this->pdo->query('SELECT id, title FROM films');
        $films = [];
        while ($film = $result->fetch()) {
            $films[] = new Film($film['title']);
        }
        return new FilmCollection(...$films);
    }
}
