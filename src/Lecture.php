<?php

declare(strict_types=1);

namespace Application;

use Application\Helper\SlugifyHelper;

class Lecture
{
    use SlugifyHelper;

    private $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function slugifiedName()
    {
        return $this->slugify($this->getTitle());
    }
}
