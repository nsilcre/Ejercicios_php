<?php
// Relación II - Ejercicio 13
// Versión del ejercicio 8 de la relación I con validación en Vanilla JS
// y formulario + proceso en el mismo archivo.

$rubrica = [
    'inicial'  => 0.1,
    'primera'  => 0.2,
    'segunda'  => 0.3,
    'tercera'  => 0.4,
];

$notaFinal = null;
$nombre = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email  = $_POST['email'] ?? '';
    $inicial = (float)($_POST['inicial'] ?? 0);
    $primera = (float)($_POST['primera'] ?? 0);
    $segunda = (float)($_POST['segunda'] ?? 0);
    $tercera = (float)($_POST['tercera'] ?? 0);

    $notas = compact('inicial','primera','segunda','tercera');
    $notaFinal = 0;
    foreach ($rubrica as $clave => $peso) {
        $notaFinal += $peso * $notas[$clave];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Calcular nota final (validación JS)</h1>
    <form id="formNotas" class="row g-3" method="post" novalidate>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            <div class="invalid-feedback">Introduce un nombre válido (mínimo 2 caracteres).</div>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="invalid-feedback">Introduce un correo válido.</div>
        </div>
        <?php $campos = ['inicial' => 'Nota inicial', 'primera' => 'Primera', 'segunda' => 'Segunda', 'tercera' => 'Tercera']; ?>
        <?php foreach ($campos as $id => $label): ?>
            <div class="col-md-3">
                <label for="<?php echo $id; ?>" class="form-label"><?php echo $label; ?></label>
                <input type="number" step="0.01" class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
                <div class="invalid-feedback">Introduce una nota entre 0 y 10.</div>
            </div>
        <?php endforeach; ?>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>

    <?php if ($notaFinal !== null): ?>
        <div class="alert alert-success mt-3">
            Nota final de <?php echo htmlspecialchars($nombre); ?>: <strong><?php echo number_format($notaFinal, 2); ?></strong>
        </div>
    <?php endif; ?>
</div>
<script>
(function() {
    const form = document.getElementById('formNotas');
    function esNumeroValido(valor) {
        if (valor === '') return false;
        const num = Number(valor);
        return !isNaN(num) && num >= 0 && num <= 10;
    }
    function validar() {
        let ok = true;
        const nombre = document.getElementById('nombre');
        const email  = document.getElementById('email');
        if (nombre.value.trim().length < 2) {
            nombre.classList.add('is-invalid');
            ok = false;
        } else {
            nombre.classList.remove('is-invalid');
        }
        if (!email.value.includes('@')) {
            email.classList.add('is-invalid');
            ok = false;
        } else {
            email.classList.remove('is-invalid');
        }
        ['inicial','primera','segunda','tercera'].forEach(id => {
            const input = document.getElementById(id);
            if (!esNumeroValido(input.value)) {
                input.classList.add('is-invalid');
                ok = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });
        return ok;
    }
    form.addEventListener('submit', function(e) {
        if (!validar()) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
})();
</script>
</body>
</html>
