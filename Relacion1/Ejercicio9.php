<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*9- En un programa PHP, valora a partir de los 3 lados de un triángulo si es
        equilátero, isósceles y escaleno, y muestra esa valoración por pantalla*/
        echo "<br><h1>Ejercicio9</h1>";
        echo "<h2>Tipos de Triangulos</h2>";
        $lado1 = 3.0;
        $lado2 = 3.0;
        $lado3 = 3.0;
         if($lado1 == $lado2 and $lado2 == $lado3){
            echo "Es equilatero";
         }elseif($lado1 == $lado2 or $lado2 == $lado3 or $lado1 == $lado3)  {
            echo "Es isoceles";
         }else{
            echo "es escaleno";
         }
    ?>
</body>
</html>