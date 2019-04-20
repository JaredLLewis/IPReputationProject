<!-- This code creates the connection to the Apility online database and retains the domain report -->

<?php

$curl = curl_init();

//get the domain 
$query=$input;
$query = trim($query, '/');

// If scheme not included, prepend it
if (!preg_match('#^http(s)?://#', $query)) {
    $query = 'http://' . $query;
}

$urlParts = parse_url($query);

// remove www
$domain = preg_replace('/^www\./', '', $urlParts['host']);

$query = $domain;





//make the connection
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apility.net/baddomain/".$query,
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

//retaining the report
$response = curl_exec($curl);

//decoding the json object
$arr  = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

?>