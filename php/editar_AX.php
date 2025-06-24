<?php
  include("./configBD.php");

//   echo '<pre>'; // Esto hace que la salida sea más legible
// print_r($_REQUEST);
// echo '</pre>';

  $curp = $_REQUEST["curp"];
  $nombre = $_REQUEST["nombre"];
  $escuela = $_REQUEST["escuela"];
  $presea = $_REQUEST["presea"];
  $prereg = $_REQUEST["preregistro"];
  $invitado  = $_REQUEST["invitados"];
  $complemento = $_REQUEST["complemento"];



  $respAX = [];
  $sqlUpdGalardonado = "UPDATE distinciones2 SET 
    NOMBRE = '$nombre', 
    DISTINCIÓN = '$presea',  
    DEPENDENCIA  = '$escuela', 
    Preregistro = '$prereg', 
    Invitado ='$invitado', 
    Complemento = '$complemento' 
    WHERE CURP = '$curp'";
    
  $resUpdGalardonado = mysqli_query($conexion, $sqlUpdGalardonado);
  
  if(mysqli_affected_rows($conexion) == 1){
    $respAX["cod"] = 1;
    $respAX["msj"] = "Los datos del galardonado se actualizaron correctamente.";
    $respAX["icono"] = "success";
  }else{
    $respAX["cod"] = 0;
    $respAX["msj"] = "Error. Favor de intentarlo nuevamente.";
    $respAX["icono"] = "error";
  }

  echo json_encode($respAX);
?>