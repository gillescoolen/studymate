<?php

use Illuminate\Database\Seeder;

use App\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            ['type' => 'Assessment'],
            ['type' => 'Tentamen']
        ]);
    }
}
