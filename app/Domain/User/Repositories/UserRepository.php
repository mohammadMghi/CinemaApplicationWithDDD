<?php

namespace App\Domain\User\Repositories;

use App\Application\User\Entities\User;
use App\Models\UserModel;
use Hash;

class UserRepository implements UserRepositoryInterface
{
    public function find($id) : User
    {
        $user = UserModel::find($id);
        
    }

    public function store(User $user): User
    {
        $userModel = new UserModel();
        $userModel->fullname = $user->fullname()->value();
        $userModel->email = $user->email()->value();
        $userModel->password = Hash::make($user->password());
        $userModel->save();

        return $user;
    }
}