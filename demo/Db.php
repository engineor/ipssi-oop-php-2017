<?php

declare(strict_types=1);

namespace Demo;

use Application\Lecturer;
use Application\LecturerCollection;

class Db
{
    public static function provideLecturers() : LecturerCollection
    {
        return new LecturerCollection(...[
            new Lecturer('Thomas Dutrion'),
            new Lecturer('Cyrille Grandval'),
        ]);
    }
}
