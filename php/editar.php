<?php
  include("./dinamic.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Alumno</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="./../libs/materialize/css/materialize.min.css" rel="stylesheet">
  <link href="./../css/flex.css" rel="stylesheet">
  <script src="./../libs/jquery-3.7.1.min.js"></script>
  <script src="./../libs/materialize/js/materialize.min.js"></script>
  <script src="./../libs/justValidate_min.js"></script>
  <script src="./../libs/sweetAlert_min.js"></script>
  <script src="./../js/editar.js"></script> 
</head>
<body>
  <header>
    <img src="./../imgs/header.jpg" class="responsive-img">
  </header>
  <main class="valign-wrapper">
    <div class="container">
      <div class="row">
        <h3>Editar Galardonado</h3>
      </div>
      <form id="formEditar" autocomplete="off">
        <div class="row">
          <div class="col s12 m6 input-field">
            <label for="curp">CURP</label>
            <input type="text" id="curp" name="curp" readonly>
          </div>
          <div class="col s12 m6 input-field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre">
          </div>
        </div>

        <div class="row">
          <div class="col s12 input-field">
            <select id="escuela" name="escuela">
              <?php foreach($escuelas as $escuela): ?>
              <option value="<?php echo htmlspecialchars($escuela['DEPENDENCIA']); ?>">
                <?php echo htmlspecialchars($escuela['DEPENDENCIA']); ?>
              </option>
            <?php endforeach; ?>
             </select>
            <label for="escuela">Escuela</label>
          </div>
        </div>

        <div class="row">
          <div class="col s12 input-field">
            <select id="presea" name="presea">
              <?php foreach($preseas as $presea): ?>
              <option value="<?php echo htmlspecialchars($presea['DISTINCIÓN']); ?>">
                <?php echo htmlspecialchars($presea['DISTINCIÓN']); ?>
              </option>
            <?php endforeach; ?>
            </select>
            <label for="presea">Presea</label>
          </div>
        </div>

<!-- Preregistro -->
<div class="row">
  <div class="col s12 input-field">
    <select id="preregistro" name="preregistro">
      <option value="SI">Sí</option>
      <option value="NO">No</option>
    </select>
    <label for="preregistro">Preregistro</label>
  </div>
</div>

<!-- Invitados -->
<div class="row">
  <div class="col s12 input-field">
    <select id="invitados" name="invitados">
      <option value="SI">Sí</option>
      <option value="NO">No</option>
    </select>
    <label for="invitados">Invitados</label>
  </div>
</div>

        <div class="row">
  <div class="col s12 input-field">
    <select id="complemento" name="complemento">
      <option value="Ninguna" selected>Ninguna</option>
      <option value="baston">Bastón</option>
      <option value="silla de ruedas">Silla de ruedas</option>
      <option value="andadera">Andadera</option>
      <option value="otro">Otro</option>
    </select>
    <label for="complemento">Complemento</label>
  </div>
</div>

      <div class="row">
        <div class="col s12 m6 input-field">
          <a href="./admin.php" class="btn orange" style="width:100%;">Cancelar</a>
        </div>
        <div class="col s12 m6 input-field">
          <button type="submit" class="btn blue" style="width:100%;">Editar</button>
        </div>
      </div>
      </form>
    </div> 

  </main>
  <footer class="page-footer blue">
    <div class="footer-copyright">
      <div class="container">
      © 2023 Copyright DAW-4CV3
      <a class="grey-text text-lighten-4 right" href="https://escom.ipn.mx">escom.ipn.mx</a>
      </div>
    </div>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
   </script>
</body>
</html>