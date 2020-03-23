<?php

namespace Tests\Unit;

use App\Exam;
use App\Module;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminModuleTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Test creating a module.
     *
     * @return void
     */
    public function testDatabaseCreate()
    {
        $this->seed();

        $this->assertDatabaseHas('module', []);

        Module::create([
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);

        $this->assertDatabaseHas('module', [
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);
    }

    /**
     * Test updating a module.
     *
     * @return void
     */
    public function testDatabaseUpdate()
    {
        $this->seed();

        $this->assertDatabaseHas('module', []);

        $module = Module::create([
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);

        $this->assertDatabaseHas('module', [
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);

        Module::find($module->id)->update([
            'ec' => 16,
        ]);

        $this->assertDatabaseHas('module', [
            'name' => 'UNIT',
            'ec' => 16,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);
    }

    /**
     * Test deleting a module.
     *
     * @return void
     */
    public function testDatabaseDelete()
    {
        $this->seed();

        $this->assertDatabaseHas('module', []);

        $module = Module::create([
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);

        $this->assertDatabaseHas('module', [
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);

        $module = Module::destroy($module->id);

        $this->assertDatabaseMissing('module', [
            'name' => 'UNIT',
            'ec' => 8,
            'period_id' => 1,
            'teacher_id' => 1,
        ]);
    }

    /**
     * Test module percentage calculation.
     *
     * @return void
     */
    public function testGrade()
    {
        $this->seed();

        $this->assertDatabaseHas('module', []);

        $module = Module::find(1);

        $this->assertTrue($module->grade === 7.0);
        
        $exam = Exam::find($module->exams[0]->id);

        $exam->update([
            'grade' => 10
        ]);

        $this->assertTrue($module->grade === 8.0);

        $exam->update([
            'grade' => null
        ]);

        $this->assertTrue($module->grade === null);
    }
}
