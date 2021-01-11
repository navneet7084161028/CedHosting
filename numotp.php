<?php

$number = $_POST['number'];
session_start();
$message = rand(1000,9999);
$_SESSION['number']=$number;
$_SESSION['otp']=$message;

$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "$message",
    "language" => "english",
    "route" => "p",
    "numbers" => "$number",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: i64QcsxpGI3JT0DCSUkZrmObVBuFlnPfeNKw92M815HRgAYEvLqr3Py9L57wS4iHslAXDMaICjEGVFTW",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "Message not sent";
  // echo "cURL Error #:" . $err;
} else {
  echo "Message sent";
  // echo $response;
}

?>