

<?php 
$showAction6 = $params->get("actionShowSection6");
$titleAlianzas6 = $params->get("titleAlianzas6"); 
$arraySliderSwip = (array)$params->get('contentSlidersSwiper'); 
$typeBackgorundSec6 = $params->get("showInTypeBackground6");
$imageBackground6 = $params->get("imageBackgroundSec6");
$colorBack6 = $params->get("colorBackgroundSec6"); 
$colorTitleAlianzas = $params->get("colorTextAlianzas");
?>
<?php if($showAction6 == "1"){ ?>
    <?php if($typeBackgorundSec4  == 0){ ?>
    <div class="content-alianzas" style="background: <?= $colorBack6?>;">
    <?php }else{?>
    <div class="content-alianzas  background-home-image" style="background-image: url(<?= $imageBackground6 ?>);">
    <?php }?>
        <?php if( $titleAlianzas6 !== "" ) { ?>
        <div class="title-alianzas">
            <h2 style="color: <?= $colorTitleAlianzas ?>"> <?= $titleAlianzas6 ?> </h2>
        </div>
        <?php } ?> 
        <!-- Swiper -->
        <div class="swiper swiper-alianza mySwiper items-carga">
                <div class="swiper-wrapper">
                <?php foreach ($arraySliderSwip as $valSlider) {  ?> 
                    <?php 
                    $arrayNameImage = explode("#", $valSlider->imageSlider);
                    $urlImageSlider =  $arrayNameImage[0];
                    $uriLinkImage = ""; 
                    ?> 
                    <div class="swiper-slide">
                        <?php  ?>
                        <?php if( $valSlider->addLink == "1" && $valSlider->uriLink != ""){ ?>
                        <a class="link-image-slide" href="<?= $valSlider->uriLink ?>" target="_blank">
                        <figure class="swiper-figure">
                            <img src="<?= $urlImageSlider ?>" alt="">
                        </figure>
                        </a>
                        <?php } else if($valSlider->addLink == "1" && $valSlider->uriLink == "") { ?>
                            <figure class="swiper-figure">
                            <img src="<?= $urlImageSlider ?>" alt="">
                            </figure>
                        <?php } else if($valSlider->addLink == "0" ) { ?>
                            <figure class="swiper-figure">
                            <img src="<?= $urlImageSlider ?>" alt="">
                            </figure>
                        <?php } ?>
                    </div>
                <?php } ?> 
                </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div> 
    </div>
<?php } ?>
