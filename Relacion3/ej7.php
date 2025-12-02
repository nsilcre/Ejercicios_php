<?php
// Relación III - Ejercicio 7
// Trabajo con fechas y horas y funciones propias para día de la semana y mes en español

function nombreDiaEspanol(DateTime $fecha): string {
    $dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
    $indice = (int) $fecha->format('w');
    return $dias[$indice];
}

function nombreMesEspanol(DateTime $fecha): string {
    $meses = [
        1 => 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
        'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
    ];
    $indice = (int) $fecha->format('n'); 
    return $meses[$indice];
}

$ahora = new DateTime('now', new DateTimeZone('Europe/Madrid'));

$manana = (clone $ahora)->modify('+1 day');
$haceUnaSemana = (clone $ahora)->modify('-1 week');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 7</title>
</head>
<body>
    <h1>Relación III - Ejercicio 7</h1>
    <p>Práctica con funciones de fecha y hora en PHP.</p>

    <h2>Fecha y hora actuales</h2>
    <p>
        Ahora mismo es <?php echo $ahora->format('d/m/Y H:i:s'); ?>,
        <?php echo nombreDiaEspanol($ahora); ?> de <?php echo nombreMesEspanol($ahora); ?>.
    </p>

    <h2>Aritmética de fechas</h2>
    <ul>
        <li>Mañana será: <?php echo $manana->format('d/m/Y H:i:s'); ?> (<?php echo nombreDiaEspanol($manana); ?>)</li>
        <li>Hace una semana fue: <?php echo $haceUnaSemana->format('d/m/Y H:i:s'); ?> (<?php echo nombreDiaEspanol($haceUnaSemana); ?>)</li>
    </ul>
</body>
</html>
