<?php
    use Joomla\CMS\Factory; 
    
    $document = Factory::getDocument(); 
    $document->addStyleSheet("/modules/mod_generic_pq/tmpl/assets/css/generic.min.css", array('version' => 'auto')); 
    $document->addScript('/modules/mod_generic_pq/tmpl/assets/js/generic.js',  array('version' => 'auto'));


    $background = $params->get('imageHeader');
    $back = explode("#", $background); 
    $title = $params->get('titlePage'); 
    $intro = $params->get('descriptionInHome');
    $description = $params->get('descriptionGeneral');



?>

<div class="content-generic flex">
    <div class="content-generic-header" style="background-image: url('<?=$back[0]?>');">
        <div class="content-generic-header-title">
            <span class="title"><?= $title ?></span>
        </div> 
        <div class="content-generic-header-desc flex">
            <span class="intro"><?= $intro ?></span>
        </div>
    </div>


    <div class="content-generic-info flex">
        <div class="content-generic-info-detail">
            <?= $description ?>
        </div> 
    </div>

   
</div>
