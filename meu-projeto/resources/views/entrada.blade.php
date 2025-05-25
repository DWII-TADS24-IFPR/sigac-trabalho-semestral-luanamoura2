@php
    $hideNavbar = true;
@endphp

@extends('layouts.app')

@section('content')
<div class="vh-100 d-flex flex-column justify-content-center align-items-center bg-light">
    <div class="text-center p-5 bg-white shadow rounded" style="max-width: 450px; width: 90%;">
        <h1 class="mb-4 fw-bold text-primary">Bem-vindo ao SIGAC</h1>
        <p class="lead mb-5 text-secondary">Sistema Integrado de Gestão Acadêmica e Certificados</p>

        <div class="d-grid gap-3">
            <a href="{{ route('register.aluno') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i> Cadastrar como Aluno
            </a>
            <a href="{{ route('login.aluno') }}" class="btn btn-info btn-lg shadow-sm text-white">
                <i class="bi bi-person-fill me-2"></i> Login Aluno
            </a>
            <a href="{{ route('login.admin') }}" class="btn btn-warning btn-lg shadow-sm text-white">
                <i class="bi bi-shield-lock-fill me-2"></i> Login Administrador
            </a>
        </div>
    </div>
</div>
@endsection
