<?php
// Relación IV - Ejercicio 4
// Juego "adivina el número" usando variables de sesión.

session_start();

if (!isset($_SESSION['secreto'])) {
    $_SESSION['secreto'] = rand(1, 100);
    $_SESSION['intentos'] = 0;
}

$mensaje = '';
$pista = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nuevo'])) {
        $_SESSION['secreto'] = rand(1, 100);
        $_SESSION['intentos'] = 0;
        $mensaje = 'Se ha comenzado una nueva partida.';
    } else {
        $intento = (int) ($_POST['intento'] ?? 0);
        $_SESSION['intentos']++;
        $secreto = $_SESSION['secreto'];

        if ($intento < 1 || $intento > 100) {
            $mensaje = 'El número debe estar entre 1 y 100.';
        } elseif ($intento === $secreto) {
            $mensaje = '¡Has acertado en ' . $_SESSION['intentos'] . ' intento(s)!';
        } elseif ($intento > $secreto) {
            $mensaje = 'No has acertado.';
            $pista = 'Te has pasado.';
        } else {
            $mensaje = 'No has acertado.';
            $pista = 'Te has quedado corto.';
        }
    }
}

$secreto = $_SESSION['secreto'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 4</title>
</head>
<body>
<h1>Relación IV - Ejercicio 4: Adivina el número (con sesiones)</h1>

<p><strong>[Depuración]</strong> El número secreto actual es: <?php echo $secreto; ?></p>
<p>Intentos realizados: <?php echo $_SESSION['intentos']; ?></p>

<?php if ($mensaje): ?>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <?php if ($pista): ?><p><?php echo htmlspecialchars($pista); ?></p><?php endif; ?>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Introduce un número entre 1 y 100:
        <input type="number" name="intento" min="1" max="100" required>
    </label>
    <button type="submit">Probar</button>
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="margin-top:1em;">
    <button type="submit" name="nuevo" value="1">Empezar nueva partida</button>
</form>
</body>
</html>
