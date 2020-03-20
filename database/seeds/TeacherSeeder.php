<?php

use App\Teacher;
use Illuminate\Database\Seeder;

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
                'firstname' => 'Luc',
                'lastname' => 'Claessens'
            ],
            [
                'firstname' => 'Rik',
                'lastname' => 'Meijer'
            ],
            [
                'firstname' => 'Vincent',
                'lastname' => 'Kreuzen'
            ],
            [
                'firstname' => 'Erik',
                'lastname' => 'Melsbach'
            ],
        ]);
    }
}
