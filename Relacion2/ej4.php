    <?php
    // Relación II - Ejercicio 4
    // Aplicar Bootstrap 5 al ejercicio 4 de la relación anterior (días de la semana).
    echo "<h1 class='text-center text-primary mb-3 text-body'>Ejercicio4</h1>";
    const SEMANA = ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"];
    //● el primer dia de la semana
    echo "<div class='card shadow-sm'>";
    echo "<p class='mb-1'>La semana tiene: ", count(SEMANA), "<br></p>";
    echo "<br>El primer dia de la semana es: ", SEMANA[0], "<br>";
    echo "</div>";
    echo "<br>";
    //● todos los días secuencialmente
    echo "<div class='card shadow-sm'>";
    echo '<h3 class="card-title text-secondary mb-3">Días de la semana</h3>';
    for ($i = 0; $i < count(SEMANA); $i++) {
        echo  SEMANA[$i], "<br>";
    }
    echo '</div>';
    echo "<br>";
    echo "<div class='card shadow-sm'>";
    //● lo mismo que el anterior, pero en formato de lista numerada
    echo "<ol class='list-group'>";
    echo "<li class='list-group-item active' aria-current='true'>Lista semena</li>";
    for ($i = 0; $i < count(SEMANA); $i++) {
        echo "<li class='list-group-item list-group-item-action'>", SEMANA[$i], "</li>";
    }
    echo "</ol>";
    echo "</div>";
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <body>
    </body>

    </html>