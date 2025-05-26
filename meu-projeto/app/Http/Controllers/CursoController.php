<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Nivel;
use App\Models\Eixo;

class CursoController extends Controller
{
    
    public function index()
    {
        $cursos = Curso::with('nivel', 'eixo')->get(); 
        return view('cursos.index', compact('cursos'));
    }


    
    public function create()
    {
        $turmas = Turma::all();
        $nivels = Nivel::all();
        $eixos = Eixo::all(); 
        return view('cursos.create', compact('turmas', 'nivels', 'eixos'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'nivel_id' => 'required|exists:nivels,id',  
            'total_horas' => 'required|integer',
            'eixo_id' => 'required|exists:eixos,id',
        ]);



        Curso::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'nivel_id' => $request->nivel_id,
            'total_horas' => $request->total_horas,
            'eixo_id' => $request->eixo_id,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }


    public function show(string $id)
    {
        $curso = Curso::with('nivel', 'eixo')->findOrFail($id); 
        return view('cursos.show', compact('curso'));
    }

    
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        $turmas = Turma::all();
        $nivels = Nivel::all();
        $eixos = Eixo::all();
        return view('cursos.edit', compact('curso', 'turmas', 'nivels', 'eixos'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'nivel_id' => 'required|exists:nivels,id',
            'total_horas' => 'required|integer',
            'eixo_id' => 'required|exists:eixos,id',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->update([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'nivel_id' => $request->nivel_id,
            'total_horas' => $request->total_horas,
            'eixo_id' => $request->eixo_id,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }
    
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }
}
