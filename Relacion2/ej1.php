<?php
// Relación II - Ejercicio 1
// Calculadora con dos números y un operador, probando GET y POST.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = (float) $_POST["num1"];
    $num2 = (float) $_POST["num2"];
    $operador = $_POST["operador"];
    $resultado = null;
    $error = false;

    switch ($operador) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '/':
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $error = "Error: No se puede dividir entre 0.";
            }
            break;
        case '%':
            if ($num2 != 0) {
                $resultado = $num1 % $num2;
            } else {
                $error = "Error: No se puede hacer módulo entre 0.";
            }
            break;
        default:
            $error = "Operador no válido.";
            break;
    }

    echo '<div class="mb-3">';
    if ($error) {
        echo '<input class="form-control text-danger fw-bold" type="text" value="' . $error . '" readonly>';
    } else {
        echo '<input class="form-control text-success fw-bold" type="text" value="Resultado: ' . $resultado . '" readonly>';
    }
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand">Calculadora</a>
        </div>
    </nav>

    <div class="position-absolute top-50 start-50 translate-middle">
        <form action="" method="post">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="operador">
                    <option selected>Seleccione un operando</option>
                    <option value="+">Suma (+)</option>
                    <option value="-">Resta (-)</option>
                    <option value="*">Multiplicación (*)</option>
                    <option value="/">División (/)</option>
                    <option value="%">Porcentaje (%)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Número</label>
                <input type="number" class="form-control" id="number1" name="num1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Número</label>
                <input type="number" class="form-control" id="number1" name="num2">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </form>
    </div>
</body>

</html>