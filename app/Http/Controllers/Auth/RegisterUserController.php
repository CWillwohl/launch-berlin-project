<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Http\RedirectResponse;

class RegisterUserController extends Controller
{

    public function __construct(
        protected User $user
    ) {}

    public function __invoke(RegisterUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = $this->user->registerUser($data);

        auth()->login($user);

        return redirect('/');
    }
}
