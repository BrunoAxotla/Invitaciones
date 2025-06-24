<?php
include("./configBD.php");

date_default_timezone_set("America/Mexico_City");

$curp = $_REQUEST["curp"];
$nombre = $_REQUEST["nombre"];
$escuela = $_REQUEST["escuela"];
$presea = $_REQUEST["presea"];
$prereg = $_REQUEST["preregistro"];
$invitado = $_REQUEST["invitados"];
$complemento = $_REQUEST["complemento"];
$respAX = [];

//Revisar si el número de boleta ya está registrado
$sqlGetCurp = "SELECT * FROM distinciones2 WHERE CURP = '$curp'";
$resGetCurp = mysqli_query($conexion, $sqlGetCurp);
if (mysqli_num_rows($resGetCurp) == 1) {
    $respAX["cod"] = 2;
    $respAX["msj"] = "Error. Ese CURP ya está registrado. Favor de intentarlo nuevamente.";
    $respAX["icono"] = "error";
    $respAX["log"] = date("d-m-Y H:i");
} else {

    $sqlGetLastNumber = "SELECT Numero FROM distinciones2 ORDER BY Numero DESC LIMIT 1";
    $resGetLastNumber = mysqli_query($conexion, $sqlGetLastNumber);

    if ($resGetLastNumber && mysqli_num_rows($resGetLastNumber) > 0) {
        $row = mysqli_fetch_assoc($resGetLastNumber);
        $lastNumber = $row['Numero'];
    } else {
        $lastNumber = 0; // Si no hay registros, comenzamos desde 0
    }

    $newNumber = $lastNumber + 1;



    $sqlInsert = "INSERT INTO distinciones2 (Numero, CURP, NOMBRE, DEPENDENCIA, DISTINCIÓN, Preregistro, Invitado, Complemento) VALUES ('$newNumber', '$curp', '$nombre', '$escuela', '$presea', '$prereg', '$invitado', '$complemento')";
    $resInsert = mysqli_query($conexion, $sqlInsert);
    // Continúa con la lógica para verificar si la inserción fue exitosa

    if (mysqli_affected_rows($conexion) == 1) {
        $respAX["cod"] = 1;
        $respAX["msj"] = "Se añadio correctamente al Galardonado";
        $respAX["icono"] = "success";
        $respAX["log"] = date("d-m-Y H:i");
    } else {
        $respAX["cod"] = 0;
        $resp["msj"] = "Error. Favor de intentarlo nuevamente";
        $respAX["icono"] = "error";
        $respAX["fecha"] = date("d-m-Y H:i");
    }
}

echo json_encode($respAX);
?>