<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
            ]);

        $faker = Faker\Factory::create();

        for($i = 0; $i < 11; $i++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ]);
        }
    }
}
