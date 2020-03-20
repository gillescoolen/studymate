<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        $exams = Exam::doesntHave('deadline')->get();
        $deadlines = Deadline::with('exam')->get();

        return view('deadlines', ['exams' => $exams, 'deadlines' => $deadlines]);
    }

    public function store(Request $request)
    {
        Deadline::create($request->all());
        return redirect('/deadlines');
    }
}