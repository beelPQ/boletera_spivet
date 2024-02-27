<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed');
 
//Carga el fichero helper.php
require_once __DIR__. '/helper.php';
 
//Obtiene la lista de noticias a mostrar
$list = mod_buycarHelper::getMCL($params);//************************************mod_sliderHelper es editable
 
//Carga la vista por defecto del módulo
require JModuleHelper::getLayoutPath('mod_buycar');
?>
