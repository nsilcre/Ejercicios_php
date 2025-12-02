<?php
// Relación III - Ejercicio 10
// Pide un texto y lo muestra con las palabras en orden inverso

$texto = '';
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    $palabras = preg_split('/(\s+)/u', $texto, -1, PREG_SPLIT_DELIM_CAPTURE);

    $soloPalabras = [];
    foreach ($palabras as $i => $fragmento) {
        if ($i % 2 === 0) { 
            $soloPalabras[] = $fragmento;
        }
    }
    $soloPalabras = array_reverse($soloPalabras);

    $resultado = '';
    $indicePalabra = 0;
    foreach ($palabras as $i => $fragmento) {
        if ($i % 2 === 0) {
            $resultado .= $soloPalabras[$indicePalabra++] ?? '';
        } else {
            $resultado .= $fragmento; 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 10</title>
</head>
<body>
    <h1>Relación III - Ejercicio 10</h1>
    <p>Introduce un texto y se mostrará con las palabras en orden inverso.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="texto">Texto:</label><br>
        <textarea name="texto" id="texto" rows="4" cols="60" required><?php echo htmlspecialchars($texto); ?></textarea><br>
        <button type="submit">Invertir palabras</button>
    </form>

    <?php if ($resultado !== ''): ?>
        <h2>Resultado:</h2>
        <p><?php echo nl2br(htmlspecialchars($resultado)); ?></p>
    <?php endif; ?>
</body>
</html>
