function generarYMostrarPDF() {
    // Crear un nuevo objeto jsPDF
    var pdf = new jsPDF();

    // Agregar contenido al PDF
    pdf.text(20, 30, 'Nombre del galardonado: <?php echo $nombre; ?>');
    pdf.text(20, 40, 'ID: [ID del galardonado]'); // Reemplaza [ID del galardonado] con el valor correspondiente
    pdf.text(20, 50, 'Galardon: <?php echo $presea; ?>');
    pdf.text(20, 60, 'Fecha y hora: [Fecha y hora]'); // Reemplaza [Fecha y hora] con el valor correspondiente
    pdf.text(20, 70, 'Lugar: [Lugar]'); // Reemplaza [Lugar] con el valor correspondiente

    // Si hay un acompañante, agregar otra página para el invitado
    if ('<?php echo $acompanante; ?>' === 'si') {
        pdf.addPage();
        pdf.text(20, 30, 'Invitado de <?php echo $nombre; ?> con ID: [ID del invitado]'); // Reemplaza [ID del invitado] con el valor correspondiente
        pdf.text(20, 40, 'Fecha y hora: [Fecha y hora]'); // Reemplaza [Fecha y hora] con el valor correspondiente
        pdf.text(20, 50, 'Lugar: [Lugar]'); // Reemplaza [Lugar] con el valor correspondiente
    }

    // Mostrar el PDF en el navegador
    pdf.output('dataurlnewwindow');
}