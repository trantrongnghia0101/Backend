<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}
