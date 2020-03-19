<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) 
    {   
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',

        ]);

    }
}
