<?php
//css : templates/spivet/css/inicio.min.css 
$arraySlider = (array)$params->get("sliderPrincipal");
foreach ($arraySlider as $valRecurse) {
}
?>

<div id="carouselPrincipal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $index = 0; ?>
        <?php foreach ($arraySlider as $valRecurse) { ?> 
            <div class="carousel-item <?php if ($index == 0) { echo "active"; } ?>">
                <?php if ($valRecurse->typeRecurso == 0) { ?>
                    <?php 
                        $image = "/images/Spivet/sliders/principal/FondoSlider.png";
                        if($valRecurse->imageSlider != ""){
                            $image = $valRecurse->imageSlider;
                        }
                    ?>
                    <?php if($valRecurse->RedireccionSlider == 0){ ?>
                    <img src="<?= $image ?>" class="d-block w-100 image-slider" alt="...">
                    <?php } else { ?>
                        <?php 
                            $typeRedirecSlider = "";
                            $urlRedirec = "#";
                            if($valRecurse->urlRedirectItemSlider != ""){
                                $urlRedirec = $valRecurse->urlRedirectItemSlider;
                            }
                            if($valRecurse->typeRedirectItemSlider == 1){
                                $typeRedirecSlider = "target='_blank'";
                            }    
                        ?>
                        <a href="<?= $urlRedirec ?>" <?= $typeRedirecSlider ?> >
                            <img src="<?= $image ?>" class="d-block w-100 image-slider" alt="...">
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <?php if($valRecurse->RedireccionSlider == 0){ ?>
                    <video class="carousel-item-video" onloadedmetadata="this.muted=true" autoplay loop>
                        <source src="<?= $valRecurse->uriVideoSlider ?>">
                    </video>
                    <?php } else { ?>
                        <?php 
                            $typeRedirecSlider = "";
                            $urlRedirec = "#";
                            if($valRecurse->urlRedirectItemSlider != ""){
                                $urlRedirec = $valRecurse->urlRedirectItemSlider;
                            }
                            if($valRecurse->typeRedirectItemSlider == 1){
                                $typeRedirecSlider = "target='_blank'";
                            }    
                        ?>
                        <a href="<?= $urlRedirec ?>" <?= $typeRedirecSlider ?> >
                            <video class="carousel-item-video" onloadedmetadata="this.muted=true" autoplay loop>
                                <source src="<?= $valRecurse->uriVideoSlider ?>">
                            </video>
                        </a>
                    <?php } ?>

                <?php } ?>
                <?php if ($valRecurse->showTextRecurso == 1) { ?>
                    <?php if($valRecurse->typeTextVideo == 0) { ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $valRecurse->titleRecurso ?></h5>
                            <p><?= $valRecurse->descriptionRecurso ?></p>
                        </div>
                        <?php } else { ?>
                        <div class="carousel-caption-text-advanced">
                            <?= $valRecurse->textAdvanced_slider ?>
                        </div>
                        <?php } ?>    
                <?php } ?>
            </div>
            <?php $index++; ?>
        <?php } ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>