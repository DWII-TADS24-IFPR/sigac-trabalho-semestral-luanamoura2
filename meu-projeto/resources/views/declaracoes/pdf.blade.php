<!DOCTYPE html>
<html>
<head>
    <title>Declaração do Aluno</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            margin: 40px;
            color: #333;
        }
        h1 { 
            text-align: center; 
            font-size: 24px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }
        p {
            font-size: 16px; 
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .assinatura {
            margin-top: 60px;
            text-align: right;
            font-style: italic;
        }
        .linha-assinatura {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 250px;
            float: right;
        }
    </style>
</head>
<body>
    <h1>Declaração de Atividades Complementares</h1>

    <p>Declaramos que o(a) aluno(a) <strong>{{ $aluno->nome }}</strong> cumpriu o total de <strong>{{ $horasTotal }}</strong> horas em atividades complementares, conforme registro oficial.</p>

    <p>Esta declaração é válida para fins acadêmicos e comprovação de carga horária.</p>

    <p>Emitida em {{ date('d/m/Y') }}.</p>

    <div class="assinatura">
        <div class="linha-assinatura"></div>
        Coordenação Acadêmica
    </div>
</body>
</html>
 