<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'phone',
        'address',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function role_users()
    {
        return $this->hasManyThrough(RoleUser::class, 'roles');
    }

    protected static function booted()
    {
        static::deleting(function ($user) {
            // Xóa các bản ghi liên quan trong bảng role_users
            $user->roles()->detach();
        });
    }
}

