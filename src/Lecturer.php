<?php

declare(strict_types=1);

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
}
