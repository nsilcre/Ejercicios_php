<?php
// Relación III - Ejercicio 13
// Uso de funciones de strings y muestra en alerts de Bootstrap

$texto = '';
$reverso = '';
$esPalindroma = false;
$palabrasReverso = '';
$mayus = $minus = '';
$cuentaCaracteres = $cuentaPalabras = 0;
$cryptVal = $md5Val = $sha1Val = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'] ?? '';
    $reverso = mb_strrev($texto ?? '');
    $limpio = mb_strtolower(preg_replace('/[^\p{L}\p{N}]/u', '', $texto), 'UTF-8');
    $reversoLimpio = mb_strrev($limpio);
    $esPalindroma = ($limpio !== '' && $limpio === $reversoLimpio);

    $palabras = preg_split('/\s+/u', trim($texto));
    $palabrasReverso = implode(' ', array_reverse($palabras));

    $mayus = mb_strtoupper($texto, 'UTF-8');
    $minus = mb_strtolower($texto, 'UTF-8');

    $cuentaCaracteres = mb_strlen($texto, 'UTF-8');
    $cuentaPalabras = $texto === '' ? 0 : count($palabras);

    $cryptVal = crypt($texto, 'se');
    $md5Val = md5($texto);
    $sha1Val = sha1($texto);
}

function mb_strrev(string $str, string $encoding = 'UTF-8'): string
{
    $len = mb_strlen($str, $encoding);
    $rev = '';
    while ($len-- > 0) {
        $rev .= mb_substr($str, $len, 1, $encoding);
    }
    return $rev;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 13</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="p-4">
    <h1>Relación III - Ejercicio 13</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mb-3">
        <div class="mb-3">
            <label for="texto" class="form-label">Cadena de texto:</label>
            <textarea class="form-control" id="texto" name="texto" rows="3" required><?php echo htmlspecialchars($texto); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Procesar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-info">
            <strong>Del revés:</strong> <?php echo htmlspecialchars($reverso); ?><br>
            <?php if ($esPalindroma): ?>Es palíndroma<?php else: ?>No es palíndroma<?php endif; ?>
        </div>

        <div class="alert alert-secondary">
            <strong>Palabras del revés:</strong> <?php echo htmlspecialchars($palabrasReverso); ?>
        </div>

        <div class="alert alert-success">
            <strong>Mayúsculas:</strong> <?php echo htmlspecialchars($mayus); ?><br>
            <strong>Minúsculas:</strong> <?php echo htmlspecialchars($minus); ?>
        </div>

        <div class="alert alert-warning">
            <strong>Número de caracteres:</strong> <?php echo $cuentaCaracteres; ?><br>
            <strong>Número de palabras:</strong> <?php echo $cuentaPalabras; ?>
        </div>

        <div class="alert alert-dark">
            <strong>crypt:</strong> <?php echo htmlspecialchars($cryptVal); ?><br>
            <strong>md5:</strong> <?php echo htmlspecialchars($md5Val); ?><br>
            <strong>sha1:</strong> <?php echo htmlspecialchars($sha1Val); ?>
        </div>
    <?php endif; ?>
</body>

</html>