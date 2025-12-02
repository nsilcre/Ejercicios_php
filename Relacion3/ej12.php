<?php
// Relación III - Ejercicio 12
// Ordena un array de strings utilizando el algoritmo de burbuja, por referencia

require_once __DIR__ . '/functionsRel3.php';

$datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruíz','Díaz'];
$original = $datos;
burbuja($datos);

$nums = [5, 3, 8, 1, 4];
$originalNums = $nums;
burbuja($nums);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 12</title>
</head>
<body>
    <h1>Relación III - Ejercicio 12</h1>
    <p>Ordenación por burbuja de un array de strings (y demostración con números) usando paso por referencia.</p>

    <h2>Array de apellidos</h2>
    <h3>Original</h3>
    <pre><?php echo htmlspecialchars(print_r($original, true)); ?></pre>
    <h3>Ordenado</h3>
    <pre><?php echo htmlspecialchars(print_r($datos, true)); ?></pre>

    <h2>Array de números</h2>
    <h3>Original</h3>
    <pre><?php echo htmlspecialchars(print_r($originalNums, true)); ?></pre>
    <h3>Ordenado</h3>
    <pre><?php echo htmlspecialchars(print_r($nums, true)); ?></pre>
</body>
</html>
