<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*17- Haz un script en PHP que calcule la división de dos números naturales
        utilizando el algoritmo de Euclides para la división*/
        $dividendo = 37;
        $divisor = 5;
        $resto = $dividendo;
        $cociente= 0;
      
        while ($resto >= $divisor) {
        $resto -= $divisor;
        $cociente++;
        echo "<li>Restamos $divisor, resto actual = $resto</li>";
        }

        echo "<h3>Resultados finales:</h3>";
        echo "<p>Cociente: $cociente</p>";
        echo "<p>Resto: $resto</p>";
    ?>
</body>
</html>