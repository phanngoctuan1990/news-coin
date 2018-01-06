<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{
    protected $guard = 'admin';
    protected $redirectAfterLogout = 'admin';
    protected $redirectTo = 'admin/dashboard';
    protected $loginView = 'admin.auth.login';
}
