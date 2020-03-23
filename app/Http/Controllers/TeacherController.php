<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function store(TeacherRequest $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255|min:1|filled',
            'lastname' => 'required|string|max:255|min:1|filled',
        ]);

        Teacher::create($request->all());
        return redirect()->route('admin')->with('message', 'Nieuwe docent succesvol toegevoegd!');
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.edit.edit-teacher', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255|min:1|filled',
            'lastname' => 'required|string|max:255|min:1|filled',
        ]);

        Teacher::find($id)->update($request->all());
        return redirect()->route('admin')->with('message', 'Docent succesvol geupdate!');
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return redirect()->route('admin')->with('message', 'Docent succesvol verwijderd!');
    }
}
