<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;


class AuthController extends Controller
{

    public function registerAluno(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|string|max:14',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id',
            'password' => 'required|confirmed|min:4',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => false,
        ]);


        Aluno::create([
            'nome' => $validated['name'],
            'email' => $validated['email'],
            'cpf' => $validated['cpf'],
            'curso_id' => $validated['curso_id'],
            'turma_id' => $validated['turma_id'],
            'senha' => Hash::make($validated['password']),
            'user_id' => $user->id,

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

        public function showRegisterAlunoForm()
        {
            $cursos = \App\Models\Curso::all();
            $turmas = \App\Models\Turma::all();

            return view('auth.aluno-register', compact('cursos', 'turmas'));
        }
    }
