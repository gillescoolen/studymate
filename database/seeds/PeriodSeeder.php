<?php

use App\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::insert([
            [
                'period' => 1,
                'semester' => 1
            ],
            [
                'period' => 1,
                'semester' => 2
            ],
            [
                'period' => 2,
                'semester' => 1
            ],
            [
                'period' => 2,
                'semester' => 2
            ],
            [
                'period' => 3,
                'semester' => 1
            ],
            [
                'period' => 3,
                'semester' => 2
            ],
            [
                'period' => 4,
                'semester' => 1
            ],
            [
                'period' => 4,
                'semester' => 2
            ]
        ]);
    }
}
