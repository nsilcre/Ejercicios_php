<?php
// Relación III - Ejercicio 9
// Pide un texto y muestra la palabra más larga

$texto = '';
$palabraMax = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    $palabras = preg_split('/[\s,.;:¡!¿?"()]+/u', trim($texto), -1, PREG_SPLIT_NO_EMPTY);
    $maxLen = 0;
    foreach ($palabras as $p) {
        $len = mb_strlen($p, 'UTF-8');
        if ($len > $maxLen) {
            $maxLen = $len;
            $palabraMax = $p;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 9</title>
</head>
<body>
    <h1>Relación III - Ejercicio 9</h1>
    <p>Introduce un texto y se mostrará la palabra más larga.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="texto">Texto:</label><br>
        <textarea name="texto" id="texto" rows="4" cols="60" required><?php echo htmlspecialchars($texto); ?></textarea><br>
        <button type="submit">Buscar palabra más larga</button>
    </form>

    <?php if ($palabraMax !== ''): ?>
        <p>La palabra más larga es: <strong><?php echo htmlspecialchars($palabraMax); ?></strong></p>
    <?php endif; ?>
</body>
</html>
