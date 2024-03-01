<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultado;

class MultiplosController extends Controller
{
    public function index()
    {
        return view('multiplos')->with('multiplos', []); // Inicializamos la variable $multiplos como un array vacío
    }

    public function calcularMultiplos(Request $request)
{
    $numero = $request->input('numero');

    // Almacenar los múltiplos encontrados
    $multiplos = [];

    // Comprobar si el número es múltiplo de 3, 5 o 7
    $textoMultiplos = '';
    $multiploMenor = PHP_INT_MAX;

    if ($numero % 3 === 0) {
        $textoMultiplos .= '3';
        $multiploMenor = min($multiploMenor, 3);
    }

    if ($numero % 5 === 0) {
        if ($textoMultiplos !== '') {
            $textoMultiplos .= ' y ';
        }
        $textoMultiplos .= '5';
        $multiploMenor = min($multiploMenor, 5);
    }

    if ($numero % 7 === 0) {
        if ($textoMultiplos !== '') {
            $textoMultiplos .= ' y ';
        }
        $textoMultiplos .= '7';
        $multiploMenor = min($multiploMenor, 7);
    }

    // Asignar el color después de determinar el múltiplo más pequeño
    $color = $this->colorFromMultiplo($multiploMenor);

    if ($textoMultiplos !== '') {
        $multiplos[] = [
            'texto' => "$numero [$textoMultiplos]",
            'color' => $color
        ];

        // Guardar la petición y el resultado en la base de datos
        $resultado = new Resultado();
        $resultado->numero = $numero;
        $resultado->multiplos = $textoMultiplos;
        $resultado->color = $color;
        $resultado->save();
    }

    return view('multiplos')->with('multiplos', $multiplos);
}

private function colorFromMultiplo($multiplo)
{
    switch ($multiplo) {
        case 3:
            return 'green';
        case 5:
            return 'red';
        case 7:
            return 'blue';
        default:
            return 'black';
    }
}
}
