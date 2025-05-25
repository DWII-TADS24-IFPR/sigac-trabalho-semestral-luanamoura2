@extends('layouts.app')

@section('content')
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Bem-vindo ao SIGAC</h1>
            <p class="lead">Sistema Integrado de Gestão Acadêmica e Certificados</p>
        
            <div class="mt-4">
              
    </section>

    <section class="py-4">
        <div class="container text-center">
            <h2>O que é o SIGAC?</h2>
            <p class="lead">O SIGAC é um sistema desenvolvido para facilitar a emissão de declarações, organização de turmas, gestão de cursos e muito mais.</p>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
          <div class="row text-center gx-4 gy-4">
            <div class="col-md-4">
              <div class="p-4 bg-white shadow rounded h-100">
                <i class="bi bi-people fs-1 text-primary"></i>
                <h4 class="mt-3">Gerenciamento de Alunos</h4>
                <p>Cadastre, edite e visualize informações de alunos com facilidade.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-4 bg-white shadow rounded h-100">
                <i class="bi bi-journal-check fs-1 text-primary"></i>
                <h4 class="mt-3">Controle de Cursos</h4>
                <p>Organize cursos por categorias, níveis e turmas.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-4 bg-white shadow rounded h-100">
                <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                <h4 class="mt-3">Emissão de Declarações</h4>
                <p>Gere e imprima declarações de forma rápida e segura.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection