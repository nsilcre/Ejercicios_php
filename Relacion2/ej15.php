<?php
// Relación II - Ejercicio 15
// Unifica los ejercicios 15 y 16 de la relación I: decidir si es primo o listar divisores.

function esPrimo(int $n): bool {
    if ($n <= 1) return false;
    if ($n === 2) return true;
    if ($n % 2 === 0) return false;
    for ($i = 3; $i * $i <= $n; $i += 2) {
        if ($n % $i === 0) return false;
    }
    return true;
}

$resultado = '';
$opcion = 'primo';
$n = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = $_POST['n'] ?? '';
    $opcion = $_POST['opcion'] ?? 'primo';

    if (!ctype_digit($n) || (int)$n <= 0) {
        $resultado = 'Debe ser un entero positivo.';
    } else {
        $nInt = (int)$n;
        if ($opcion === 'primo') {
            $resultado = esPrimo($nInt) ? "El número $nInt es primo." : "El número $nInt no es primo.";
        } elseif ($opcion === 'divisores') {
            $divs = [];
            for ($i = 1; $i <= $nInt; $i++) {
                if ($nInt % $i === 0) $divs[] = $i;
            }
            $resultado = 'Divisores de ' . $nInt . ': ' . implode(', ', $divs);
        } else {
            $resultado = 'Opción no válida.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Primo o divisores</h1>
    <form id="form15" class="row g-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="n" class="form-label">Número entero positivo</label>
            <input type="number" min="1" class="form-control" id="n" name="n" value="<?php echo htmlspecialchars($n); ?>" required>
            <div class="invalid-feedback">Introduce un entero positivo.</div>
        </div>
        <div class="col-md-8">
            <label class="form-label d-block">Operación</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcion" id="opPrimo" value="primo" <?php echo $opcion === 'primo' ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="opPrimo">¿Es primo?</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcion" id="opDiv" value="divisores" <?php echo $opcion === 'divisores' ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="opDiv">Mostrar divisores</label>
            </div>
            <div class="invalid-feedback d-block" id="opcionError" style="display:none;">Elige una opción.</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>

    <?php if ($resultado): ?>
        <div class="alert alert-info mt-3"><?php echo htmlspecialchars($resultado); ?></div>
    <?php endif; ?>
</div>
<script>
(function() {
    const form = document.getElementById('form15');
    form.addEventListener('submit', function(e) {
        const n = document.getElementById('n');
        const radios = document.querySelectorAll('input[name="opcion"]');
        let ok = true;
        if (!n.value || Number(n.value) <= 0) {
            n.classList.add('is-invalid');
            ok = false;
        } else {
            n.classList.remove('is-invalid');
        }
        let alguno = false;
        radios.forEach(r => { if (r.checked) alguno = true; });
        const msg = document.getElementById('opcionError');
        if (!alguno) {
            msg.style.display = 'block';
            ok = false;
        } else {
            msg.style.display = 'none';
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
