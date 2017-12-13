<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Lecturer;
use Application\LecturerCollection;
use Application\Repository\LecturerRepository;

class IndexController
{
    /**
     * @var \Application\Repository\LecturerRepository
     */
    private $lecturerRepository;

    public function __construct(LecturerRepository $lecturerRepository)
    {
        $this->lecturerRepository = $lecturerRepository;
    }

    public function indexAction() : string
    {
        $lecturers = $this->lecturerRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../views/index.phtml';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
