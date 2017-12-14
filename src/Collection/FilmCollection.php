<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Film;

final class FilmCollection
{
    private $films;

    public function __construct(Film ...$films)
    {
        $this->films = $films;
    }

    public function getFilms(): array
    {
        return $this->films;
    }
}
