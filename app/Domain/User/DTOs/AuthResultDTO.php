<?php 

namespace App\Domain\User\DTOs;

final class AuthResultDTO
{
    public function __construct(public readonly string $accessToken){}
}