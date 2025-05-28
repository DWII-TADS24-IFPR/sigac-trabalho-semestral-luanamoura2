<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Aluno;

class Solicitacao extends Model
{
     protected $table = 'solicitacoes';
    protected $fillable = [
        'user_id',
        'categoria_id',
        'descricao',
        'carga_horaria',
        'documento',
        'status',
        'observacoes',
    ];

   
    public function aluno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
