// archivo: confirmarAsistencia.php
<?php

include("./configBD.php");
session_start();
    $curp = $_SESSION["curp"];
   
    $sql = "UPDATE distinciones2 SET Preregistro = 'SI' WHERE CURP = '$curp'";
    mysqli_query($conexion, $sql);
    
?>
