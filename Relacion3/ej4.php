<?php
// Relación III - Ejercicio 4
// Uso de la librería relacion3.php con las funciones de los ejercicios 1 a 3

require_once __DIR__ . '/relacion3.php';

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
    <title>Relación III - Ejercicio 4</title>
</head>
<body>
    <h1>Relación III - Ejercicio 4</h1>
    <p>Versión del ejercicio 1 utilizando la librería <code>relacion3.php</code> para obtener los números primos.</p>

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

    <hr>
    <p><strong>Nota:</strong> En esta versión se han comentado las funciones locales y se usan las de la librería <code>relacion3.php</code>.</p>
</body>
</html>
