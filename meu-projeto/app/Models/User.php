<?php

namespace App\Models;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
use App\Models\Solicitacao;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
    ];

    
    public function aluno()
    {
        return $this->hasOne(Aluno::class, 'user_id');
    }

    public function solicitacoes()
    {
        return $this->hasMany(Solicitacao::class, 'user_id');
    }

    public function isAluno()
    {
        return $this->is_admin === false;
    }

    public function isAdmin()
    {
        return $this->is_admin === true;
    }
}