<?php
session_start();

// Si 'curp' no está establecida en la sesión, redirige a la página de inicio.
if (!isset($_SESSION['curp'])) {
    header('Location: ./../'); // Redirigir a la página inicial
    exit();
}

include("./configBD.php");
include("./galardonadoBD.php");

// Redirigir a PDF.php si infGetGalardonado[7] es "SI"
if ($infGetGalardonado[6] === "SI") {
    header('Location: PDF.php'); // Redirige a PDF.php
    exit();
}

// A partir de aquí, el código HTML se ejecutará solo si infGetGalardonado[7] no es "SI".
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inf. Alumno - TDAW 2024/1</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="./../css/flex.css" rel="stylesheet">
  <!-- <link href="./../libs/materialize/css/materialize.min.css" rel="stylesheet"> -->
  <script src="./../libs/jquery-3.7.1.min.js"></script> 
  <script src="./../libs/materialize/js/materialize.min.js"></script>
  <link rel="stylesheet" href="../css/confirmacion1.css">
  <script src="./../js/asistencia.js"></script>
</head>
<body>
    
    <main class="valign-wrapper">
      <div class="container">
        <div class="row">
         
          
          <p class="logo-text"><h1> Instituto Politécnico Nacional <br>
            Dirección General <br>Coordinación de Relaciones Públicas</h1></p>
        <h2><?php echo $infGetGalardonado[1]; ?> ¡Muchas felicidades!</h2>
        <p>Usted ha sido galardonado(a) con la presea <b>"<?php echo $infGetGalardonado[3]; ?>"</b> de las distinciones al Mérito politécnico 2023.</p>

        <p>Se realizará un evento donde se le entregará su galardón, el día 21 de noviembre de 2023 a las 13 horas (el acceso será a las 11:30 horas) en el auditorio "A" Alejo Peralta del centro cultural Jaime Torres Bodet (El Queso). Av. Luis Enrique Erro s/n, Unidad Profesional Zacatenco.</p>

        <p><b>¿Asistirás al evento?</b></p>

        <button type="button" id="botonAsistir">Sí voy a asistir</button>
    </div>
    <div class="row">
          <div class="col s12 m6 center-align">
            <a href="./cerrarSesion.php?curp=curp">Cerrar Sesión</a>
          </div>

        </div>
      </div>
        </div>
  
    </main>
    
</body>
</html>
 
