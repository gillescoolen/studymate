<?php

namespace App\Http\Controllers;

use App\Module;
use App\Exam;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        $exams = Exam::all();

        return view('admin', ['modules' => $modules, 'exams' => $exams]);
    }
}
