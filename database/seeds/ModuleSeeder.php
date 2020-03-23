<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::insert([
            [
                'name' => 'INPRJW7',
                'ec' => 8,
                'period_id' => 1,
                'teacher_id' => 1,
            ],
            [
                'name' => 'WEBPHP',
                'ec' => 4,
                'period_id' => 3,
                'teacher_id' => 2
            ],
            [
                'name' => 'REGEX',
                'ec' => 4,
                'period_id' => 2,
                'teacher_id' => 3,
            ],
            [
                'name' => 'SLC',
                'ec' => 2,
                'period_id' => 4,
                'teacher_id' => 4,
            ],
            [
                'name' => 'EPRES',
                'ec' => 2,
                'period_id' => 1,
                'teacher_id' => 1,
            ]
        ]);
    }
}
