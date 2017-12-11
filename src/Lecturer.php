<?php

declare(strict_types=1);

namespace Application;

class Lecturer
{
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

    public function getLectures(): array
    {
        return $this->lectures;
    }

    public function is(string $name) : bool
    {
        return $name === $this->name;
    }
}
