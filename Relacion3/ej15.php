<?php
// Relación III - Ejercicio 15
// Redefinición de funciones anteriores como funciones flecha y paralelismo entre switch y match


$circunferencia = fn(float $r): float => 2 * M_PI * $r;
$circulo       = fn(float $r): float => M_PI * $r * $r;
$esfera        = fn(float $r): float => 4.0 / 3.0 * M_PI * $r * $r * $r;

$radio = null;
$resultados = [];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radio = filter_input(INPUT_POST, 'radio', FILTER_VALIDATE_FLOAT);
    if ($radio === false || $radio === null || $radio <= 0) {
        $error = 'Introduce un radio positivo.';
    } else {
        $resultados = [
            'circunferencia' => $circunferencia($radio),
            'circulo' => $circulo($radio),
            'esfera' => $esfera($radio),
        ];
    }
}

$diaNumero = 3;
$diaSwitch = '';
$diaMatch = '';

switch ($diaNumero) {
    case 1: $diaSwitch = 'lunes'; break;
    case 2: $diaSwitch = 'martes'; break;
    case 3: $diaSwitch = 'miércoles'; break;
    default: $diaSwitch = 'otro';
}

$diaMatch = match ($diaNumero) {
    1 => 'lunes',
    2 => 'martes',
    3 => 'miércoles',
    default => 'otro',
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 15</title>
</head>
<body>
    <h1>Relación III - Ejercicio 15</h1>

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

    <h2>Paralelismo switch / match</h2>
    <p>Con <code>switch</code>: <?php echo $diaSwitch; ?></p>
    <p>Con <code>match</code>: <?php echo $diaMatch; ?></p>
</body>
</html>
