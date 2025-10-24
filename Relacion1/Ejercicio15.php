<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*15- Haz un script PHP en el que conviertas en binario un número natural*/
        echo "<br><h1>Ejercicio15</h1>";
        $numero = 25;
        $binario = decbin($numero);
        echo "<br>Número original: $numero<br>";
        echo "<br>Número en binario: $binario";
    ?>
</body>
</html>