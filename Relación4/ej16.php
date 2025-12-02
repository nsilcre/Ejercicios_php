<?php
// Relación IV - Ejercicio 16
// Ejemplo básico de uso de namespaces y require.

require_once __DIR__ . '/Saludador.php';

use App\Util\Saludador;

$saludador = new Saludador('DWES');
$mensaje = $saludador->saludar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 16</title>
</head>
<body>
<h1>Relación IV - Ejercicio 16: Namespaces y require</h1>

<p><?php echo htmlspecialchars($mensaje); ?></p>

<p>
    En este ejemplo, la clase <code>Saludador</code> está definida en el namespace <code>App\\Util</code>
    dentro de otro archivo PHP, y se incluye mediante <code>require_once</code>.
</p>
</body>
</html>
