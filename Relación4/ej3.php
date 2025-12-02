<?php
// Relación IV - Ejercicio 3
// Juego "adivina el número" usando campos hidden (sin sesiones), en modo depuración con GET.

$mensaje = '';
$pista = '';
$modoDepuracion = true;

if (isset($_GET['secreto'])) {
    $secreto = (int) $_GET['secreto'];
} else {
    $secreto = rand(1, 100);
}

$intento = isset($_GET['intento']) ? (int) $_GET['intento'] : null;

if ($intento !== null) {
    if ($intento < 1 || $intento > 100) {
        $mensaje = 'El número debe estar entre 1 y 100.';
    } elseif ($intento === $secreto) {
        $mensaje = '¡Has acertado!';
    } elseif ($intento > $secreto) {
        $mensaje = 'No has acertado.';
        $pista = 'Te has pasado.';
    } else {
        $mensaje = 'No has acertado.';
        $pista = 'Te has quedado corto.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 3</title>
</head>
<body>
<h1>Relación IV - Ejercicio 3: Adivina el número (sin sesiones)</h1>

<?php if ($modoDepuracion): ?>
    <p><strong>[Depuración]</strong> El número secreto actual es: <?php echo $secreto; ?></p>
<?php endif; ?>

<?php if ($mensaje): ?>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <?php if ($pista): ?><p><?php echo htmlspecialchars($pista); ?></p><?php endif; ?>
<?php endif; ?>

<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Introduce un número entre 1 y 100:
        <input type="number" name="intento" min="1" max="100" required>
    </label>
    <input type="hidden" name="secreto" value="<?php echo $secreto; ?>">
    <button type="submit">Probar</button>
</form>

<form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="margin-top:1em;">
    <button type="submit">Empezar de nuevo</button>
</form>
</body>
</html>
