<?php

declare(strict_types=1);

use Application\LecturerCollection;
use Application\Lecturer;

return new LecturerCollection(...[
    new Lecturer('Thomas Dutrion'),
    new Lecturer('Cyrille Grandval'),
]);
