$(document).ready(()=>{
    $(".editar").on("click", function(){
      console.log("entro");
      let curp = $(this).attr("data-curp");
      sessionStorage.setItem("curp", curp);
      window.location.href = "./../php/editar.php";
    });
  
    /*Funcionando*/ 
    $(".eliminar").on("click", function(){
      let curp = $(this).attr("data-curp");
      let name =$(this).attr("data-name");
      Swal.fire({
        title: "ELIMINAR",
        text:"¿Eliminar a galardonado "+ name + "?",
        showDenyButton: true,
        denyButtonText: "No",
        confirmButtonText: "Sí",
      }).then((res) => {
        if(res.isConfirmed){
          $.ajax({
            url:"./eliminar_AX.php",
            method:"post",
            data: {CURP: curp, NOMBRE: name},
            cache:false,
            success:(respAX)=>{
              let objRespAX = JSON.parse(respAX);
              Swal.fire({
                title:"Eliminar",
                text:objRespAX.msj,
                icon:objRespAX.icono,
                didDestroy:()=>{
                  if(objRespAX.cod == 1){
                    window.location.reload();
                  }
                }
              });
            }
          });
        }else if(res.isDenied){
          console.log("Noooo");
        }
      });
    });
  });