<?php

namespace Tests\Unit;

use App\Teacher;
use Tests\TestCase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminteacherTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * Test if creating a teacher encrypts the name.
     *
     * @return void
     */
    public function testDatabaseCreate()
    {
        $this->seed();

        $this->assertDatabaseHas('teacher', []);

        $teacher = Teacher::create([
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        // Check that the data is encrypted.
        $this->assertDatabaseMissing('teacher', [
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        $found = Teacher::latest()->first();
        
        $this->assertTrue($teacher->firstname === $found->firstname);
        $this->assertTrue($teacher->lastname === $found->lastname);
    }

    /**
     * Test updating a teacher.
     *
     * @return void
     */
    public function testDatabaseUpdate()
    {
        $this->seed();

        $this->assertDatabaseHas('teacher', []);

        $teacher = teacher::create([
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        // Check that the data is encrypted.
        $this->assertDatabaseMissing('teacher', [
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        $found = Teacher::latest()->first();
        
        $this->assertTrue($teacher->firstname === $found->firstname);
        $this->assertTrue($teacher->lastname === $found->lastname);

        Teacher::find($teacher->id)->update([
            'firstname' => 'Dave',
            'lastname' => 'Janssen'
        ]);

        // Check that the data is encrypted.
        $this->assertDatabaseMissing('teacher', [
            'firstname' => 'Dave',
            'lastname' => 'Janssen'
        ]);

        $found = Teacher::latest()->first();
        
        $this->assertFalse($teacher->firstname === $found->firstname);
        $this->assertFalse($teacher->lastname === $found->lastname);

        $this->assertTrue('Dave' === $found->firstname);
        $this->assertTrue('Janssen' === $found->lastname);
    }

    /**
     * Test deleting a teacher.
     *
     * @return void
     */
    public function testDatabaseDelete()
    {
        $this->seed();

        $this->assertDatabaseHas('teacher', []);

        $teacher = Teacher::create([
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        // Check that the data is encrypted.
        $this->assertDatabaseMissing('teacher', [
            'firstname' => 'Taylor',
            'lastname' => 'Vlucht'
        ]);

        $found = Teacher::latest()->first();
        
        $this->assertTrue($teacher->firstname === $found->firstname);
        $this->assertTrue($teacher->lastname === $found->lastname);

        Teacher::destroy($teacher->id);

        $found = Teacher::latest()->first();
        
        $this->assertFalse($teacher->firstname === $found->firstname);
        $this->assertFalse($teacher->lastname === $found->lastname);
    }
}
