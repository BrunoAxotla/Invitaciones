<?php
  include("./configBD.php");

  /*Seleccionamos todo de distinciones*/ 
  $sqlGetGalardonados = "SELECT * FROM distinciones2"; 
  $resGetGalardonados = mysqli_query($conexion, $sqlGetGalardonados);
  /*Inicializamos el cuerpo de la tabla vacio, para que lo haga dinamicamente*/ 
  $trsGalardonados = "";
  /*Iteracion sobre cada fila de la base de datos*/
  while($filas = mysqli_fetch_row($resGetGalardonados)){
    $trsGalardonados .= "
      <tr><td>$filas[0]</td><td>$filas[1]</td><td>$filas[3]</td><td>$filas[2]</td><td>$filas[6]</td><td>$filas[7]</td><td>$filas[8]</td><td><i class='fa-solid fa-pen-to-square editar' data-curp='$filas[5]' data-name = '$filas[1]'></i>&nbsp;&nbsp;<i class='fa-solid fa-trash eliminar' data-curp='$filas[5]' data-name = '$filas[1]'></i></td></tr>
    ";
  }
?>