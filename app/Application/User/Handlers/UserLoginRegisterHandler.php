<?php 

namespace App\Application\User\Handlers;

use App\Application\User\Commands\UserLoginCommand;
use App\Domain\User\Repositories\UserRepository;

class UserLoginRegisterHandler
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserLoginCommand $command)
    {
        
    }
}