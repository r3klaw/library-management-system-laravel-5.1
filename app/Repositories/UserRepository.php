<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    /**
     * Get all of the users for a given user.
     *
     * @return Collection
     */
    public function all()
    {   
        return User::where('is_admin', false)
                    ->orderBy('name')
                    ->get();
    }
}
