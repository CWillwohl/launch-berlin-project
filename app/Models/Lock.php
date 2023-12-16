<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function removeUser(): void
    {
        $this->user_id = null;
        $this->save();
    }

    public function changeStatus(): void
    {
        $this->status = !$this->status;

        $this->status_changed_at = now();

        $this->save();
    }

    public function getLastStatusChangedAtAttribute(): string
    {
        return date('d/m/Y H:i', strtotime($this->status_changed_at)) . ' - ' .  $this->status_string;
    }

    public function getStatusStringAttribute(): string
    {
        return $this->status ? 'Aberto' : 'Fechado';
    }

    public static function getUserLocks(): Collection
    {
        return self::where('user_id', auth()->user()->id)->orderBy('updated_at')->get();
    }

    public function getLocksWithLocation(): Collection
    {
        return $this->with('location')->get();
    }
}
