<?php
// Relación III - Ejercicio 3
// Cálculo del MCD mediante dos algoritmos de Euclides (restas y módulo)
// Versión iterativa y recursiva para cada uno

function mcdRestaIter(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;

    while ($a !== $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function mcdRestaRec(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;
    if ($a === $b) return $a;
    if ($a > $b) {
        return mcdRestaRec($a - $b, $b);
    }
    return mcdRestaRec($a, $b - $a);
}

function mcdModuloIter(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;

    while ($b !== 0) {
        $r = $a % $b;
        $a = $b;
        $b = $r;
    }
    return $a;
}

function mcdModuloRec(int $a, int $b): int
{
    $a = abs($a);
    $b = abs($b);
    if ($b === 0) return $a;
    return mcdModuloRec($b, $a % $b);
}

$errores = [];
$resultados = [];
$a = $b = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = filter_input(INPUT_POST, 'a', FILTER_VALIDATE_INT);
    $b = filter_input(INPUT_POST, 'b', FILTER_VALIDATE_INT);

    if ($a === false || $b === false || $a === null || $b === null) {
        $errores[] = 'Debes introducir dos enteros válidos (pueden ser positivos o negativos, no ambos cero).';
    } elseif ($a == 0 && $b == 0) {
        $errores[] = 'Al menos uno de los números debe ser distinto de 0.';
    } else {
        $resultados['mcdRestaIter']  = mcdRestaIter($a, $b);
        $resultados['mcdRestaRec']   = mcdRestaRec($a, $b);
        $resultados['mcdModuloIter'] = mcdModuloIter($a, $b);
        $resultados['mcdModuloRec']  = mcdModuloRec($a, $b);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 3</title>
</head>

<body>
    <h1>Relación III - Ejercicio 3</h1>
    <p>Calcula el MCD de dos números utilizando dos variantes del algoritmo de Euclides (restas y módulo),
        tanto de forma iterativa como recursiva.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="a">Número A:</label>
        <input type="number" name="a" id="a" required value="<?php echo $a !== null ? htmlspecialchars((string)$a) : ''; ?>">
        <br>
        <label for="b">Número B:</label>
        <input type="number" name="b" id="b" required value="<?php echo $b !== null ? htmlspecialchars((string)$b) : ''; ?>">
        <br>
        <button type="submit">Calcular MCD</button>
    </form>

    <?php if ($errores): ?>
        <ul style="color:red;">
            <?php foreach ($errores as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($resultados && !$errores): ?>
        <h2>Resultados para A = <?php echo htmlspecialchars((string)$a); ?> y B = <?php echo htmlspecialchars((string)$b); ?>:</h2>
        <ul>
            <li>MCD por restas (iterativo): <?php echo $resultados['mcdRestaIter']; ?></li>
            <li>MCD por restas (recursivo): <?php echo $resultados['mcdRestaRec']; ?></li>
            <li>MCD por módulo (iterativo): <?php echo $resultados['mcdModuloIter']; ?></li>
            <li>MCD por módulo (recursivo): <?php echo $resultados['mcdModuloRec']; ?></li>
        </ul>
    <?php endif; ?>
</body>

</html>