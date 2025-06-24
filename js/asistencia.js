
$(document).ready(function(){
    $("#botonAsistir").click(function(){
        $.ajax({
            type: "POST",
            url: "confirmarAsistencia.php",
            data: { asistir: 'true' },
            success: function(response){
                alert(response);
                window.location.href = "./../php/galardonadoConfirmado.php";
            }
        });
    });
});

