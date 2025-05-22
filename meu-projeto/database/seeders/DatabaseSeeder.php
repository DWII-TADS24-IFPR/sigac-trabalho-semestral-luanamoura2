<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Aluno::create([
            'nome'=>'Carol',
            'cpf'=>'12345678900',
            'email'=>'carol@gmail.com',
            'senha'=>'12345678',
            'turma_id' => 1,
            'curso_id' => 1,
        ]);

        Turma::create([
            'ano' => 2005,
            'curso_id' => 1,
        ]);
    }
}
