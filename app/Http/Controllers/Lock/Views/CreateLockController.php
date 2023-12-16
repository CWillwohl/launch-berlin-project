<?php

namespace App\Http\Controllers\Lock\Views;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class CreateLockController extends Controller
{
    public function __invoke(): View
    {
        $locations = Location::all();

        return view('lock.create', compact('locations'));
    }

}
