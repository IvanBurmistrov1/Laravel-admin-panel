<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    private function hasRole(string $role) {
        return $this->roles()->where('name', $role)->exists();
    }

    public function isAdministrator(): bool {
        return $this->hasRole('admin');
    }

    public function isUser(): bool {
        return $this->hasRole('user');
    }

    public function isDisabled(): bool {
        return $this->hasRole('disabled');
    }

    public function isVisitor(): bool {
        return $this->hasRole('');
    }
}
