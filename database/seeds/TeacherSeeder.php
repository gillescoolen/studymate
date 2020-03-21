<?php

use App\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::insert([
            [
                'firstname' => Crypt::encryptString('Luc'),
                'lastname' => Crypt::encryptString('Claessens')
            ],
            [
                'firstname' => Crypt::encryptString('Rik'),
                'lastname' => Crypt::encryptString('Meijer')
            ],
            [
                'firstname' => Crypt::encryptString('Vincent'),
                'lastname' => Crypt::encryptString('Kreuzen')
            ],
            [
                'firstname' => Crypt::encryptString('Erik'),
                'lastname' => Crypt::encryptString('Melsbach')
            ],
        ]);
    }
}
