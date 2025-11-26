<?php
// Relación II - Ejercicio 10 (formulario)
// Formulario HTML con Bootstrap que envía a ej10_proceso.php.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 10 (Formulario)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Calculadora (formulario separado)</h1>
    <form class="row g-3" method="post" action="ej10_proceso.php">
        <div class="col-md-4">
            <label for="valor1" class="form-label">Valor 1</label>
            <input type="number" step="any" class="form-control" id="valor1" name="valor1" required>
        </div>
        <div class="col-md-4">
            <label for="valor2" class="form-label">Valor 2</label>
            <input type="number" step="any" class="form-control" id="valor2" name="valor2" required>
        </div>
        <div class="col-md-4">
            <label for="operador" class="form-label">Operador</label>
            <select class="form-select" id="operador" name="operador" required>
                <?php foreach (['+','-','*','/','%'] as $op): ?>
                    <option value="<?php echo $op; ?>"><?php echo $op; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Calcular</button>
        </div>
    </form>
</div>
</body>
</html>
