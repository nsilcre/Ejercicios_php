<?php
// Relación II - Ejercicio 11
// Re-formatea con Bootstrap el ejercicio 7 de la relación anterior y
// experimenta validaciones de los datos de entrada con HTML.

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nota1  = $_POST['nota1'] ?? '';
    $nota2  = $_POST['nota2'] ?? '';
    $faltas = $_POST['faltas'] ?? '';

    if (!is_numeric($nota1) || !is_numeric($nota2) || !ctype_digit($faltas)) {
        $mensaje = 'Datos no válidos.';
    } else {
        $nota1F  = (float)$nota1;
        $nota2F  = (float)$nota2;
        $faltasI = (int)$faltas;

        $media     = ($nota1F + $nota2F) / 2;
        $descuento = 0.25 * max(0, $faltasI);
        $notaFinal = $media - $descuento;

        if ($notaFinal >= 5) {
            $mensaje = 'Nota final: ' . $notaFinal . ' (APROBADO)';
        } else {
            $mensaje = 'Nota final: ' . $notaFinal . ' (SUSPENSO)';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Calcular nota final (Bootstrap)</h1>
    <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="col-md-4">
            <label for="nota1" class="form-label">Nota 1</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="nota1" name="nota1" required>
        </div>
        <div class="col-md-4">
            <label for="nota2" class="form-label">Nota 2</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="nota2" name="nota2" required>
        </div>
        <div class="col-md-4">
            <label for="faltas" class="form-label">Faltas sin justificar</label>
            <input type="number" step="1" min="0" class="form-control" id="faltas" name="faltas" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>

    <?php if ($mensaje): ?>
        <div class="alert alert-info mt-3"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>
</div>
</body>
</html>
