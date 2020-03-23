<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@studymate.com',
                'role' => 'admin',
                'password' => bcrypt('test12345'),
            ],
            [
                'name' => 'manager',
                'email' => 'manager@studymate.com',
                'role' => 'manager',
                'password' => bcrypt('test12345'),
            ]
        ]);
    }
}
