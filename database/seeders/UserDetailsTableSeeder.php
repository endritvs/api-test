<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserDetailsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $userIds = DB::table('users')->pluck('id')->toArray();

        foreach ($userIds as $userId) {
            DB::table('user_details')->insert([
                'user_id' => $userId,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
