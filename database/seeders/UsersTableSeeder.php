<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_UY');

        for ($i = 0; $i < 5; $i++) {
            $name = $faker->firstName . ' ' . $faker->lastName;
            $email = $faker->unique()->safeEmail;
            $username = $faker->userName;
            $password = 'Password123';

            User::create([
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password,
            ]);
        }
    }
}
