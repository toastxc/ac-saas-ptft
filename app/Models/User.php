<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'given_name',
        'family_name',
        'email',
        'password',
        'suspended_at',
        'banned_at',
        'given_name',
        'family_name',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Return the initials of the current user
     *
     * @return string|null
     */
    public function initials()
    {
        $name = $this->name;

        if (empty($name)) {
            return 'X';
        }

        return Str::of($name)
            ->upper()
            ->explode(' ')
            ->reduce(fn ($carry, $part) => $carry.$part[0]);
    }

    public function isSuspended(): bool
    {
        return ! is_null($this->suspended_at);
    }

    public function isBanned(): bool
    {
        return ! is_null($this->banned_at);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'suspended_at' => 'datetime',
            'banned_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
