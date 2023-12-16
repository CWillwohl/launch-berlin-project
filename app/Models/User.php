<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFormattedNameAttribute(): string
    {
        $name = explode(' ', $this->name);

        if (count($name) < 2) {
            return $this->name;
        }

        return $name[0] != null && $name[1] != null
                ? $name[0] . ' ' . $name[1]
                : $this->name;
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role_id === 1;
    }

    public function registerUser(array $data): self
    {
        $user = $this->create([
            'name' => $data['user']['name'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'role_id' => 2,
        ]);

        $user->address()->create($data['address']);

        return $user;
    }

    public function storeNew(): self
    {
        return $this;
    }

    public function updateUser(array $data): void
    {
        $this->update($data['user']);

        $this->address()->update($data['address']);
    }

    public function removeUser(): void
    {
        $this->lock->user_id = null;

        $this->lock->save();

        $this->delete();
    }

    public function lock(): HasOne
    {
        return $this->hasOne(Lock::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
