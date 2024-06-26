<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/conect.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/templates/spivet_pq_tm/php/common.php");

    class buyCarForm{

        public function getOptionsPayment(){
            try {

                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT * FROM catalogo_forma_depago WHERE IDsystemapades!=0 AND disponible=1";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {
                        
                        $vtp = $row["plataforma"].' - ';
                        
                        if($row["IDsystemapades"]==5){
                            $vtp = '';
                        }
                        if($row["IDsystemapades"]==6){
                             $vtp = '';
                        }

                        $obj = new stdClass;
                        $obj->id = $row["IDsystemapades"];
                        $obj->namePayment = $vtp.$row["Nombrepago"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
            
        }

        public function getStates(){
            try {

                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT * FROM estados";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                        $obj = new stdClass;
                        $obj->id = $row["id"];
                        $obj->state = $row["estado"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
            
        }
        
        public function getStatesForCountry( $idCountry ){
            try {

                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT st.id_state, st.state FROM country_states cs
                    INNER JOIN states st ON st.id_state = cs.id_state WHERE cs.id_country = $idCountry";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                        $obj = new stdClass;
                        $obj->id = $row["id_state"];
                        $obj->state = $row["state"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
            
        }
        
        
        public function getCountries(){
            try{
                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT * FROM countries";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                        $obj = new stdClass;
                        $obj->id = $row["id_country"];
                        $obj->country = $row["country"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
        }

        public function getTowns($idMunicipio){
            try {

                $data = [];
                $myDatabase = new myDataBase();
                $con = $myDatabase->conect_mysqli();
                if( !is_null($con) ){
                    $sentence = "SELECT mu.id, municipio FROM estados_municipios em
                                INNER JOIN municipios mu ON mu.id = em.municipios_id
                                WHERE em.estados_id = $idMunicipio ORDER BY municipio ASC";
                    $exec = $con->query($sentence);

                    while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                        $obj = new stdClass;
                        $obj->id = $row["id"];
                        $obj->town = $row["municipio"];
                        array_push($data, $obj);

                    }

                    echo json_encode([
                        "status" => true,
                        "title" => "datos obtenidos con exito",
                        "data" => $data
                    ]);
                }else{
                    echo json_encode([
                        "status" => false,
                        "title" => "Error de conexion",
                        "message" => "La conexion es nula"
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status"=> false,
                    "title" => "Error",
                    "message" => "[ERROR_TRY]: ".$th->getMessage()
                ]);
            } 
        }

    }

    $buyCar = new buyCarForm();

    if(isset($_POST)){
        if($_POST['method'] == "getStates"){
            $buyCar->getStates();
        }else if($_POST['method'] == "getCountries"){
            $buyCar->getCountries(); 
        }else if($_POST['method'] == 'getStatesForCountry'){
            $buyCar->getStatesForCountry($_POST["idCountry"]);
        }else if($_POST['method'] == "paymentMethods"){
            $buyCar->getOptionsPayment();
        }else if($_POST['method'] == "getTowns"){
            $buyCar->getTowns($_POST['idState']);
        }
    }

?>