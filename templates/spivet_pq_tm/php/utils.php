<?php

// Alias para generar las URL amigables
function alias($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    $cadena = str_replace(" ", "-", $cadena);		
    return utf8_encode($cadena);
}

//Establece la conexión con la base de datos del sistema
function connecSystem() {
    $conn = new mysqli("localhost", "mxcaionl_cip_user", "Q;lgri&^~.PU", "mxcaionl_cip_system");
    $conn->set_charset("utf8");
    return $conn;
}


// Muestra las modalidades acorde a los productos publicados
function getModalidades() {
    $conn = connecSystem();
    $sql = "SELECT 
    pm.idsystemprodmod AS id, 
    pm.modalidad_nombre AS nombre 
    FROM `producto` AS p
    INNER JOIN producto_modalidad  AS pm ON pm.idsystemprodmod = p.modalidad_idsystemprodmod
    WHERE p.publicado = 1
    GROUP BY pm.idsystemprodmod
    ORDER BY pm.modalidad_nombre DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows; 
}


// Muestra las categorias acorde a los productos publicados
function getCategorias($noVisible = false) {
    $conn = connecSystem();
    $sql = "";
    if($noVisible == true){
        $sql = "SELECT 
        p.categoria AS id,
        pc.categoria_nombre AS nombre
        FROM `producto` AS p
        INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
        WHERE p.publicado = 1 AND pc.visible = 1
        GROUP BY p.categoria
        ORDER BY FIELD (p.categoria,4,2,3,1,5)";
    }else{
        $sql = "SELECT 
        p.categoria AS id,
        pc.categoria_nombre AS nombre
        FROM `producto` AS p
        INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
        WHERE p.publicado = 1
        GROUP BY p.categoria
        ORDER BY FIELD (p.categoria,4,2,3,1,5)";
    }
   
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}


// Muestra las categorias acorde a una modalidad
function getCategoriasModalidad($id_modalidad) { 
    $conn = connecSystem();
    $sql = "SELECT 
    p.categoria AS id,
    pc.categoria_nombre AS nombre
    FROM `producto` AS p
    INNER JOIN producto_modalidad  AS pm ON pm.idsystemprodmod = p.modalidad_idsystemprodmod
    INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
    WHERE p.publicado = 1 AND  pm.idsystemprodmod IN ($id_modalidad)
    GROUP BY p.categoria
    ORDER BY FIELD (p.categoria,4,2,3,1,5)";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}

// Muestra las modalidades acorde a una categoria
function getModalidadesCategoria($id_categoria) { 
    $conn = connecSystem();
    $sql = "SELECT 
    pm.idsystemprodmod AS id, 
    pm.modalidad_nombre AS nombre
    FROM `producto` AS p
    INNER JOIN producto_modalidad  AS pm ON pm.idsystemprodmod = p.modalidad_idsystemprodmod
    WHERE p.publicado = 1 AND p.categoria = $id_categoria
    GROUP BY pm.idsystemprodmod
    ORDER BY pm.modalidad_nombre DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}


// Muestra los programas acorde a una modalidad y una categoria
function getProgramaModalidadCategoria($id_modalidad, $id_categoria) {  
    $conn = connecSystem();
    $sql = "SELECT 
    p.IDsystempro AS id, 
    p.NombrePrograma AS nombre, 
    pp.periodicidad_nombre AS periodicidad,
    p.categoria AS id_categoria,
    pc.categoria_nombre AS nombre_categoria,
    pm.idsystemprodmod AS id_modalidad, 
    pm.modalidad_nombre AS nombre_modalidad,
    p.idprospectus AS rvoe,
    p.imagenthumb AS img_small,
    p.duracion AS duracion
    FROM `producto` AS p
    INNER JOIN producto_modalidad  AS pm ON pm.idsystemprodmod = p.modalidad_idsystemprodmod
    INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
    INNER JOIN producto_periodicidad AS pp ON pp.idsystemperiodicidad = p.periodicidad_idsystemperiodicidad 
    WHERE p.publicado = 1 ";
    if($id_categoria != 0){ 
        $sql .= " AND p.categoria = ".$id_categoria." ";
    }
    if($id_modalidad != 0){
        $sql .= " AND  pm.idsystemprodmod IN ($id_modalidad) ";
    }
    $sql .= " ORDER BY p.categoria, p.NombrePrograma";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}


// Muestra los programas acorde a una categoria
function getProgramaCategoria($id_categoria) { 
    $conn = connecSystem();
    $sql = "SELECT 
    p.IDsystempro AS id, 
    p.NombrePrograma AS nombre, 
    pp.periodicidad_nombre AS periodicidad,
    p.categoria AS id_categoria,
    pc.categoria_nombre AS nombre_categoria,
    p.imagenthumb AS img_small,
    p.idprospectus  AS rvoe
    FROM `producto` AS p
    INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
    INNER JOIN producto_periodicidad AS pp ON pp.idsystemperiodicidad = p.periodicidad_idsystemperiodicidad
    WHERE p.publicado = 1 ";
    if($id_categoria != 0){
        $sql .= " AND p.categoria = $id_categoria";
    }
    $sql .= " ORDER BY p.NombrePrograma ASC";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}



// Muestra informacion de un programa
function getProgramaInformacion($id_programa) { 
    $conn = connecSystem();
    $sql = "SELECT 
    p.IDsystempro AS id, 
    p.idprospectus AS rvoe, 
    p.NombrePrograma AS nombre, 
    pp.periodicidad_nombre AS periodicidad,
    p.duracion AS duracion,
    p.descripcioncorta AS introtext,
    p.descripcionlarga AS `fulltext`,
    p.objetivo AS objetivo,
    p.dirigidoa AS dirigido,
    p.video AS video,
    p.fechainicio AS fecha_inicio,
    p.materias AS materias,
    p.brochurpdf AS pdf,
    p.imagenprincipal AS banner_h,
    p.imagenthumb AS thumb_h,
    p.imagentres AS certificado_p,
    p.categoria AS id_categoria,
    pc.categoria_nombre AS nombre_categoria,
    pm.idsystemprodmod AS id_modalidad, 
    pm.modalidad_nombre AS nombre_modalidad,
    p.skuprograma AS sku,
    p.curricula AS curricula,
    p.formulario_beca AS ver_formulario
    FROM `producto` AS p
    INNER JOIN producto_modalidad  AS pm ON pm.idsystemprodmod = p.modalidad_idsystemprodmod
    INNER JOIN producto_categoria AS pc ON pc.idsystemprodcat = p.categoria
    INNER JOIN producto_periodicidad AS pp ON pp.idsystemperiodicidad = p.periodicidad_idsystemperiodicidad
    WHERE p.IDsystempro = $id_programa ";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}

// Muestra el claustro de un programa
function getProgramaClaustro($id_programa) { 
    $conn = connecSystem();
    $sql = "SELECT 
    c.idsystemclaustro AS id,
    c.claustro_nombre AS nombre,
    c.claustro_cargo AS cargo 
    FROM `producto_claustro` AS p
    INNER JOIN claustro AS c ON c.idsystemclaustro = p.claustro_idsystemclaustro
    WHERE p.producto_IDsystempro = $id_programa AND c.claustro_publicado = 1";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
        $rows[] = $row;
    }
    $conn->close();
    return $rows;
}
?>