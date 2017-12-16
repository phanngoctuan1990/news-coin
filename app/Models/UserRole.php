<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\User;

class UserRole extends Eloquent {

    protected $table = 'user_role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    /**
     * Get user belongs to role.
     */
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
