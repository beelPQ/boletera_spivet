<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed');
 
//Carga el fichero helper.php
require_once __DIR__. '/helper.php';
 
//Obtiene la lista de noticias a mostrar
$list = mod_generic_pqHelper::getMCL($params);
 
//Carga la vista por defecto del módulo
require JModuleHelper::getLayoutPath('mod_generic_pq');
?>