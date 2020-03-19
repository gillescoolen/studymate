<?php

namespace App\Http\Controllers;

use App\Teacher; 
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function store(Request $request)
    {
        Teacher::create($request->all());
        return redirect('/admin');
    }
}
