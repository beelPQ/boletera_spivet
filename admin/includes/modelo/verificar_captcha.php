<?php
  $captcha = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);
  if(!$captcha){
    echo '<h2>Por favor revisa el reCaptcha del formulario.</h2>';
    exit;
  }
  $secretKey = "6LevnX0pAAAAAD9NQowjX0IvHafKnPoFiN94wrgk";
  //$secretKey = "6Ld3bMcZAAAAAEstGQ0SQIxWtQw0eV6XmOXzKmYi";
  //$secretKey = "6LdONtgZAAAAANU3VCP8OB3MAdSFu45kJkzWhXiE";

  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array('secret' => $secretKey, 'response' => $captcha);

  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
  $responseKeys = json_decode($response,true);
  header('Content-type: application/json');
  if($responseKeys["success"]) {
    echo json_encode(array('reqStatus' => true));
  } else {
    echo json_encode(array('reqStatus' => false));
  }
?>