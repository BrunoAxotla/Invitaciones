<?php
session_start(); // Iniciamos la sesión
include("./configBD.php");
date_default_timezone_set("America/Mexico_City");

$respAX = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curp = $_POST["curp"];
    
    $sqlGetAlumno = "SELECT * FROM distinciones2 WHERE CURP = '$curp' ";
    $resGetAlumno = mysqli_query($conexion, $sqlGetAlumno);
    
    if (mysqli_num_rows($resGetAlumno) == 1) {
        $_SESSION["curp"] = $curp;
        $infGetAlumno = mysqli_fetch_row($resGetAlumno);
        $respAX["cod"] = 1;
        $respAX["msj"] = "Bienvenido :) $infGetAlumno[1]";
        $respAX["icono"] = "success";
        $respAX["log"] = date("d-m-Y H:i");
    } else {
        $respAX["cod"] = 0;
        $respAX["msj"] = "Error. CURP incorrecto. Favor de intentarlo nuevamente";
        $respAX["icono"] = "error"; // Corrigiendo el ícono de error
        $respAX["log"] = date("d-m-Y H:i");
    }

    echo json_encode($respAX);
} else {
    http_response_code(405);
    echo json_encode(["msj" => "Método no permitido"]);
}
?>
