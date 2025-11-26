<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="table-responsive">
                <div class="table caption-top">
                    <table class="table caption-top table-bordered table-hover align-middle text-center">
                        <?php
                        // Relación II - Ejercicio 6
                        // Tabla de personas con Bootstrap 5.
                        echo "<br><h1>Ejercicio6</h1>";
                        $datos = [
                            [
                                "id" => "309804806665679",
                                "name" => "Yolanda",
                                "Apellido" => "Mariano Corrales Jiménez",
                                "email" => "Alejandra5@hotmail.com",
                                "phone" => "907.686.086"
                            ],
                            [
                                "id" => 2959943856393926,
                                "name" => "Jennifer",
                                "Apellido" => "Sr. Francisco Méndez Corona",
                                "email" => "Cesar70@gmail.com",
                                "phone" => "982588830"
                            ],
                            [
                                "id" => 276816469843661,
                                "name" => "María Soledad",
                                "Apellido" => "Sr. Bernardo Verdugo Lozada",
                                "email" => "Cristina.HuertaBarraza52@hotmail.com",
                                "phone" => "942.111.157"
                            ],
                            [
                                "id" => 6055335044142325,
                                "name" => "Blanca",
                                "Apellido" => "Beatriz Ocasio Saavedra",
                                "email" => "Barbara_BrionesOlmos15@hotmail.com",
                                "phone" => "910.786.779"
                            ],
                            [
                                "id" => 3464438529452689,
                                "name" => "Verónica",
                                "Apellido" => "Laura Valdés Villegas",
                                "email" => "Eduardo_SaavedraZepeda@hotmail.com",
                                "phone" => "908132243"
                            ],
                            [
                                "id" => 3053488207056806,
                                "name" => "Guadalupe",
                                "Apellido" => "María Elena Acevedo Casas",
                                "email" => "Cristina_FelicianoArias@yahoo.com",
                                "phone" => "907 147 958"
                            ],
                            [
                                "id" => 3366719327626711,
                                "name" => "Alfredo",
                                "Apellido" => "Jerónimo Sáenz Arreola",
                                "email" => "Monica23@yahoo.com",
                                "phone" => "976 475 247"
                            ],
                            [
                                "id" => 3309286391370490,
                                "name" => "Ricardo",
                                "Apellido" => "Mariana Valenzuela Terán",
                                "email" => "Alicia10@hotmail.com",
                                "phone" => "939 633 008"
                            ],
                            [
                                "id" => 3280128481594504,
                                "name" => "Rosalia",
                                "Apellido" => "Dolores Nava Acuña",
                                "email" => "Gilberto.CanalesChacon@yahoo.com",
                                "phone" => "982-631-790"
                            ],
                            [
                                "id" => 8278160786530451,
                                "name" => "Esperanza",
                                "Apellido" => "Sta. Elena Camarillo Olvera",
                                "email" => "Martin.AbregoZepeda@hotmail.com",
                                "phone" => "914-317-515"
                            ]
                        ];

                        echo "<thead class='table-dark'>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
            <th scope='col'>Email</th>
            <th scope='col'>Teléfono</th>
        </tr>
    </thead>";

                        echo "<tbody class='table-group-divider'>";

                        foreach ($datos as $fila) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $fila["id"] . "</th>";
                            echo "<td>" . $fila["name"] . "</td>";
                            echo "<td>" . $fila["Apellido"] . "</td>";
                            echo "<td>" . $fila["email"] . "</td>";
                            echo "<td>" . $fila["phone"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>