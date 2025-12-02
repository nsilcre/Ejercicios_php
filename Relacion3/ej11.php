<?php
// Relación III - Ejercicio 11
// Función swap(n1, n2) e invertirArray usando swap, luego en librería functionsRel3.php

require_once __DIR__ . '/functionsRel3.php';

$valores = [1, 2, 3, 4, 5];
$original = $valores;
invertirArray($valores);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 11</title>
</head>
<body>
    <h1>Relación III - Ejercicio 11</h1>
    <p>Demostración de <code>swap</code> e <code>invertirArray</code> (definidas en <code>functionsRel3.php</code>).</p>

    <h2>Array original</h2>
    <pre><?php echo htmlspecialchars(print_r($original, true)); ?></pre>

    <h2>Array invertido</h2>
    <pre><?php echo htmlspecialchars(print_r($valores, true)); ?></pre>
</body>
</html>
