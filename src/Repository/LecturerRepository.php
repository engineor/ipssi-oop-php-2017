<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Lecturer;
use Application\LecturerCollection;
use PDO;

class LecturerRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : LecturerCollection
    {
        $result = $this->database->query('SELECT firstname, lastname FROM lecturers;');
        $lecturers = [];
        while ($record = $result->fetch(\PDO::FETCH_ASSOC)) {
            $lecturers[] = new Lecturer("{$record['firstname']} {$record['lastname']}");

        }
        return new LecturerCollection(...$lecturers);
    }
}
