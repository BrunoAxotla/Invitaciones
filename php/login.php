<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Pre-registro</title>
</head>
<body>
    <form id="confirmationForm" action="../PHP/confirmacion.php" method="post" onsubmit="return validarCURP()">
        <div class="container" onclick="onclick">
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="center">
            <h2>Pre-registro <br>
                Distinciones al Mérito Politécnico 2023
            </h2>
            <input type="text" id="curp" name="curp" required placeholder="CURP">
            <button type="submit">Acceder</button>
            <h2>&nbsp;</h2>
            </div>
        </div>
    </form>
    <script src="../JS/login.js"></script>
</body>
</html>
