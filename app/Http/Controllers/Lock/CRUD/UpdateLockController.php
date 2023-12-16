<?php

namespace App\Http\Controllers\Lock\CRUD;

use App\Models\Lock;
use App\Traits\AlertMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lock\UpdateLockRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UpdateLockController extends Controller
{

    use AlertMessage;

    public function __invoke(Lock $lock, UpdateLockRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $lock->update($data);

        $this->successMessage('Fechadura atualizada com sucesso!');

        return redirect()->route('locks.edit', $lock);
    }
}
