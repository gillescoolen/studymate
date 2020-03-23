<?php

namespace Tests\Unit;

use App\Exam;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminExamTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Test creating a exam.
     *
     * @return void
     */
    public function testDatabaseCreate()
    {
        $this->seed();

        $this->assertDatabaseHas('exam', []);

        Exam::create([
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);

        $this->assertDatabaseHas('exam', [
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);
    }

    /**
     * Test updating a exam.
     *
     * @return void
     */
    public function testDatabaseUpdate()
    {
        $this->seed();

        $this->assertDatabaseHas('exam', []);

        $exam = Exam::create([
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);

        $this->assertDatabaseHas('exam', [
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);

        Exam::find($exam->id)->update([
            'grade' => 7,
        ]);

        $this->assertDatabaseHas('exam', [
            'name' => 'Studymate',
            'type' => 'Assessment',
            'grade' => 7,
            'module_id' => 2
        ]);
    }

    /**
     * Test deleting a exam.
     *
     * @return void
     */
    public function testDatabaseDelete()
    {
        $this->seed();

        $this->assertDatabaseHas('exam', []);

        $exam = Exam::create([
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);

        $this->assertDatabaseHas('exam', [
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);

        $exam = Exam::destroy($exam->id);

        $this->assertDatabaseMissing('exam', [
            'name' => 'Studymate',
            'type' => 'Assessment',
            'module_id' => 2
        ]);
    }
}
