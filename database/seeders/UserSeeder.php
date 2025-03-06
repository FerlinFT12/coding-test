<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create user
        User::create([
            'name' => 'Ferlin',
            'email' => 'ferlinfturnip@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}