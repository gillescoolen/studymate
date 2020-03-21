<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            ['name' => 'Makkelijk'],
            ['name' => 'Moeilijk'],
            ['name' => 'Veel werk'],
            ['name' => 'Weinig Werk'],
            ['name' => 'Leuk'],
            ['name' => 'Niet leuk']
        ]);
    }
}
