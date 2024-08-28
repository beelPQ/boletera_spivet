<?php 
$showAction5 = $params->get("actionShowSection5");
$titleIntegration = $params->get("titleIntegration5");
$colorTextIntegration = $params->get("colorTextIntegration");
?>
<?php if($showAction5 == "1"){ ?>
    <div class="content-integration">
        <?php if( $titleIntegration !== "" ) { ?>
        <div class="integration" style="color: <?= $colorTextIntegration ?>;">
            <h2> <?= $titleIntegration ?> </h2>
        </div>
        <?php } ?>
        
    </div>
<?php } ?>