<?php

namespace App\Http\Controllers\Lock\CRUD;


use App\Models\Lock;
use App\Traits\AlertMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lock\StoreLockRequest;
use Illuminate\Http\RedirectResponse;

class CreateLockController extends Controller
{
    use AlertMessage;

    public function __invoke(StoreLockRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $lock = Lock::create([
            'hash' => $data['hash'],
            'location_id' => $data['location_id'],
            'status' => false,
            'user_id' => null
        ]);

        $this->successMessage('Fechadura cadastrada com sucesso!');

        return redirect()->route('locks.edit', $lock)->with('success', 'Fechadura cadastrada com sucesso!');
    }
}
