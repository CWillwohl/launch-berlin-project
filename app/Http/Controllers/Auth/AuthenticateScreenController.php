<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AuthenticateScreenController extends Controller
{
    public function __invoke(): View
    {
        return view('auth.login');
    }
}
