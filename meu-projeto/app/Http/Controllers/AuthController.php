<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{

    public function registerAluno(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:4',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'is_admin' => false, 
    ]);

    return redirect()->route('login.aluno')->with('success', 'Cadastro realizado com sucesso!');
}

    public function loginAluno(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           
            if (!Auth::user()->is_admin) {
                return redirect()->intended(route('home'));
            }

            Auth::logout();
            return back()->withErrors(['email' => 'A conta informada não é de aluno.']);
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não são válidas.',
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

           
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('home'));
            }

            Auth::logout();
            return back()->withErrors(['email' => 'A conta informada não é de administrador.']);
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não são válidas.',
        ]);
    }
}
