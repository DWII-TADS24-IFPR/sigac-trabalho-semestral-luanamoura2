<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $eixos = Eixo::all();
        return view('eixos.index', compact('eixos'));
    }

    public function create()
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:eixos,nome',
        ]);

        Eixo::create($request->all());

        return redirect()->route('eixos.index')->with('success', 'Eixo criado com sucesso!');
    }

    public function edit(Eixo $eixo)
    {
        return view('eixos.edit', compact('eixo'));
    }

    public function update(Request $request, Eixo $eixo)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:eixos,nome,' . $eixo->id,
        ]);

        $eixo->update($request->all());

        return redirect()->route('eixos.index')->with('success', 'Eixo atualizado com sucesso!');
    }

    public function destroy(Eixo $eixo)
    {
        $eixo->delete();

        return redirect()->route('eixos.index')->with('success', 'Eixo excluído com sucesso!');
    }
}
