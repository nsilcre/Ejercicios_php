<?php
// Relación IV - Ejercicio 12
// Uso de serialize y unserialize con arrays y objetos.

$moduloDWES = new stdClass();
$moduloDWES->modulo = 'Desarrollo Web en Entorno Servidor';
$moduloDWES->acronimo = 'DWES';
$moduloDWES->curso = 2;
$moduloDWES->descripcion = 'Programación del lado servidor con PHP, gestión de sesiones, POO y acceso a datos.';
$moduloDWES->teacher = 'Nombre del profesor/a';

$arrayDatos = (array) $moduloDWES;

$serialArray = serialize($arrayDatos);
$serialObj = serialize($moduloDWES);

$unserialArray = unserialize($serialArray);
$unserialObj = unserialize($serialObj);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 12</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 12: serialize / unserialize</h1>

    <h2>Array original</h2>
    <pre><?php print_r($arrayDatos); ?></pre>

    <h2>Resultado de serialize(array)</h2>
    <pre><?php echo htmlspecialchars($serialArray); ?></pre>

    <h2>Resultado de unserialize(array)</h2>
    <pre><?php print_r($unserialArray); ?></pre>

    <h2>Objeto original</h2>
    <pre><?php print_r($moduloDWES); ?></pre>

    <h2>Resultado de serialize(objeto)</h2>
    <pre><?php echo htmlspecialchars($serialObj); ?></pre>

    <h2>Resultado de unserialize(objeto)</h2>
    <pre><?php print_r($unserialObj); ?></pre>
</body>

</html>