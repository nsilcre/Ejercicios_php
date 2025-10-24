<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*14- Haz un programa en PHP que calcule el máximo común divisor de dos
        números naturales utilizando el algoritmo de Euclides*/
        echo "<br><h1>Ejercicio14</h1>";
        $a = 48;
        $b = 18;
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        echo "El Máximo Común Divisor de 48 y 18 es: $a";
    ?>
</body>
</html>