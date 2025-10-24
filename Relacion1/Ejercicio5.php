<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*5- Crea un array asociativo constante, en el que utilices como clave el día de la
        semana, y como valor, la temperatura máxima de ese día en formato real. A
        continuación, muestra:
        ● la temperatura del primer dia de la semana
        ● la temperatura de todos los días, secuencialmente
        ● lo mismo que el anterior, pero en formato de lista numerada*/
        echo "<br><h1>Ejercicio5</h1>";
        const TEMPERATURAS = [
            "lunes" => 30.5,
            "martes" => 32.0,
            "miercoles" => 25.2,
            "jueves" => 28.6,
            "viernes" => 31.4,
            "sabado" => 35.8,
            "domingo" => 38.6
        ];

        echo "Temperatura del lunes:", TEMPERATURAS["lunes"], " ºC<br>";
        echo "Temperaturas de la semana:<br>";
        echo "<ol>";
        foreach (TEMPERATURAS as $dia => $temp){
            echo "<li>$dia: $temp °C<li>";
        }
        echo "</ol>";

        echo "<table>";
        foreach (TEMPERATURAS as $dia => $temp){
            echo "<tr>";
            echo "<td>$dia:</td> <td>$temp ºC</td>"; 
            echo "<tr>";       
        }
        echo "</table>";
    ?>
</body>
</html>