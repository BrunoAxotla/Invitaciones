<?php
  include("./adminBD.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="./../libs/materialize/css/materialize.min.css" rel="stylesheet">
  <link href="./../css/flex.css" rel="stylesheet">
  <link href="./../css/btn.css" rel="stylesheet">
  <script src="./../libs/jquery-3.7.1.min.js"></script>
  <script src="./../libs/materialize/js/materialize.min.js"></script>
  <script src="./../libs/sweetAlert_min.js"></script>
  <script src="./../js/admin.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  



  <script>
document.addEventListener('DOMContentLoaded', function() {
  // Inicializa los elementos de Materialize
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);

  var searchBar = document.getElementById('searchBar');
  var filtroDropdown = document.getElementById('filtroPreregistro');

  function filtrarTabla() {
    var filtroDropdownValor = filtroDropdown.value.toLowerCase();
    var filtroSearchBar = searchBar.value.toLowerCase();
    var rows = document.querySelectorAll('#trsGalardonados tr');

    rows.forEach(function(row) {
      var preregistro = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
      var unidadAcademica = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
      
      var coincidePreregistro = filtroDropdownValor === 'todos' || preregistro === filtroDropdownValor;
      var coincideUnidadAcademica = unidadAcademica.indexOf(filtroSearchBar) !== -1;

      if (coincidePreregistro && coincideUnidadAcademica) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  searchBar.addEventListener('keyup', filtrarTabla);
  filtroDropdown.addEventListener('change', filtrarTabla);
});
</script>

  <style>
    .editar, .eliminar{
      cursor:pointer;}

      h2{
        text-align: center;
        font-family: 'Calibri', serif;
      }
    
  </style>
</head>
<body>
  <header>
    <img src="./../imgs/header.jpg" class="responsive-img">
  </header>
  <main class="valign-wrapper">
    <div class="container">
      <div class="row">
        <h2>Galardonados</h2>
      </div>
      <div class="row">
  <a href="crear.php" class="btn redondeado" >+ Agregar Nuevo Galardonado </a>
</div>

<div class="row">
  <div class="input-field col s12">
    <select id="filtroPreregistro">
      <option value="" disabled selected>Selecciona el estado de preregistro</option>
      <option value="Todos">Todos</option>
      <option value="SI">Sí</option>
      <option value="NO">No</option>
    </select>
    <label>Filtrar por Preregistro</label>
  </div>
</div>
<div class="row">
  <input type="text" id="searchBar" placeholder="Buscar..." style="margin-bottom: 20px; width: 100%; padding: 10px;">
</div>
      <div class="row">
        <table class="centered striped responsive-table">
          <thead>
            <tr><th>ID</th><th>Nombre</th><th>Distincion</th><th>Escuela</th><th>Preregistro</th><th>Invitado</th><th>Complemento</th><th>Accion</th></tr>
          </thead>
          <tbody id="trsGalardonados">
            <?php echo $trsGalardonados; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <footer class="page-footer red">
    <div class="footer-copyright">
      <div class="container">
      © 2023 Copyright 
      <a class="grey-text text-lighten-4 right" href="https://escom.ipn.mx">escom.ipn.mx</a>
      </div>
    </div>
  </footer>
  
</body>
</html>