<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nome' => 'Luccas',
            'email' => 'lucasduarte2317@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
