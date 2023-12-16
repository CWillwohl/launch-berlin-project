<?php

namespace App\Http\Controllers\User\CRUD;

use App\Models\User;
use App\Traits\AlertMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UpdateUserRequest;

class UpdateUserController extends Controller
{
    use AlertMessage;

    public function __construct(
        protected User $user
    ) {}

    public function __invoke(UpdateUserRequest $updateUserRequest, int $userId): RedirectResponse
    {
        $user = $this->user->find($userId);

        $data = $updateUserRequest->validated();

        $user->updateUser($data);

        $this->successMessage('Usuário atualizado com sucesso!');

        return redirect()->route('users.edit', $user);
    }
}
