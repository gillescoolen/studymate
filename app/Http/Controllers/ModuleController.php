<?php

namespace App\Http\Controllers;

use App\Module;
use App\Period;
use App\Teacher;
use App\Http\Requests\ModuleRequest;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function store(ModuleRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1|filled',
            'ec' => 'required|integer|filled|gt:0',
            'period_id' => 'required|integer|filled|gt:0',
            'teacher_id' => 'required|integer|filled|gt:0'
        ]);

        Module::create($request->all());
        return redirect()->route('admin')->with('message', 'De nieuwe module is aangemaakt!');
    }

    public function edit($id)
    {
        $module = Module::find($id);
        $periods = Period::all();
        $teachers = Teacher::all();
    
        return view('admin.edit.edit-module', ['module' => $module, 'periods' => $periods, 'teachers' => $teachers]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1|filled',
            'ec' => 'required|integer|filled|gt:0',
            'period_id' => 'required|integer|filled|gt:0',
            'teacher_id' => 'required|integer|filled|gt:0'
        ]);

        Module::find($id)->update($request->all());
        return redirect()->route('admin')->with('message', 'De module is aangepast!');
    }

    public function destroy($id)
    {
        Module::find($id)->delete();
        return redirect()->route('admin')->with('message', 'De module is succesvol verwijderd.');
    }
}