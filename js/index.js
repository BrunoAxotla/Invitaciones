$(document).ready(() => {
  const validarFormLogin = new JustValidate("#formLogin", {
      tooltip: {
          position: "bottom"
      }
  });

  validarFormLogin
      .addField("#curp", [
          {
              rule: "required",
              errorMessage: "Falta tu CURP"
          },
        //   {
        //       rule: "customRegexp",
        //       value: /^[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[0-9]{2}$/,
        //       errorMessage: "Formato de CURP inválido. Debe tener el formato: 4 letras, 6 dígitos, 1 letra (H/M), 5 letras, 2 dígitos. Todo en mayúsculas."
        //   },
        //   {
        //       rule: "maxLength",
        //       value: 18,
        //       errorMessage: "La CURP debe tener exactamente 18 caracteres"
        //   },
        //   {
        //       rule: "minLength",
        //       value: 18,
        //       errorMessage: "La CURP debe tener exactamente 18 caracteres"
        //   }
      ])
      .onSuccess((evt) => {
          evt.preventDefault();
          $.ajax({
              url: "./php/index_AX.php",  // Asegúrate de que esta URL es correcta
              method: "POST",
              data: $("#formLogin").serialize(),
              cache: false,
              success: (respAX) => {
                  let objRespAX = JSON.parse(respAX);
                  Swal.fire({
                      title: "Distinciones",
                      text: objRespAX.msj,
                      icon: objRespAX.icono,
                      footer: objRespAX.log,
                      didDestroy: () => {
                          if (objRespAX.cod == 1) {
                              window.location.href = "./../php/galardonado.php";
                          } else {
                              window.location.reload();
                          }
                      }
                  });
              },
              error: (xhr, status, error) => {
                  console.error("Error en la solicitud:", status, error);
                  Swal.fire({
                      title: "Error",
                      text: "Hubo un problema con la solicitud. Intenta nuevamente.",
                      icon: "error"
                  });
              }
          });
      });
});
