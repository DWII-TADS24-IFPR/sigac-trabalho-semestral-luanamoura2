<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
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
