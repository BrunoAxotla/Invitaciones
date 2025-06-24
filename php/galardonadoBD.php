<?php
  $curp = $_SESSION["curp"];
  $sqlGetGalardonado = "SELECT * FROM distinciones2 WHERE CURP = '$curp'";
  $resGetGalardonado = mysqli_query($conexion, $sqlGetGalardonado);
  $infGetGalardonado = mysqli_fetch_row($resGetGalardonado);
?>