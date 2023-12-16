<?php

namespace App\Http\Controllers\Lock\Views;

use App\Models\Lock;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class UpdateLockController extends Controller
{
    public function __invoke(Lock $lock): View
    {
        $locations = Location::all();

        $users = User::doesntHave('lock')->get();

        return view('lock.edit', compact('lock', 'locations', 'users'));
    }
}
