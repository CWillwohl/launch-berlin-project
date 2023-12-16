<?php

namespace App\Livewire;

use App\Models\Lock;
use Livewire\Component;
use App\Models\Location;
use App\Traits\AlertMessage;
use Illuminate\Contracts\View\View;

class LockControl extends Component
{

    use AlertMessage;

    public $lock = null;
    public $locations = null;

    public function mount()
    {
        $this->lock = auth()->user()->lock;
        $this->locations = Location::all();
    }

    public function toggleLockStatus(): void
    {
        $this->authorize('changeLockStatus', $this->lock);

        $this->lock->changeStatus();

        $this->successMessage('Status da fechadura foi atualizado!');
    }

    public function render(): View
    {
        return view('livewire.lock-control');
    }
}
