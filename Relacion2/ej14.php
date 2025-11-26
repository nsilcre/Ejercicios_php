<?php
// Relación II - Ejercicio 14
// Versión del ejercicio 12 de la relación I con Bootstrap, validación JS
// y salida gráfica con progress bar.

$nota = null;
$texto = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nota = $_POST['nota'] ?? '';
    if (ctype_digit($nota)) {
        $nota = (int)$nota;
        if ($nota >= 1 && $nota <= 10) {
            switch ($nota) {
                case 10:
                case 9:
                    $texto = 'Sobresaliente';
                    break;
                case 8:
                case 7:
                    $texto = 'Notable';
                    break;
                case 6:
                    $texto = 'Bien';
                    break;
                case 5:
                    $texto = 'Suficiente';
                    break;
                default:
                    $texto = 'Suspenso';
            }
        } else {
            $nota = null;
        }
    } else {
        $nota = null;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Calificación con barra de progreso</h1>
    <form id="formNota" class="row g-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="nota" class="form-label">Nota (1-10)</label>
            <input type="number" min="1" max="10" class="form-control" id="nota" name="nota">
            <div class="invalid-feedback">Introduce una nota entera entre 1 y 10.</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Evaluar</button>
        </div>
    </form>

    <?php if ($nota !== null): ?>
        <div class="mt-4">
            <div class="alert alert-info mb-3">Calificación: <strong><?php echo htmlspecialchars($texto); ?></strong> (<?php echo $nota; ?>/10)</div>
            <div class="progress" style="height: 30px;">
                <?php $porcentaje = $nota * 10; ?>
                <div class="progress-bar" role="progressbar" style="width: <?php echo $porcentaje; ?>%;" aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="100">
                    <?php echo $porcentaje; ?>%
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
(function() {
    const form = document.getElementById('formNota');
    form.addEventListener('submit', function(e) {
        const input = document.getElementById('nota');
        const valor = input.value.trim();
        let ok = true;
        if (valor === '' || !/^\d+$/.test(valor)) {
            ok = false;
        } else {
            const n = Number(valor);
            if (isNaN(n) || n < 1 || n > 10) {
                ok = false;
            }
        }
        if (!ok) {
            e.preventDefault();
            e.stopPropagation();
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });
})();
</script>
</body>
</html>
