<?php
use Joomla\CMS\Factory;
$document = Factory::getDocument();
$url = str_replace("/", "", $_SERVER["REQUEST_URI"]);
// ? [Moroni - 1Nov2024] Se creó e inicicalizó la variable $uriVerify con el valor de la url, esto por si en algún otro archivo se ocupa la variable $url. Permitiendo ser verificada solamente en esta sección
$uriVerify = $url;
if( strpos($url, '?fbclid=') !== false ) $uriVerify = '';
if ($uriVerify == '' || $uriVerify == null ) {
// if ($url == '' || $url == null) {
    $url_actual = null;
    $document->addStyleSheet("/modules/mod_inicio/tmpl/src/css/inicio.min.css", array('version' => 'auto'));
    $document->addStyleSheet("https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array('version' => 'auto'));
    $document->addScript('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',  array('version' => 'auto'));
    $document->addScript('/modules/mod_inicio/tmpl/src/js/inicio.min.js', array('version' => 'auto'));

    //TODO : Js de oferta que es un archivo de iointegracion, al copiar el modulo este archivo se tiene que borrar para que funcione
    /* $document->addStyleSheet("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css", array('version' => 'auto')); */
    $document->addScript('https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js', array('version' => 'auto'));
    /* $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js', array('version' => 'auto')); */
    $document->addScript('/modules/mod_inicio/tmpl/src/js/oferta.min.js', array('version' => 'auto'));


}
/**
 * *IMPORTANTE
 * *Al usar este modulo es necesario incluir todos los archivosque se eucnetran al nivel de default
 * *EL orden de los includes tiene que ser conforme el orden desde joomla, es posible cambiar el orden
 *
 * *ORDEN DE ARCHIVOS
 * slider principal
 * oferta : integracion de codigo php
 * valores : valores de marca
 * integracion : integracion de codigo php
 * alianzas : slider de alianzas
 *
 * TODO : en caso de crear una nueva seccion desde joomla se tiene que crear un nuevo archvio php para ser integrado
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/slider_principal.php"); //slider principal
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/oferta.php"); //oferta acadmeca
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/values_brand.php"); //valores
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/video.php"); //video
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/integration.php"); //integracion con crm opcional
require_once($_SERVER['DOCUMENT_ROOT'] . "/modules/mod_inicio/tmpl/partials/alianzas.php"); //slider de alianzas
