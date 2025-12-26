<?php

namespace App\Http\Controllers\Auth;

use App\Application\User\Commands\UserLoginCommand;
use App\Application\User\Handlers\UserLoginCommandHandler;
use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\PasswordHash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function __construct(protected UserLoginCommandHandler $commandHandler)
    {}

    public function index(Request $request)
    {
        $command = new UserLoginCommand(
            new Email($request->validated('email')),
            new PasswordHash($request->validated('password'))
        );

        $result = $this->commandHandler->handle($command);
    
        return response()->json(['token' => $result->accessToken]);
    }
}
