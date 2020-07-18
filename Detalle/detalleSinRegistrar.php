<?php
    include "../Modelo/Boleta.php";
    $id =$_GET['id'];
    $ob_bol=Boleta::setNull();
    $res=($ob_bol->getImgSinReg($id))->fetch_assoc();
?>

<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12 ">
                    <a class="zoom" id="ver-detalle-boleta">
                        <img src="files/<?php echo $res['img'] ?>" class="product-image" alt="Product Image">
                    </a>

                </div>
                <div class="col-12 ">
                <hr>
                    <h4>Detalles de Boleta</h4>
                    <div class="bg-light py-2 px-3 mt-4 ">
                        <p>Nro.: <b> <?php echo $res['nroImg'] ?></b></p>
                        <p>Estado: <b> <?php echo $res['estado']=="0"? "Sin Transcribir": " "?></b></p>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.card-body -->
</div>