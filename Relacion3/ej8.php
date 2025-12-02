<?php
// Relación III - Ejercicio 8
// Versión A: permite elegir mayúsculas y/o minúsculas (no exclusiva)
// Versión B: disyunción verdadera (solo una opción), con validación JS

$textoA = $resultadoA = '';
$mayusA = $minusA = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form'] ?? '') === 'A') {
    $textoA = $_POST['textoA'] ?? '';
    $mayusA = isset($_POST['mayus']);
    $minusA = isset($_POST['minus']);

    $resultadoParts = [];
    if ($mayusA) {
        $resultadoParts[] = 'MAYÚSCULAS: ' . mb_strtoupper($textoA, 'UTF-8');
    }
    if ($minusA) {
        $resultadoParts[] = 'minúsculas: ' . mb_strtolower($textoA, 'UTF-8');
    }
    $resultadoA = implode(' | ', $resultadoParts);
}

$textoB = $resultadoB = '';
$opcionB = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['form'] ?? '') === 'B') {
    $textoB = $_POST['textoB'] ?? '';
    $opcionB = $_POST['transform'] ?? '';

    if ($opcionB === 'mayus') {
        $resultadoB = mb_strtoupper($textoB, 'UTF-8');
    } elseif ($opcionB === 'minus') {
        $resultadoB = mb_strtolower($textoB, 'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 8</title>
    <script>
        function validarFormularioB(ev) {
            const mayus = document.getElementById('b_mayus');
            const minus = document.getElementById('b_minus');

            if (!mayus.checked && !minus.checked) {
                alert('Debes elegir mayúsculas o minúsculas.');
                ev.preventDefault();
                return false;
            }
            if (mayus.checked && minus.checked) {
                alert('Solo puedes elegir una opción (mayúsculas O minúsculas).');
                ev.preventDefault();
                return false;
            }
            return true;
        }
        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('formB').addEventListener('submit', validarFormularioB);
        });
    </script>
</head>

<body>
    <h1>Relación III - Ejercicio 8</h1>

    <h2>Versión A: mayúsculas y/o minúsculas</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="form" value="A">
        <label for="textoA">Texto:</label>
        <input type="text" id="textoA" name="textoA" required value="<?php echo htmlspecialchars($textoA); ?>">
        <br>
        <label><input type="checkbox" name="mayus" <?php echo $mayusA ? 'checked' : ''; ?>> Mayúsculas</label>
        <label><input type="checkbox" name="minus" <?php echo $minusA ? 'checked' : ''; ?>> Minúsculas</label>
        <br>
        <button type="submit">Transformar</button>
    </form>

    <?php if ($resultadoA !== ''): ?>
        <p><strong>Resultado:</strong> <?php echo htmlspecialchars($resultadoA); ?></p>
    <?php endif; ?>

    <hr>

    <h2>Versión B: disyunción verdadera (o mayúsculas O minúsculas)</h2>
    <form id="formB" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="hidden" name="form" value="B">
        <label for="textoB">Texto:</label>
        <input type="text" id="textoB" name="textoB" required value="<?php echo htmlspecialchars($textoB); ?>">
        <br>
        <label><input type="checkbox" id="b_mayus" name="transform" value="mayus" <?php echo $opcionB === 'mayus' ? 'checked' : ''; ?>> Mayúsculas</label>
        <label><input type="checkbox" id="b_minus" name="transform" value="minus" <?php echo $opcionB === 'minus' ? 'checked' : ''; ?>> Minúsculas</label>
        <br>
        <button type="submit">Transformar</button>
    </form>

    <?php if ($resultadoB !== ''): ?>
        <p><strong>Resultado:</strong> <?php echo htmlspecialchars($resultadoB); ?></p>
    <?php endif; ?>
</body>

</html>