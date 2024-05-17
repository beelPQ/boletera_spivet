<?php
defined('_JEXEC') or die('No se permite el acceso directo a esta ubicación');
 
//Carga el fichero helper.php
require_once __DIR__. '/helper.php';
 
//Obtiene la lista de noticias a mostrar
$list = FormAttachFileHelper::getMCL($params);
 
//Carga la vista por defecto del módulo
require JModuleHelper::getLayoutPath('mod_form_attach_file');
?>
