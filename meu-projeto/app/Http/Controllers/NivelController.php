<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $nivels = Nivel::all();
        return view('nivels.index', compact('nivels'));
    }

    public function create()
    {
        return view('nivels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3'
        ]);

        Nivel::create($request->all());

        return redirect()->route('nivels.index')->with('success', 'Nível criado com sucesso.');
    }

    public function show(string $id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('nivels.show', compact('nivel'));  
    }

    public function edit(string $id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('nivels.edit', compact('nivel'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $nivel = Nivel::findOrFail($id);
        $nivel->update($request->all());

        return redirect()->route('nivels.index')->with('success', 'Nível atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('nivels.index')->with('success', 'Nível excluído com sucesso!');
    }
}
