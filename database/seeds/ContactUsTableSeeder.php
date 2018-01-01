<?php

use Carbon\Carbon;
use App\Models\ContactUs;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_us')->truncate();
        $faker = Faker::create();
        $data =[];
        for ($i = 0; $i < 20; $i++) { 
        	$data[] = [
        		'name' => $faker->name,
        		'email' => 'phanngoctuan1990@gmail.com',
        		'subject' => $faker->realText(20),
        		'message' => $faker->realText(200),
        		'replied' => random_int(ContactUs::TYPE_NO_REPLIED, ContactUs::TYPE_REPLIED),
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	];
        }
        \DB::table('contact_us')->insert($data);
    }
}
