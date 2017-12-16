<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('role')->truncate();
        $now = Carbon\Carbon::now();
        $data = [
            [
                'id' => Role::POST_NEWS,
                'name' => 'Đăng bài viết',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Role::REVIEW_NEWS,
                'name' => 'Review bài viết ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Role::POST_COIN,
                'name' => 'Đăng coin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Role::REVIEW_COIN,
                'name' => 'Review coin',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];
        \DB::table('role')->insert($data);
    }

}
