<?php

namespace App\Http\Controllers;

use App\Module;
use App\Period;
use App\Teacher;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function store(Request $request)
    {
        Module::create($request->all());
        return redirect('/admin');
    }

    public function update(Request $request, $id)
    {
        Module::find($id)->update($request->all());
        return redirect('/admin');
    }

    public function destroy(Request $request, $id)
    {
        Module::find($id)->update($request->all());
        return redirect('/admin');
    }

    public function edit($id) 
    {
        $module = Module::find($id);
        $periods = Period::all();
        $teachers = Teacher::all();

        return view('admin.edit.edit-module', ['module' => $module, 'periods' => $periods, 'teachers' => $teachers]);
    }
}