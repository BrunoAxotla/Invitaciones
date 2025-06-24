<?php
    session_start();
  include("./configBD.php");
  include("./galardonadoBD.php");
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pdf.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Confirmación de Asistencia</title>

</head>
<body>
    <div class="container">
      

        <h2><?php echo $infGetGalardonado[1]; ?> ¡Muchas felicidades!</h2>
        <p>Usted ha sido galardonado(a) con la presea <b>"<?php echo $infGetGalardonado[3]; ?>"</b>
             de las distinciones al Mérito politécnico 2023.</p>
        <p>¡Gracias! Ya confirmó su asistencia al evento...</p>
        <div class="col s12 m6 center-align">
            <a href="./cerrarSesion.php?curp=curp">Cerrar Sesión</a>
          </div>
        <a type="button" id="descargarInvitacion" href = "./generarPDF.php">Descargar invitación</a>
        
    </div>

    <footer>
        <p><b>&copy; ESCOM 2024</b></p>
    </footer>

    
</body>
</html>
