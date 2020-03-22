<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Exam;
use App\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $deadlines = Deadline::with('exam')->get();
        $exams = Exam::doesntHave('deadline')->get();

        $collection = collect();

        foreach ($deadlines as $deadline) {
            $collection->push([
                'id' => $deadline->id,
                'date' => $deadline->date,
                'exam' => $deadline->exam->name,
                'module' => $deadline->exam->module->name,
                'teacher' => $deadline->exam->module->teacher->firstname,
                'done' => $deadline->done,
                'tags' => $deadline->tags
            ]);
        }

        isset($_GET['sort']) && $collection = $collection->sortBy($_GET['sort']);

        return view('deadlines', ['exams' => $exams, 'tags' => $tags, 'deadlines' => $collection]);
    }

    public function store(Request $request)
    {
        $deadline = Deadline::create($request->all());
        $deadline->tags()->sync($request->tags);
        return redirect('/deadline');
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $deadline = Deadline::find($id);

        $deadlineTags = [];

        if ($deadline->tags) {
            foreach ($deadline->tags as $tag) array_push($deadlineTags, $tag->name);
        }

        
        return view('deadlines.edit.edit-deadline', ['tags' => $tags, 'deadlineTags' => $deadlineTags, 'deadline' => $deadline]);
    }

    public function update(Request $request, $id)
    {
        $deadline = Deadline::find($id);

        $done = $request->input('done') ? 1 : 0;
        
        $deadline->done = $done;

        $request->tags && $deadline->tags()->sync($request->tags);

        $deadline->save();

        return redirect('/deadline');
    }

    public function destroy(Request $request, $id)
    {
        Deadline::destroy($id);

        return redirect('/deadline');
    }
}
