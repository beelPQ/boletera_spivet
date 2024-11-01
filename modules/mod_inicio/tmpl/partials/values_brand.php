
<?php
$showAction3 = $params->get("actionShowSection3");
$titleValoresMarca = $params->get("titleBrandValues3");
$arrayBrandValues = (array)$params->get("itemValuesSec3");
$titleInfoBrand = $params->get("textMainSec3");
$descInfoBrand = $params->get("textSecondarySec3");
$colorBack3 = $params->get("colorBackgroundSec3");
$imageBack3 = $params->get("imageBackgroundSec3");
$typeBackgroundSec3 = $params->get("showInTypeBackground3");
$showButtonRedirect = $params->get("showInButtonRedirect3");
$colorTextBrandValues = $params->get("colorTextBrandValues");
$textButtonRedirect = "Ver mas";
$urlRedirectButon = "#";
$redirectionButton = "";
if( $params->get("textButtonExtra") ){
    $textButtonRedirect = $params->get("textButtonExtra");
}
if( $params->get("urlButtonExtra") ){
    if( strpos("http", $params->get("urlButtonExtra") != false) ){
        $urlRedirectButon =  "http://".$params->get("urlButtonExtra");
    }else{
        $urlRedirectButon = $params->get("urlButtonExtra");
    }
}

if($params->get("typeRedirectButton3") == 1){
    $redirectionButton = "target='_blank'";
}

?>
<?php if( $showAction3 == "1" ){ ?>
    <?php if( $typeBackgroundSec3 == "0" ){ ?>
    <div class="content-brandvalues" <?php if( $colorBack3 !== "" ){echo "style='background:$colorBack3'"; } ?> >
    <?php } else { ?>
    <div class="content-brandvalues  background-home-image" <?php if( $imageBack3 !== "" ){echo "style='background-image: url($imageBack3)'"; } ?> >
    <?php } ?>
        <div class="brandvalues-title" style="color : <?= $colorTextBrandValues ?>">
            <?php if( $titleValoresMarca !== "" ){ ?>
            <h2 class="title"><?= $titleValoresMarca ?></h2>
            <?php } ?>
        </div>
        <div class="brandvalues-info"  style="color : <?= $colorTextBrandValues ?>">
            <div class="brandvalues-info-text-title">
                <p><?= $titleInfoBrand ?></p>
            </div>
            <div class="brandvalues-info-text-detail">
                <p><?= $descInfoBrand ?></p>
            </div>
            <div class="brandvalues-info-button">
                <?php  ?>
                <?php if( $showButtonRedirect == "1" ){ ?>
                <a href="<?= $urlRedirectButon ?>" <?= $redirectionButton ?> >
                    <button class="btn-redirect"  style="color : <?= $colorTextBrandValues ?>">
                        <?= $textButtonRedirect ?>
                    </button>
                </a>
                <?php } ?>
            </div>
        </div>
        <div class="brandvalues-items"  style="color : <?= $colorTextBrandValues ?>">
            <?php foreach ($arrayBrandValues as $valBrandValue) {  ?>
            <div class="item">

                <?php if( $valBrandValue->redirectItemBrandValues == 1 ){ ?>
                    <?php
                        $urlRedirectItemBranVal = "#";
                        if($valBrandValue->urlRedirectItem != ""){
                            $urlRedirectItemBranVal = $valBrandValue->urlRedirectItem;
                        }
                        $typeTedirectItem = "";
                        if( $valBrandValue->typeRedirectItemBrandVal3 == 1 ){
                            $typeTedirectItem = "target='_blank'";
                        }
                    ?>
                    <a href="<?= $urlRedirectItemBranVal ?>" <?= $typeTedirectItem ?>  style="color : <?= $colorTextBrandValues ?>"  >
                        <img src="<?= $valBrandValue->itemImageValueSec3 ?>" alt="" loading="lazy" >
                        <p class="title-value"><?= $valBrandValue->itemTitleValueSec3 ?></p>
                        <p class="description-value"><?= $valBrandValue->itemDescriptionValueSec3 ?></p>
                    </a>
                <?php } else {  ?>
                    <img src="<?= $valBrandValue->itemImageValueSec3 ?>" alt="" loading="lazy" >
                    <p class="title-value"><?= $valBrandValue->itemTitleValueSec3 ?></p>
                    <p class="description-value"><?= $valBrandValue->itemDescriptionValueSec3 ?></p>
                <?php } ?>

            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
