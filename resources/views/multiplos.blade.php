<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múltiplos</title>
</head>
<body>
    <h1>Calcular Múltiplos</h1>
    <form action="{{ route('calcular.multiplos') }}" method="post">
        @csrf
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero">
        <button type="submit">Calcular</button>
    </form>

    <h2>Resultado:</h2>
    <ul>
        @foreach ($multiplos as $multiplo)
            <li style="color: {{ $multiplo['color'] }}">{{ $multiplo['texto'] }}</li>
        @endforeach
    </ul>
</body>
</html>
