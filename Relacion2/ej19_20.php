<?php
// Relación II - Ejercicios 19 y 20 combinados
// Conversión de decimal a binario, octal o hexadecimal usando select y match.

$resultado = '';
$error = '';
$n = '';
$base = '0';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = $_POST['n'] ?? '';
    $base = $_POST['base'] ?? '0';

    if (!ctype_digit($n) || (int)$n < 0) {
        $error = 'Debe ser un natural (>=0).';
    } elseif ($base === '0') {
        $error = 'Debes seleccionar una base de conversión.';
    } else {
        $nInt = (int)$n;
        $resultado = match ($base) {
            '2'  => decbin($nInt),
            '8'  => decoct($nInt),
            '16' => strtoupper(dechex($nInt)),
            default => null,
        };
        if ($resultado === null) {
            $error = 'Base no válida.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicios 19 y 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Conversión de base (match + select)</h1>
    <form id="form1920" class="row g-3" method="post" novalidate>
        <div class="col-md-4">
            <label for="n" class="form-label">N (entero ≥ 0)</label>
            <input type="number" min="0" class="form-control" id="n" name="n" value="<?php echo htmlspecialchars($n); ?>" required>
            <div class="invalid-feedback">Introduce un natural mayor o igual que 0.</div>
        </div>
        <div class="col-md-4">
            <label for="base" class="form-label">Base destino</label>
            <select class="form-select" id="base" name="base" required>
                <option value="0" <?php echo $base === '0' ? 'selected' : ''; ?>>Selecciona operación</option>
                <option value="2" <?php echo $base === '2' ? 'selected' : ''; ?>>Binario (2)</option>
                <option value="8" <?php echo $base === '8' ? 'selected' : ''; ?>>Octal (8)</option>
                <option value="16" <?php echo $base === '16' ? 'selected' : ''; ?>>Hexadecimal (16)</option>
            </select>
            <div class="invalid-feedback">Elige una base distinta de "Selecciona operación".</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Convertir</button>
        </div>
    </form>

    <?php if ($error): ?>
        <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error); ?></div>
    <?php elseif ($resultado !== ''): ?>
        <div class="alert alert-success mt-3">Resultado: <strong><?php echo htmlspecialchars($resultado); ?></strong></div>
    <?php endif; ?>
</div>
<script>
(function() {
    const form = document.getElementById('form1920');
    form.addEventListener('submit', function(e) {
        const n = document.getElementById('n');
        const base = document.getElementById('base');
        let ok = true;
        if (!n.value || Number(n.value) < 0) {
            n.classList.add('is-invalid');
            ok = false;
        } else {
            n.classList.remove('is-invalid');
        }
        if (base.value === '0') {
            base.classList.add('is-invalid');
            ok = false;
        } else {
            base.classList.remove('is-invalid');
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
