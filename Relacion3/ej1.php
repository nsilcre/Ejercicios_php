<?php
// Relación III - Ejercicio 1
// esPrimo($num): devuelve true si $num es primo, false en caso contrario

function esPrimo(int $num): bool {
    if ($num <= 1) return false;
    if ($num === 2) return true;
    if ($num % 2 === 0) return false;

    $limite = (int) sqrt($num);
    for ($i = 3; $i <= $limite; $i += 2) {
        if ($num % $i === 0) return false;
    }
    return true;
}

$numero = null;
$primos = [];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1]
    ]);

    if ($numero === false || $numero === null) {
        $error = 'Introduce un número natural mayor o igual que 1.';
    } else {
        for ($i = 1; $i <= $numero; $i++) {
            if (esPrimo($i)) {
                $primos[] = $i;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 1</title>
</head>
<body>
    <h1>Relación III - Ejercicio 1</h1>
    <p>Introduce un número natural y se mostrarán todos los números primos entre 1 y el número introducido.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="numero">Número natural:</label>
        <input type="number" name="numero" id="numero" min="1" required value="<?php echo $numero !== null ? htmlspecialchars((string)$numero) : ''; ?>">
        <button type="submit">Calcular primos</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($numero !== null && !$error): ?>
        <h2>Números primos entre 1 y <?php echo htmlspecialchars((string)$numero); ?>:</h2>
        <?php if (count($primos) === 0): ?>
            <p>No hay números primos en ese rango.</p>
        <?php else: ?>
            <p><?php echo implode(', ', $primos); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
