<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/configuration.php"); 
    class myDataBase { 
        public function conect_mysqli() {
            $config = new JConfig();
            $link=mysqli_connect($config->hostAdm,$config->userAdm,$config->passAdm,$config->datBAdm); 
            if(mysqli_connect_errno())
            {
                echo "Fallo la conexion a MySQL: ".mysqli_connect_error();
                $link=null;
            }else{
                mysqli_set_charset($link,"utf8");
            } 
            return $link; 
        }
    } 
?>