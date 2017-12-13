<?php

declare(strict_types=1);

namespace Demo;

use Application\Collection\LecturerCollection;
use Application\Entity\Lecturer;

final class Db
{
    public static function provideLecturers() : LecturerCollection
    {
        return new LecturerCollection(...[
            new Lecturer('Thomas', 'Dutrion'),
            new Lecturer('Cyrille', 'Grandval'),
        ]);
    }
}
