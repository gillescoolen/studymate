<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(DeadlineSeeder::class);
    }
}