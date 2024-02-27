<?php
    use Joomla\CMS\Factory; 
    
    //$document->addScript('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',  array('version' => 'auto'));


  
    $title = $params->get("titleGeneric");
    $addSubtitle = $params->get("addSubtitleSect1");
    $subtitle = $params->get("subtitleSection1", "");
    $colorTitles = $params->get("colorTitles", "#fff");
    $typeBg = $params->get("backgroundSect1");
    $colorSection = $params->get("backgroundColorSec1");
    $bgImage = $params->get("backgroundImageSec1");
    $typeDistribution = $params->get("distributionSect1");
    $arrayinfoOneCol = (array)$params->get("itemsDistribution1Col");
    $arrayinfoTwoCol = (array)$params->get("itemsDistribution2Cols");

    $colorDescriptions = $params->get("colorDescriptions");
    //echo json_encode($arrayinfoOneCol);
    /*$title = $params->get("", "");
    $title = $params->get("", "");
    $title = $params->get("", "");
    $title = $params->get("", "");
    $title = $params->get("", "");
    $title = $params->get("", "");
    $title = $params->get("", ""); */

   
    $document = Factory::getDocument();
    $document->addStyleSheet("/modules/mod_generic_advance_pq/tmpl/src/css/generic_advance.min.css", array('version' => 'auto'));
?>
<?php if($typeBg == "1"){ ?>
<div class="content-generic-advance" style="background-image: url(<?= $bgImage ?>)">
<?php } else {?>
<div class="content-generic-advance" style="background: <?= $colorSection ?>">
<?php } ?>


    <div class="content-title">
        <h2 class="title" style="color: <?= $colorTitles ?>"><?= $title ?></h2>
    </div>
    <?php  ?>
    <?php if( $addSubtitle == "1" ){ ?>
    <div class="content-subtitile">
        <span style="color: <?= $colorTitles ?>"> <?= $subtitle ?> </span>
    </div>
    <?php } ?> 
    <div class="content-info-generic">
    <?php if( $typeDistribution == 0 ){ ?>
        <?php foreach ($arrayinfoOneCol as $value) { ?>
            <div class="info-generic one-column">
                <div class="info-generic-image-onec">
                    <img src="<?= $value->itemImageCol1 ?>" alt="">
                </div>
                <div class="info-generic-text" style="color: <?= $colorDescriptions ?>;">
                    <?= $value->itemTextCol1 ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>

        <?php foreach ($arrayinfoTwoCol as $value) { ?>
            <div class="info-generic two-column">
                <?php if($value->positionImageCol2 == 1){ ?> 
                <div class="wrapper" style="color: <?= $colorDescriptions ?>;">
                    <img src="<?= $value->itemImageCol2 ?>" alt="" style="float: right;" >
                    <?= $value->itemTextCol2 ?> 
                </div> 
                <?php } else { ?>
                <div class="wrapper">
                    <img src="<?= $value->itemImageCol2 ?>" alt="" style="float: left;" > 
                    <?= $value->itemTextCol2 ?> 
                </div> 
                <?php } ?>
            </div>
        <?php } ?>

    <?php } ?> 
    </div>
    

</div>