<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function showAlunoLoginForm()
    {
        return view('auth.aluno-login');
    }

    public function showAlunoRegisterForm()
    {
        return view('auth.aluno-register');
    }

     public function registerAluno(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
           
            'password' => 'required|string|min:8|confirmed',
        ]);

       

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
          
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso! Bem-vindo(a)!');
    }
}