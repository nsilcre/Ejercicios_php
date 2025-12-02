<?php
// Relación IV - Ejercicio 8
// Clase CuentaBancaria básica.

class CuentaBancaria
{
    private int $numeroOperaciones = 0;

    public function __construct(
        private string $numeroCuenta,
        private string $titular,
        private float $saldo = 0.0
    ) {}

    public function __destruct() {}

    public function __toString(): string
    {
        return sprintf('Cuenta %s (%s) - saldo: %.2f €, operaciones: %d',
            $this->numeroCuenta,
            $this->titular,
            $this->saldo,
            $this->numeroOperaciones
        );
    }

    public function depositar(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->saldo += $cantidad;
        $this->numeroOperaciones++;
    }

    public function extraer(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->saldo -= $cantidad;
        $this->numeroOperaciones++;
    }

    public function transferir(CuentaBancaria $destino, float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->extraer($cantidad);
        $destino->depositar($cantidad);
    }
}

$cuenta1 = new CuentaBancaria('ES12 3456 7890 0001', 'Ana');
$cuenta2 = new CuentaBancaria('ES98 7654 3210 0002', 'Luis', 100.0);

$cuenta1->depositar(200);
$cuenta1->extraer(50);
$cuenta2->transferir($cuenta1, 30);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 8</title>
</head>
<body>
<h1>Relación IV - Ejercicio 8: CuentaBancaria</h1>

<p><?php echo htmlspecialchars((string)$cuenta1); ?></p>
<p><?php echo htmlspecialchars((string)$cuenta2); ?></p>
</body>
</html>
