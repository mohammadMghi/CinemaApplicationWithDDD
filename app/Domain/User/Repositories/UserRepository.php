<?php

namespace App\Domain\User\Repositories;

use App\Application\User\Entities\User;
use App\Models\UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function find($id) : User
    {
        $user = UserModel::find($id);
        
    }
}