<?php
// Relación IV - Ejercicio 2
// Uso de variables de sesión num1 (a) y num2 (b) con operaciones sobre ellas.

session_start();

if (!isset($_SESSION['a'], $_SESSION['b'])) {
    $_SESSION['a'] = 0;
    $_SESSION['b'] = 0;
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? 'aumentar_a';

    switch ($accion) {
        case 'aumentar_a':
            $_SESSION['a']++;
            break;
        case 'disminuir_a':
            $_SESSION['a']--;
            break;
        case 'aumentar_b':
            $_SESSION['b']++;
            break;
        case 'disminuir_b':
            $_SESSION['b']--;
            break;
        case 'reset_a':
            $_SESSION['a'] = 0;
            break;
        case 'reset_b':
            $_SESSION['b'] = 0;
            break;
        case 'destruir':
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['a'] = 0;
            $_SESSION['b'] = 0;
            $mensaje = 'Sesión destruida y reiniciada.';
            break;
    }
}

$a = $_SESSION['a'];
$b = $_SESSION['b'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Relación IV - Ejercicio 2</h1>

    <p>Variables de sesión: <strong>a = <?php echo $a; ?></strong>, <strong>b = <?php echo $b; ?></strong></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3 mb-3">
        <div class="col-md-6">
            <label for="accion" class="form-label">Acción</label>
            <select name="accion" id="accion" class="form-select">
                <option value="aumentar_a">Aumentar a</option>
                <option value="disminuir_a">Disminuir a</option>
                <option value="aumentar_b">Aumentar b</option>
                <option value="disminuir_b">Disminuir b</option>
                <option value="reset_a">Resetear a</option>
                <option value="reset_b">Resetear b</option>
                <option value="destruir">Destruir sesión</option>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Aplicar</button>
        </div>
    </form>

    <?php if ($mensaje): ?>
        <div class="alert alert-warning"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>

    <p class="text-muted">Cierra la pestaña y vuelve a abrirla, o prueba en otro navegador, para observar el comportamiento de las sesiones.</p>
</div>
</body>
</html>
