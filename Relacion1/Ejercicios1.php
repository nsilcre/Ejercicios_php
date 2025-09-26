<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
    //Haz un programa en PHP que muestre el mensaje “Hello world” de diferentes formas:
        echo "<h1>Ejercicio1</h1>";
        //como texto plano html
        echo "Hello world";
        //como un encabezado de nivel 2 html
        echo "<h2>Hello world</h2>";
        //como un párrafo con estilo: color, tipografía, alineación, etc.
        echo "<h2>Hello world<h2>";
        //con un salto de línea entre hello y world
        echo "<h2>Hello<br>world<h2>";
        //añádele la información sobre la instalación php (phpversion() y phpinfo()
        $version = phpversion();
        echo "<h3>Versión de PHP: $version</h3>";
        phpinfo();
        /* investiga en la siguiente dirección como mostrar la fecha y la hora del
        sistema en el momento de la ejecución: https://www.php.net/manual/es/function.date.php*/

        echo "<h3>Fecha y hora actual:</h3>";
        echo date("d-m-Y H:i:s"),"<br>";

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

        /*3- Investiga qué y cuales son las superglobals en php
        (https://www.php.net/manual/es/language.variables.superglobals.php), y haz
        un programa que muestre, en forma de lista no numerada, para $_SERVER:
            ‘DOCUMENT-ROOT’
            ‘PHP-SELF’
            ‘SERVER-NAME’
            'SERVER_SOFTWARE'
            'SERVER_PROTOCOL'
            'HTTP_HOST'
            'HTTP_USER_AGENT'
            'REMOTE_ADDR'
            'REMOTE_PORT'
            'SCRIPT_FILENAME'
            'REQUEST_URI'*/
            echo "<br><h1>Ejercicio3</h1>";
            foreach ($_SERVER as $clave => $valor) {
                echo "$clave : $valor<br>";
            }

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

        /*5- Crea un array asociativo constante, en el que utilices como clave el día de la
        semana, y como valor, la temperatura máxima de ese día en formato real. A
        continuación, muestra:
        ● la temperatura del primer dia de la semana
        ● la temperatura de todos los días, secuencialmente
        ● lo mismo que el anterior, pero en formato de lista numerada*/
        echo "<br><h1>Ejercicio5</h1>";
        const TEMPERATURAS = [
            "lunes" => 30.5,
            "martes" => 32.0,
            "miercoles" => 25.2,
            "jueves" => 28.6,
            "viernes" => 31.4,
            "sabado" => 35.8,
            "domingo" => 38.6
        ];

        echo "Temperatura del lunes:", TEMPERATURAS["lunes"], " ºC<br>";
        echo "Temperaturas de la semana:<br>";
        echo "<ol>";
        foreach (TEMPERATURAS as $dia => $temp){
            echo "<li>$dia: $temp °C<li>";
        }
        echo "</ol>";

        echo "<table>";
        foreach (TEMPERATURAS as $dia => $temp){
            echo "<tr>";
            echo "<td>$dia:</td> <td>$temp ºC</td>"; 
            echo "<tr>";       
        }
        echo "</table>";

        /*6- Declara en un programa PHP una clase fruta, con dos atributos: nombre y
        color, y dos funciones, set_name() y get_name(). Declara e inicializa dos
        instancias: apple y banana, inicializa los nombres y muéstralos por pantalla*/
        echo "<br><h1>Ejercicio6</h1>";
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
        /*10- Haz un programa PHP que resuelva una ecuación de segundo grado
        siempre que los resultados sean reales*/
        echo "<br><h1>Ejercicio10</h1>";

        $a = 1;
        $b = 2;
        $c = 3;

        $radical = $b ** 2 - 4 * $a * $c;

        if($radical < 0){
            echo "Las raices no son reales";
        } else {
            $x1 = (- $b + sqrt($radical)) / (2 * $a);
            $x2 = (- $b - sqrt($radical)) / (2 * $a);
            echo "Las raices son $x1 y $x2";
        }
        /*11- Haz un script PHP que calcule el factorial de un número natural*/
        echo "<br><h1>Ejercicio11</h1>";
        /*12- Haz un programa PHP que calcule la suma de los n primeros números
        naturales*/
        echo "<br><h1>Ejercicio12</h1>";
        /*13- Haz un script en PHP que calcule la división de dos números naturales
        utilizando el algoritmo de Euclides para la división*/
        echo "<br><h1>Ejercicio13</h1>";
        /*14- Haz un programa en PHP que calcule el máximo común divisor de dos
        números naturales utilizando el algoritmo de Euclides*/
        echo "<br><h1>Ejercicio14</h1>";
        /*15- Haz un script PHP en el que conviertas en binario un número natural*/
        echo "<br><h1>Ejercicio15</h1>";
        $numero = 25;
        $binario = decbin($numero);
        echo "<br>Número original: $numero<br>";
        echo "<br>Número en binario: $binario";
    ?>
</body>
</html>