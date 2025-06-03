<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function horasPorTurma()
    {
        $dados = Turma::with(['alunos.solicitacoes' => function ($query) {
            $query->where('status', 'aprovado');
        }])->get()->map(function ($turma) {
            $totalHoras = $turma->alunos->sum(function ($aluno) {
                return $aluno->solicitacoes->sum('carga_horaria');
            });

            return [
                'turma' => $turma->nome,
                'horas' => $totalHoras
            ];
        });

        return view('graficos.horas_por_turma', ['dados' => $dados]);
    }
}
