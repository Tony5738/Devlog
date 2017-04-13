<?php

namespace App\Repositories;


use App\Link;

class LinkRepository extends ResourceRepository
{


    public function __construct(Link $link)
    {
        $this->model = $link;
    }

    public function updateLinkOnPost($post, Array $inputs)
    {


        if($post->link != null)
        {
            unset($inputs['post_id']);
            $this->update($post->link->id, $inputs);
        }
        else{
            $this->store($inputs);
        }
    }



}