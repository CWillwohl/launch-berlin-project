<?php

namespace App\Http\Controllers\User\Views;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateUserController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();

        return view('user.create', compact(
            'roles'
        ));
    }
}
