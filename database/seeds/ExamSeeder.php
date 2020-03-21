<?php

use App\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::insert([
            [
                'name' => 'PHP',
                'ec' => 4,
                'module_id' => 2,
                'type_id' => 2,
            ],
            [
                'name' => 'Regex',
                'ec' => 4,
                'module_id' => 3,
                'type_id' => 1,
            ],
            [
                'name' => 'Project',
                'ec' => 8,
                'module_id' => 1,
                'type_id' => 2,
            ],
            [
                'name' => 'SLC Verslag',
                'ec' => 2,
                'module_id' => 4,
                'type_id' => 2,
            ],
        ]);
    }
}
