<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/configuration.php");
        function conectar(){
			$config = new JConfig();
			//$link=mysqli_connect("fanta001.mysql.guardedhost.com","fanta001_cursos","f2d5Gs#Zq6","fanta001_cai_bd");
			$link=mysqli_connect($config->hostAdm,$config->userAdm,$config->passAdm,$config->datBAdm);

			if(mysqli_connect_errno())
			{
				echo "Fallo la conexion a MySQL: ".mysqli_connect_error();
			}
			mysqli_set_charset($link,"utf8");
			return $link;
		}
		//23.229.188.34
		
		
?>