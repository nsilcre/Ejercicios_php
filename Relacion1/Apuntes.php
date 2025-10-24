<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
</head>
<body>
    <?php
    $nombre = "Nicolás"; //las variables empiezan por $
    echo "Hola $nombre"; //una variable entre comillas dobles es sustituida por su valor
    echo 'hola mundo'; //puedo usar comillas simpes
    echo 'hola mundo $nombre'; //la variable con $ no se interpreta entre ''
    echo 'hola', strtoupper($nombre);
    const SEMANA = ["pepe"]; //Las comnstantes van en mayuscula y no se usa $
    ?>
</body>
</html>
