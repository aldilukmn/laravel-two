<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'administrator',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'level' => 1,
                'email' => 'admin@mail.com',
            ],
            [
                'name' => 'manager',
                'username' => 'manager',
                'password' => bcrypt('12345'),
                'level' => 1,
                'email' => 'manager@mail.com',
            ],
            [
                'name' => 'employee',
                'username' => 'employee',
                'password' => bcrypt('12345'),
                'level' => 1,
                'email' => 'employee@mail.com',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
