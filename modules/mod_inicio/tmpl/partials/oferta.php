
<?php
//scss : _oferta.scss
$showAction2 = $params->get("actionShowSection2");
$titleOferta = $params->get("titleOfertaSec2");
$colorBack2 = $params->get("colorBackgroundSec2");
$imageBack2 = $params->get("imageBackgroundSec2");
$typeBackgroundSec2 = $params->get("showInTypeBackground2");
$colorTitleOferta = $params->get("colorTitleOferta");
?>
<?php if( $showAction2 == "1" ){ ?>
    <?php if( $typeBackgroundSec2 == "0" ){ ?>
    <div class="content-oferta" <?php if( $colorBack2 !== "" ){echo "style='background:$colorBack2'"; } ?> >
    <?php } else if( $typeBackgroundSec2 == "1" ) { ?>
    <div class="content-oferta background-home-image" <?php if( $imageBack2 !== "" ){echo    "style='background-image: url($imageBack2)'"; } ?> >
    <?php } ?>
        <div class="content-oferta-title">
            <?php if( $titleOferta !== "" ){ ?>
            <h2 class="title" style="color : <?= $colorTitleOferta ?>"><?= $titleOferta ?></h2>
            <?php } ?>
        </div> 
        <div class="content-oferta-items">
            <?php
            //Aqui va el contenido o la logica de php para integrar el servicio de terceros
            ?>
            <div class="content-oferta-items-menu"> 
            </div>
            <div class="swiper swiper-oferta mySwiperOferta">
                <div class="swiper-wrapper wrapper-oferta"> 
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <?php
            //Aqui va el contenido o la logica de php para integrar el servicio de terceros
            ?>
        </div>
        
    </div>
<?php } ?>