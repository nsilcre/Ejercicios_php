<?php
// Relación II - Ejercicio 16
// Similar al ejercicio 17 de la relación I, pero permitiendo elegir entre
// comprobar primo o mostrar divisores usando la "plantilla" de ej7 (ya cubierto en ej15).
// Aquí creamos un formulario base reutilizable para futuros ejercicios.

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 16</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Plantilla de formulario numérico (Rel. 2 - Ej. 16)</h1>
        <p>Este archivo sirve como plantilla Bootstrap para captar datos numéricos, que puedes reutilizar o adaptar según el enunciado.</p>
        <form class="row g-3" method="post" action="#">
            <div class="col-md-6">
                <label for="num1" class="form-label">Número 1</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="col-md-6">
                <label for="num2" class="form-label">Número 2</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>