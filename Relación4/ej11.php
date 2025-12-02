<?php
// Relación IV - Ejercicio 11
// Uso de stdClass, conversión a array y a objeto.

$moduloDWES = new stdClass();
$moduloDWES->modulo = 'Desarrollo Web en Entorno Servidor';
$moduloDWES->acronimo = 'DWES';
$moduloDWES->curso = 2;
$moduloDWES->descripcion = 'Programación del lado servidor con PHP, gestión de sesiones, POO y acceso a datos.';
$moduloDWES->teacher = 'Nombre del profesor/a';

$arrayDesdeObjeto = (array) $moduloDWES;
$objDesdeArray = (object) $arrayDesdeObjeto;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 11</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 11: stdClass y conversiones</h1>

    <h2>Objeto stdClass original</h2>
    <pre><?php print_r($moduloDWES); ?></pre>

    <h2>Convertido a array</h2>
    <pre><?php print_r($arrayDesdeObjeto); ?></pre>

    <h2>Convertido de nuevo a objeto</h2>
    <pre><?php print_r($objDesdeArray); ?></pre>
</body>

</html>