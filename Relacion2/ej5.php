<?php
// Relación II - Ejercicio 5
// Aplicar Bootstrap al ejercicio 5 de la relación anterior (temperaturas) y añadir components.
echo "<h1 class='text-center text-primary mb-3 text-body'>Ejercicio5</h1>";
const TEMPERATURAS = [
    "lunes" => 30.5,
    "martes" => 32.0,
    "miercoles" => 25.2,
    "jueves" => 28.6,
    "viernes" => 31.4,
    "sabado" => 35.8,
    "domingo" => 38.6
];
echo "<div class='card shadow-sm'>";
echo "Temperatura del lunes:", TEMPERATURAS["lunes"], " ºC<br>";
echo "Temperaturas de la semana:<br>";
echo "<ol class='mb-3'>";
foreach (TEMPERATURAS as $dia => $temp) {
    echo "<li class='mb-1'>$dia: $temp °C</li>";
}
echo "</ol>";
echo "</div>";
echo '<br><btr>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Día</th>
                    <th scope="col">Temperatura</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">';
foreach (TEMPERATURAS as $dia => $temp) {
    echo "<tr>";
    echo "<td> $dia:</td> <td> $temp ºC</td>";
    echo "</tr>";
}

echo '
            </tbody>
        </table>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

</body>

</html>