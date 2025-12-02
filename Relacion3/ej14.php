<?php
// Relación III - Ejercicio 14
// Funciones anónimas para circunferencia, círculo y esfera

$resultados = [];
$error = '';
$radio = null;

$circunferencia = function (float $r): float {
    return 2 * M_PI * $r;
};

$circulo = function (float $r): float {
    return M_PI * $r * $r;
};

$esfera = function (float $r): float {
    return 4.0 / 3.0 * M_PI * $r * $r * $r;
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radio = filter_input(INPUT_POST, 'radio', FILTER_VALIDATE_FLOAT);
    if ($radio === false || $radio === null || $radio <= 0) {
        $error = 'Introduce un radio positivo.';
    } else {
        $resultados['circunferencia'] = $circunferencia($radio);
        $resultados['circulo'] = $circulo($radio);
        $resultados['esfera'] = $esfera($radio);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 14</title>
</head>

<body>
    <h1>Relación III - Ejercicio 14</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="radio">Radio (positivo real):</label>
        <input type="number" step="0.01" min="0" name="radio" id="radio" required value="<?php echo $radio !== null ? htmlspecialchars((string)$radio) : ''; ?>">
        <button type="submit">Calcular</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($resultados && !$error): ?>
        <ul>
            <li>Longitud de la circunferencia: <?php echo $resultados['circunferencia']; ?></li>
            <li>Área del círculo: <?php echo $resultados['circulo']; ?></li>
            <li>Volumen de la esfera: <?php echo $resultados['esfera']; ?></li>
        </ul>
    <?php endif; ?>
</body>

</html>