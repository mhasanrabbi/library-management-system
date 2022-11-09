<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'address' => 'dhaka, bangladesh',
            'phone' => '01521515857',
            'password' => '$2y$10$9UrQOnG7rkawTklBt0Xl4extrhRTbJ3TouHsvHAsy.xHlSmJonCNG',

        ])->assignRole('admin', 'editor');
    }
}