<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Curso;

class TurmaController extends Controller
{


    public function index()
    {

        $turmas = Turma::all();


        foreach ($turmas as $turma) {
            $turma->periodo = $turma->inicio . ' até ' . $turma->fim;
        }

        return view('turmas.index', compact('turmas'));
    }



    public function create()
    {
        $cursos = \App\Models\Curso::all();
        return view('turmas.create', compact('cursos'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer',
            'inicio' => 'required|date',
            'fim' => 'required|date',
        ]);


        Turma::create([
            'curso_id' => $request->curso_id,
            'ano' => $request->ano,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
        ]);

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }


    public function show(string $id)
    {
        $turma = Turma::findOrFail($id);
        return view('turmas.show', compact('turma'));
    }


    public function edit(string $id)
    {
        $turma = Turma::findOrFail($id);
        $cursos = Curso::all();
        return view('turmas.edit', compact('turma','cursos'));
    }


    public function update(Request $request, $id)
{
    $turma = Turma::findOrFail($id);

    $request->validate([
        'curso_id' => 'required|exists:cursos,id',
        'ano' => 'required|integer',
        'inicio' => 'required|date',
        'fim' => 'required|date',
    ]);

   
    $turma->update([
        'curso_id' => $request->curso_id,
        'ano' => $request->ano,
        'inicio' => $request->inicio,
        'fim' => $request->fim,
    ]);

   
    return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
}

    public function destroy(string $id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }
}
