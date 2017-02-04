<?php

namespace App\Repositories;

use App\User;

class UserRepository extends ResourceRepository{


    public function __construct(User $user)
    {
        $this-> model = $user;
    }

    private function queryGuest()
    {

        return $this->model->whereHas('role',function($q)
        {
            $q->where('name','=','guest');
        })

            ->orderBy('name');

    }

    public function getPaginate($n)
    {
        return $this->queryGuest()->paginate($n);
    }


}