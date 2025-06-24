<?php 

    include('./configBD.php');

    /*Consulta para obtener preseas */

    $sqlPreseas = "SELECT DISTINCT DISTINCIÓN FROM distinciones2 ORDER BY DISTINCIÓN";

    $resultPreseas = mysqli_query($conexion,$sqlPreseas);

    $preseas = mysqli_fetch_all($resultPreseas,MYSQLI_ASSOC);

    /*Obtencion de escuelas*/
     
    $sqlEscuelas = "SELECT DISTINCT DEPENDENCIA FROM distinciones2 ORDER BY DEPENDENCIA";
    $resultEscuelas = mysqli_query($conexion, $sqlEscuelas);
    $escuelas = mysqli_fetch_all($resultEscuelas, MYSQLI_ASSOC);


?>



