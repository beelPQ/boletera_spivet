<?php
    define('_JEXEC', 1); 
    define('JPATH_BASE', realpath(dirname(__FILE__) . '/../../../..'));
    require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");
    
    class saveComprobante{
        function saveNameComprobante($numberPayment, $nameDocument){
            $comm = new Common();
            $database = new myDataBase();
            $con = $database->conect_mysqli();
            
            $idPayment = $comm->decrypt($numberPayment);
            $queryUpdateCobro = "UPDATE catalogo_cobros SET cobroscata_adjunto = '$nameDocument' WHERE idsystemcobrocat = $idPayment";
            $exectUpdate = $con->query($queryUpdateCobro);
            if($con->affected_rows > 0){
                echo json_encode([
                    "status" => true,
                    "message" => "Comprobante adjuntado con exito!"
                ]); 
            }else{
                echo json_encode([
                    "status" => false,
                    "message" => "Ocurrio un error al guardar el nombre del comprobante, favor de volver a intentarlo mas tarde"
                ]);
            }
            $con->close();
        }
        
        function moveComprovante($numberPayment, $comprobante){
            try{
                $comm = new Common();
                $database = new myDataBase();
                $con = $database->conect_mysqli();
                $idPayment = $comm->decrypt($numberPayment);
                
                $querySeelect = "SELECT cobroscata_idregcobro FROM catalogo_cobros WHERE idsystemcobrocat = $idPayment";
                $exectSelect = $con->query($querySeelect);
                $numberComprobante = "";
                if($exectSelect->num_rows > 0){
                    $obj = mysqli_fetch_assoc($exectSelect);
                    $numberComprobante = $obj["cobroscata_idregcobro"];
                }
                $con->close();
                
                $tempName = $comprobante['tmp_name'];
                $nameDocument = $comprobante['name'];
                $extension = pathinfo($nameDocument, PATHINFO_EXTENSION);
                
                
                
                $nameTemporal = "Adjunto_".$numberComprobante.".".$extension;
                
                //ruta de directiorio
                $carpetaDestino = '../../../../files/adjuntos/'.$nameTemporal; 
                if (move_uploaded_file($tempName, $carpetaDestino)) {
                    $this->saveNameComprobante($numberPayment, $nameTemporal);    
                } else {
                    echo json_encode([
                        "status" => false,
                        "message" => "Ocurrio un error al adjuntar el comprobante, favor de volver a intentarlo mas tarde"
                    ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => false,
                    "message" => $th->getMessage()
                ]);
            } 
            
            
        }
        
        
    }
    
    
    if($_POST){ 
        
        if( isset($_POST["code1"]) && isset( $_FILES["comprobante"] ) ){
            $action = new saveComprobante();
            $action->moveComprovante($_POST["code1"], $_FILES["comprobante"]);
        }
        
    }
    

?>