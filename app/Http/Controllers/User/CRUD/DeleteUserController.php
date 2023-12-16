<?php

namespace App\Http\Controllers\User\CRUD;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AlertMessage;

class DeleteUserController extends Controller
{
    use AlertMessage;

    public function __invoke(User $user)
    {
        $user->removeUser();

        $this->successMessage('Usuário removido com sucesso!');

        return redirect()->route('users.index');
    }
}
