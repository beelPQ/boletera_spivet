<?php
    use Joomla\CMS\Factory;
    $document = Factory::getDocument();
    $document->addStyleSheet("/modules/mod_footer_generic/tmpl/src/css/footer.min.css", array('version' => 'auto')); 
    $imageFooter = $params->get("logoFooter");
    $itemsContacto = (array)$params->get("itemContact");
    $titleContact = $params->get("titleContacto");
    $titleRedes = $params->get("titleRedes");
    $itemsRedes = (array)$params->get("itemRedes");
    $titleGeneric = $params->get("titleGeneric");
    $itemsGeneric = (array)$params->get("itemGeneric");
?> 
<?php  ?>
<footer>
    <div class="footer">
        <div class="footer-data">
            <div class="footer-data-logo">
                <img src="<?= $imageFooter ?>" alt="">
            </div>
            <div class="footer-data-info">
                <div class="footer-data-info-col"> 
                    <?php if($titleContact != ""){ ?>
                    <h1><?= $titleContact ?></h1>
                    <?php } ?> 
                    <?php foreach ($itemsContacto as $valContact) { ?>
                        <div class="item-footer-info"> 
                            <img src="<?= $valContact->itemIconContact?>" alt="">  
                            <span> <?= $valContact->itemTitleContact ?>  </span>
                        </div>
                    <?php } ?>
                </div>
                <div class="footer-data-info-col">
                    <?php if($titleRedes != ""){ ?>
                    <h1><?= $titleRedes ?></h1>
                    <?php } ?> 
                    <?php foreach ($itemsRedes as $valRed) { ?>
                        <?php if($valRed->addLinkRedirectContact != "1" ) { ?>
                        <div class="item-footer-info"> 
                            <img src="<?= $valRed->itemIconRed?>" alt="">  
                            <span> <?= $valRed->itemTitleRed ?>  </span> 
                        </div>
                        <?php } else { ?>
                        <div class="item-footer-info"> 
                           <img src="<?= $valRed->itemIconRed?>" alt="">
                            <span> <a href="<?= $valRed->itemUrlLink?>">  <?= $valRed->itemTitleRed ?> </a> </span>
                        </div>
                        <?php } ?> 
                    <?php } ?>
                </div>
                <div class="footer-data-info-col">
                    <?php if($titleGeneric != ""){ ?>
                    <h1><?= $titleGeneric ?></h1>
                    <?php }else{ ?> 
                        <div style="margin-top: 34px;"></div>
                    <?php } ?> 
                    <?php foreach ($itemsGeneric as $valGeneric) { ?>
                        <?php if($valGeneric->addLinkRedirectGeneric != "1" ) { ?>
                        <div class="item-footer-info"> 
                            <img src="<?= $valGeneric->itemIconGeneric?>" alt="">  
                            <span><?= $valGeneric->itemTitleGeneric  ?> </span> 
                        </div>
                        <?php } else { ?>
                        <div class="item-footer-info"> 
                           
                            <img src="<?= $valGeneric->itemIconGeneric?>" alt="">  
                                <span>
                                    <a href="<?= $valGeneric->itemUrlLinkGeneric?>">
                                    <?= $valGeneric->itemTitleGeneric ?> </a>
                                </span>
                            </div>
                        <?php } ?> 
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
    $textCredits = $params->get("textCredits");
    $itemsCredits = (array)$params->get("itemCredits");
    $totalItemsCredits = count($itemsCredits);
    $index = 1;
?>
        <div class="footer-credits">
            <div class="footer-credits-text">
                    <?php if( $textCredits != "" ){ ?>
                        <span><?= $textCredits ?></span>
                    <?php } ?>
                    <br>
                    <?php ?>
                    <?php foreach ($itemsCredits as $valCredit) { ?> 
                        <a href="<?= $valCredit->itemUrlLink ?>"><?= $valCredit->itemTitleCredit ?></a>
                        <?php if( $index != $totalItemsCredits){ echo "- "; } ?>
                        <?php  $index ++; ?>
                    <?php } ?>
            </div>

        </div>
    </div>
</footer>
