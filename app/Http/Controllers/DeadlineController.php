<?php

namespace App\Http\Controllers;

use App\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        $periods = Deadline::all();

        return view('deadlines', ['periods' => $periods]);
    }

    public function store(Request $request)
    {
        Deadline::create($request->all());
        return redirect('/deadlines');
    }
}
