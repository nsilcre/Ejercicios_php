<?php
// Relación IV - Ejercicio 13
// Conversión entre array asociativo y JSON, y viceversa.

$socios = [
    [
        'nombre' => 'Ana',
        'apellidos' => 'Pérez García',
        'edad' => 25,
    ],
    [
        'nombre' => 'Luis',
        'apellidos' => 'López Díaz',
        'edad' => 32,
    ],
    [
        'nombre' => 'María',
        'apellidos' => 'Martín Ruiz',
        'edad' => 29,
    ],
];

$json = json_encode($socios, JSON_UNESCAPED_UNICODE);

$arrayDesdeJson = json_decode($json, true);
$objDesdeJson = json_decode($json);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 13</title>
</head>
<body>
<h1>Relación IV - Ejercicio 13: JSON</h1>

<h2>Array original</h2>
<pre><?php print_r($socios); ?></pre>

<h2>JSON generado (json_encode)</h2>
<pre><?php echo htmlspecialchars($json); ?></pre>

<h2>Array asociativo desde JSON (json_decode)</h2>
<pre><?php print_r($arrayDesdeJson); ?></pre>

<h2>Objetos stdClass desde JSON</h2>
<pre><?php print_r($objDesdeJson); ?></pre>
</body>
</html>
