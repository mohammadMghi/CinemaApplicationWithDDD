<?php 

namespace App\Application\User\Handlers;

use App\Application\User\Commands\UserLoginCommand;
use App\Domain\User\DTOs\AuthResultDTO;
use App\Domain\User\Repositories\UserRepository;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Domain\User\Services\AuthService;
use App\Infrastructure\Auth\HashPasswordHasher;
use Exception;

class UserLoginCommandHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private AuthService $authService,
        private HashPasswordHasher $passworHasher
        )
    {}

    public function handle(UserLoginCommand $command): AuthResultDTO
    {   
        $user = $this->userRepository->find($command->email->value());
        
        if (!$user || !$this->passworHasher->verify($command->password->value(),$user->password())) {
            throw new Exception('Auth failed!');
        }
        
        $token = $this->authService->login($user);

        return new AuthResultDTO($token);
    }
}