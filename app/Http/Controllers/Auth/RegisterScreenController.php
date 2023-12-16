<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RegisterScreenController extends Controller
{
    public function __invoke(): View
    {
        return view('auth.register');
    }
}
