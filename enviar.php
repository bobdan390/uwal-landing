<?php



$key = "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";
$correo = "uwall@gmail.com";

$fields_string = '{ "personalizations":[{"to":[{"email": "'.$correo.'"}]}],"from": {"email": "uwall-contact@gmail.com"},"subject":"Un usuario quiere contactarnós","content":[{"type":"text/plain","value":"and easy to do anywhere, even with cURL"}]}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer '.$key,
    'Content-Type:application/json'
)); 

curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
$data = curl_exec($ch);
curl_close($ch);

?>