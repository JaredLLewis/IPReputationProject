<!-- This code creates the connection to the Shodan online database and retains the report-->
<!-- Author: Geanina F. Tambaliuc-->

<?php

$ch = curl_init();

//get the IP to check
$ip = $_GET["ip"];

//set the API key
$key="WoyHjPEVvGan3zackwOPNVH8auzL8Ypt";
curl_setopt($ch, CURLOPT_URL, "https://api.shodan.io/shodan/host/".$ip."?key=".$key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

//retain the report
$result = curl_exec($ch);

//decoding the json object
$arr=json_decode($result,true);
$error=curl_errno($ch);

curl_close ($ch);


?>