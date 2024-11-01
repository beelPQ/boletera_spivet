<?php
$showAction4 = $params->get("actionShowSection4");
$titleInfoBrand = $params->get("textMainSec3");
$descInfoBrand = $params->get("textSecondarySec3");
$colorBack4 = $params->get("colorBackgroundSec4");

$postionInvert = $params->get('videoOrientation');
$titleVideo = $params->get('titleVideo');
$subtitleVideo = $params->get('subtitleVideo');
$textVideo = $params->get('descriptionVideo');
$colorTextVideo = $params->get("colorTextVideo");
$typeBackgorundSec4 = $params->get("showInTypeBackground4");
$imageBackground4 = $params->get("imageBackgroundSec4");
$video = $params->get('linkVideo');
$videoUrl = "";
$iframeVideo = "no_ifrem";
if(str_contains($video, "iframe")){
    $iframeVideo = $video;
}else{
    $videoUrl = explode("?v=", $video);
}
?>

<?php if( $showAction4 == "1" ){ ?>
    <?php if($typeBackgorundSec4  == 0){ ?>
    <div class="content-video" style="background: <?= $colorBack4?>;">
    <?php }else{?>
    <div class="content-video" style="background-image: url(<?= $imageBackground4 ?>);">
    <?php }?>
    <?php if($postionInvert == 1){ ?>
        <div class="text-video" style="color: <?= $colorTextVideo ?>;">
            <div class="title">
                <span class="title-video"><?= $titleVideo ?><span>
            </div>
            <div class="subtitle">
                <span class="subtitle-video"><?= $subtitleVideo ?><span>
            </div>
            <div class="description-video">
                <?= $textVideo?>
            </div>
        </div>
        <div class="video-player">
        <?php if($iframeVideo != "no_ifrem"){ ?>
            <?= $iframeVideo; ?>
        <?php }else{
            if( strpos($video, 'youtube.com/watch') !== false ) $video = str_replace("watch?v=", "embed/", $video);
            if( $video != "" ){ ?>
                <!-- <iframe width="100%"  height="615" src="https://www.youtube.com/embed/<?= $videoUrl[1] ?>" title="YouTube video player" frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                <iframe data-src="<?= "$video?autoplay=0&controls=0&rel=0&showinfo=0" ?>" src="<?= "$video?autoplay=0&controls=0&rel=0&showinfo=0" ?>"
                    title="YouTube video player"
                    width="100%" height="450"
                    class="lazyload"
                    frameborder="0"
                    allowfullscreen></iframe>
            <?php }
        } ?>
        </div>

        <?php }else{ ?>
        <div class="video-player">
        <?php if($iframeVideo != "no_ifrem"){ ?>
            <?= $iframeVideo; ?>
        <?php }else{
            if( strpos($video, 'youtube.com/watch') !== false ) $video = str_replace("watch?v=", "embed/", $video);
            if( $video != "" ){ ?>
                <!-- <iframe width="100%"  height="615" src="https://www.youtube.com/embed/<?= $videoUrl[1] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                <iframe data-src="<?= "$video?autoplay=0&controls=0&rel=0&showinfo=0" ?>" src="<?= "$video?autoplay=0&controls=0&rel=0&showinfo=0" ?>"
                    title="YouTube video player"
                    width="100%" height="450"
                    class="lazyload"
                    frameborder="0"
                    allowfullscreen></iframe>
            <?php }
        } ?>
        </div>
        <div class="text-video" style="color: <?= $colorTextVideo ?>;">
            <div class="title">
                <span class="title-video"><?= $titleVideo ?><span>
            </div>
            <div class="subtitle">
                <span class="subtitle-video"><?= $subtitleVideo ?><span>
            </div>
            <div class="description-video">
                <?= $textVideo?>
            </div>
        </div>
    <?php } ?>
</div>
<?php } ?>