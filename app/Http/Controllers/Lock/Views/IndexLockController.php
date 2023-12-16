<?php

namespace App\Http\Controllers\Lock\Views;

use App\Models\Lock;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexLockController extends Controller
{
    public function __construct(
        protected Lock $lock
    ) {}

    public function __invoke(): View
    {
        $locks = $this->lock->getLocksWithLocation();

        return view('lock.index', compact('locks'));
    }
}
