<?php
// Relación II - Ejercicio 18
// Versión Bootstrap del ejercicio 19 de la Relación I (decimal a binario).

$resultado = '';
$pasos = [];
$n = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = $_POST['n'] ?? '';
    if (!ctype_digit($n) || (int)$n < 0) {
        $resultado = 'Debe ser un natural (>=0).';
    } else {
        $nInt = (int)$n;
        if ($nInt === 0) {
            $resultado = '0';
        } else {
            $restos = [];
            $temp = $nInt;
            while ($temp > 0) {
                $resto = $temp % 2;
                $pasos[] = "$temp / 2 => resto $resto";
                $restos[] = $resto;
                $temp = intdiv($temp, 2);
            }
            $restos = array_reverse($restos);
            $resultado = implode('', $restos);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Decimal a binario (Bootstrap)</h1>
    <form class="row g-3" method="post">
        <div class="col-md-4">
            <label for="n" class="form-label">N (entero ≥ 0)</label>
            <input type="number" min="0" class="form-control" id="n" name="n" value="<?php echo htmlspecialchars($n); ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Convertir</button>
        </div>
    </form>

    <?php if ($resultado): ?>
        <div class="alert alert-success mt-3">Binario: <strong><?php echo htmlspecialchars($resultado); ?></strong></div>
    <?php endif; ?>

    <?php if ($pasos): ?>
        <div class="card mt-3">
            <div class="card-header">Pasos del algoritmo</div>
            <ul class="list-group list-group-flush">
                <?php foreach ($pasos as $p): ?>
                    <li class="list-group-item"><?php echo htmlspecialchars($p); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
