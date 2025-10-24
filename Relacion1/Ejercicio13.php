<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*13- Haz un script en PHP que calcule la división de dos números naturales
        utilizando el algoritmo de Euclides para la división*/
        echo "<br><h1>Ejercicio13</h1>";
        $dividendo = 25;
        $divisor = 5;
        $cociente = 0;
        $resto = $dividendo;
        while ($resto >= $divisor) {
            $resto -= $divisor;
            $cociente++;
        }
        echo "$dividendo dividido entre $divisor da cociente $cociente y resto $resto";
    ?>
</body>
</html>