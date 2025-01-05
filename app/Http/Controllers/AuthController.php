<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    public function loginProcess(Request $request)
    {
        dd($request->all());
    }

    public function registerView()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email:rfc,dns|max:255|unique:users,email',
            'password'  => 'required|string|min:8|confirmed'
        ]);

        try {
            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password)
            ]);

            // Ganti ke page login
            return redirect()->route('register')->with('success', 'Akun berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
