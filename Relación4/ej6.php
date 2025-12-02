<?php
// Relación IV - Ejercicio 6
// Versión mejorada de Restaurante con promoción de propiedades, atributos privados y contador estático.

class RestauranteV2
{
    private static int $numeroRest = 0;

    /**
     * @param int[] $ratings
     */
    public function __construct(
        private string $nombre,
        private string $tipoCocina,
        private array $ratings = []
    ) {
        self::$numeroRest++;
    }

    public function __destruct() {}

    public function __toString(): string
    {
        return sprintf(
            '%s (%s) - media: %s',
            $this->nombre,
            $this->tipoCocina,
            $this->getRatingMedio() !== null ? number_format($this->getRatingMedio(), 2) : 'Sin valoraciones'
        );
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getTipoCocina(): string
    {
        return $this->tipoCocina;
    }
    public function setTipoCocina(string $tipo): void
    {
        $this->tipoCocina = $tipo;
    }

    public function getRatings(): array
    {
        return $this->ratings;
    }

    public function setRatings(array $ratings): void
    {
        $this->ratings = [];
        foreach ($ratings as $r) {
            $this->addRating((int)$r);
        }
    }

    public function addRating(int $rating): void
    {
        if ($rating < 1 || $rating > 5) return;
        $this->ratings[] = $rating;
    }

    public function addRatings(array $ratings): void
    {
        foreach ($ratings as $r) {
            $this->addRating((int)$r);
        }
    }

    public function getNumeroRatings(): int
    {
        return count($this->ratings);
    }

    public function getRatingMedio(): ?float
    {
        if (!$this->ratings) return null;
        return array_sum($this->ratings) / count($this->ratings);
    }

    public static function totalRests(): int
    {
        return self::$numeroRest;
    }
}

$rest1 = new RestauranteV2('Casa Paco', 'Cocina tradicional');
$rest1->addRatings([5, 4, 5]);

$rest2 = new RestauranteV2('Sushi Time', 'Japonesa');
$rest2->addRatings([4, 4, 5, 3]);

$rest3 = new RestauranteV2('Veggie Love', 'Vegetariana');

$restaurantes = [$rest1, $rest2, $rest3];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 6</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 6: Restaurante con propiedades privadas y contador estático</h1>

    <ul>
        <?php foreach ($restaurantes as $rest): ?>
            <li><?php echo htmlspecialchars((string)$rest); ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Total de restaurantes creados: <?php echo RestauranteV2::totalRests(); ?></p>
</body>

</html>