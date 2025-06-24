function redirigirAConfirmacion2() {
     // Obtener los datos de la URL
    var nombre = "<?php echo $nombre; ?>";
    var presea = "<?php echo $presea; ?>";

    // Construir la URL con los parámetros
    var url = "confirmacion2.php?nombre=" + nombre + "&presea=" + presea;

    // Redirigir a confirmacion2.php
    window.location.href = url;
}
