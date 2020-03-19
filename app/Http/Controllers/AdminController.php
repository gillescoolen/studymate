<?php

namespace App\Http\Controllers;

use App\Module;
use App\Exam;
use App\Period;
use App\Teacher;
use App\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        $exams = Exam::all();
        $periods = Period::all();
        $teachers = Teacher::all();
        $types = Type::all();

        return view('admin', ['modules' => $modules, 'exams' => $exams, 'periods' => $periods, 'teachers' => $teachers, 'types' => $types]);
    }
}
