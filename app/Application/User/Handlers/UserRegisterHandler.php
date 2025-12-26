<?php 

namespace App\Application\User\Handlers;
 
use App\Application\User\Commands\UserRegisterCommand;
use App\Domain\User\Repositories\UserRepositoryInterface; 

class UserRegisterHandler
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserRegisterCommand $command)
    {
        
    }
}