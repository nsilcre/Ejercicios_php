<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*10- Haz un programa PHP que resuelva una ecuación de segundo grado
        siempre que los resultados sean reales*/
        echo "<br><h1>Ejercicio10</h1>";

        $a = 1;
        $b = 2;
        $c = 3;

        $radical = $b ** 2 - 4 * $a * $c;

        if($radical < 0){
            echo "Las raices no son reales";
        } else {
            $x1 = (- $b + sqrt($radical)) / (2 * $a);
            $x2 = (- $b - sqrt($radical)) / (2 * $a);
            echo "Las raices son $x1 y $x2";
        }
    ?>
</body>
</html>