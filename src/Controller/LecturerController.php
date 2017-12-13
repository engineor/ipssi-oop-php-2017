<?php

declare(strict_types=1);

namespace Application\Controller;

use Demo\Db;
use Application\Lecturer;
use Application\LecturerCollection;

class LecturerController
{
    public function indexAction() : string
    {
        /** @var LecturerCollection $lecturers */
        $lecturers = Db::provideLecturers();

        $selectedLecturer = null;

        foreach ($lecturers->getLecturers() as $lecturer) {
            /** @var $lecturer Lecturer */
            $name = $_GET['lecturer'];
            if (!$lecturer->is($name)) {
                continue;
            }
            $selectedLecturer = $lecturer;
        }

        if ($selectedLecturer === null) {
            throw new \Exception('Lecturer not found');
        }

        ob_start();
        include __DIR__.'/../../views/lecturer.phtml';
        return ob_get_clean();
    }
}
