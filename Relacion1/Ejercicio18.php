<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*18- Haz un programa en PHP que calcule el máximo común divisor de dos
        números naturales utilizando el algoritmo de Euclides*/
        $a = 48;
        $b = 18;
        $x = $a;
        $y = $b;
        while ($y != 0) {
            $resto = $x % $y;
            echo "<li>$x %: $y = $resto</li>";
            $x = $y;
            $y = $resto;
        }

        echo "<h3>El máximo comúm divisor de $a y $b es: $x</h3>" 
    ?>
</body>
</html>