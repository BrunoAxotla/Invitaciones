
<?php
include("./configBD.php");

    session_start();
    $acompanante = $_REQUEST['acompanante'];
    $dificultad = $_REQUEST['dificultad'];

   
    $curp = $_SESSION["curp"];

    $stmt = "UPDATE distinciones2 SET Invitado = '$acompanante' , Complemento = '$dificultad' WHERE CURP = '$curp'";
    mysqli_query($conexion, $stmt);
?>