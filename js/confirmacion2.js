function validarAsistencia() {
    var acompananteSi = document.getElementById("acompananteSi").checked;
    var acompananteNo = document.getElementById("acompananteNo").checked;
    var dificultadSeleccionada = document.querySelector('input[name="dificultad"]:checked');

    if ((acompananteSi || acompananteNo) && dificultadSeleccionada) {
        var nombre = "<?php echo $nombre; ?>";
        var presea = "<?php echo $presea; ?>";
        var acompanante = acompananteSi ? "si" : "no";
        var dificultad = dificultadSeleccionada.value;

        // Enviar datos al servidor mediante AJAX
        $.ajax({
            type: "POST",  // Puedes cambiar a "GET" si prefieres
            url: "actualizarBaseDeDatos.php",  // Ruta del archivo PHP que manejará la actualización
            data: {
                nombre: nombre,
                presea: presea,
                acompanante: acompanante,
                dificultad: dificultad
            },
            success: function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Manejar errores si es necesario
                console.error(error);
            }
        });
    } else {
        alert("Por favor, selecciona ambas opciones antes de confirmar la asistencia.");
    }
}

