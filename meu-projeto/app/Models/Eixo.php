<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

   
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'eixo_id');
    }
}