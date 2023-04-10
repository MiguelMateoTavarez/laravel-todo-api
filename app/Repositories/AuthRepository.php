<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function register($request)
    {
        $newUser = User::create($request->all());

        return $newUser;
    }
}