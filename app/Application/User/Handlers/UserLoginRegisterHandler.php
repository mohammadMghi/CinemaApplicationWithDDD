<?php 

namespace App\Application\User\Handlers;

use App\Application\User\Commands\UserLoginCommand;
use App\Domain\User\Repositories\UserRepositoryInterface; 

class UserLoginRegisterHandler
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserLoginCommand $command)
    {
        
    }
}