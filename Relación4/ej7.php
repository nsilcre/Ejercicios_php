<?php
// Relación IV - Ejercicio 7
// Clase BanderaFranjas y pruebas de sus métodos.

class BanderaFranjas
{
    public function __construct(
        private string $orientacion,
        private array $franjas,    
        private string $nombre = 'sin adscripción'
    ) {}

    public function __destruct() {}

    public function mostrar(): string
    {
        return sprintf('Bandera de %s (%s): %s',
            $this->nombre,
            $this->orientacion,
            implode(' | ', $this->franjas)
        );
    }

    public function esIdentica(BanderaFranjas $otra): bool
    {
        return $this->orientacion === $otra->orientacion
            && $this->franjas === $otra->franjas
            && $this->nombre === $otra->nombre;
    }

    public function mismasFranjasDistintaOrientacion(BanderaFranjas $otra): bool
    {
        return $this->franjas === $otra->franjas
            && $this->orientacion !== $otra->orientacion;
    }

    public function invertirColores(): void
    {
        $this->franjas = array_reverse($this->franjas);
    }

    public function invertirOrientacion(): void
    {
        $this->orientacion = $this->orientacion === 'horizontal' ? 'vertical' : 'horizontal';
    }
}

$espana = new BanderaFranjas('horizontal', ['rojo', 'amarillo', 'rojo'], 'España');
$espanaVertical = new BanderaFranjas('vertical', ['rojo', 'amarillo', 'rojo'], 'España (vertical)');
$otra = new BanderaFranjas('horizontal', ['azul', 'blanco', 'rojo'], 'Otra');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Relación IV - Ejercicio 7</title>
</head>
<body>
<h1>Relación IV - Ejercicio 7: BanderaFranjas</h1>

<p><?php echo htmlspecialchars($espana->mostrar()); ?></p>
<p><?php echo htmlspecialchars($espanaVertical->mostrar()); ?></p>
<p><?php echo htmlspecialchars($otra->mostrar()); ?></p>

<ul>
    <li>¿España y España vertical son idénticas? <?php echo $espana->esIdentica($espanaVertical) ? 'Sí' : 'No'; ?></li>
    <li>¿España y España vertical tienen mismas franjas con distinta orientación? <?php echo $espana->mismasFranjasDistintaOrientacion($espanaVertical) ? 'Sí' : 'No'; ?></li>
    <li>¿España y Otra son idénticas? <?php echo $espana->esIdentica($otra) ? 'Sí' : 'No'; ?></li>
</ul>

<?php $espana->invertirColores(); $espana->invertirOrientacion(); ?>
<p>España tras invertir colores y orientación: <?php echo htmlspecialchars($espana->mostrar()); ?></p>
</body>
</html>
