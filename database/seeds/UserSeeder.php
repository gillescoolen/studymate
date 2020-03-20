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
                'role_id' => 1,
                'password' => bcrypt('test12345'),
            ],
            [
                'name' => 'manager',
                'email' => 'manager@studymate.com',
                'role_id' => 2,
                'password' => bcrypt('test12345'),
            ]
        ]);
    }
}