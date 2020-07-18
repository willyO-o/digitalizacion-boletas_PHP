$(function () {
    "user strict";
    //console.log("conectado");



    var menu = getParameterByName('menu');

    switch (menu) {
        case 'home':
            graficas();
            break;
        case 'img':

            break;
        case 'tr':
            botonesImg("accion=img&est=0");
            break;
        case 'us':
            listarRol();
            listarUser();
            break;
        case 'lis':
            listarConsolidado();
            listarTranscrito();
            listarSinTranscribir();
            break;
        case 'rev':
            botonesImg("accion=img&est=1");
            break;
        default:
            graficas();
            break;
    }


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    // <oom para la imagen al trnascribir
    //$('.zoom').zoom();
    // tamaño de altura del formulario d transcribir
    var height = $(window).height();
    $('#card-registrar').height(height * 0.8);


    $("#form-img #exampleInputFile").change(function () { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.

        readURL(this);

        validarImg();
    });

    //controladr nombre de archivo
    $("#form-img #exampleInputFile").change(function () {
        $("#alerta-Nomimg").addClass("hidden");
        let nom = document.querySelector('#form-img #exampleInputFile').files[0].name;
        //console.log(nom);

        let datos = { accion: "nombImg", nom: nom };
        $.ajax({
            type: "post",
            url: "Controlador/ControladorImg.php",
            dataType: "json",
            data: datos,
            success: function (data) {
                //console.log(data);
                if (data.resp == 1) {
                    $("#alerta-Nomimg").removeClass("hidden");
                } else {
                    $("#alerta-Nomimg").addClass("hidden");
                }
            }
        })
    })

    //comprobar numero de archivo
    $("#nroImg").change(function () {
        let nro = $("#nroImg").val();
        //console.log(nro);
        let datos = { accion: "nro", nro: nro };
        $.ajax({
            type: "post",
            url: "Controlador/ControladorImg.php",
            dataType: "json",
            data: datos,
            success: function (data) {
                //console.log(data);
                if (data.resp > 0) {
                    $("#alerta-nro").removeClass("hidden");
                } else {
                    $("#alerta-nro").addClass("hidden");
                }
            }
        })
    })



    //validar campo input de imagen extensiones
    function validarImg() {
        let archivo = $("#form-img #exampleInputFile").val();
        var ext = archivo.substring(archivo.lastIndexOf(".")).toLowerCase();

        if (ext != ".jpg" && ext != ".png" && ext != ".jpeg" && ext.length > 0) {
            $("#form-img button").attr("disabled", "disabled");
            $("#form-img #exampleInputFile").addClass("is-invalid");

            $("#alerta-img").removeClass("hidden");

            console.log(ext);
        } else {
            $("#form-img #exampleInputFile").removeClass("is-invalid");
            $("#alerta-img").addClass("hidden");
            $("#form-img button").removeAttr("disabled");
        }
    }

    //funcion para vista previa de img
    function readURL(input) {
        if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
            var reader = new FileReader(); //Leemos el contenido

            reader.onload = function (e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
                $('#img-muestra').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            $('#img-muestra').attr('src', "");
        }
    }


    $("#form-img").on("submit", function (e) {
        e.preventDefault();

        let datos = new FormData(document.getElementById("form-img"));
        $.ajax({
            type: "post",
            data: datos,
            url: "Controlador/ControladorImg.php",
            dataType: "json",
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function (data) {
                //console.log(data);
                if (data.resp == 1) {
                    Swal.fire(
                        'Listo !!',
                        'Registrado ',
                        'success'
                    );
                    $("#form-img")[0].reset();
                    $('#img-muestra').attr('src', "");
                } else {
                    Swal.fire(
                        'Error !!',
                        'Ocurrio un error durante el proceso ',
                        'error'
                    );
                }
            }

        });
    })


    //**************************************************registrar boletas ****************************/
    // eventos de los botones
    $("#form-boleta").on("submit", function (e) {
        e.preventDefault();
        let datos = $(this).serializeArray();

        $.ajax({
            type: "post",
            url: "Controlador/ControladorBoleta.php",
            data: datos,
            dataType: "json",
            success: function (data) {
                if (data.resp > 0) {
                    Swal.fire("listo!", "Boleta Registrada", "success");
                    $("#form-boleta")[0].reset();
                    var menu = getParameterByName('menu')
                    if (menu == "tr") {
                        botonesImg("accion=img&est=0");
                    } else {
                        botonesImg("accion=img&est=1");
                    }
                    if (data.tipo == 'con') {
                        $("#form-boleta input").attr("readonly", "readonly");
                    }

                } else {
                    Swal.fire("Error!", "Ocurrio un error durante el registro, intente de nuevo", "error");
                }
                //console.log(data);
            }
        })
    })

    $("#boleta-nroImg").change(function () {
        let nro = $("#boleta-nroImg").val();
        //console.log(nro);
        let datos = { accion: "nro", nro: nro };
        $.ajax({
            type: "post",
            url: "Controlador/ControladorBoleta.php",
            dataType: "json",
            data: datos,
            success: function (data) {
                //console.log(data);
                if (data.resp > 0) {
                    $("#alerta-nro").removeClass("hidden");
                } else {
                    $("#alerta-nro").addClass("hidden");
                }
            }
        })
    })

    $("#btn-next").on("click", function () {
        //console.log("clicl");
        let est = $(this).attr("est");
        let idim = $(this).attr("idimg");
        let datos = { idImg: idim, accion: "next", est: est };
        botonesImg(datos);

    })

    $("#btn-prev").on("click", function () {
        //console.log("clicl");
        let est = $(this).attr("est");
        let idim = $(this).attr("idimg");
        let datos = { idImg: idim, accion: "prev", est: est };
        botonesImg(datos);

    })

    $("#btn-editar-fm").on("click", function () {
        console.log("click");
        $("#form-boleta input").removeAttr("readonly");
    })

    function getBoleta(id) {
        $.ajax({
            type: "post",
            data: "accion=getRegi&id=" + id,
            url: "Controlador/ControladorBoleta.php",
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.resp > 0) {
                    $("#fo-nro").val(data.d.nro);
                    $("#fo-nom").val(data.d.nomCliente);
                    $("#fo-pat").val(data.d.patCliente);
                    $("#fo-mat").val(data.d.matCliente);
                    $("#fo-con").val(data.d.concepto);
                    $("#fo-mon").val(data.d.monto);
                    data.d.nroCuenta != 0 ? $("#fo-cue").val(data.d.nroCuenta) : $("#fo-cue").val("");
                    data.d.nacimiento != "0000-00-00" ? $("#fo-nac").val(data.d.nacimiento) : $("#fo-nac").val("");
                    $("#fo-ci").val(data.d.ci);
                    $("#fo-ban").val(data.d.banco);
                    $("#fo-fec").val(data.d.fecha);
                    $("#fo-des").val(data.d.destino);
                    $("#fo-age").val(data.d.agencia);
                    $("#fo-ope").val(data.d.operativo);
                    $("#fo-usu").val(data.d.user);

                }
            }
        })
    }


    function botonesImg(datos) {

        $.ajax({
            type: "post",
            url: "Controlador/ControladorBoleta.php",
            data: datos,
            dataType: "json",
            success: function (data) {
                //console.log(data);
                switch (data.resp) {
                    case 1:
                        //console.log("asdasd");

                        $("#btn-next").attr("idimg", data.idImg);
                        $("#btn-prev").attr("idimg", data.idImg);
                        $("#btn-next").attr("est", data.est);
                        $("#btn-prev").attr("est", data.est);

                        $('.zoom').trigger('zoom.destroy');
                        $('.zoom').html('<img src="files/' + data.ruta + '" class="card-img-top" alt="sin imagen" style="width: 100%;" >');
                        $('.zoom').zoom(); // add zoom
                        $("#id-form-img").attr("value", data.idImg);

                        if (data.est > 0) {
                            getBoleta(data.idImg);
                        }
                        break;
                    case 0:
                        //boton.attr("disabled","disabled");
                        break;

                    default:
                        break;
                }
            }
        })
    }


    // ****************************listados de boletas********************************

    //ver detalles de boletas evento boton ver
    $('#tab-registrado').on("click", ".btn-ver", function () {
        let id = $(this).attr("idb");
        $("#ver-contenido").load("Detalle/detalleRegistrado.php?id=" + id);

    })

    $('#tab-consolidado').on("click", ".btn-ver", function () {
        let id = $(this).attr("idb");
        $("#ver-contenido").load("Detalle/detalleConsolidado.php?id=" + id);

    })
    $('#tab-sin-registrar').on("click", ".btn-ver", function () {
        let id = $(this).attr("idb");
        $("#ver-contenido").load("Detalle/detalleSinRegistrar.php?id=" + id);

    })
    // $("#ver-contenido ").on("click",".zoom",function () {
    //     $(this).zoom();
    //     console.log("click");
    // });


    function listarConsolidado() {
        let datos = { accion: "listarCon" };
        let tabla = $('#tab-consolidado').DataTable({
            destroy: true,
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',

            ajax: {
                url: "Controlador/ControladorBoleta.php",
                method: "POST",
                data: datos
            },
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    className: 'btn btn-success',
                    text: "Excel",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data export',
                    className: 'btn btn-secondary',
                    text: "Csv",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export',
                    className: 'btn btn-danger',
                    text: "Pdf",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data export',
                    className: 'btn btn-primary',
                    text: "Imprimir",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                }
            ],
            columns: [
                {
                    data: "img",
                    render: function (data) {
                        return "<img src='files/" + data + "' width='300' height='150'>";
                    }
                },
                { data: "nro" },
                { data: "concepto" },
                { data: "nomCliente" },
                { data: "patCliente" },
                {
                    render: function (data, type, row) {
                        return row.nombre + " " + row.paterno;
                    }
                },
                {
                    data: "idBol",
                    render: function (data) {
                        return "<button class='btn btn-info btn-ver' idb='" + data + "' data-toggle='modal' data-target='#modal-ver'><i class='fas fa-eye'></i> Detalles</button>";
                    }
                }

            ],
            language: espaniol
        });
    }


    function listarTranscrito() {
        let datos = { accion: "listarTra" };
        let tabla = $('#tab-registrado').DataTable({
            destroy: true,
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',

            ajax: {
                url: "Controlador/ControladorBoleta.php",
                method: "POST",
                data: datos
            },
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    className: 'btn btn-success',
                    text: "Excel",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data export',
                    className: 'btn btn-secondary',
                    text: "Csv",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export',
                    className: 'btn btn-danger',
                    text: "Pdf",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data export',
                    className: 'btn btn-primary',
                    text: "Imprimir",
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5]
                    }
                }
            ],
            columns: [
                {
                    data: "img",
                    render: function (data) {
                        return "<img src='files/" + data + "' width='300' height='150'>";
                    }
                },
                { data: "nro" },
                { data: "concepto" },
                { data: "nomCliente" },
                { data: "patCliente" },
                {
                    render: function (data, type, row) {
                        return row.nombre + " " + row.paterno;
                    }
                },
                {
                    data: "idBol",
                    render: function (data) {
                        return "<button class='btn btn-info btn-ver' idb='" + data + "' data-toggle='modal' data-target='#modal-ver'><i class='fas fa-eye'></i> Detalles</button>";
                    }
                }

            ],
            language: espaniol
        });
    }


    function listarSinTranscribir() {
        let datos = { accion: "listarSin" };
        let tabla = $('#tab-sin-registrar').DataTable({
            destroy: true,
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',

            ajax: {
                url: "Controlador/ControladorBoleta.php",
                method: "POST",
                data: datos
            },
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    className: 'btn btn-success',
                    text: "Excel",
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data export',
                    className: 'btn btn-secondary',
                    text: "Csv",
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export',
                    className: 'btn btn-danger',
                    text: "Pdf",
                    exportOptions: {
                        columns: [1, 2]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data export',
                    className: 'btn btn-primary',
                    text: "Imprimir",
                    exportOptions: {
                        columns: [1, 2]
                    }
                }
            ],
            columns: [
                {
                    data: "img",
                    render: function (data) {
                        return "<img src='files/" + data + "' width='300' height='150'>";
                    }
                },
                { data: "nroImg" },
                {
                    data: "estado",
                    render: function (data) {
                        if (data == 0) {
                            return "Sin Transcribir";
                        } else {
                            return "-"
                        }

                    }
                },

                {
                    data: "idImg",
                    render: function (data) {
                        return "<button class='btn btn-info btn-ver' idb='" + data + "' data-toggle='modal' data-target='#modal-ver'><i class='fas fa-eye'></i> Detalles</button>";
                    }
                }

            ],
            language: espaniol
        });
    }


    //************************************ */ operaciones de usuarios

    $("#tab-user").on("click", ".btn-edit", function (e) {
        let id = $(this).attr("idp");
        let datos = { id: id, accion: "getUser" };
        //console.log(id);
        $.ajax({
            url: "Controlador/ControladorUser.php",
            type: "post",
            data: datos,
            dataType: "json",
            success: function (data) {
                //console.log(data);
                if (data.resp > 0) {

                    $('#form-add-user input:radio[name=est]').removeAttr('checked');
                    $("#form-add-user option").removeAttr("selected");
                    $("#fm-nom").val(data.d.nombre);
                    $("#fm-pat").val(data.d.paterno);
                    $("#fm-mat").val(data.d.materno);
                    $("#form-add-user input:radio[value=" + data.d.estado + "]").attr("checked", true);
                    $("#form-add-user option[value=" + data.d.idRol + "]").attr("selected", true);
                    $("#fm-ema").val(data.d.email);
                    $("#fm-ema").attr("readonly", "readonly");
                    $("#fm-accion").attr("value", "update");

                    $("#fm-id").attr("value", data.d.idUs);

                }
            }
        });
    });

    $("#btn-agreUs").on("click", function () {
        $("#form-add-user")[0].reset();
        $('#form-add-user input:radio[name=est]').removeAttr('checked');
        $("#form-add-user option").removeAttr("selected");
        $("#form-add-user input:radio[value=1]").attr("checked", true);
        $("#form-add-user option[value=0]").attr("selected", true);
        $("#fm-accion").attr("value", "add");
        $("#fm-id").attr("value", "");
        $("#fm-ema").removeAttr("readonly");
    })

    //evento boton eliminar
    $("#tab-user").on("click", ".btn-delet", function () {
        let id = $(this).attr("idu");
        let datos = { id: id, accion: "delete" };
        let url = "Controlador/ControladorUser.php";
        eliminar(datos, url, listarUser);
    });

    $("#tab-user").on("click", ".btn-estado", function () {
        let id = $(this).parents().parents("tr").find(" td .btn-edit").attr("idp");
        let est = $(this).attr("est");
        let datos = { id: id, est: est, accion: "upEstado" };

        Swal.fire({
            title: 'Esta usted Seguro?',
            text: "Desea Cambiar el Estado del Usuario?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Modificar!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "post",
                    url: "Controlador/ControladorUser.php",
                    dataType: "json",
                    data: datos,
                    success: function (data) {
                        //console.log(data);
                        if (data.resp > 0) {
                            listarUser();
                        }
                    }
                })


            }
        });


    });


    function listarRol() {

        $.ajax({

            type: "POST",
            data: "accion=listarRol",
            url: "Controlador/ControladorUser.php",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data, function (i, item) {

                    $('#roles').append($('<option />', {
                        text: item.rol,
                        value: item.idRol
                    }));
                });

            }
        });
    }

    $("#form-add-user").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
        let datos = form.serializeArray();
        formularios(datos, form, listarUser);
    })


    function formularios(datos, form, funcion) {

        Swal.fire({
            title: 'Espere Por favor !',
            html: ' Registrando datos', // add html attribute if you want or remove
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            data: datos,
            dataType: "json",
            success: function (data) {
                //console.log(data);
                swal.close();
                switch (data.resp) {
                    case 1:
                        Swal.fire('Listo !!', 'Datos Registrados', 'success');
                        form[0].reset();
                        funcion();
                        break;
                    case 2:
                        Swal.fire('Error !!', 'El email ingresado ya existe', 'error');
                        break;
                    case 0:
                        Swal.fire('Error !!', 'Ocurrio un error al registrar, intente de nuevo', 'error');
                        break;

                    default:
                        break;
                }

            }
        });
    }



    function listarUser() {
        let datos = { accion: "listar" };
        let tabla = $('#tab-user').DataTable({
            destroy: true,
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',

            ajax: {
                url: "Controlador/ControladorUser.php",
                method: "POST",
                data: datos
            },
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    className: 'btn btn-success',
                    text: "Excel",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data export',
                    className: 'btn btn-secondary',
                    text: "Csv",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export',
                    className: 'btn btn-danger',
                    text: "Pdf",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: 'Data export',
                    className: 'btn btn-primary',
                    text: "Imprimir",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                }
            ],
            columns: [
                { data: "nombre" },
                { data: "paterno" },
                { data: "materno" },
                { data: "email" },
                { data: "ult_con" },
                {
                    data: "estado",
                    render: function (data) {
                        if (data == 1) {
                            return "<button class='btn btn-success btn-estado' est='" + data + "' >Activo</button>";
                        } else {
                            return "<button class='btn btn-warning btn-estado' est='" + data + "'>Inactivo</button>";
                        }
                    }
                },
                { data: "rol" },
                {
                    data: "idUs",
                    render: function (data) {
                        return "<button class='btn btn-warning btn-edit ' data-toggle='modal' data-target='#modal-us' idp='" + data + "' ><i class='fas fa-pencil-alt'></i></button>" + "<button class='btn btn-danger btn-delet mx-2' idu='" + data + "'><i class='fas fa-trash'></i></button>";
                    }
                }

            ],
            language: espaniol
        });
    }


    function eliminar(datos, url, funcion) {


        Swal.fire({
            title: 'Esta usted Seguro?',
            text: "Esta accion no se puede deshacer!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Elimnar objeto!'
        }).then((result) => {
            if (result.value) {

                $.ajax({

                    type: "POST",
                    data: datos,
                    url: url,
                    dataType: "json",
                    success: function (data) {

                        //console.log(resultado);

                        if (data.resp > 0) {
                            Swal.fire(
                                'Listo !!',
                                'Eliminado ',
                                'success'
                            );
                            funcion();

                        } else {
                            Swal.fire(
                                'Error !!',
                                'correo o passowrd incorrectos, intente de nuevo ',
                                'error'
                            );
                        }
                    }
                });

            }
        });

    }

    

    function graficas() {
        
        $.getJSON('Controlador/ControladorBoleta.php?accion=grafica', function (data){
            
            let mes=[];
            let trancritos=[];
            let cosolidado=[];

            for (let i = 0; i < data.length; i++) {
                mes.push(data[i].Mes);
                trancritos.push(data[i].trancri);
                cosolidado.push(data[i].conso);
            }

            var areaChartData = {
                labels  : mes,
                datasets: [
                  {
                    label               : 'Boletas Revisadas y Consolidadas',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : cosolidado
                  },
                  {
                    label               : ' Boletas Transcritas',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                :  trancritos
                  },
                ]
              }
          
              var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                  display: false
                },
                scales: {
                  xAxes: [{
                    gridLines : {
                      display : false,
                    }
                  }],
                  yAxes: [{
                    gridLines : {
                      display : false,
                    }
                  }]
                }
              }
            
                //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0
    
            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }
    
            var barChart = new Chart(barChartCanvas, {
            type: 'bar', 
            data: barChartData,
            options: barChartOptions
            })
        })

        

        $.getJSON('Controlador/ControladorBoleta.php?accion=pie', function (data) {

            let tipo=[];
            let cantidad=[];

            for (let i = 0; i < data.length; i++) {
                tipo.push(data[i].tipo);
                cantidad.push(data[i].cantidad);

            }
            var donutData        = {
                labels: tipo,
                datasets: [
                  {
                    data: cantidad,
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
                  }
                ]
              }
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData        = donutData;
            var pieOptions     = {
              maintainAspectRatio : false,
              responsive : true,
            }
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions      
              })
            
        })

        $.getJSON('Controlador/ControladorBoleta.php?accion=widgets', function (data){
            $("#subidos").text(data[0].cantidad);
            $("#trancritos").text(data[1].cantidad);
            $("#consolidados").text(data[2].cantidad);
        })
    }









})


let espaniol = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "decimal": ",",
    "thousands": "."
};