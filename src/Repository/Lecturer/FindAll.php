<?php

declare(strict_types=1);

namespace Application\Repository\Lecturer;

use Application\LecturerCollection;

interface FindAll
{
    public function fetchAll() : LecturerCollection;
}
