<?php
// Relación III - Ejercicio 16
// Uso de funciones de arrays con callbacks sobre un range(1,100)

function array_all(array $array, callable $predicado): bool {
    foreach ($array as $valor) {
        if (!$predicado($valor)) return false;
    }
    return true;
}

function array_any(array $array, callable $predicado): bool {
    foreach ($array as $valor) {
        if ($predicado($valor)) return true;
    }
    return false;
}

function array_find(array $array, callable $predicado) {
    foreach ($array as $valor) {
        if ($predicado($valor)) {
            return $valor;
        }
    }
    return null;
}

function esPrimo(int $n): bool {
    if ($n <= 1) return false;
    if ($n === 2) return true;
    if ($n % 2 === 0) return false;
    $lim = (int) sqrt($n);
    for ($i = 3; $i <= $lim; $i += 2) {
        if ($n % $i === 0) return false;
    }
    return true;
}

$numeros = range(1, 100);

$todosPositivos = array_all($numeros, fn($n) => $n > 0);
$hayMultiplo5 = array_any($numeros, fn($n) => $n % 5 === 0);
$primos = array_filter($numeros, fn($n) => esPrimo($n));
$numeroDosCifrasIguales = array_find($numeros, function ($n) {
    if ($n < 10 || $n > 99) return false;
    $s = (string) $n;
    return $s[0] === $s[1];
});
$cuadrados = array_map(fn($n) => $n * $n, $numeros);

$doble = $numeros;
array_walk($doble, function (&$v) { $v *= 2; });
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 16</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h1>Relación III - Ejercicio 16</h1>

    <div class="alert alert-success">
        ¿Todos los números son positivos? <strong><?php echo $todosPositivos ? 'Sí' : 'No'; ?></strong>
    </div>

    <div class="alert alert-info">
        ¿Hay algún múltiplo de 5? <strong><?php echo $hayMultiplo5 ? 'Sí' : 'No'; ?></strong>
    </div>

    <div class="alert alert-primary">
        Números primos entre 1 y 100:<br>
        <?php echo implode(', ', $primos); ?>
    </div>

    <div class="alert alert-warning">
        Primera ocurrencia de número de dos cifras idénticas: <strong><?php echo $numeroDosCifrasIguales ?? 'Ninguno'; ?></strong>
    </div>

    <div class="alert alert-secondary">
        Cuadrado de los valores (primeros 10):
        <br><?php echo implode(', ', array_slice($cuadrados, 0, 10)); ?> ...
    </div>

    <div class="alert alert-dark">
        Valores doblados (primeros 10):
        <br><?php echo implode(', ', array_slice($doble, 0, 10)); ?> ...
    </div>
</body>
</html>
