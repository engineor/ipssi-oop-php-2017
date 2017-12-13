<?php

declare(strict_types=1);

namespace Application\Helper;

trait SlugifyHelper
{
    public function slugify(string $term)
    {
        return strtolower(str_replace(' ', '-', $term));
    }
}
