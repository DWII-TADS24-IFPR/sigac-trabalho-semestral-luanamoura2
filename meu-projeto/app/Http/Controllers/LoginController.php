<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login'); 
    }

    public function loginAsAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin'); 
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }
}
