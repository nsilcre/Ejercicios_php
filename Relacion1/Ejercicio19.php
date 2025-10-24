<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*19- Haz un script PHP en el que conviertas en binario un número natural
        decimal*/
        $decimal = 25;
        echo "<p>Número decimal: $decimal</p>";
        $binario = decbin($decimal);
        echo "<p>Representación binaria: $binario</p>";

        echo "<h3>Conversión paso a paso:</h3>";
        $n = $decimal;
        $resultado = "";
        while ($n > 0) {
            $resto = $n % 2;                 
            $cociente = intdiv($n, 2);       
            echo "<li>$n ÷ 2 = $cociente (resto $resto)</li>";
            $resultado = $resto . $resultado;
            $n = $cociente;                    ;
        }
        echo "<h4>Resultado final en binario: $resultado</h4>";
    ?>
</body>
</html>