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
                'type' => 'Tentamen',
            ],
            [
                'name' => 'Regex',
                'module_id' => 3,
                'type' => 'Tentamen',
            ],
            [
                'name' => 'Project',
                'module_id' => 1,
                'type' => 'Assessment',
            ],
            [
                'name' => 'SLC Verslag',
                'module_id' => 4,
                'type' => 'Assessment',
            ],
        ]);
    }
}
