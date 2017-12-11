<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Db;
use Application\LecturerCollection;

class IndexController
{
    public function indexAction() : string
    {
        /** @var LecturerCollection $lecturers */
        $lecturers = Db::provideLecturers();

        ob_start();
        include __DIR__.'/../../views/index.phtml';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
