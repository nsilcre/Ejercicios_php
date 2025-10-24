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
    ?>
</body>
</html>