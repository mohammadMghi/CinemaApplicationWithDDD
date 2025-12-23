<?php

namespace App\Domain\User\Repositories;

use App\Models\UserModel;

class UserRepository
{
    public function find($id)
    {
        return UserModel::find($id);
    }
}