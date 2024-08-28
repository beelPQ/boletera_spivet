<?php
    /**
     * Archivo que sirve para obtener toda la informacion relevante para los envios de correo
     * 
     */

     
    require_once($_SERVER['DOCUMENT_ROOT']."/configuration.php"); 
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php"); 
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/conect.php");
    
    class ConfigInformationEmail{
        /**
         * *Funcion que obtiene la informacion de la configuracion de emporesa
         */
        function getDataConfig() {
            try {
                $myDatabaseClass = new myDataBase();
                $con = $myDatabaseClass->conect_mysqli();
                $queryGetConfig = "SELECT configuracion_valor FROM configuracion WHERE configuracion_nombre = 'Dominio'";
                $resp = $con->query($queryGetConfig);
                if($resp->num_rows > 0){
                    $data = mysqli_fetch_assoc($resp);
                    return $data["configuracion_valor"];
                }else{
                    return false;
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => false, "title" => "Error", "message" => $th->getMessage()]);
            } 
        }


        /**
         ** Funcion que obtiene la informacion del usuario al que se enviara el correo
         */
        function getDataUser($regisval)
        {
            try{
                $myDatabaseClass = new myDataBase();
                $generalf = new Common();
                $con = $myDatabaseClass->conect_mysqli(); 
                $idUser = $generalf::decrypt($regisval); 
                $query = "SELECT clientes_nombre, clientes_apellido1, clientes_apellido2, clientes_email, 
                clientes_matricula, clientes_password FROM catalogo_clientes WHERE idsystemcli = $idUser"; 
                $resp = $con->query($query);
                if($resp->num_rows > 0){
                    $objectUser = mysqli_fetch_assoc($resp);
                    //Desencriptamos el correo para el envio de los datos
                    $objectUser["account_email"] = $generalf::decrypt($objectUser["clientes_email"]);
                    //Encriptamos usuairo correo y password para la activacion de la cuenta
                    $objectUser["clientes_matricula"] = $generalf::encrypt($objectUser["clientes_matricula"]);
                    $objectUser["clientes_password"] = $generalf::encrypt($objectUser["clientes_password"]);
                    $objectUser["userGenerate"] = $idUser;
                    return $objectUser;
                }else{
                    return false;
                }
            } catch (\Throwable $th) {
                return false;
                //echo json_encode(["status" => false, "title" => "Error", "message" => $th->getMessage()]);
            } 
        }
    }


?>