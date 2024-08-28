<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/conect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/templates/spivet_pq_tm/php/common.php");

class buyCarForm
{

    public function getOptionsPayment()
    {
        try {

            $data = [];
            $myDatabase = new myDataBase();
            $con = $myDatabase->conect_mysqli();
            if (!is_null($con)) {
                $sentence = "SELECT * FROM catalogo_forma_depago WHERE IDsystemapades!=0 AND disponible=1";
                $exec = $con->query($sentence);

                while ($row = $exec->fetch_array(MYSQLI_ASSOC)) {

                    $vtp = $row["plataforma"] . ' - ';

                    if ($row["IDsystemapades"] == 5) {
                        $vtp = '';
                    }
                    if ($row["IDsystemapades"] == 6) {
                        $vtp = '';
                    }

                    $obj = new stdClass;
                    $obj->id = $row["IDsystemapades"];
                    $obj->namePayment = $vtp . $row["Nombrepago"];
                    array_push($data, $obj);
                }

                echo json_encode([
                    "status" => true,
                    "title" => "datos obtenidos con exito",
                    "data" => $data
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "title" => "Error de conexion",
                    "message" => "La conexion es nula"
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "title" => "Error",
                "message" => "[ERROR_TRY]: " . $th->getMessage()
            ]);
        }
    }

    public function getStates()
    {
        try {

            $data = [];
            $myDatabase = new myDataBase();
            $con = $myDatabase->conect_mysqli();
            if (!is_null($con)) {
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
            } else {
                echo json_encode([
                    "status" => false,
                    "title" => "Error de conexion",
                    "message" => "La conexion es nula"
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "title" => "Error",
                "message" => "[ERROR_TRY]: " . $th->getMessage()
            ]);
        }
    }

    public function getStatesForCountry($idCountry)
    {
        try {

            $data = [];
            $myDatabase = new myDataBase();
            $con = $myDatabase->conect_mysqli();
            if (!is_null($con)) {
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
            } else {
                echo json_encode([
                    "status" => false,
                    "title" => "Error de conexion",
                    "message" => "La conexion es nula"
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "title" => "Error",
                "message" => "[ERROR_TRY]: " . $th->getMessage()
            ]);
        }
    }


    public function getCountries()
    {
        try {
            $data = [];
            $myDatabase = new myDataBase();
            $con = $myDatabase->conect_mysqli();
            if (!is_null($con)) {
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
            } else {
                echo json_encode([
                    "status" => false,
                    "title" => "Error de conexion",
                    "message" => "La conexion es nula"
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "title" => "Error",
                "message" => "[ERROR_TRY]: " . $th->getMessage()
            ]);
        }
    }

    public function getTowns($idMunicipio)
    {
        try {

            $data = [];
            $myDatabase = new myDataBase();
            $con = $myDatabase->conect_mysqli();
            if (!is_null($con)) {
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
            } else {
                echo json_encode([
                    "status" => false,
                    "title" => "Error de conexion",
                    "message" => "La conexion es nula"
                ]);
            }
        } catch (\Throwable $th) {
            echo json_encode([
                "status" => false,
                "title" => "Error",
                "message" => "[ERROR_TRY]: " . $th->getMessage()
            ]);
        }
    }

    /** Creamos a un nuevo cliente a partir del registro incial o desde la compra
     * @param {*} $dataPost : Datos post de la petición
     */
    public function newUserClient($dataPost)
    {
        try {
            $userName = '';
            $surnameName = '';
            $secondsurnameName = '';
            $name = $dataPost['name'];
            $explName = explode(' ', trim($name));
            if (count($explName) > 0) {
                $userName = trim($explName[0]);
                if (count($explName) == 2) {
                    $userName = trim($explName[0]);
                    $surnameName = trim($explName[1]);
                }
                if (count($explName) == 3) {
                    $userName = trim($explName[0]);
                    $surnameName = trim($explName[1]);
                    $secondsurnameName = trim($explName[2]);
                }
                if (count($explName) > 3) {
                    $userName = trim($explName[0] . ' ' . trim($explName[1]));
                    $surnameName = trim($explName[2]);
                    $secondsurnameName = trim($explName[3]);
                }
            }

            // $username = $dataPost['username'];
            $password = $dataPost['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email = $dataPost['email'];

            date_default_timezone_set('America/Mexico_City');
            $current_date = date("Y-m-d H:i:s");

            $myDatabase = new myDataBase();
            $mysqli = $myDatabase->conect_mysqli();
            if (is_null($mysqli) == false) {
                $query = $mysqli->prepare(" INSERT INTO catalogo_clientes (
                        clientes_nombre,
                        clientes_apellido1,
                        clientes_apellido2,
                        clientes_email,
                        clientes_password,
                        clientes_fechacreacion)
                    VALUES (?,?,?,?,?,?)");
                $query->bind_param('ssssss', $userName, $surnameName, $secondsurnameName, $email, $password, $current_date);
                $query->execute();
                if ($query->affected_rows > 0) {
                    $id_client = $query->insert_id;

                    $query->close();
                    die(json_encode([
                        "status" => true,
                        "message" => "Usuario creado de manera satisfactoria",
                        "description" => "",
                        "data" => [
                            "user_id" => Common::encrypt($id_client)
                        ],
                    ]));
                } else {
                    $query->close();
                    die(json_encode([
                        "status" => false,
                        "message" => "Error de creación",
                        "description" => "No fue posible crear su usuario",
                        "data" => [],
                    ]));
                }
            } else {
                $mysqli->close();
                die(json_encode([
                    "status" => false,
                    "message" => "Error de conexión",
                    "description" => "No se pudo conectar a la BD para generar el registro",
                    "data" => [],
                ]));
            }
        } catch (\Throwable $th) {
            die(json_encode([
                "status" => false,
                "message" => "Error inesperado",
                "description" => "[ERROR_TRY_REG]: " . $th->getMessage(),
                "data" => []
            ]));
        }
    }
    public function getUserCli($idCrypt, $emailUser = '')
    {
        try {
            $dataResponse = [];
            $id = Common::decrypt($idCrypt) ?? 0;
            $email = trim($emailUser) != '' ? trim($emailUser) : '';
            $myDatabase = new myDataBase();
			$con = $myDatabase->conect_mysqli();
            $query = '';
            if( $id > 0 && $email == '' ) {
                $query = "SELECT idsystemcli, clientes_nombre AS name, clientes_apellido1 AS surname, clientes_apellido2 AS secsurname, clientes_email AS email, clientes_telefono AS phone, clientes_codigopostal AS cPostal, id_municipio AS municipalyId, id_country AS countryId, id_state AS stateId, clientes_photo AS photo, clientes_status AS status FROM catalogo_clientes WHERE idsystemcli = $id";
            }
            elseif( $email != '') {
                $query = "SELECT idsystemcli, clientes_nombre AS name, clientes_apellido1 AS surname, clientes_apellido2 AS secsurname, clientes_email AS email, clientes_telefono AS phone, clientes_codigopostal AS cPostal, id_municipio AS municipalyId, id_country AS countryId, id_state AS stateId, clientes_photo AS photo, clientes_status AS status FROM catalogo_clientes WHERE clientes_email = '$email'";
            }
            if( $query == '' ) {
                die(json_encode([
                    "status" => false,
                    "message" => "Consulta no realizada",
                    "description" => '',
                    "data" => []
                ]));
            }
			$exect = $con->query($query);
            if ($exect->num_rows > 0) {
                while( $row = mysqli_fetch_assoc($exect) ) {
                    $row['id'] = Common::encrypt($row['idsystemcli']);
                    unset($row['idsystemcli']);
                    $dataResponse = $row;
                }
                die(json_encode([
                    "status" => true,
                    "message" => "Usuario encontrado",
                    "description" => "",
                    "data" => $dataResponse
                ]));
            }
            die(json_encode([
                "status" => false,
                "message" => "No se encontró el usuario",
                "description" => $query,
                "data" => []
            ]));
        } catch (\Throwable $th) {
            die(json_encode([
                "status" => false,
                "message" => "Error inesperado",
                "description" => "[ERROR_TRY_REG]: " . $th->getMessage(),
                "data" => []
            ]));
        }
    }
}

$buyCar = new buyCarForm();

if (isset($_POST)) {
    if ($_POST['method'] == "getStates") {
        $buyCar->getStates();
    } else if ($_POST['method'] == "getCountries") {
        $buyCar->getCountries();
    } else if ($_POST['method'] == 'getStatesForCountry') {
        $buyCar->getStatesForCountry($_POST["idCountry"]);
    } else if ($_POST['method'] == "paymentMethods") {
        $buyCar->getOptionsPayment();
    } else if ($_POST['method'] == "getTowns") {
        $buyCar->getTowns($_POST['idState']);
    }

    // ? Obtenemos datos del usuario logeado, si ya existe en la BD
    else if ($_POST['method'] == "get_user_auth") {
        isset($_POST['email']) ? $buyCar->getUserCli($_POST['id'], $_POST['email']) : $buyCar->getUserCli($_POST['id']);
    }

    // ? Creación de usuario cliente
    else if ($_POST['method'] == "user_auth") {
        $buyCar->newUserClient($_POST);
    }
}
