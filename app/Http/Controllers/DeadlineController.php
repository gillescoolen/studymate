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

        $collection = collect($deadlines);

        $collection->sortBy('done');

        return view('deadlines', ['exams' => $exams, 'deadlines' => $collection->values()->all()]);
    }

    public function store(Request $request)
    {
        Deadline::create($request->all());
        return redirect('/deadlines');
    }

    public function update(Request $request, $id)
    {
        $deadline = Deadline::find($id);

        $done = $request->input('done') ? 1 : 0;
        $deadline->done = $done;
        $deadline->save();
      
        return redirect('/deadlines');
    }

    public function destroy(Request $request, $id)
    {
        Deadline::destroy($id);

        return redirect('/deadlines');
    }
}
