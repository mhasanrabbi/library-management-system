<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Samsung',
                'last_name' => 'Galaxy',
                'email' => 'rakib@mail.com',
                'phone' => 122432,
                'user_image' => 'null',
                'status' => 1,
                'role' => 1,
                'password' => Hash::make('12345678'),
                'is_email_verified' => 0
            ],
            [
                'first_name' => 'rakib',
                'last_name' => 'mohammad',
                'email' => 'abdullaalrakib@outlook.com',
                'phone' => 543455,
                'user_image' => 'null',
                'status' => 1,
                'role' => 0,
                'password' => Hash::make('12345678'),
                'is_email_verified' => 0
            ],
            [
                'first_name' => 'abdu',
                'last_name' => 'rakib',
                'email' => 'rakib0751@gmail.com',
                'phone' => 12298542,
                'user_image' => 'null',
                'status' => 1,
                'role' => 0,
                'password' => Hash::make('12345678'),
                'is_email_verified' => 0
            ],
            [
                'first_name' => 'Abdulla',
                'last_name' => 'mohammad',
                'email' => 'abdullarakib0751@gmail.com',
                'phone' => 12462432,
                'user_image' => 'null',
                'status' => 1,
                'role' => 0,
                'password' => Hash::make('12345678'),
                'is_email_verified' => 0
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}