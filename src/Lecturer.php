<?php

declare(strict_types=1);

namespace Application;

use Application\Helper\SlugifyHelper;

class Lecturer
{
    use SlugifyHelper;

    private $name;

    private $lectures;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->lectures = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function slugifiedName()
    {
        return $this->slugify($this->getName());
    }

    public function getLectures(): array
    {
        return $this->lectures;
    }

    public function is(string $name) : bool
    {
        return $name === $this->name;
    }
}
