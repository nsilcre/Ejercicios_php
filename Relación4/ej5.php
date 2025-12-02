<?php
// Relación IV - Ejercicio 5
// Definición de la clase Restaurante y prueba de sus métodos.

class Restaurante
{
    public string $nombre;
    public string $tipoCocina;
    public array $ratings = [];

    public function __construct(string $nombre, string $tipoCocina)
    {
        $this->nombre = $nombre;
        $this->tipoCocina = $tipoCocina;
        $this->ratings = [];
    }

    public function __destruct() {}

    public function __toString(): string
    {
        $media = $this->calcularRatingMedio();
        $mediaTexto = $media === null ? 'Sin valoraciones' : number_format($media, 2);
        return sprintf(
            '%s (%s) - votos: %d, media: %s',
            $this->nombre,
            $this->tipoCocina,
            $this->obtenerNumeroRatings(),
            $mediaTexto
        );
    }

    public function obtenerNumeroRatings(): int
    {
        return count($this->ratings);
    }

    public function anadirRating(int $rating): void
    {
        if ($rating < 1 || $rating > 5) {
            return; 
        }
        $this->ratings[] = $rating;
    }

    public function anadirRatings(array $nuevos): void
    {
        foreach ($nuevos as $r) {
            $this->anadirRating((int)$r);
        }
    }

    public function calcularRatingMedio(): ?float
    {
        if (!$this->ratings) {
            return null;
        }
        return array_sum($this->ratings) / count($this->ratings);
    }
}

$rest1 = new Restaurante('Casa Paco', 'Cocina tradicional');
$rest1->anadirRatings([5, 4, 5, 3]);

$rest2 = new Restaurante('Sushi Time', 'Japonesa');
$rest2->anadirRatings([4, 4, 5]);

$rest3 = new Restaurante('Veggie Love', 'Vegetariana');

$restaurantes = [$rest1, $rest2, $rest3];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 5</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 5: Clase Restaurante</h1>

    <ul>
        <?php foreach ($restaurantes as $rest): ?>
            <li><?php echo htmlspecialchars((string)$rest); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>