<?php
// Relación III - Ejercicio 19
// Menús sugeridos donde la tercera opción de cada tipo es dos veces más probable
// y se muestra la imagen del primer plato principal que haya salido al azar.

$menu = [
    'entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'],
    'primero'  => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],
    'segundo'  => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'],
    'postre'   => ['Helado 3 sabores', 'Flan', 'Tarta de Queso'],
];

$imagenesPrimeros = [
    'Gazpachuelo' => 'img/gazpachuelo.jpg',
    'Salmorejo'   => 'img/salmorejo.jpg',
    'Ajo Blanco'  => 'img/ajoblanco.jpg',
];

$n = 0;
$menusGenerados = [];

function escoger_con_peso(array $platos): string
{
    $indices = [0, 1, 2, 2];
    $idx = $indices[array_rand($indices)];
    return $platos[$idx];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = (int) ($_POST['cantidad'] ?? 0);
    if ($n < 1) {
        $n = 0;
    } elseif ($n > 20) {
        $n = 20;
    }

    for ($i = 0; $i < $n; $i++) {
        $sugerencia = [];
        foreach ($menu as $tipo => $platos) {
            $sugerencia[$tipo] = escoger_con_peso($platos);
        }
        $menusGenerados[] = $sugerencia;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 19</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Relación III - Ejercicio 19</h1>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3 mb-4">
            <div class="col-auto">
                <label for="cantidad" class="form-label">Número de menús sugeridos</label>
                <input type="number" min="1" max="20" class="form-control" id="cantidad" name="cantidad" required value="<?php echo $n ?: 1; ?>">
            </div>
            <div class="col-auto align-self-end">
                <button type="submit" class="btn btn-primary">Generar</button>
            </div>
        </form>

        <?php if ($menusGenerados): ?>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                <?php foreach ($menusGenerados as $idx => $sugerencia): ?>
                    <?php
                    $platoPrimero = $sugerencia['primero'];
                    $imgUrl = $imagenesPrimeros[$platoPrimero] ?? null;
                    ?>
                    <div class="col">
                        <div class="card h-100">
                            <?php if ($imgUrl): ?>
                                <img src="<?php echo htmlspecialchars($imgUrl); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($platoPrimero); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">Menú sugerido #<?php echo $idx + 1; ?></h5>
                                <ul class="list-group list-group-flush mt-2">
                                    <li class="list-group-item"><strong>Entrante:</strong> <?php echo htmlspecialchars($sugerencia['entrante']); ?></li>
                                    <li class="list-group-item"><strong>Primero:</strong> <?php echo htmlspecialchars($platoPrimero); ?></li>
                                    <li class="list-group-item"><strong>Segundo:</strong> <?php echo htmlspecialchars($sugerencia['segundo']); ?></li>
                                    <li class="list-group-item"><strong>Postre:</strong> <?php echo htmlspecialchars($sugerencia['postre']); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>