<?php
// Relación IV - Ejercicio 14
// Carrito de la compra almacenado como JSON en una cookie.

$carrito = [
    ['codigo' => 'A1', 'nombre' => 'Camiseta', 'unidades' => 2],
    ['codigo' => 'B2', 'nombre' => 'Pantalón', 'unidades' => 1],
    ['codigo' => 'C3', 'nombre' => 'Zapatillas', 'unidades' => 3],
];

$jsonCarrito = json_encode($carrito, JSON_UNESCAPED_UNICODE);
setcookie('carrito', $jsonCarrito, 0, '/'); 

$modoVer = isset($_GET['ver']);

$cookieLeida = $_COOKIE['carrito'] ?? null;
$carritoDesdeCookieArray = null;
$carritoDesdeCookieObj = null;

if ($modoVer && $cookieLeida) {
    $carritoDesdeCookieArray = json_decode($cookieLeida, true);
    $carritoDesdeCookieObj = json_decode($cookieLeida);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 14</title>
</head>
<body>
<h1>Relación IV - Ejercicio 14: Carrito en cookie JSON</h1>

<h2>Carrito original (array)</h2>
<pre><?php print_r($carrito); ?></pre>

<h2>Carrito codificado como JSON (json_encode)</h2>
<pre><?php echo htmlspecialchars($jsonCarrito); ?></pre>

<p>
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?ver=1">Ver carrito leído desde la cookie</a>
</p>

<?php if ($modoVer): ?>
    <h2>Contenido de la cookie "carrito"</h2>
    <pre><?php var_dump($cookieLeida); ?></pre>

    <?php if ($cookieLeida): ?>
        <h2>Cookie convertida a array asociativo</h2>
        <pre><?php print_r($carritoDesdeCookieArray); ?></pre>

        <h2>Cookie convertida a objetos stdClass</h2>
        <pre><?php print_r($carritoDesdeCookieObj); ?></pre>
    <?php else: ?>
        <p>La cookie todavía no está disponible. Recarga la página y vuelve a intentarlo.</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
