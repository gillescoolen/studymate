<?php

namespace App\Http\Controllers;

use App\Module;
use App\Period;
use App\Teacher;
use App\Http\Requests\ModuleRequest;

class ModuleController extends Controller
{
    public function store(ModuleRequest $request)
    {
        Module::create($request->validated());
        return redirect()->route('admin')->with('message', 'De nieuwe module is aangemaakt!');
    }

    public function edit($id)
    {
        $module = Module::find($id);
        $periods = Period::all();
        $teachers = Teacher::all();
    
        return view('admin.edit.edit-module', ['module' => $module, 'periods' => $periods, 'teachers' => $teachers]);
    }

    public function update(ModuleRequest $request, $id)
    {
        Module::find($id)->update($request->validated());
        return redirect()->route('admin')->with('message', 'De module is aangepast!');
    }

    public function destroy($id)
    {
        Module::find($id)->delete();
        return redirect()->route('admin')->with('message', 'De module is succesvol verwijderd.');
    }
}