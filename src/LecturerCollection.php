<?php

declare(strict_types=1);

class LecturerCollection
{
    private $lecturers;

    public function __construct(array $lecturers = [])
    {
        $this->lecturers = $lecturers;
    }

    public function getLecturers(): array
    {
        return $this->lecturers;
    }
}
