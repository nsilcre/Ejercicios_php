<?php
// Relación IV - Ejercicio 9
// CuentaBancaria abstracta y clases hijas CuentaDebito y CuentaCredito.

abstract class CuentaBancaria
{
    protected int $numeroOperaciones = 0;

    public function __construct(
        protected string $numeroCuenta,
        protected string $titular,
        protected float $saldo = 0.0
    ) {}

    public function __toString(): string
    {
        return sprintf(
            '%s (%s) - saldo: %.2f €, operaciones: %d',
            $this->numeroCuenta,
            $this->titular,
            $this->saldo,
            $this->numeroOperaciones
        );
    }

    abstract public function extraer(float $cantidad): void;

    public function depositar(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->saldo += $cantidad;
        $this->numeroOperaciones++;
    }

    public function transferir(CuentaBancaria $destino, float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $this->extraer($cantidad);
        $destino->depositar($cantidad);
    }
}

class CuentaDebito extends CuentaBancaria
{
    public function extraer(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        if ($cantidad > $this->saldo) {
            return;
        }
        $this->saldo -= $cantidad;
        $this->numeroOperaciones++;
    }
}

class CuentaCredito extends CuentaBancaria
{
    public function __construct(string $numeroCuenta, string $titular, float $saldo = 0.0, private float $limiteCredito = -500.0)
    {
        parent::__construct($numeroCuenta, $titular, $saldo);
    }

    public function extraer(float $cantidad): void
    {
        if ($cantidad <= 0) return;
        $nuevoSaldo = $this->saldo - $cantidad;
        if ($nuevoSaldo < $this->limiteCredito) {
            return;
        }
        $this->saldo = $nuevoSaldo;
        $this->numeroOperaciones++;
    }
}

$debito = new CuentaDebito('ES00 1111 2222 3333', 'Carlos', 100.0);
$credito = new CuentaCredito('ES00 4444 5555 6666', 'Marta', 0.0, -300.0);

$debito->depositar(50);
$debito->extraer(120);
$debito->extraer(50);

$credito->depositar(100);
$credito->extraer(200);
$credito->extraer(250);

$debito->transferir($credito, 20);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 9</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 9: Cuentas de débito y crédito</h1>

    <p><strong>Cuenta débito:</strong> <?php echo htmlspecialchars((string)$debito); ?></p>
    <p><strong>Cuenta crédito:</strong> <?php echo htmlspecialchars((string)$credito); ?></p>
</body>

</html>