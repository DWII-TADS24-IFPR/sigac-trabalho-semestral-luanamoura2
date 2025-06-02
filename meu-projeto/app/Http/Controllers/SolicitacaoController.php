<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Comprovante;
use App\Models\Declaracao;

class SolicitacaoController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        $solicitacoes = Solicitacao::where('user_id', $user->id)->get();

        $aluno = $user->aluno;

        $comprovantes = collect();
        $declaracoes = collect();

        if ($aluno) {
            $comprovantes = Comprovante::where('aluno_id', $aluno->id)->get();
            $declaracoes = Declaracao::where('aluno_id', $aluno->id)->get();
        }


        return view('solicitacoes.index', compact('solicitacoes', 'comprovantes', 'declaracoes'));
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

    public function emitirDeclaracao()
    {
        $user = Auth::user();
        $aluno = $user->aluno;

        if (!$aluno) {
            return redirect()->back()->with('error', 'Você não está cadastrado como aluno.');
        }


        $totalHoras = Solicitacao::where('user_id', $user->id)
            ->where('status', 'aprovado')
            ->sum('carga_horaria');


        $horasMinimas = 40;

        if ($totalHoras < $horasMinimas) {
            return redirect()->back()->with('error', 'Você ainda não cumpriu as horas necessárias para emitir a declaração.');
        }

        return view('declaracoes.emitir', compact('aluno', 'totalHoras'));
    }


    public function adminIndex()
    {

        if (!Auth::user()->is_admin) {
            abort(403, 'Acesso não autorizado.');
        }


        $solicitacoes = Solicitacao::with(['aluno', 'categoria'])->orderBy('created_at', 'desc')->get();

        return view('admin.solicitacoes.index', compact('solicitacoes'));
    }


    public function aprovar($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->status = 'aprovado';
        $solicitacao->save();

        return redirect()->back()->with('success', 'Solicitação aprovada com sucesso!');
    }

    public function rejeitar($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->status = 'reprovado';
        $solicitacao->save();

        return redirect()->back()->with('success', 'Solicitação rejeitada com sucesso!');
    }
}
