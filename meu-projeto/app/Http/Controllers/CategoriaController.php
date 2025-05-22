<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function index()
    {

        $categorias = Categoria::with('curso')->get();
        return view('categorias.index', compact('categorias'));
    }


    
    public function create()
    {
        $cursos = \App\Models\Curso::all();
        return view('categorias.create', compact('cursos'));
    }

  
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias',
            'max_horas' => 'required|numeric|min:0',
            'curso_id' => 'required|exists:cursos,id',
        ]);


        Categoria::create([
            'nome' => $request->nome,
            'max_horas' => $request->max_horas,
            'curso_id' => $request->curso_id,
        ]);


        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $cursos = \App\Models\Curso::all();

        return view('categorias.edit', compact('categoria', 'cursos'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'max_horas' => 'nullable|integer|min:0',
        ]);

        $categoria = Categoria::findOrFail($id);


        $max_horas = $request->input('max_horas') !== null ? $request->input('max_horas') : 0;

        $categoria->update([
            'nome' => $request->input('nome'),
            'max_horas' => $max_horas,
        ]);

        return redirect()->route('categorias.show', $categoria->id)
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();


        return redirect()->route('categorias.index')
            ->with('success', 'Categoria deletada com sucesso!');
    }
}
