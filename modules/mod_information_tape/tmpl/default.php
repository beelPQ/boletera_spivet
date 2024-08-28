<?php
    use Joomla\CMS\Factory; 
    $document = Factory::getDocument(); 
    $document->addStyleSheet("/modules/mod_information_tape/tmpl/src/css/information_tape.min.css", array('version' => 'auto'));
    $textTape = $params->get("informationTape", "");
?>
<div id="tapeAnouncements" class="content-tape anuncio">
    <p><?= $textTape ?></p>
</div>