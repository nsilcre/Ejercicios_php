<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*7- Calcula la nota final de una persona a partir de la media de dos notas
        numéricas iniciales, y descontando 0.25 por cada falta sin justificar. Muestra el
        resultado por pantalla, indicando si la persona aprueba o suspende.*/
        echo "<br><h1>Ejercicio7</h1>";
        echo "<h1>Calculo nota con media y resta faltas</h1>";
        echo "<p>";
        $nota1 = 5;
        $nota2 = 8;
        $faltas = 4;
        $notaFinal = ($nota1 + $nota2) / 2 - 0.25 * $faltas;
        if ($notaFinal>=5) {
            echo "Enhorabuenas. Has aprobado, sacaste <b>$notaFinal</b>";
        } else {
            echo "Lo siento, pabajo. Tu nota es <b>$notaFinal</b>";
        }
       ?>
</body>
</html>