<?php
// Relación IV - Ejercicio 10
// Interfaz Encendible y clases Bombilla y Motocicleta.

interface Encendible
{
    public function encender(): void;
    public function apagar(): void;
}

class Bombilla implements Encendible
{
    private bool $encendida = false;

    public function __construct(
        private string $tipoBombilla,
        private int $lumenes
    ) {}

    public function __destruct() {}

    public function encender(): void
    {
        $this->encendida = true;
        echo '<p>Bombilla encendida (' . htmlspecialchars($this->tipoBombilla) . ', ' . $this->lumenes . " lm)</p>";
    }

    public function apagar(): void
    {
        $this->encendida = false;
        echo '<p>Bombilla apagada.</p>';
    }
}

class Motocicleta implements Encendible
{
    private bool $encendida = false;

    public function __construct(
        private string $matricula,
        private int $gasolina = 0,
        private int $bateria = 2
    ) {}

    public function cargarGasolina(int $litros): void
    {
        if ($litros <= 0) return;
        $this->gasolina += $litros;
    }

    public function encender(): void
    {
        if ($this->encendida) {
            echo '<p>La moto ya estaba encendida.</p>';
            return;
        }
        if ($this->bateria <= 0) {
            echo '<p>No hay batería suficiente para arrancar.</p>';
            return;
        }
        if ($this->gasolina <= 0) {
            echo '<p>No hay gasolina suficiente.</p>';
            return;
        }
        $this->encendida = true;
        $this->bateria--;
        echo '<p>Motocicleta ' . htmlspecialchars($this->matricula) . ' encendida.</p>';
    }

    public function apagar(): void
    {
        if (!$this->encendida) {
            echo '<p>La moto ya estaba apagada.</p>';
            return;
        }
        $this->encendida = false;
        echo '<p>Motocicleta ' . htmlspecialchars($this->matricula) . ' apagada.</p>';
    }
}

function enciende_algo(Encendible $algo): void
{
    $algo->encender();
}

$miBombilla = new Bombilla('led', 12);
$miMoto = new Motocicleta('3873 NXB');
$miMoto->cargarGasolina(5);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 10</title>
</head>

<body>
    <h1>Relación IV - Ejercicio 10: Encendible</h1>

    <?php
    enciende_algo($miBombilla);
    enciende_algo($miMoto);
    ?>
</body>

</html>