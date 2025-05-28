<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;

class DeclaracaoController extends Controller
{
    public function emitirParaAluno()
    {
        $user = Auth::user(); 

        
    }
}
