<?php

namespace App\Traits;

trait AlertMessage
{
    public function successMessage($message)
    {
        session()->flash('alert', [
            'type' => 'success',
            'message' => $message
        ]);
    }

    public function errorMessage($message)
    {
        session()->flash('alert', [
            'type' => 'error',
            'message' => $message
        ]);
    }
}
