<?php

namespace App\Http\Controllers\Any;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $user = auth()->user();

        return view('dashboard', compact(
            'user'
        ));
    }
}
