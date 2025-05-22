<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Categoria;
use App\Models\Curso;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index')->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $cursos = Curso::all();
        $turmas = \App\Models\Turma::all();
        return view('documentos.create', compact('categorias', 'cursos', 'turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
   
    $request->validate([
        'descricao' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'url' => 'nullable|url',
        'categoria_id' => 'required|exists:categorias,id',
        'horas_in' => 'required|numeric',
        'horas_out' => 'required|numeric',
        'comentario' => 'nullable|string', 
    ]);

   
    Documento::create([
        'descricao' => $request->descricao,
        'status' => $request->status,
        'url' => $request->url,  
        'categoria_id' => $request->categoria_id,
        'horas_in' => $request->horas_in,
        'horas_out' => $request->horas_out,
         'comentario' => $request->comentario,
    ]);

 
    return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso!');
}

    
    public function show(string $id)
    {
        $documento = Documento::findOrFail($id);
        return view('documentos.show', compact('documento'));
    }


    
   public function edit(string $id)
    {
        $documento = Documento::findOrFail($id);
        $categorias = \App\Models\Categoria::all();

        return view('documentos.edit')->with(['documento' => $documento, 'categorias' => $categorias]);
    }


    
  public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'horas_in' => 'required|numeric',
            'status' => 'required|string|max:50',
            'comentario' => 'nullable|string',
            'horas_out' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $documento->update($request->all());

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }
   
    public function destroy(string $id)
    {
         $documento = Documento::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso.');
    }
}
