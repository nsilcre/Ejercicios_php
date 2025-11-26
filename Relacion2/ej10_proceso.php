<?php
// Relación II - Ejercicio 10 (proceso)
// Recibe datos del formulario y muestra resultado.

$resultado = null;
$error = '';
$valor1 = $_POST['valor1'] ?? '';
$valor2 = $_POST['valor2'] ?? '';
$operador = $_POST['operador'] ?? '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($valor1) || !is_numeric($valor2)) {
        $error = 'Los valores deben ser numéricos.';
    } else {
        $a = (float)$valor1;
        $b = (float)$valor2;
        switch ($operador) {
            case '+': $resultado = $a + $b; break;
            case '-': $resultado = $a - $b; break;
            case '*': $resultado = $a * $b; break;
            case '/':
                if ($b == 0) { $error = 'No se puede dividir entre cero.'; }
                else { $resultado = $a / $b; }
                break;
            case '%':
                if ($b == 0) { $error = 'No se puede dividir entre cero.'; }
                else { $resultado = fmod($a, $b); }
                break;
            default:
                $error = 'Operador no válido.';
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
    <title>Relación 2 - Ejercicio 10 (Resultado)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Resultado de la calculadora</h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php elseif ($resultado !== null): ?>
        <div class="alert alert-success">Resultado: <?php echo $resultado; ?></div>
    <?php endif; ?>
    <a href="ej10_form.php" class="btn btn-secondary mt-3">Volver al formulario</a>
</div>
</body>
</html>
