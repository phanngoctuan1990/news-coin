<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserRole;

class User extends Authenticatable {

    protected $table = 'users';

    const TYPE_ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * Get role of user .
     */
    public function userRoles() {
        return $this->hasMany(UserRole::class, 'user_id');
    }
}
