<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'full_name' => 'administrator',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('12345678'),
        	'is_admin' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        
        DB::table('users')->insert($admin);
    }
}
