<?php

    require "Conexion.php";
class Imagen {

    private $ruta;
    private $estado;
    private $nro;
    private $idImg;

    public function __construct($ruta,$estado,$nro,$idImg) {
        $this->ruta= $ruta;
        $this->estado= $estado;
        $this->nro= $nro;
        $this->idImg= $idImg;
    }

    static function setId($id)
    {

        return new self('', '', '',$idImg);
    }
    static function setImg($ruta,$nro){

        return new self($ruta, '', $nro,'');
    }
    static function setNingun(){  
        return new self('', '', '', '');
    }
    static function setNro($nro){  
        return new self('', '', $nro, '');
    }

    public function add()
    {
        $con= new Conexion();

        $sql = "INSERT INTO imagenes VALUES(null ,'$this->ruta' ,0,'$this->nro')";

        $con->query($sql);
        $res=$con->insert_id;
        $con->close();

        return $res;

    }

    public function comprobarNombre()
    {
        $con= new Conexion();

        $sql = "SELECT COUNT(*) 'c' FROM imagenes WHERE img='$this->ruta'";

        $res=$con->query($sql);

        $con->close();

        return $res;

    }
    public function comprobarNro()
    {
        $con= new Conexion();

        $sql = "SELECT COUNT(*) 'c' FROM imagenes WHERE nroImg='$this->nro'";

        $res=$con->query($sql);

        $con->close();

        return $res;

    }

}


	
?>