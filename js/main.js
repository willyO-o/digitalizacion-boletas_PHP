$(function () {
    'use  strict';

    //console.log("asd");
    $("#form-login").on("submit",function (e) {
        e.preventDefault();
        let datos=$(this).serializeArray();
        $.ajax({
            type: "post",
            data: datos,
            url: "Controlador/ControladorUser.php",
            dataType: "json",
            success: function (data) {
                
                if (data.resp>0) {
                    Swal.fire("listo!","Bienvenido: "+ data.d.nombre+" "+ data.d.paterno,"success");
                    let acceso;
                    
                    switch (data.d.idRol) {
                        case '1':
                            acceso= "admin.php";
                            
                            break; 
                        case '2':
                            acceso= "admin.php?menu=tr";
                            break; 
                        case '3':
                            acceso= "admin.php?menu=rev";
                            break; 
                        case '4':
                            acceso= "admin.php?menu=img";
                            break; 

                        default:
                            acceso="index.php";
                            break;
                    }
                     setInterval(() => {
                         window.location= acceso;
                     }, 2500);
                    
                } else {
                    Swal.fire("Error","email o password incorrectos!!","error");
                }
            }
        })
        
    })
})