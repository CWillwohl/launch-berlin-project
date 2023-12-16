<?php

namespace App\Policies;

use App\Models\Lock;
use App\Models\User;

class LockPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {}

    public function changeLockStatus(User $user, Lock $lock)
    {
        if($user->is_admin)
        {
            return true;
        }

        return $user->id === $lock->user_id;
    }
}
