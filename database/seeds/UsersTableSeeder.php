<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = DB::table('users')->whereEmail('admin@gmail.com')->first();
        if (!$admin) {
            // Add admin account
            $admin = new User;
            $admin->full_name = 'administrator';
            $admin->email     = 'admin@gmail.com';
            $admin->password  = Hash::make('12345678');
            $admin->is_admin  = User::TYPE_ADMIN;
            $admin->save();

            // Add role to admin
            $roles = DB::table('role')->get(['id']);
            foreach ($roles as $role) {
                $adminRole[] = [
                    'role_id'    => $role->id,
                    'user_id'    => $admin->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            DB::table('user_role')->insert($adminRole);
        }
    }
}
