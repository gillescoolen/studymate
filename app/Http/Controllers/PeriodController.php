<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $period = Period::all();
        return view('LanguagePage', ['Languages' => $Languages]);
    }
}
