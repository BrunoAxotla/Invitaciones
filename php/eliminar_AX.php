<?php
  include("./configBD.php");


  $curp = $_REQUEST["CURP"];
  $nombre = $_REQUEST["NOMBRE"];
  
  $respAX = [];

  $sqlgalardonado = "DELETE FROM distinciones2 WHERE CURP = '$curp'";
  $resgalardonado = mysqli_query($conexion, $sqlgalardonado);
  if(mysqli_affected_rows($conexion) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "Se elimino el galardonado $nombre correctamente.";
    $respAX["icono"] = "success";
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente";
    $respAX["icono"] = "error";
  }

  echo json_encode($respAX);
?>