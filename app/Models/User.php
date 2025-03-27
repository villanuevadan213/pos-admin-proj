<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'position',
        'status',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    /**
     * Booted method to handle status based on last_login_at.
     */
    protected static function booted()
    {
        static::saving(function ($user) {
            if (is_null($user->last_login_at)) {
                $user->status = 'Blocked'; // If last_login_at is null
            } elseif ($user->last_login_at->lte(now()->subDays(7))) {
                $user->status = 'Inactive'; // If last_login_at is 7 days ago or more
            } else {
                $user->status = 'Active'; // If last_login_at is within the last 7 days
            }
        });
    }

}