<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class Relatoriocontroller extends Controller
{
    function emitirRelatorio(){
        
        $dados = ['curso'=>'Análise e Desenvolvimento de Sistemas',
                  'alunos'=>['joao','luana','russi'],
                  'duração' => 4
            ];
      

        $dompdf = new Dompdf();

        $html = View::make('relatorio.curso',['dados'=> $dados])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();

    }
}
