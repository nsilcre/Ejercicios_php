<?php
declare(strict_types=1);
// Relación IV - Ejercicio 15
// Ejemplo de uso de tipos para parámetros y retornos, y de tipos anulables.

class RestauranteTipado
{
    public function __construct(
        private string $nombre,
        private string $tipoCocina,
        private array $ratings = []
    ) {}

    public function addRating(int $rating): void
    {
        if ($rating < 1 || $rating > 5) return;
        $this->ratings[] = $rating;
    }

    public function getRatings(): array
    {
        return $this->ratings;
    }

    public function getRatingMedio(): ?float
    {
        if (!$this->ratings) return null; 
        return array_sum($this->ratings) / count($this->ratings);
    }
}

class CuentaDebitoTipada
{
    public function __construct(
        private string $numeroCuenta,
        private string $titular,
        private float $saldo = 0.0
    ) {}

    public function depositar(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->saldo += $cantidad;
    }

    public function extraer(float $cantidad): bool
    {
        if ($cantidad <= 0 || $cantidad > $this->saldo) {
            return false;
        }
        $this->saldo -= $cantidad;
        return true;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}

$rest = new RestauranteTipado('Ejemplo', 'Fusión');
$rest->addRating(5);
$rest->addRating(4);

$cuenta = new CuentaDebitoTipada('ES00 1234 5678 0000', 'Alumno');
$cuenta->depositar(100);
$ok = $cuenta->extraer(30);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 15</title>
</head>
<body>
<h1>Relación IV - Ejercicio 15: Tipado de funciones y null safety</h1>

<p>Rating medio del restaurante: <?php echo $rest->getRatingMedio(); ?></p>
<p>Saldo de la cuenta después de la extracción (éxito = <?php echo $ok ? 'true' : 'false'; ?>): <?php echo $cuenta->getSaldo(); ?> €</p>
</body>
</html>
