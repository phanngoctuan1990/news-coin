<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\UserRole;

class User extends Eloquent {

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
    ];

    /**
     * Get role of user .
     */
    public function userRoles() {
        return $this->hasMany(UserRole::class, 'user_id');
    }

}
