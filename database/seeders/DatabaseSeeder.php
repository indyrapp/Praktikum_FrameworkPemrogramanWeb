<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Rina',
            'email' => 'kasir@barokahmart.test',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);

        $this->call(CategorySeeder::class);
    }
}