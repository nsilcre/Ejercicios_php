<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*11- Haz un script PHP que calcule el factorial de un número natural*/
        echo "<br><h1>Ejercicio11</h1>";
        $num = 5;
        $factorial = 1;
        for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
        }
        echo "El factorial de $num es: $factorial";
    ?>
</body>
</html>