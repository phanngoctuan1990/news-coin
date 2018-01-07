<?php

namespace App\Http\Controllers\Frontend;

use Validator;
use App\Models\Customer;
use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{
    /**
     * Where to redirect customer after login / registration.
     *
     * @var string
     */
    protected $loginView = 'frontend.auth.login';
    
    /**
     * Where to store view register.
     *
     * @var string
     */
    protected $registerView = "frontend.auth.register";

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customer',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new customer instance after a valid registration.
     *
     * @param array $data data
     *
     * @return Customer
     */
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
