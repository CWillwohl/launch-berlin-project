<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locks(): HasMany
    {
        return $this->hasMany(Lock::class);
    }

    public function getLocationsWithLocks(): Collection
    {
        return $this->with('locks')->get();
    }

    public function getCompleteAddressAttribute(): string
    {
        return $this->street . ' Nº ' . $this->number . ', ' . $this->neighborhood;
    }
}

