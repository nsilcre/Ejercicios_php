<?php
// Relación II - Ejercicio 9
// Formulario y proceso en el mismo archivo.

$resultado = null;
$error = '';
$valor1 = '';
$valor2 = '';
$operador = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor1 = $_POST['valor1'] ?? '';
    $valor2 = $_POST['valor2'] ?? '';
    $operador = $_POST['operador'] ?? '+';

    if (!is_numeric($valor1) || !is_numeric($valor2)) {
        $error = 'Los valores deben ser numéricos.';
    } else {
        $a = (float)$valor1;
        $b = (float)$valor2;
        $resultado = match ($operador) {
            '+' => $a + $b,
            '-' => $a - $b,
            '*' => $a * $b,
            '/' => $b == 0 ? null : $a / $b,
            '%' => $b == 0 ? null : fmod($a, $b),
            default => null,
        };
        if ($resultado === null && in_array($operador, ['/', '%']) && $b == 0) {
            $error = 'No se puede dividir entre cero.';
        } elseif ($resultado === null) {
            $error = 'Operador no válido.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Calculadora (formulario + proceso)</h1>
        <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="col-md-4">
                <label for="valor1" class="form-label">Valor 1</label>
                <input type="number" step="any" class="form-control" id="valor1" name="valor1" required value="<?php echo htmlspecialchars($valor1); ?>">
            </div>
            <div class="col-md-4">
                <label for="valor2" class="form-label">Valor 2</label>
                <input type="number" step="any" class="form-control" id="valor2" name="valor2" required value="<?php echo htmlspecialchars($valor2); ?>">
            </div>
            <div class="col-md-4">
                <label for="operador" class="form-label">Operador</label>
                <select class="form-select" id="operador" name="operador" required>
                    <?php foreach (['+', '-', '*', '/', '%'] as $op): ?>
                        <option value="<?php echo $op; ?>" <?php if ($operador === $op) echo 'selected'; ?>><?php echo $op; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($resultado !== null && !$error): ?>
            <div class="alert alert-success mt-3">Resultado: <?php echo $resultado; ?></div>
        <?php endif; ?>
    </div>
</body>

</html>