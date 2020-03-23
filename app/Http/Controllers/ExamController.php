<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\ExamRequest;
use App\Module;
use App\Type;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function store(ExamRequest $request)
    {
        dd($request);

        $this->validate($request, [
            'name' => 'required|max:255|filled|min:1',
            'ec' => 'required|integer|filled|gt:0',
            'module_id' => 'required|filled|min:0',
            'type_id' => 'required|filled|min:0',
        ]);

        Exam::create($request->all());
        return redirect()->route('admin')->with('message', 'New exam created successfully!');
    }

    public function edit($id)
    {
        $types = Type::all();
        $exam = Exam::find($id);
        $modules = Module::all();

        return view('admin.edit.edit-exam', ['exam' => $exam, 'modules' => $modules, 'types' => $types]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|filled|min:1',
            'ec' => 'required|integer|filled|gt:0',
            'module_id' => 'required|filled|min:0',
            'type_id' => 'required|filled|min:0',
        ]);

        Exam::find($id)->update($request->all());
        return redirect()->route('admin')->with('message', 'Het examen is aangepast!');
    }

    public function destroy($id)
    {
        Exam::find($id)->delete();
        return redirect()->route('admin')->with('message', 'Het examen is succesvol verwijderd.');
    }
}
