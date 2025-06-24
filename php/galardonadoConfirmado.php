<?php
  
  session_start();
  
  // Si 'curp' no está establecida en la sesión, redirige a la página de inicio.
  if (!isset($_SESSION['curp'])) {
    header('Location: ./../'); // Redirigir a la página inicial
    exit();
  }else{
  include("./configBD.php");
  include("./galardonadoBD.php");
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
  <link rel="stylesheet" href="../css/confirmacion2.css">
  <script src="./../js/invComp.js"></script>
</head>
<body>
    
    <main class="valign-wrapper">
      <div class="container">
        <div class="row">
         
          
          <p class="logo-text"><h1> Instituto Politécnico Nacional <br>
            Dirección General <br>Coordinación de Relaciones Públicas</h1></p>
        <h2><?php echo $infGetGalardonado[1]; ?> ¡Muchas felicidades!</h2>
        <p>Usted ha sido galardonado(a) con la presea <b>"<?php echo $infGetGalardonado[3]; ?>"</b> de las distinciones al Mérito politécnico 2023.</p>

        <div class="acompanante-section">
    <p><b>¿Asistirá con acompañante?</b></p>
    <label><input type="radio" id="acompananteSi" name="acompanante" value="SI"> Sí</label>
    <label><input type="radio" id="acompananteNo" name="acompanante" value="NO"> No</label>
</div>

<div class="dificultad-section">
    <p><b>Si cuenta con alguna dificultad o limitación para desplazarse, favor de indicarlo:</b></p>
    <label><input type="radio" name="dificultad" value="silla de ruedas"> Silla de ruedas</label>
    <label><input type="radio" name="dificultad" value="baston"> Bastón</label>
    <label><input type="radio" name="dificultad" value="andadera"> Andadera</label>
    <label><input type="radio" name="dificultad" value="otro"> Otro</label>
    <label><input type="radio" name="dificultad" value="ninguna" checked> Ninguna</label>
</div>

<button type="button" id="botonConfirmar">Confirmar asistencia</button>
    </div>
    <div class="row">
          <div class="col s12 m6 center-align">
            <a href="./cerrarSesion.php?nombreSesion=boleta">Cerrar Sesión</a>
          </div>

        </div>
      </div>
        </div>
  
    </main>
    
</body>
</html>
  <?php
}?>