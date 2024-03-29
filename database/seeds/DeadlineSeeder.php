<?php

use App\Deadline;
use Illuminate\Database\Seeder;

class DeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deadline::insert([
            [
                'date' => '2020-01-31',
                'done' => '0',
                'exam_id' => '1',
            ],
            [
                'date' => '2020-01-29',
                'done' => '0',
                'exam_id' => '2',
            ],
            [
                'date' => '2020-01-27',
                'done' => '0',
                'exam_id' => '3',
            ]
        ]);
    }
}
