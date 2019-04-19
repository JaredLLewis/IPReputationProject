<!-- This code creates the connection to the Apility online database and check if the IP is blacklisted or not -->

<?php

$curl = curl_init();

//get IP to check
$ip=$input;
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apility.net/badip/".$ip,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "x-auth-token: 1461a3fc-c272-4632-8a4c-7680d22d3731" // <- API key
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);
$ok=0;

//check if the IP is blacklisted or not
if(strcmp($response,"Resource not found")==0)
{
	$arr="Not Blacklisted";
	$ok=1;
}
else 
{$arr  = json_decode($response, true);}
curl_close($curl);


?>