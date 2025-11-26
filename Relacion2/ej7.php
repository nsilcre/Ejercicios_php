<?php
// Relación II - Ejercicio 7
// Formulario Bootstrap para introducir 2 números.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación 2 - Ejercicio 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Formulario de dos números</h1>
    <form class="row g-3" method="post" action="#">
        <div class="col-md-6">
            <label for="num1" class="form-label">Número 1</label>
            <input type="number" step="any" class="form-control" id="num1" name="num1" required>
        </div>
        <div class="col-md-6">
            <label for="num2" class="form-label">Número 2</label>
            <input type="number" step="any" class="form-control" id="num2" name="num2" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
</body>
</html>
