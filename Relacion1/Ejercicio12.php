<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*12- Haz un programa PHP que calcule la suma de los n primeros números
        naturales*/
        echo "<br><h1>Ejercicio12</h1>";
        $num = 5;
        $suma = 0;
        for ($i = 1; $i <= $num; $i++) {
            $suma += $i;
        }
        echo "La suma de los $num primeros números naturales es: $suma";
    ?>
</body>
</html>