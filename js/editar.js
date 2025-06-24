$(document).ready(()=>{
    let curp = sessionStorage.getItem("curp");
    $.ajax({
      url:"./../php/editar_BD.php",
      method:"post",
      data:{CURP: curp},
      cache:false,
      success:(respAX)=>{
        console.log(respAX);
        let objRespAX = JSON.parse(respAX);
        console.log(objRespAX);
        $("#curp").val(objRespAX.CURP);
        $("#nombre").val(objRespAX.NOMBRE);
        $("#presea").val(objRespAX.DISTINCIÓN);
        $("#escuela").val(objRespAX.DEPENDENCIA);
        $("#preregistro").val(objRespAX.Preregistro);
        $("#invitados").val(objRespAX.Invitado);
        $("#complemento").val(objRespAX.Complemento);
        // Actualiza los elementos select
        M.FormSelect.init($("#escuela"));
        M.FormSelect.init($("#presea"));
        M.FormSelect.init($("#complemento"));
        M.FormSelect.init($("#preregistro"));
        M.FormSelect.init($("#invitados"));
        M.updateTextFields();
        
      }
    });
  
    const validarEditar = new window.JustValidate("#formEditar");
    validarEditar
    .addField("#curp",[
      {rule:"required", errorMessage:"Falta la CURP"}
    ])
    .addField("#nombre",[
      {rule:"required", errorMessage:"Falta el nombre"}
    ])
    .addField("#escuela",[
      {rule:"required", errorMessage:"Falta la escuela"}
    ])
    .onSuccess((evt)=>{
      evt.preventDefault();
      $.ajax({
        url:"./../php/editar_AX.php",
        method:"post",
        data:$("#formEditar").serialize(),
        cache:false,
        success:(respAX)=>{
          let objRespAX = JSON.parse(respAX);
          Swal.fire({
            title:"TDAW / 2024-1",
            text:objRespAX.msj,
            icon:objRespAX.icono,
            didDestroy:()=>{
              if(objRespAX.cod == 1){
                sessionStorage.removeItem("curp");
                window.location.href = "./../php/admin.php";
              }
            }
          });
        }
      });
    });
  });