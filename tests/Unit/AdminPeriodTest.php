<?php

namespace Tests\Unit;

use App\Exam;
use App\Period;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminPeriodTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Test creating a period.
     *
     * @return void
     */
    public function testDatabaseCreate()
    {
        $this->seed();

        $this->assertDatabaseHas('period', []);

        Period::create([
            'period' => 8,
            'semester' => 8
        ]);

        $this->assertDatabaseHas('period', [
            'period' => 8,
            'semester' => 8
        ]);
    }

    /**
     * Test updating a period.
     *
     * @return void
     */
    public function testDatabaseUpdate()
    {
        $this->seed();

        $this->assertDatabaseHas('period', []);

        $period = Period::create([
            'period' => 8,
            'semester' => 8
        ]);

        $this->assertDatabaseHas('period', [
            'period' => 8,
            'semester' => 8
        ]);

        Period::find($period->id)->update([
            'period' => 9,
            'semester' => 9
        ]);

        $this->assertDatabaseHas('period', [
            'period' => 9,
            'semester' => 9
        ]);
    }

    /**
     * Test deleting a period.
     *
     * @return void
     */
    public function testDatabaseDelete()
    {
        $this->seed();

        $this->assertDatabaseHas('period', []);

        $period = Period::create([
            'period' => 8,
            'semester' => 8
        ]);

        $this->assertDatabaseHas('period', [
            'period' => 8,
            'semester' => 8
        ]);

        $period = Period::destroy($period->id);

        $this->assertDatabaseMissing('period', [
            'period' => 8,
            'semester' => 8
        ]);
    }

    /**
     * Test period percentage calculation.
     *
     * @return void
     */
    public function testPercentage()
    {
        $this->seed();

        $this->assertDatabaseHas('period', []);

        $period = Period::find(1);

        $this->assertTrue($period->percentage === 80.0);

        $period = Period::find(2);

        $this->assertTrue($period->percentage === 0);

        $exam = Exam::where('module_id', '=', $period->modules[0]->id);

        $exam->update(['grade' => 9]);

        $this->assertTrue($period->percentage === 100);
    }
}
