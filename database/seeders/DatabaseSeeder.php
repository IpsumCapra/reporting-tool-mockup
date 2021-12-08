<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'firstname' => "Admin",
            'lastname' => "Admin",
            'gender' => User::GENDER_MALE,
            'birthday' => "1000-01-01 00:00:00",
            'email' => "admin@a.a",
            'address' => "Plekstad 123",
            'postcode' => "1234AB",
            'city' => "Plek",
            'province' => User::PROVINCES[0],
            'password' => \Hash::make("admin"),
            'role' => User::ROLE_ADMIN,
        ]);
    }
}
