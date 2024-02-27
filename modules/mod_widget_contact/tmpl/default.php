<?php
use Joomla\CMS\Factory; 
$document = Factory::getDocument(); 
$document->addStyleSheet("/modules/mod_widget_contact/tmpl/src/css/widget.min.css", array('version' => 'auto'));

$iconPrincipal = $params->get("iconWidgetPrinicipal", "");
$iconWhats = $params->get("iconWidgetWhatsapp", "");
$numberWhats = $params->get("numberWhats", "");
$iconForm = $params->get("iconWidgetForm", "");
$iconMess = $params->get("iconWidgetMessanger", "");
$linkMess = $params->get("linkMess", "");
$iconShared = $params->get("iconWidgetShared", "");
$numberWhatsSoporte = $params->get("numberWhatsSoporte", "");

?>

<!--Div para compartir url-->
<div class="content-shared desactive-content" id="contentShareLink" > 
    <div class="button">
        <button class="button-closed-shared" id="button-closed">X</button>
    </div> 
    <div class="shareon flex" data-url="<?php echo JURI::current() ?>">
        <a class="facebook"></a>
        <button class="twitter"></button>
        <a class="linkedin"></a>
        <button class="whatsapp"></button>
        <button class="telegram"></button>
    </div> 
    <input type="text" id="txtInputHash" class="input-contain-url" readonly value="<?php echo JURI::current() ?>"> 
    <div class="copy">
        <button type="button" id="btnCopyHash" class="copy-button" >
            Copiar
        </button>
    </div>
</div> 
<div class="widget">
    <div class="contacto_flotante"> 
          <div class="contacto_flotante__principal"><img id="imgButtonWidget" src="<?= $iconPrincipal ?>"></div>
          <div class="contacto_flotante__item contacto_flotante__telefono"><a href="https://api.whatsapp.com/send/?phone=<?= $numberWhats ?>" target="_blank"><img src="<?= $iconWhats ?>"></a></div>
          <div class="contacto_flotante__item contacto_flotante__ayuda"><a href="https://api.whatsapp.com/send/?phone=<?= $numberWhatsSoporte ?>" target="_blank"><img src="<?= $iconForm ?>" id="btnFormShowSection"></a></div>
          <div class="contacto_flotante__item contacto_flotante__whatsapp"><a href="<?= $linkMess ?>" target="_blank"><img src="<?= $iconMess ?>"></a></div>
          <div class="contacto_flotante__item contacto_flotante__compartir"><img src="<?= $iconShared ?>"></div>
      </div>
</div>
<script src="/modules/mod_widget_contact/tmpl/src/js/widget.js"></script>