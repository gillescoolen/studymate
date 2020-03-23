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
                'module_id' => 2,
                'grade' => null,
                'type' => 'Tentamen',
            ],
            [
                'name' => 'Regex',
                'module_id' => 3,
                'grade' => null,
                'type' => 'Tentamen',
            ],
            [
                'name' => 'Project',
                'module_id' => 1,
                'grade' => 8,
                'type' => 'Assessment',
            ],
            [
                'name' => 'Verslag',
                'module_id' => 1,
                'grade' => 6,
                'type' => 'Assessment',
            ],
            [
                'name' => 'SLC Verslag',
                'module_id' => 4,
                'grade' => null,
                'type' => 'Assessment',
            ],
        ]);
    }
}
