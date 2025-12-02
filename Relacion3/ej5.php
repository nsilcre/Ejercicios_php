<?php
// Relación III - Ejercicio 5
// Formulario con email y tipo de documento (DNI/NIE/TIE) con validación en JS

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Relación III - Ejercicio 5</title>
    <script>
        function validarFormulario(ev) {
            const email = document.getElementById('email').value.trim();
            const tipo = document.getElementById('tipo').value;
            const doc = document.getElementById('documento').value.trim().toUpperCase();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Email no válido');
                ev.preventDefault();
                return false;
            }

            let docRegex;
            if (tipo === 'dni') {

                docRegex = /^\d{8}[A-Z]$/;
            } else if (tipo === 'nie') {

                docRegex = /^[XYZ]\d{7}[A-Z]$/;
            } else if (tipo === 'tie') {

                docRegex = /^E\d{8}$/;
            }

            if (docRegex && !docRegex.test(doc)) {
                alert('El documento introducido no es válido para el tipo seleccionado');
                ev.preventDefault();
                return false;
            }
            return true;
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('formDoc').addEventListener('submit', validarFormulario);
        });
    </script>
</head>

<body>
    <h1>Relación III - Ejercicio 5</h1>
    <p>Formulario con validación de email y tipo de documento (DNI, NIE, TIE) en JavaScript.</p>

    <form id="formDoc" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="tipo">Tipo de documento:</label>
        <select id="tipo" name="tipo" required>
            <option value="dni">DNI</option>
            <option value="nie">NIE</option>
            <option value="tie">TIE</option>
        </select>
        <br>
        <label for="documento">Número de documento:</label>
        <input type="text" id="documento" name="documento" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>