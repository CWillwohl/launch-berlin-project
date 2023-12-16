<?php

namespace App\Http\Controllers\User\Views;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexUserController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        return view('user.index', compact(
            'users'
        ));
    }
}
