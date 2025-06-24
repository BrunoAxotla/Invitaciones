<?php
  include("./configBD.php");

  $curp = $_REQUEST["CURP"];

  $sqlGetGalardonado = "SELECT * FROM distinciones2 WHERE CURP = '$curp'";
  $resGetGalardonado = mysqli_query($conexion, $sqlGetGalardonado);
  $infGetGalardonado = mysqli_fetch_assoc($resGetGalardonado);

  echo json_encode($infGetGalardonado);
  
?>