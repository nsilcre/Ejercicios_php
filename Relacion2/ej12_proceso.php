<?php
// Relación II - Ejercicio 12 (proceso)
// Calcula la nota final usando la rúbrica del ejercicio 8 de la Relación I.

$rubrica = [
    'inicial'  => 0.1,
    'primera'  => 0.2,
    'segunda'  => 0.3,
    'tercera'  => 0.4,
];

$nombre = $_POST['nombre'] ?? '';
$email  = $_POST['email'] ?? '';
$inicial = $_POST['inicial'] ?? '';
$primera = $_POST['primera'] ?? '';
$segunda = $_POST['segunda'] ?? '';
$tercera = $_POST['tercera'] ?? '';

$notaFinal = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notas = compact('inicial','primera','segunda','tercera');
    foreach ($notas as $clave => $valor) {
        if (!is_numeric($valor)) {
            $error = 'Todas las notas deben ser numéricas.';
            break;
        }
        $v = (float)$valor;
        if ($v < 0 || $v > 10) {
            $error = 'Las notas deben estar entre 0 y 10.';
            break;
        }
        $notas[$clave] = $v;
    }

    if (!$error) {
        $notaFinal = 0;
        foreach ($rubrica as $clave => $peso) {
            $notaFinal += $peso * $notas[$clave];
        }
    }
} else {
    $error = 'Acceso no válido (use el formulario).';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 12 (Resultado)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Resultado de la calificación</h1>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php elseif ($notaFinal !== null): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($nombre); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($email); ?></h6>
                <p class="card-text">Nota final: <strong><?php echo number_format($notaFinal, 2); ?></strong></p>
            </div>
        </div>
    <?php endif; ?>

    <a href="ej12_form.php" class="btn btn-secondary mt-3">Volver al formulario</a>
</div>
</body>
</html>
