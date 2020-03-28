<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Exam;
use App\Deadline;
use App\Http\Requests\DeadlineRequest;

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

    public function store(DeadlineRequest $request)
    {
        $deadline = Deadline::create($request->validated());
        $deadline->tags()->sync($request->tags);
        return redirect('/deadline');
    }

    public function openUpload(DeadlineRequest $request, $id)
    {
        $deadline = Deadline::find($id);
        return view('deadlines.upload.upload-deadline', ['deadline' => $deadline]);
    }

    public function file(DeadlineRequest $request, $id)
    {
        $deadline = Deadline::find($id);

        if ($request->hasFile('file')) {
            // file name
            $filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/work', $filename);

            // store in db
            $deadline->work = $filename;
            $deadline->save();

            return redirect()->route('deadline.index')->with('message', 'Werk ingeleverd');
        } else {
            return view('deadlines.upload.upload-deadline', ['deadline' => $deadline])->with('message', 'Werk ingeleverd');
        }
    }

    public function download(DeadlineRequest $request, $id)
    {
        $deadline = Deadline::find($id);

        return response()->download(public_path('storage/work/' . $deadline->work));
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

    public function update(DeadlineRequest $request, $id)
    {
        $deadline = Deadline::find($id);

        $done = $request->input('done') ? 1 : 0;
        
        $deadline->done = $done;
        $request->date && $deadline->date = $request->date;
        $request->tags && $deadline->tags()->sync($request->tags);

        $deadline->save();

        return redirect('/deadline');
    }

    public function destroy($id)
    {
        Deadline::destroy($id);
        return redirect('/deadline')->with('message', 'Deadline is succesvol verwijderd.');
    }
}
