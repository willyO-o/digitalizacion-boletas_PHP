<?php
    include "../Modelo/Boleta.php";
    $id =$_GET['id'];
    $ob_bol=Boleta::setNull();
    $res=($ob_bol->getBolRegistrado($id))->fetch_assoc();
?>

<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-8">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12 ">
                    <a class="zoom" id="ver-detalle-boleta">
                        <img src="files/<?php echo $res['img'] ?>" class="product-image" alt="Product Image">
                    </a>

                </div>
                <div class="col-12 ">
                <hr>
                    <h4>Detalles de Transcipcion</h4>
                    <div class="bg-light py-2 px-3 mt-4 ">
                        <p>Fecha de Registro: <b> <?php echo $res['fechReg'] ?></b></p>
                        <p>Transcriptor: <b> <?php echo $res['nombre']. " " .$res['paterno'] ?></b></p>

                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">

                <div class="bg-light py-2 px-3 mt-4 ">
                    <p>Nro: <b> <?php echo $res['nro'] ?></b></p>
                    <p>Banco: <b> <?php echo $res['banco'] ?></b></p>
                    <p>Concepto: <b> <?php echo $res['concepto']!= "" ? $res['concepto']: "-" ?></b></p>
                    
                    <p>Fecha: <b> <?php echo $res['fecha'] ?></b></p>
                    <p>Nombre: <b> <?php echo $res['nomCliente']." ".$res['patCliente']." ".$res['matCliente'] ?></b>
                    </p>
                    <p>C.I.: <b> <?php echo $res['ci'] ?></b></p>
                    <p>Nacimiento: <b> <?php echo ($res['nacimiento']!="0000-00-00" ? $res['nacimiento'] : "-") ?></b>
                    </p>
                    <p>Nro. Cuenta: <b> <?php echo $res['nroCuenta'] != "0" ? $res['nroCuenta']: "-"?></b></p>
                    <p>Monto: <b> <?php echo $res['monto'] ?></b></p>
                    <p>Destino: <b> <?php echo $res['destino']!= "" ? $res['destino']: "-" ?></b></p>
                    <p>Agencia: <b> <?php echo $res['agencia']!= "" ? $res['agencia']: "-" ?></b></p>
                    <p>Operativo: <b> <?php echo $res['operativo']!= "" ? $res['operativo']: "-" ?></b></p>

                </div>


            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>