@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Horas Complementares por Turma</h2>
    <canvas id="graficoHoras"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('graficoHoras').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($dados->pluck('turma') ?? []) !!},
            datasets: [{
                label: 'Horas aprovadas',
                data: {!! json_encode($dados->pluck('horas') ?? []) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Horas'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Turmas'
                    }
                }
            }
        }
    });
</script>
@endsection
