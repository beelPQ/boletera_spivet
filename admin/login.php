<?php

session_start();
if (isset($_GET['cerrar_sesion'])) {
	$cerrar_sesion = $_GET['cerrar_sesion'];
	if ($cerrar_sesion) {
		session_destroy();
		header('Location: login.php');
	}
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Boletera Spivet - Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.min.css?v=<? time() ?>">
	

	<!--==============================================================================================-->
	<script src='https://www.google.com/recaptcha/api.js?render=6LevnX0pAAAAAM8b4qITJ6OHfpRdAZN1DF32xdpt'></script>

</head>

<body>
    <video autoplay muted loop class="background_video">
      <source src="images/backgrounds/login.mp4" type="video/mp4">
    </video>
	<div id="contentSpinnerPrimary" class="spinner"><span class="loader"></span></div>
	<div class="container-login100">
		<div class="wrap-login100 p-l-69 p-r-69 p-t-43">
			<!-- <form id="sesion" class="login100-form validate-form" action="index.php" method="post" autocomplete="off"> -->
			<form id="sesion" class="login100-form validate-form" action="includes/modelo/verificar_captcha.php" method="post" autocomplete="off">
			    <!--
				<p align="center"><img src="../../../images/logo_carpey.png" width="100"></p>
				-->

				<section class="login100-form_inputs">
				    
				    <p align="center" class="space_bottom1"><img src="images/logos/spivet.png" width="228.74px" height="80.39px"></p>
				    
					<span class="login_text1 space_bottom1">Iniciar sesión</span>
					
					<div class="form-group mb-3 login_content_input space_bottom2" data-validate="Enter email">
						<label for="email" class="login_text2">Correo electrónico:</label>
						<input class="form-control" type="email" id="email" placeholder="correo@gmail.com" minlength="13" maxlength="50">
					</div>

					<div class="form-group login_content_input space_bottom3" data-validate="Enter password">
						<label for="password" class="login_text2">Contraseña:</label>
						<div class="content_password">
						    <input class="form-control" type="password" id="password" placeholder="">
    						<button type="button" id="btnChangeEye" class="content_password--eye" >
    					        <img src="images/icons/icon_eye_slash.svg">
    					    </button>
						</div>
						
					</div>

					<div class="container-login100-form-btn m-b-45">
						<input type="hidden" id="tipo" value="login">
						<input type="submit" id="btnLogin" class="login100-form-btn" value="Iniciar sesión">
					</div>
				</section>

			</form>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="js/sesion.js?v=<?= time() ?>"></script>
</body>

</html>