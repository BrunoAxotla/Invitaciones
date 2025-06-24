$(document).ready(function(){
    $("#botonConfirmar").click(function(){
        var acompanante = $("input[name='acompanante']:checked").val();
        var dificultad = $("input[name='dificultad']:checked").val();

        $.ajax({
            type: "POST",
            url: "./invitadoComplemento.php",
            data: { acompanante: acompanante, dificultad: dificultad },
            success: function(response){
                // Manejar la respuesta del servidor
                window.location.href = "./../php/PDF.php";
            },
            error: function(){
                alert("Error en la solicitud AJAX");
            }
        });
    });
});