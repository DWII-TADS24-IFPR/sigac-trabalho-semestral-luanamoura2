<!DOCTYPE html>
<html>
<head>
    <title>Declaração do Aluno</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        p { font-size: 14px; }
    </style>
</head>
<body>
    <h1>Declaração do Aluno</h1>
    <p><strong>Aluno:</strong> {{ $aluno->nome }}</p>
    <p><strong>Total de horas:</strong> {{ $horasTotal }}</p>
    <p>Declaração emitida em: {{ date('d/m/Y') }}</p>
</body>
</html>
