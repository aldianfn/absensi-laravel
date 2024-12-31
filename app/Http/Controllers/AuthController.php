<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    public function registerProcess(Request $request)
    {
        dd($request->all());
    }
}
