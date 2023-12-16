<?php

namespace App\Http\Controllers\Lock\CRUD;

use App\Models\Lock;
use App\Traits\AlertMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UpdateStatusLockController extends Controller
{
    use AlertMessage;

    public function __invoke(Lock $lock): RedirectResponse
    {
        $this->authorize('changeLockStatus', $lock);

        $lock->changeStatus();

        $this->successMessage('Status da fechadura foi atualizado!');

        return redirect()->back();
    }
}
