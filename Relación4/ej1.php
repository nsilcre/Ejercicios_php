<?php
// Relación IV - Ejercicio 1
// Login sencillo que crea sesión y cookie, mostrando el valor por ambos medios.

session_start();

$usuarioEsperado = 'usuario';
$contrasenaEsperada = 'secreto';

$nombreUsuario = '';
$mensaje = '';
$error = '';

$cookieValor = $_COOKIE['id_usuario'] ?? null;
$sesionValor = $_SESSION['id_usuario'] ?? null;

function credencialesValidas(string $user, string $pass, string $esperado, string $passEsperada): bool {
    return $user === $esperado && $pass === $passEsperada;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = trim($_POST['nombre_usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombreUsuario === '' || $password === '') {
        $error = 'Debes introducir usuario y contraseña.';
    } elseif (!credencialesValidas($nombreUsuario, $password, $usuarioEsperado, $contrasenaEsperada)) {
        $error = 'Credenciales incorrectas.';
    } else {
        $_SESSION['id_usuario'] = $nombreUsuario;
        setcookie('id_usuario', $nombreUsuario, time() + 30, '/');
        $mensaje = 'Login correcto. La cookie estará disponible tras recargar la página.';

        $sesionValor = $_SESSION['id_usuario'];
        $cookieValor = $_COOKIE['id_usuario'] ?? null;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 1</title>
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', function (e) {
                const usuario = form.nombre_usuario.value.trim();
                const pass = form.password.value.trim();
                let errores = [];
                if (!usuario) errores.push('El usuario es obligatorio');
                if (!pass) errores.push('La contraseña es obligatoria');
                if (errores.length) {
                    e.preventDefault();
                    alert(errores.join('\n'));
                }
            });
        });
    </script>
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-4">Relación IV - Ejercicio 1</h1>

    <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="card p-3 mb-3">
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo htmlspecialchars($nombreUsuario); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($mensaje): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>

    <div class="alert alert-info mt-3">
        <h2>Estado actual</h2>
        <p><strong>Valor por sesión:</strong>
            <?php echo $sesionValor ? htmlspecialchars($sesionValor) : 'No hay valor en sesión'; ?></p>
        <p><strong>Valor por cookie:</strong>
            <?php echo $cookieValor ? htmlspecialchars($cookieValor) : 'Cookie no disponible (recarga o espera 30s)'; ?></p>
        <p class="text-muted">La página se refresca automáticamente cada 5 segundos.</p>
    </div>
</div>
</body>
</html>
