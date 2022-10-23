<?php

$sendgrid_apikey = "YOUR API KEY";


$params = array(
    'personalizations' => array(
        array(
            'to' => array(
                array(
                    'email' =>  'WHO RECEIVED EMAIL'
                )
            )
        )
    ),
    'from' => array(
        'email' => 'YOUR SENDER EMAIL'
    ),
    'subject' => 'Contacto Uwall',
    'content' => array(
        array(
            'type' => 'text/html',
            'value' => 'Estoy interesado en Uwall: <br/> Mis datos son: <br/> Nombre: ' . $_POST["name"] . "<br/> Email: " . $_POST["email"] . "<br/> Titulo: " . $_POST["subject"] . "<br/> Mensaje: " . $_POST["message"]
        )
    )
  );

$request =  "https://api.sendgrid.com/v3/mail/send";

//print_r(json_encode($params));

// Generate curl request
$session = curl_init($request);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey, 'Content-Type: application/json'));
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, json_encode($params));
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($session, CURLOPT_TIMEOUT, 60);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
//print_r($response);

echo "OK";

?>
