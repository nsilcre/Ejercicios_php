<?php
// Relación II - Ejercicio 17
// Basado en el ejercicio 17 de la Relación I: división entera con Euclides.
// Aquí añadimos checkboxes para elegir cociente, resto o ambos.

function divisionEuclides(int $a, int $b): array {
    $cociente = 0;
    while ($a >= $b) {
        $a -= $b;
        $cociente++;
    }
    return ['cociente' => $cociente, 'resto' => $a];
}

$resultados = [];
$error = '';
$dividendo = '';
$divisor = '';
$mostrarCoc = true;
$mostrarRes = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dividendo = $_POST['dividendo'] ?? '';
    $divisor   = $_POST['divisor'] ?? '';
    $mostrarCoc = isset($_POST['cociente']);
    $mostrarRes = isset($_POST['resto']);

    if (!ctype_digit($dividendo) || !ctype_digit($divisor) || (int)$divisor === 0) {
        $error = 'Datos no válidos (enteros >=0 y divisor > 0).';
    } elseif (!$mostrarCoc && !$mostrarRes) {
        $error = 'Selecciona al menos una opción (cociente o resto).';
    } else {
        $a = (int)$dividendo;
        $b = (int)$divisor;
        $res = divisionEuclides($a, $b);
        if ($mostrarCoc) {
            $resultados[] = 'Cociente = ' . $res['cociente'];
        }
        if ($mostrarRes) {
            $resultados[] = 'Resto = ' . $res['resto'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">División entera por Euclides</h1>
    <form id="form17" class="row g-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="dividendo" class="form-label">Dividendo</label>
            <input type="number" min="0" class="form-control" id="dividendo" name="dividendo" value="<?php echo htmlspecialchars($dividendo); ?>" required>
        </div>
        <div class="col-md-4">
            <label for="divisor" class="form-label">Divisor</label>
            <input type="number" min="1" class="form-control" id="divisor" name="divisor" value="<?php echo htmlspecialchars($divisor); ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label d-block">Mostrar</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cociente" name="cociente" <?php echo $mostrarCoc ? 'checked' : ''; ?>>
                <label class="form-check-label" for="cociente">Cociente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="resto" name="resto" <?php echo $mostrarRes ? 'checked' : ''; ?>>
                <label class="form-check-label" for="resto">Resto</label>
            </div>
            <div class="invalid-feedback d-block" id="errOpciones" style="display:none;">Selecciona al menos una opción.</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>

    <?php if ($error): ?>
        <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <?php if (!$error && $resultados): ?>
        <div class="alert alert-success mt-3">
            <?php foreach ($resultados as $r): ?>
                <div><?php echo htmlspecialchars($r); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<script>
(function() {
    const form = document.getElementById('form17');
    form.addEventListener('submit', function(e) {
        const dividendo = document.getElementById('dividendo');
        const divisor   = document.getElementById('divisor');
        const coc = document.getElementById('cociente');
        const res = document.getElementById('resto');
        let ok = true;
        if (!dividendo.value || Number(dividendo.value) < 0) {
            dividendo.classList.add('is-invalid');
            ok = false;
        } else {
            dividendo.classList.remove('is-invalid');
        }
        if (!divisor.value || Number(divisor.value) <= 0) {
            divisor.classList.add('is-invalid');
            ok = false;
        } else {
            divisor.classList.remove('is-invalid');
        }
        const errOpc = document.getElementById('errOpciones');
        if (!coc.checked && !res.checked) {
            errOpc.style.display = 'block';
            ok = false;
        } else {
            errOpc.style.display = 'none';
        }
        if (!ok) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
})();
</script>
</body>
</html>
