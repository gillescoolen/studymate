<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();

        return view('dashboard', ['periods' => $periods]);
    }

    public function store(Request $request)
    {
        Period::create($request->all());
        return redirect('/admin');
    }
}