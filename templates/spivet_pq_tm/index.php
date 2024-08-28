<?php
defined('_JEXEC') or die;
$app  = JFactory::getApplication();
$this->setHtml5(true);
$params = $app->getTemplate(true)->params;
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$itemid = $app->input->getCmd('Itemid', '');

$url = str_replace("/", "", $_SERVER["REQUEST_URI"]);
if ($url == '' || $url == null) {
    $url_actual = null;
} else {
    if (isset($_GET['noticia'])) {
        $url_actual = 'noticia';
    } elseif (isset($_GET['programa'])) {
        $url_actual = 'programa';
    } elseif (isset($_GET['oferta-academica'])) {
        $url_actual = 'oferta-academica';
    } else {
        $url_actual = preg_replace('/\\?.*/', '', $url);
    }
}

// Código para Google Analytics
$tagsGoogle = $this->params->get('tagsGoogle') ??  '';

// Color de fondo
$backgroundcolorBody = $this->params->get('backgroundcolorBody') ??  '#000';

$bgcolorHeaderGuestScroll = $this->params->get('bgcolorHeaderGuestScroll') ??  '#000';
$bgcolorHeaderGuest = $this->params->get('bgcolorHeaderGuest') ??  '#000';
$txtcolorHeaderGuest = $this->params->get('txtcolorHeaderGuest') ??  '#fff';

$bgcolorHeaderRegistered = $this->params->get('bgcolorHeaderRegistered') ??  '#fff';
$txtcolorHeaderRegistered = $this->params->get('txtcolorHeaderRegistered') ??  '#000';

jimport('joomla.html.html');
include JPATH_SITE . '/templates/spivet_pq_tm/php/utils.php';

$document = JFactory::getDocument();
// $document->addStyleSheet("$PATH_MODULE_SRC/css/mdlMyShopping.min.css", array('version' => 'auto'));
$document->addScript("templates/spivet_pq_tm/js/script.min.js",  array('version' => 'auto'));
// <script src="templates/spivet_pq_tm/js/script.js?v=time()"></script>

// ? Obtener datos del usuario logeado
$user = JFactory::getUser();
$userId = '';
$userName = '';
$userMail = '';
if ($user->id > 0) {
    // $userId = $user->id;
    $userId = "data-id='$user->id'";
    // $userName = $user->name;
    $userName = "data-name='$user->name'";
    // $userMail = $user->email;
    $userMail = "data-email='$user->email'";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Boostrap -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">-->
    <jdoc:include type="head" />
    <title></title>
    <link rel="icon" href="<?= $url ?>templates/spivet_pq_tm/favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        :root {
            --bg-body: <?= $backgroundcolorBody ?>;
            --bg-header_scroll: <?= $bgcolorHeaderGuestScroll ?>;
            --bg-header_guest: <?= $bgcolorHeaderGuest ?>;
            --txt-header_guest: <?= $txtcolorHeaderGuest ?>;
            --bg-header_register: <?= $bgcolorHeaderRegistered ?>;
            --txt-header_register: <?= $txtcolorHeaderRegistered ?>;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>-->


    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Shared -->
    <link href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css?v=<?= time() ?>" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.iife.js" defer init></script>
    <!-- widgets forms  -->
    <link rel="stylesheet" href="templates/spivet_pq_tm/css/form_contact.css?v=<?= time() ?>" rel="stylesheet" />
    <!-- CSS general -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="templates/spivet_pq_tm/css/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="templates/spivet_pq_tm/css/style_template.min.css?v=<?= time() ?>">
    <!-- <link rel="stylesheet" href="templates/spivet_pq_tm/css/video_inicio.css?v=<?= time() ?>"> -->
    <!-- <link rel="stylesheet" href="templates/spivet_pq_tm/css/<?= ($url_actual == null) ? 'inicio' : $url_actual ?>.css?v=<?= time() ?>"> -->

    <!-- <link rel="stylesheet" href="templates/spivet_pq_tm/css/inicio.min.css?v=<?= time() ?>"> -->

    <?php if ($url_actual == "noticias") { ?>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php } ?>

    <?php echo $tagsGoogle ?>
    <script src='https://www.google.com/recaptcha/api.js?render=6LevnX0pAAAAAM8b4qITJ6OHfpRdAZN1DF32xdpt'></script>
</head>

<body style="margin:0" class="spivet" <?= $userId ?> <?= $userName ?> <?= $userMail ?>>
    <div class="spinner"><span class="loader"></span></div>
    <!-- Header -->
    <header id="headerContent" class="container-header anouncement-available">
        <jdoc:include type="modules" name="spivet_tape_information" style="none" />
        <div id="to_pqoverlay">
            <div class="navbar-brand">
                <a href="./"><img src="<?= $this->params->get('header_logo'); ?>"></a>
            </div>
            <jdoc:include type="modules" name="spivet_menu" style="none" />
        </div>
        <!-- <div class="header__logo">
            <a href="./"><img src="<?= $this->params->get('header_logo'); ?>"></a>	
        </div>
        <div class="header__menu"><i class="fas fa-bars"></i><span>MENÚ</span></div> -->
    </header>


    <!-- Main -->
    <?php if ($this->countModules('spivet_content', true)  > 0 ) : ?>
        <jdoc:include type="modules" name="spivet_content" style="none" />
    <?php endif; ?>
    <main data-com="1" >
        <jdoc:include type="component" />
    </main>

    <?php if ($this->countModules('spivet_footer', true)) : ?>
        <jdoc:include type="modules" name="spivet_footer" style="none" />
    <?php endif; ?>

    <?php
    if ($url_actual == null) { ?>
        <!-- JS OWL -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script> -->
        <!--  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- JS -->
        <!-- <script src="templates/spivet_pq_tm/js/inicio.js"></script> -->
    <?php
    } elseif ($url_actual == 'programa') { ?>
        <script src="templates/spivet_pq_tm/js/programa.js?v=<?= time(); ?>"></script>
    <?php
    } elseif ($url_actual == 'rvoe') { ?>
        <script src="templates/spivet_pq_tm/js/rvoe.js?v=<?= time(); ?>"></script>
    <?php
    } elseif ($url_actual == 'noticia') { ?>
        <script src="templates/spivet_pq_tm/js/noticias.js?v=<?= time(); ?>"></script>
    <?php
    } elseif ($url_actual == 'convenio-beca') {
    ?>
        <script src="templates/spivet_pq_tm/js/convenio-beca.js?v=<?= time(); ?>"></script>
    <?php
    } elseif ($url_actual == 'noticias') {
    ?>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="templates/spivet_pq_tm/js/noticias_filtros.js?v=<?= time(); ?>"></script>
    <?php
    }
    ?>
    <!-- widgets forms  -->
    <!-- <script src="templates/spivet_pq_tm/js/form_contact.js?v=<?= time(); ?>"></script>  -->
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- sweet alert -->

</body>

</html>