<?php
// Relación III - Ejercicio 2
// Factorial iterativo y recursivo como funciones

function factorialIterativo(int $n): int {
    if ($n < 0) {
        throw new InvalidArgumentException('El factorial solo está definido para n >= 0');
    }
    $res = 1;
    for ($i = 2; $i <= $n; $i++) {
        $res *= $i;
    }
    return $res;
}

function factorialRecursivo(int $n): int {
    if ($n < 0) {
        throw new InvalidArgumentException('El factorial solo está definido para n >= 0');
    }
    if ($n === 0 || $n === 1) return 1;
    return $n * factorialRecursivo($n - 1);
}

$resultadoIter = null;
$resultadoRec = null;
$error = '';
$n = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = filter_input(INPUT_POST, 'n', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 0]
    ]);

    if ($n === false || $n === null) {
        $error = 'Introduce un número entero mayor o igual que 0.';
    } else {
        try {
            $resultadoIter = factorialIterativo($n);
            $resultadoRec = factorialRecursivo($n);
        } catch (InvalidArgumentException $e) {
            $error = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 2</title>
</head>
<body>
    <h1>Relación III - Ejercicio 2</h1>
    <p>Cálculo del factorial (versión iterativa y versión recursiva) en PHP.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="n">Número entero (n ≥ 0):</label>
        <input type="number" name="n" id="n" min="0" required value="<?php echo $n !== null ? htmlspecialchars((string)$n) : ''; ?>">
        <button type="submit">Calcular factorial</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($resultadoIter !== null && !$error): ?>
        <h2>Resultados para n = <?php echo htmlspecialchars((string)$n); ?></h2>
        <p><strong>Factorial iterativo:</strong> <?php echo $resultadoIter; ?></p>
        <p><strong>Factorial recursivo:</strong> <?php echo $resultadoRec; ?></p>
    <?php endif; ?>
</body>
</html>
