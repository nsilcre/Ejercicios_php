<?php
// Relación III - Ejercicio 17
// Practicar funciones de arrays con dos arrays numéricos: pares y múltiplos de 3

function array_all(array $array, callable $predicado): bool
{
    foreach ($array as $valor) {
        if (!$predicado($valor)) {
            return false;
        }
    }
    return true;
}

function array_any(array $array, callable $predicado): bool
{
    foreach ($array as $valor) {
        if ($predicado($valor)) {
            return true;
        }
    }
    return false;
}

function array_find(array $array, callable $predicado)
{
    foreach ($array as $valor) {
        if ($predicado($valor)) {
            return $valor;
        }
    }
    return null;
}

function esPrimo(int $n): bool
{
    if ($n <= 1) return false;
    if ($n === 2) return true;
    if ($n % 2 === 0) return false;
    $lim = (int) sqrt($n);
    for ($i = 3; $i <= $lim; $i += 2) {
        if ($n % $i === 0) return false;
    }
    return true;
}

$pares = range(2, 20, 2);
$multiplosDeTres = range(3, 39, 3);

$cuantosPares = count($pares);
$hayMultiplo5EnPares = array_any($pares, fn(int $n) => $n % 5 === 0);
$primosEnMultiplosDeTres = array_filter($multiplosDeTres, fn(int $n) => esPrimo($n));
$numeroDosCifrasIguales = array_find($multiplosDeTres, function (int $n): bool {
    if ($n < 10 || $n > 99) return false;
    $s = (string) $n;
    return $s[0] === $s[1];
});
$cuadradosPares = array_map(fn(int $n) => $n * $n, $pares);
$dobleMultiplos = $multiplosDeTres;
array_walk($dobleMultiplos, function (&$v) {
    $v *= 2;
});
$interseccion = array_intersect($pares, $multiplosDeTres);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 17</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
    <h1>Relación III - Ejercicio 17</h1>

    <div class="alert alert-secondary">
        <h2>Arrays de partida</h2>
        <p><strong>Pares:</strong> <?php echo implode(', ', $pares); ?></p>
        <p><strong>Múltiplos de 3:</strong> <?php echo implode(', ', $multiplosDeTres); ?></p>
    </div>

    <div class="alert alert-info">
        Número de elementos del array de pares: <strong><?php echo $cuantosPares; ?></strong>
    </div>

    <div class="alert alert-success">
        ¿Hay algún múltiplo de 5 en el array de pares?
        <strong><?php echo $hayMultiplo5EnPares ? 'Sí' : 'No'; ?></strong>
    </div>

    <div class="alert alert-primary">
        Números primos dentro de los múltiplos de 3:<br>
        <?php echo $primosEnMultiplosDeTres ? implode(', ', $primosEnMultiplosDeTres) : 'Ninguno'; ?>
    </div>

    <div class="alert alert-warning">
        Primera ocurrencia de número de dos cifras idénticas en los múltiplos de 3:
        <strong><?php echo $numeroDosCifrasIguales ?? 'Ninguno'; ?></strong>
    </div>

    <div class="alert alert-secondary">
        Cuadrado de los valores pares:<br>
        <?php echo implode(', ', $cuadradosPares); ?>
    </div>

    <div class="alert alert-dark">
        Valores de los múltiplos de 3 doblados:<br>
        <?php echo implode(', ', $dobleMultiplos); ?>
    </div>

    <div class="alert alert-danger">
        Intersección entre pares y múltiplos de 3:<br>
        <?php echo $interseccion ? implode(', ', $interseccion) : 'No hay valores comunes'; ?>
    </div>
</body>

</html>