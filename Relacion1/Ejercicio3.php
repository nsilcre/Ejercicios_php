<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
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
    ?>
</body>
</html>