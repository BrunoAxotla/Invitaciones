$(document).ready(()=>{
    const validarCrearCuenta = new JustValidate("#formCrear",{
      tooltip: {
        position: "bottom"
      }
    });
    validarCrearCuenta.addField("#curp",[
        {
          rule: "required",
          errorMessage: "Falta tu CURP"
        },
        {
          rule: "customRegexp",
          value: /^[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[0-9]{2}$/,
          errorMessage: "Formato de CURP inválido. Debe tener el formato: 4 letras, 6 dígitos, 1 letra (H/M), 5 letras, 2 dígitos. Todo en mayúsculas."
        },
        {
          rule: "maxLength",
          value: 18,
          errorMessage: "La CURP debe tener exactamente 18 caracteres"
        },
        {
          rule: "minLength",
          value: 18,
          errorMessage: "La CURP debe tener exactamente 18 caracteres"
        }
      ])
      .addField("#nombre", [
        {
          rule: "required",
          errorMessage: "Falta tu nombre."
        },
        {
          rule: "customRegexp",
          value: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/,
          errorMessage: "El nombre solo se compone de letras"
        }
      ])
    .onSuccess((evt)=>{
      evt.preventDefault();
      $.ajax({
        url:"./../php/crearCuenta_AX.php",
        method:"post",
        data:$("#formCrear").serialize(),
        cache:false,
        success:(respAX)=>{
          let objRespAX = JSON.parse(respAX);
          Swal.fire({
            title:"TDAW - 2024/1",
            text:objRespAX.msj,
            icon:objRespAX.icono,
            footer:objRespAX.log,
            didDestroy:()=>{
              if(objRespAX.cod == 1){
                window.location.href = "./../php/admin.php";
              }
            }
          });
        }
      });
    })
  });