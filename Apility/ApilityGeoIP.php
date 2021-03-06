<!-- This code creates the connection to the Apility online database and retains the geoip report -->

<?php

$curl = curl_init();

//get the ip to check
$ip=$_GET["ip"];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apility.net/geoip/".$ip,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "x-auth-token: 1461a3fc-c272-4632-8a4c-7680d22d3731" //<- API key
  ),
));

//retaining the report
$response = curl_exec($curl);
$errGeo = curl_error($curl);

//decoding the json object
$geo  = json_decode($response, true);
curl_close($curl);


?>