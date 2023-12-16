<?php

namespace App\Http\Controllers\User\Views;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class UpdateUserController extends Controller
{
    public function __invoke(User $user): View
    {
        $roles = Role::all();

        $user = User::with('role', 'address')->findOrFail($user->id);

        return view('user.edit', compact(
            'user',
            'roles'
        ));
    }
}
