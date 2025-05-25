<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;


class SolicitacaoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $solicitacoes = Solicitacao::where('user_id', $user->id)->get();

        return view('solicitacoes.index', compact('solicitacoes'));
    }

    public function create()
    {
         $categorias = Categoria::all();
         return view('solicitacoes.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:255',
            'carga_horaria' => 'required|integer|min:1',
            'documento' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('documento')->store('documentos');

        Solicitacao::create([
            'user_id' => Auth::id(),
            'categoria_id' => $request->categoria_id,
            'descricao' => $request->descricao,
            'carga_horaria' => $request->carga_horaria,
            'documento' => $path,
            'status' => 'pendente',
        ]);

        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação enviada com sucesso!');
    }
}

