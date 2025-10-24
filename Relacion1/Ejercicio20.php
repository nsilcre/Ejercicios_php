<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*20- Mejora el ejercicio anterior para que se pueda convertir a binario, octal o
        hexadecimal*/
         $numero = 255;
         echo "<p><strong>Número decimal:</strong> $numero</p>";
        $binario = decbin($numero);
        $octal = decoct($numero);
        $hexadecimal = strtoupper(dechex($numero));
         echo "<ul>";
        echo "<li><strong>Binario:</strong> $binario</li>";
        echo "<li><strong>Octal:</strong> $octal</li>";
        echo "<li><strong>Hexadecimal:</strong> $hexadecimal</li>";
        echo "</ul>";
        echo "<h3>Conversión paso a paso (binario):</h3>";
        $n = $numero;
        $resultado = "";

        echo "<ul>";
        while ($n > 0) {
            $resto = $n % 2;
            $cociente = intdiv($n, 2);
            echo "<li>$n ÷ 2 = $cociente (resto $resto)</li>";
            $resultado = $resto . $resultado;
            $n = $cociente;
        }
        echo "</ul>";

        echo "<h4>Resultado final en binario: <strong>$resultado</strong></h4>";
    ?>
</body>
</html>