<?php

namespace App\Http\Controllers;

use App\Period;
use App\Http\Requests\PeriodRequest;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('dashboard', ['periods' => $periods]);
    }

    public function store(PeriodRequest $request)
    {
        $request->validate([
            'period' => 'required|integer|gt:0|filled',
            'semester' => 'required|integer|gt:0|filled'
        ]);

        Period::create($request->all());
        return redirect()->route('admin')->with('message', 'New period created successfully!');
    }

    public function edit($id)
    {
        $period = Period::find($id);
        return view('admin.edit.edit-period', ['period' => $period]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'period' => 'required|integer|gt:0|filled',
            'semester' => 'required|integer|gt:0|filled'
        ]);

        Period::find($id)->update($request->all());
        return redirect()->route('admin')->with('message', 'Period updated successfully!');
    }

    public function destroy($id)
    {
        Period::find($id)->delete();
        return redirect()->route('admin')->with('message', 'Period deleted successfully!');
    }
}