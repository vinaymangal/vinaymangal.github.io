<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $url = 'https://api.prokerala.com/v2/astrology/birth-details';
  $data = json_decode(file_get_contents('php://input'), true);

  $options = array(
    'http' => array(
      'header'  => array(
        'Authorization: Bearer a1f574be-0a88-4f02-b28e-a5c888ebbb9a',
        'X-Api-Key: WFambIbA92FcEk5Rlq3to7LDlXPxMZNLgl5gXGuZ',
        'Content-Type: application/json'
      ),
      'method'  => 'POST',
      'content' => json_encode($data)
    )
  );

  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  header('Content-Type: application/json');
  echo $result;
}
?>