<?php
    require "../Modelo/Conexion.php";
    class Boleta  {
        

        private  $nro;
        private  $conc;
        private  $nCli;
        private  $pCli;
        private  $mCli;
        private  $cuen;
        private  $ci;
        private  $nac;
        private  $mont;
        private  $bank;
        private  $fech;
        private  $dest;
        private  $agen;
        private  $oper;
        private  $usua;
        private  $fReg;
        private  $idUs;
        private  $idImg;
        private  $idBol;

        public function __construct($nro,$conc,$nCli,$pCli,$mCli,$cuen,$ci,$nac,$mont,$bank,$fech,$dest,$agen,$oper,$usua,$fReg,$idUs,$idImg,$idBol){
            $this->nro=$nro;
            $this->conc=$conc;
            $this->nCli=$nCli;
            $this->pCli=$pCli;
            $this->mCli=$mCli;
            $this->cuen=$cuen;
            $this->ci=$ci;
            $this->nac=$nac;
            $this->mont=$mont;
            $this->bank=$bank;
            $this->fech=$fech;
            $this->dest=$dest;
            $this->agen=$agen;
            $this->oper=$oper;
            $this->usua=$usua;
            $this->fReg=$fReg;
            $this->idUs=$idUs;
            $this->idImg=$idImg;
            $this->idBol=$idBol;
            
        }
        static function setNull()
        {
            return new self('','','','','','','','','','','','','','','','','','','');
        }

        static function setAll($nro,$conc,$nCli,$pCli,$mCli,$cuen,$ci,$nac,$mont,$bank,$fech,$dest,$agen,$oper,$usua,$fReg,$idUs,$idImg,$idBol)
        {
            return new self($nro,$conc,$nCli,$pCli,$mCli,$cuen,$ci,$nac,$mont,$bank,$fech,$dest,$agen,$oper,$usua,$fReg,$idUs,$idImg,$idBol);
        }

        public function add($nro1,$conc1,$nom1,$pat1,$mat1,$cuen1,$ci1,$naci1,$mont1,$bank1,$fech1,$dest1,$agen1,$oper1,$user1,$fReg1,$idUs1,$idImg1,$database){
            $con= new Conexion();

            $sql="INSERT INTO $database VALUES(null,'$nro1','$conc1','$nom1','$pat1','$mat1','$cuen1','$ci1','$naci1','$mont1','$bank1','$fech1','$dest1','$agen1','$oper1','$user1','$fReg1','$idUs1','$idImg1') ";

            $con->query($sql);
            $res=$con->insert_id;
            $con->close();

            return $res;

        }
        public function anterior($idIm,$es){
            $con= new Conexion();

            $sql = "SELECT idImg,img,estado FROM `imagenes` WHERE idImg<".$idIm." AND estado=".$es." ORDER BY 1 DESC LIMIT 0,1 ";

            $res=$con->query($sql);
           
            $con->close();

            return $res;

        }
        public function siguiente($idIm,$es){
            $con= new Conexion();

            $sql = "SELECT idImg,img,estado FROM `imagenes` WHERE idImg>".$idIm." AND estado=".$es." ORDER BY 1 ASC LIMIT 0,1 ";

            $res=$con->query($sql);
           
            $con->close();

            return $res;

        }

        public function primeraImg($es){
            $con= new Conexion();

            $sql = "SELECT MIN(idImg) idImg,img,estado FROM `imagenes` WHERE   estado=$es ";

            $res=$con->query($sql);
           
            $con->close();

            return $res;

        }

        public function estadoImg($es,$idIm){
            $con= new Conexion();

            $sql = "UPDATE imagenes SET estado = $es WHERE idImg= $idIm ";

            $res=$con->query($sql, $con->affected_rows);
           
            $con->close();

            return $res;

        }

        public function comprobarNro($nr)
        {
            $con= new Conexion();

            $sql = "SELECT COUNT(*) 'c' FROM boleta WHERE nro='$nr'";

            $res=$con->query($sql);

            $con->close();

            return $res;

        }

        public function listarConsolidados()
        {
            $con= new Conexion();
            $sql="SELECT idBol, nro, concepto, nomCliente, patCliente ,nombre, paterno, img
                    FROM boleta_consolidado
                    JOIN usuario USING(idUs) 
                    JOIN imagenes USING(idImg)
                    WHERE imagenes.estado = 2 ";

            $res=$con->query($sql);

            $con->close();

            return $res;
        }
        
        public function listarTranscritos()
        {
            $con= new Conexion();
            $sql="SELECT idBol, nro, concepto, nomCliente, patCliente ,nombre, paterno, img
                    FROM boleta
                    JOIN usuario USING(idUs) 
                    JOIN imagenes USING(idImg)
                    WHERE imagenes.estado = 1 ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function listarSinRegistrar()
        {
            $con= new Conexion();
            $sql="SELECT * FROM imagenes WHERE estado=0 ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getBolRegistrado($id)
        {
            $con= new Conexion();
            $sql="SELECT * FROM boleta
                JOIN imagenes USING(idImg)
                JOIN usuario USING(idUs)
                WHERE idBol = $id ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getConsolidado($id)
        {
            $con= new Conexion();
            $sql="SELECT * FROM boleta_consolidado 
                JOIN imagenes USING(idImg)
                JOIN usuario USING(idUs)
                WHERE idBol = $id ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getImgSinReg($id)
        {
            $con= new Conexion();
            $sql="SELECT * FROM  imagenes WHERE idImg = $id ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getReg($id)
        {
            $con= new Conexion();
            $sql="SELECT * FROM imagenes 
                    JOIN boleta USING(idImg) 
                    WHERE idImg=$id ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getConteoEstados()
        {
            $con= new Conexion();
            $sql="SELECT 'p' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM imagenes UNION
                    SELECT 't' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM boleta UNION
                    SELECT 'c' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM boleta_consolidado  ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }
        
        public function getGraficaPie()
        {
            $con= new Conexion();
            $sql="SELECT 'Pendientes' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM imagenes WHERE estado=0 UNION
                    SELECT 'Transcritos' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM imagenes WHERE estado=1 UNION
                    SELECT 'Consolidados' as tipo,IFNULL(COUNT(*),0) as cantidad  FROM imagenes WHERE estado=2  ";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function getGraficaBarras()
        {
            $con= new Conexion();
            $sql="SELECT Mes,IFNULL(t,0) 'trancri',IFNULL(c,0) 'conso' FROM
                    (SELECT 1 as IdMes , 'Enero'     as Mes UNION
                    SELECT 2 as IdMes , 'Febrero'    as Mes UNION
                    SELECT 3 as IdMes , 'Marzo'      as Mes UNION
                    SELECT 4 as IdMes , 'Abril'      as Mes UNION
                    SELECT 5 as IdMes , 'Mayo'       as Mes UNION
                    SELECT 6 as IdMes , 'Junio'      as Mes UNION
                    SELECT 7 as IdMes , 'Julio'      as Mes UNION
                    SELECT 8 as IdMes , 'Agosto'     as Mes UNION
                    SELECT 9 as IdMes , 'Septiembre' as Mes UNION
                    SELECT 10 as IdMes, 'Octubre'    as Mes UNION
                    SELECT 11 as IdMes, 'Noviembre'  as Mes UNION
                    SELECT 12 as IdMes, 'Diciembre'  as Mes) TM
                    LEFT JOIN (SELECT month(fechReg) 'idMes', COUNT(*) 't' 
                                from boleta
                                GROUP BY idMes )TT USING(idMes)
                    LEFT JOIN (SELECT month(fechReg) 'idMes', COUNT(*) 'c' 
                                from boleta_consolidado
                                GROUP BY idMes )TC USING(idMes)";
                    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

    }
    


?>