<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de Control if</title>
</head>
<body>
        <h2>Su Nota es: {{$nota}}</h2>
        <p>
            Situación:
            @if ($nota>=10.5)
                Aprobada
            @else
                Desaprobada
            @endif

        </p>

        <p>
            Categoria:
            @if ($nota >= 0 && $nota<=6)
            Pésimo
            @elseif ($nota>6 && $nota<=10.5)
            Bajo
            @elseif ($nota>10.5 && $nota <=14)
            Regular
            @elseif ($nota>14 && $nota<=17)
            Bueno
            @elseif ($nota>17 && $nota <= 20)
            Exceletente
            @else
            Nota Invalida
            @endif
        </p>
</body>
</html>
