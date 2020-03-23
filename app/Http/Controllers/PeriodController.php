<?php

namespace App\Http\Controllers;

use App\Period;
use App\Http\Requests\PeriodRequest;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();
        return view('dashboard', ['periods' => $periods]);
    }

    public function store(PeriodRequest $request)
    {
        Period::create($request->validated());
        return redirect()->route('admin')->with('message', 'New period created successfully!');
    }

    public function edit($id)
    {
        $period = Period::find($id);
        return view('admin.edit.edit-period', ['period' => $period]);
    }

    public function update(PeriodRequest $request, $id)
    {
        Period::find($id)->update($request->validated());
        return redirect()->route('admin')->with('message', 'Period updated successfully!');
    }

    public function destroy($id)
    {
        Period::find($id)->delete();
        return redirect()->route('admin')->with('message', 'Period deleted successfully!');
    }
}