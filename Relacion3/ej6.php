<?php
// Relación III - Ejercicio 6
// Simulación de lanzamientos de un dado equiprobable y otro trucado

$tiradas = null;
$frecuenciasJusto = array_fill(1, 6, 0);
$frecuenciasTrucado = array_fill(1, 6, 0);
$error = '';

function lanzarDadoJusto(): int {
    return random_int(1, 6);
}

function lanzarDadoTrucado(): int {
    $r = random_int(1, 8);
    if ($r <= 5) {
        return $r;
    }
    return 6; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tiradas = filter_input(INPUT_POST, 'tiradas', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1]
    ]);

    if ($tiradas === false || $tiradas === null) {
        $error = 'Introduce un número de tiradas entero y mayor o igual que 1.';
    } else {
        for ($i = 0; $i < $tiradas; $i++) {
            $resJ = lanzarDadoJusto();
            $resT = lanzarDadoTrucado();
            $frecuenciasJusto[$resJ]++;
            $frecuenciasTrucado[$resT]++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 6</title>
</head>
<body>
    <h1>Relación III - Ejercicio 6</h1>
    <p>Simulación de lanzamientos de un dado equiprobable y de otro trucado (el 6 es 3 veces más probable).</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="tiradas">Número de tiradas:</label>
        <input type="number" name="tiradas" id="tiradas" min="1" required value="<?php echo $tiradas !== null ? htmlspecialchars((string)$tiradas) : ''; ?>">
        <button type="submit">Simular</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($tiradas !== null && !$error): ?>
        <h2>Resultados para <?php echo htmlspecialchars((string)$tiradas); ?> tiradas</h2>
        <h3>Dado justo</h3>
        <ul>
            <?php foreach ($frecuenciasJusto as $cara => $freq): ?>
                <li><?php echo $cara; ?>: <?php echo $freq; ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Dado trucado</h3>
        <ul>
            <?php foreach ($frecuenciasTrucado as $cara => $freq): ?>
                <li><?php echo $cara; ?>: <?php echo $freq; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
