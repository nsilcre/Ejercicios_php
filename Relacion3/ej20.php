<?php
// Relación III - Ejercicio 20
// Ejemplo de controles de seguridad en datos introducidos por formulario.
// Se muestra el uso de htmlspecialchars en el action, la extensión Filter
// y preg_match con expresiones regulares.

$nombre = '';
$email = '';
$dni = '';
$errores = [];
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $emailRaw = $_POST['email'] ?? '';
    $email = filter_var($emailRaw, FILTER_SANITIZE_EMAIL);
    $dni = strtoupper(trim($_POST['dni'] ?? ''));


    if ($nombre === '' || strlen($nombre) < 2) {
        $errores[] = 'El nombre es obligatorio y debe tener al menos 2 caracteres.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email no es válido.';
    }


    if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
        $errores[] = 'El DNI debe tener 8 dígitos seguidos de una letra (formato sencillo).';
    }

    if (!$errores) {
        $resultado = [
            'nombre' => $nombre,
            'email' => $email,
            'dni' => $dni,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 20</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Relación III - Ejercicio 20</h1>
        <p>Ejemplo de validación y sanitización en el lado servidor.</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required minlength="2" value="<?php echo htmlspecialchars($nombre); ?>">
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="col-md-4">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" id="dni" class="form-control" maxlength="9" value="<?php echo htmlspecialchars($dni); ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

        <?php if ($errores): ?>
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    <?php foreach ($errores as $e): ?>
                        <li><?php echo htmlspecialchars($e); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($resultado): ?>
            <div class="alert alert-success mt-3">
                <h2>Datos validados y sanitizados</h2>
                <ul>
                    <li><strong>Nombre:</strong> <?php echo htmlspecialchars($resultado['nombre']); ?></li>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($resultado['email']); ?></li>
                    <li><strong>DNI:</strong> <?php echo htmlspecialchars($resultado['dni']); ?></li>
                </ul>
            </div>
        <?php endif; ?>

        <hr>
        <p class="text-muted">
            Recuerda aplicar <code>htmlspecialchars()</code> al atributo <code>action</code> de tus formularios
            y utilizar la extensión <strong>Filter</strong> y <code>preg_match()</code> para validar y sanitizar
            los datos en los ejercicios con formularios (especialmente si se almacenarán en BBDD).
        </p>
    </div>
</body>

</html>