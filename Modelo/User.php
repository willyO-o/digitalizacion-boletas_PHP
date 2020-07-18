<?php
    require "../Modelo/Conexion.php";
    Class User{
        private  $idUs;
        private  $nom;
        private  $pat;
        private  $mat;
        private  $ema;
        private  $pas;
        private  $uCn;
        private  $est;
        private  $idRl;

        public function __construct($idUs, $nom, $pat,$mat, $ema, $pas,$uCn, $est, $idRl){
            $this->idUs = $idUs;
            $this->nom = $nom;
            $this->pat = $pat;
            $this->mat = $mat;
            $this->ema = $ema;
            $this->pas = $pas;
            $this->uCn = $uCn;
            $this->est = $est;
            $this->idRl = $idRl;
        }
        
        static function setNull()
        {
            return new self('','','','','','','','','');
        }

        static function setAll($idUs, $nom, $pat,$mat, $ema, $pas,$uCn, $est, $idRl)
        {
            return new self($idUs, $nom, $pat,$mat, $ema, $pas,$uCn, $est, $idRl);
        }

        public function add(){
            $con= new Conexion();

            $sql = "INSERT INTO usuario VALUES(null,'$this->nom','$this->pat','$this->mat','$this->ema',MD5('$this->pas'),null,'$this->est','$this->idRl') ";

            $con->query($sql);
            $res=$con->insert_id;
            $con->close();

            return $res;

        }

        public function update(){
            $con= new Conexion();

            if(strlen($this->pas) > 0){
                $sql = "UPDATE usuario SET nombre='$this->nom', paterno='$this->pat', materno='$this->mat', email='$this->ema', password=MD5('$this->pas'), estado=$this->est WHERE idUs=$this->idUs ";
            }else{
                $sql = "UPDATE usuario SET nombre='$this->nom', paterno='$this->pat', materno='$this->mat', email='$this->ema', estado=$this->est WHERE idUs=$this->idUs ";
            }

            $res=$con->query($sql, $con->affected_rows);
            $con->close();

            return $res;

        }


        public function listarRol()
        {
            $con= new Conexion();

            $sql = "SELECT * FROM rol";

            $res=$con->query($sql);

            $con->close();

            return $res;

        }

        public function listar()
        {
            $con= new Conexion();

            $sql = "SELECT * FROM usuario JOIN rol USING(idRol) ";

            $res=$con->query($sql);

            $con->close();

            return $res;

        }

        public function getUser($id)
        {
            $con= new Conexion();

            $sql = "SELECT * FROM usuario WHERE idUs= $id ";

            $res=$con->query($sql);

            $con->close();

            return $res;

        }

        public function upEstado($est,$iUs)
        {
            $con= new Conexion();

            if ($est==1) {
                $sql = "UPDATE usuario SET estado= 0 WHERE idUs= $iUs";
            }else {
                $sql = "UPDATE usuario SET estado= 1 WHERE idUs= $iUs";
            }

            $res=$con->query($sql, $con->affected_rows);
            $con->close();
            return $res;

        }

        public function delete($iUs)
        {
            $con= new Conexion();

            $sql = "DELETE FROM usuario  WHERE idUs= $iUs";

            $res=$con->query($sql, $con->affected_rows);
            $con->close();
            return $res;

        }

        public function existeEmail()
        {
            $con= new Conexion();

            $sql = "SELECT * FROM usuario WHERE email='$this->ema' ";

            $res=$con->query($sql);

            $con->close();

            return $row_cnt = mysqli_num_rows($res);

        }
        
        public function validar($em,$pa)
        {
            $con= new Conexion();

            $sql = "SELECT * FROM usuario WHERE email='$em' AND password=MD5('$pa') AND estado=1 ";

            $res=$con->query($sql);

            $con->close();

            return $res;

        }
        public function estado($id)
        {
            $con= new Conexion();

            $hoy = date('Y-m-d H:i:s');

            $sql = "UPDATE usuario SET ult_con='$hoy' WHERE idUs= $id ";

            $con->query($sql);

            $con->close();


        }
        

    }





?>