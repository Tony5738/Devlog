<?php

namespace App\Repositories;


use App\Link;

class LinkRepository extends ResourceRepository
{


    public function __construct(Link $link)
    {
        $this->model = $link;
    }



}