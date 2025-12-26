<?php

namespace App\Http\Controllers\Auth;

use App\Application\User\Commands\UserRegisterCommand;
use App\Application\User\Handlers\UserRegisterHandler;
use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Fullname;
use App\Domain\User\ValueObjects\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function __construct(protected UserRegisterHandler $userRegisterHandler)
    {}

    public function handle(Request $request)
    {
        $command = new UserRegisterCommand(
            new Fullname($request->validated('fullname')),
            new Email($request->validated('email')),
            new Password($request->validated('password'))
        );

        $this->userRegisterHandler->handle($command);
    }
}
