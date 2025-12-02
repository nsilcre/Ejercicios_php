<?php
// Relación IV - Ejercicio 17
// Ejemplo de traits para reutilizar código en varias clases.

trait Logger
{
    public function log(string $mensaje): void
    {
        echo '<p>[' . htmlspecialchars(static::class) . '] ' . htmlspecialchars($mensaje) . '</p>';
    }
}

class Usuario
{
    use Logger;

    public function __construct(private string $nombre) {}

    public function login(): void
    {
        $this->log('El usuario ' . $this->nombre . ' ha iniciado sesión.');
    }
}

class Pedido
{
    use Logger;

    public function __construct(private int $id) {}

    public function procesar(): void
    {
        $this->log('Procesando pedido #' . $this->id);
    }
}

$usuario = new Usuario('Ana');
$pedido = new Pedido(1234);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 17</title>
</head>
<body>
<h1>Relación IV - Ejercicio 17: Traits</h1>

<?php
$usuario->login();
$pedido->procesar();
?>
</body>
</html>
