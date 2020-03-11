<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::with('modules')->get();
        return view('period', ['periods' => $periods]);
    }
}