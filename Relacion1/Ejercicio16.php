<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .divisor {
            color: green
        }
        .no-divisor{
            color: red
        }
    </style>
</head>
<body> 
    <?php
        /*16- Haz un programa que muestre todos los divisores de un número entero y
        positivo. Irá mostrando cada número que se prueba y si resulta ser divisor,
        aparecerá marcado visiblemente, por ejemplo con otro color*/
        $numero = 36; // 🔹 Puedes cambiar este número
        echo "<p><strong>Número:</strong> $numero</p>";
        echo "<p>Probando divisores:</p>";
        echo "<ul>";

        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                echo "<li class='divisor'><b>$i</b></li>";
            } else {
                // No es divisor
                echo "<li class='no-divisor'>$i</li>";
            }
        }

        echo "</ul>";
    ?>
</body>
</html>