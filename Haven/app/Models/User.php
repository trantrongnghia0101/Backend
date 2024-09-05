<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
>>>>>>> origin/main

class User extends Authenticatable
{
    use HasFactory, Notifiable;

<<<<<<< HEAD
=======
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
>>>>>>> origin/main
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'image',
        'phone',
        'address',
        'status',
    ];

=======
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> origin/main
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
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

=======
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> origin/main
