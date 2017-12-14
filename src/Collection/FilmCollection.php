<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Film;
use ArrayIterator;
use Iterator;
use IteratorIterator;

final class FilmCollection extends IteratorIterator implements Iterator
{
    public function __construct(Film ...$films)
    {
        parent::__construct(new ArrayIterator($films));
    }

    public function current() : ?Film
    {
        return parent::current();
    }
}
