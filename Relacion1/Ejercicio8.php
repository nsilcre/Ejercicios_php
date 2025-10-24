<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*8- Crea en un script PHP dos arrays asociativos paralelos, uno con la rúbrica de
        4 calificaciones (inicial, primera, segunda y tercera) y otro con las notas
        particulares de una persona. A continuación, computará la nota final de esa
        persona, y muéstrala por pantalla.*/
        echo "<br><h1>Ejercicio8</h1>";
        echo "<h1>Calculo de la nota final de un alumno a partir de una rúbrica</h1>";
        echo "<p>";
        $rubrica = [
            "inicial"=> 0.2,
            "primera"=> 0.3,
            "segunda"=> 0.2,
            "tercera" => 0.3
        ];
        $calificaciones = [
            "inicial"=> 8,
            "primera"=> 5,
            "segunda"=> 9,
            "tercera" => 6
        ];
        $notaFinal = 0;
        foreach ($rubrica as $prueba => $peso) {
            $notaFinal += $peso * $calificaciones[$prueba];
        }
        if ($notaFinal>=5) {
            echo "Enhorabuenas. Has aprobado, sacaste <b>$notaFinal</b>";
        } else {
            echo "Lo siento, pabajo. Tu nota es <b>$notaFinal</b>";
        }
    ?>
</body>
</html>