<?php
    require_once ('../../php/conexion.php');
    
    
    if( isset($_POST["option"]) ){

        if($_POST["option"]=='SaveStatusCobro'){


            $id_cobro = $_POST["code"];
            $status = $_POST["spago"];
            
            date_default_timezone_set('America/Mexico_City');
            $current_date =date("Y-m-d H:i:s");
            

            $mysqli = conectar();
            
            $query = $mysqli->prepare("UPDATE catalogo_cobros SET cobroscata_status=?,cobroscata_fechapago=? WHERE idsystemcobrocat = ? ");
            $query -> bind_param('isi',$status,$current_date,$id_cobro);
            $query -> execute();
            //$query -> fetch();
            
            if($query->affected_rows>0){
                
                $query -> close();
                
                $query = $mysqli->prepare(" SELECT cobroscata_idtransaccion,cobroscata_status,cobroscata_descuento,descuentos_idsystemdescuento FROM catalogo_cobros WHERE idsystemcobrocat= ?");
                $query -> bind_param('i',$id_cobro);
                $query -> execute();
                $query -> bind_result($id_transaction,$currentStatus,$descuento,$iddescuento);
                $query -> fetch();
                $query -> close();
                
                if($currentStatus==1){
                    //si el status se cambio pagado 
                    
                    $query = " SELECT idsystemcobrocataitem,catalogo_productos_idsystemcatpro 
                               FROM catalogo_cobros_items
                               WHERE cobroscata_idsystemcobrocat=".$id_cobro."
                               ORDER BY idsystemcobrocataitem ASC";
                    $resultado = $mysqli->query($query);
                    
                    while($row = mysqli_fetch_array($resultado)){
                        
                        $query = $mysqli->prepare(" SELECT catalogo_productos_sku,catalogo_productos_stock FROM catalogo_productos WHERE idsystemcatpro= ?");
                        $query -> bind_param('i',$row['catalogo_productos_idsystemcatpro']);
                        $query -> execute();
                        $query -> bind_result($product_sku,$product_stock);
                        $query -> fetch();
                        $query -> close();
                        
                        
                        //generamos el nombre de los PDFs de los boletos
                        $boleto_pdf = $id_transaction.'_'.$product_sku.'.pdf';
                        
                        $query = $mysqli->prepare("UPDATE catalogo_cobros_items SET file_boleto =? WHERE idsystemcobrocataitem = ? ");
                        $query -> bind_param('si',$boleto_pdf,$row['idsystemcobrocataitem']);
                        $query -> execute();
                        //$query -> fetch();
                        $query -> close();
                        
                        
                        //disminuimos el stock de los productos comprados
                        $product_stock = $product_stock - 1;
                        
                        $query = $mysqli->prepare("UPDATE catalogo_productos SET catalogo_productos_stock=? WHERE idsystemcatpro = ? ");
                        $query -> bind_param('ii',$product_stock,$row['catalogo_productos_idsystemcatpro']);
                        $query -> execute();
                        //$query -> fetch();
                        $query -> close();
                        
                    }
                    
                    
                    if($descuento>0){
                        //si se aplico un cupon
                        
                        $query = $mysqli->prepare(" SELECT descuento_existencia FROM catalogo_descuentos WHERE idsystemdescuento = ?");
                        $query -> bind_param('i',$iddescuento);
                        $query -> execute();
                        $query -> bind_result($existencia_actual);
                        $query -> fetch();
                        $query -> close();
                        
                        $existencia_actual--;
                        
                        $query = $mysqli->prepare("UPDATE catalogo_descuentos SET descuento_existencia=?  WHERE idsystemdescuento = ? ");
                        $query -> bind_param('ii',$existencia_actual,$iddescuento);
                        $query -> execute();
                        //$query -> fetch();
                        $query -> close();
                        
                    }
                    
                    
                }
                
                $respuesta = array(
                    'respuesta' => 'success',
                    'mensaje' => 'Se actualizó el estado del pago.'
                );
                
                
            }else{
                $query -> close();
                $respuesta = array(
                    'respuesta' => 'error',
                    'mensaje' => 'No se actualizó el estado del pago.'
                );
            }
            
            
            $mysqli->close();
            
            
            echo die(json_encode($respuesta));

        }

       
    }
?>