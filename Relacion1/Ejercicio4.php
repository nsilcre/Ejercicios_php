<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*4- En un programa PHP, declara un array constante en el que se almacenarán
        los días de la semana. Muestra por pantalla:*/
        echo "<h1>Ejercicio4</h1>";
        const SEMANA = ["lunes","martes","miercoles","jueves","viernes", "sabado", "domingo"];
        //● el primer dia de la semana
        echo "La semana tiene: ", count(SEMANA),"<br>";
        echo "<br>El primer dia de la semana es: ", SEMANA[0],"<br>";
        //● todos los días secuencialmente
        for ($i=0; $i < count(SEMANA); $i++) { 
            echo "<br>", SEMANA[$i];
        }

        //● lo mismo que el anterior, pero en formato de lista numerada
        echo "<br>Lista semena<ol>";
        for ($i=0; $i < count(SEMANA); $i++) { 
            echo "<li>",SEMANA[$i],"</li>";
        }
        echo "</ol>";
    ?>
</body>
</html>