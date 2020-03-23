<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Type;
use App\Module;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    public function store(ExamRequest $request)
    {
        Exam::create($request->validated());
        return redirect()->route('admin')->with('message', 'New exam created successfully!');
    }

    public function edit($id)
    {
        $types = Type::all();
        $exam = Exam::find($id);
        $modules = Module::all();

        return view('admin.edit.edit-exam', ['exam' => $exam, 'modules' => $modules, 'types' => $types]);
    }

    public function update(ExamRequest $request, $id)
    {
        Exam::find($id)->update($request->validated());
        return redirect()->route('admin')->with('message', 'Het examen is aangepast!');
    }

    public function destroy($id)
    {
        Exam::find($id)->delete();
        return redirect()->route('admin')->with('message', 'Het examen is succesvol verwijderd.');
    }
}
