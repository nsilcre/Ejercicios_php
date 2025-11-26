<?php
// Relación II - Ejercicio 12 (formulario)
// Formulario Bootstrap que pide nombre, email y 4 notas, envía a ej12_proceso.php.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 12 (Formulario)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Calcular nota final (rúbrica)</h1>
    <form class="row g-3" method="post" action="ej12_proceso.php">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required minlength="2">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-3">
            <label for="inicial" class="form-label">Nota inicial</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="inicial" name="inicial" required>
        </div>
        <div class="col-md-3">
            <label for="primera" class="form-label">Primera</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="primera" name="primera" required>
        </div>
        <div class="col-md-3">
            <label for="segunda" class="form-label">Segunda</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="segunda" name="segunda" required>
        </div>
        <div class="col-md-3">
            <label for="tercera" class="form-label">Tercera</label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="tercera" name="tercera" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>
</div>
</body>
</html>
