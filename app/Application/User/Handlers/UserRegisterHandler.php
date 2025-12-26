<?php 

namespace App\Application\User\Handlers;
 
use App\Application\User\Commands\UserRegisterCommand;
use App\Application\User\Entities\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\UserID; 

class UserRegisterHandler
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserRegisterCommand $command)
    {
        $this->userRepository->store(
            new User(
                null,
                $command->fullname,
                $command->password,
                $command->email,
            )
        );
    }
}