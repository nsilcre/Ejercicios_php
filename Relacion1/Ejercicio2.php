<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*2- Haz un programa PHP que muestre un valor de ejemplo de cada tipo de
        dato escalar en php con echo utilizando la función var_dump(), y también
        con printf formateado. Prueba todas las posibilidades tal y como vienen
        descritas en: https://www.w3schools.com/php/func_string_printf.asp*/
        echo "<br><h1>Ejercicio2</h1>";
        $bool = true;
        echo "<br>",var_dump($bool);
        $int = 9;
        echo "<br>",var_dump($int);
        $float = 1.5;
        echo "<br>",var_dump($float);
        $string = "Beijing";
        echo "<br>",var_dump($string),"<br>";
    ?>
</body>
</html>