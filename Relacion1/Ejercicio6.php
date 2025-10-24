<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        /*6- Declara en un programa PHP una clase fruta, con dos atributos: nombre y
        color, y dos funciones, set_name() y get_name(). Declara e inicializa dos
        instancias: apple y banana, inicializa los nombres y muéstralos por pantalla*/
        echo "<br><h1>Ejercicio6</h1>";
        class fruit {
            private $nombre;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
            private $color;

            public function __construct($nombre, $color) {
                $this -> nombre = $nombre;
                $this -> color = $color;
            }
             function set_nombre($nombre) {
            $this -> nombre = $nombre;
            }

            function get_nombre() {
                $this -> nombre;
            }

            function set_color($color) {

                $this -> color = $color;
            }
            
            function get_color() {
                $this -> color;
            }
        }

        $apple = new Fruit("Manzana", "Rojo");
        $banana = new Fruit("Banana", "Amarillo");
        echo "Fruta 1: " . $apple->get_nombre() . " (Color: " . $apple->get_color() . ")<br>";
        echo "Fruta 2: " . $banana->get_nombre() . " (Color: " . $banana->get_color() . ")";
    ?>
</body>
</html>