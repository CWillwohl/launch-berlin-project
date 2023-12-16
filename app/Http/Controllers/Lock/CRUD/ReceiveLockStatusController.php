<?php

namespace App\Http\Controllers\Lock\CRUD;

use App\Models\Lock;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ReceiveLockStatusController extends Controller
{
    public function __construct(
        protected Lock $lock
    ) {}

    public function __invoke(string $hash): JsonResponse
    {
        $lockStatus = $this->lock->where('hash', $hash)->first('status');

        return response()->json([
            'permission' => $lockStatus->status ? true : false,
        ], 200);
    }
}
